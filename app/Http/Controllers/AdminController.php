<?php

namespace App\Http\Controllers;
use App\Models\OurTeam;
use App\Models\OurValue;
use App\Models\Partner;
use App\Models\Requisite;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\View\View;

class AdminController extends Controller
{
    use HelperTrait;

    private array $data = [];
    private array $breadcrumbs = [];
    private array $menu;

    public function __construct()
    {
        $this->menu = [
            'home' => [
                'key' => 'home',
                'icon' => 'icon-home2',
            ],
            'users' => [
                'key' => 'users',
                'icon' => 'icon-users',
            ],
            'values' => [
                'key' => 'values',
                'icon' => 'icon-safe',
            ],
            'participants' => [
                'key' => 'participants',
                'icon' => 'icon-users4',
            ],
            'partners' => [
                'key' => 'partners',
                'icon' => 'icon-shrink7',
            ],
            'requisites' => [
                'key' => 'requisites',
                'icon' => 'icon-pen',
            ],
        ];
        $this->breadcrumbs[] = $this->menu['home'];
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function home(): View
    {
        return $this->showView('home');
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function users($slug=null): View
    {
        return $this->getView('users', new User(), $slug);
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function editUser(Request $request): RedirectResponse
    {
        $validationArr = ['email' => 'required|email|unique:users,email'];
        if ($request->has('id')) {
            $validationArr['id'] = 'required|integer|exists:users,id';
            $validationArr['email'] .= ','.$request->input('id');
            if ($request->input('password')) $validationArr['password'] = $this->validationPassword;
            $fields = $this->validate($request, $validationArr);
            $user = User::find($request->input('id'));
            if ($request->input('password')) $fields['password'] = bcrypt($fields['password']);
            $user->update($fields);
        } else {
            $validationArr['password'] = $this->validationPassword;
            $fields = $this->validate($request, $validationArr);
            $fields['password'] = bcrypt($fields['password']);
            User::create($fields);
        }
        $this->saveCompleteMessage();
        return redirect(route('admin.users'));
    }

    public function values($slug=null): View
    {
        return $this->getView('values', new OurValue(), $slug);
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function editValue(Request $request): RedirectResponse
    {
        $this->editSomething (
            $request,
            new OurValue(),
            [
                'head' => 'required|min:3|max:20',
                'text' => $this->validationText,
                'image' => $this->validationSvg
            ],
            'images/our_values',
            'home_icon'
        );
        $this->saveCompleteMessage();
        return redirect(route('admin.values'));
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function deleteValue(Request $request): JsonResponse
    {
        return $this->deleteSomething($request, new OurValue());
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function deleteUser(Request $request): JsonResponse
    {
        return $this->deleteSomething($request, new User());
    }

    public function participants(Request $request, $slug=null): View
    {
        return $this->getView('participants', new OurTeam(), $slug);
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function editParticipant(Request $request): RedirectResponse
    {
        $this->editSomething (
            $request,
            new OurTeam(),
            [
                'name' => 'required|min:3|max:100',
                'image' => $this->validationJpgAndPng
            ],
            'images/our_team/',
            'person'
        );
        $this->saveCompleteMessage();
        return redirect(route('admin.participants'));
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function deleteParticipant(Request $request): JsonResponse
    {
        return $this->deleteSomething($request, new OurTeam());
    }

    public function partners($slug=null): View
    {
        return $this->getView('partners', new Partner(), $slug);
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function editPartner(Request $request): RedirectResponse
    {
        $this->editSomething (
            $request,
            new Partner(),
            [
                'image' => $this->validationJpgAndPng
            ],
            'images/partners/',
            'logo'
        );
        $this->saveCompleteMessage();
        return redirect(route('admin.partners'));
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function deletePartner(Request $request): JsonResponse
    {
        return $this->deleteSomething($request, new Partner());
    }

    public function requisites(): View
    {
        return $this->getView('requisites', new Requisite());
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function editRequisites(Request $request): RedirectResponse
    {
        $fields = $this->validate($request, [
            'id_1' => 'required|email',
            'id_2' => 'required|size:13',
            'id_3' => 'required|size:10',
            'id_4' => 'required|min:3|max:255',
            'id_5' => 'required|size:9',
            'id_6' => 'required|size:20',
        ]);
        foreach ($fields as $field => $value) {
            $id = (int)str_replace('id_','',$field);
            $requisite = Requisite::find($id);
            $requisite->value = $value;
            $requisite->save();
        }
        $this->saveCompleteMessage();
        return redirect(route('admin.requisites'));
    }

    private function getView(string $key, Model $model, $slug=null): View
    {
        $this->data['menu_key'] = $key;
        $this->breadcrumbs[] = $this->menu[$key];

        $this->data['singular_key'] = substr($key, 0, -1);
        if (request('id')) {
            $this->data[$this->data['singular_key']] = $model->findOrFail(request('id'));

            if (isset($this->data[$this->data['singular_key']]->email)) $name = $this->data[$this->data['singular_key']]->email;
            elseif (isset($this->data[$this->data['singular_key']]->name)) $name = $this->data[$this->data['singular_key']]->name;
            else $name = $this->data[$this->data['singular_key']]->head;

            $this->breadcrumbs[] = [
                'key' => $this->menu[$key]['key'],
                'params' => ['id' => $this->data[$this->data['singular_key']]->id],
                'name' => trans('admin.edit_'.$this->data['singular_key']),
            ];
            return $this->showView($this->data['singular_key']);
        } else if ($slug && $slug == 'add') {
            $this->breadcrumbs[] = [
                'key' => $this->menu[$key]['key'],
                'slug' => 'add',
                'name' => trans('admin.adding_'.$this->data['singular_key']),
            ];
            return $this->showView($this->data['singular_key']);
        } else {
            $this->data[$key] = $model->all();
            return $this->showView($key);
        }
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    private function editSomething (
        Request $request,
        Model $model,
        array $validationArr,
        string $pathToImages = null,
        string $imageName = null
    ): Model
    {
        if ($request->has('id')) {
            $validationArr['id'] = 'required|integer|exists:'.$model->getTable().',id';
            if ($imageName) $validationArr['image'] = 'nullable|'.$validationArr['image'];

            $fields = $this->validate($request, $validationArr);
            $fields = $this->getSpecialFields($model, $fields);

            $model = $model->find($request->input('id'));
            $model->update($fields);
            $this->processingImages($request, $model, $pathToImages, $imageName);
        } else {
            if ($imageName) $validationArr['image'] = 'required|'.$validationArr['image'];

            $fields = $this->validate($request, $validationArr);
            $fields = $this->getSpecialFields($model, $fields);

            $model = $model->create($fields);
            $this->processingImages($request, $model, $pathToImages, $imageName);
        }
        $this->saveCompleteMessage();
        return $model;
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    private function deleteSomething(Request $request, Model $model): JsonResponse
    {
        $this->validate($request, ['key' => 'required|integer|exists:'.$model->getTable().',id']);
        $table = $model->find($request->input('id'));
        if (isset($table->image) && $table->image) {
            $this->deleteFile($table->image);
        } elseif (isset($table->images)) {
            foreach ($table->images as $image) {
                $this->deleteFile($image->image);
            }
        }
        $table->delete();
        return response()->json(['message' => trans('admin.delete_complete')],200);
    }

    private function getSpecialFields(Model $model, array $fields): array
    {
        if (in_array('active',$model->getFillable())) $fields['active'] = request('active') ? 1 : 0;
        return $fields;
    }

    private function processingImages(Request $request, Model $model, string $pathToImages, string $imageName): void
    {
        if ($pathToImages && $request->hasFile('image')) {
            $imageName .= $model->id.'.'.$request->file('image')->getClientOriginalExtension();
            $model->image = $pathToImages.$imageName;
            $model->save();
            $request->file('image')->move(base_path('public/'.$pathToImages), $imageName);
        }
    }

    private function showView($view): View
    {
        return view('admin.'.$view, array_merge(
            $this->data,
            [
                'breadcrumbs' => $this->breadcrumbs,
                'menu' => $this->menu
            ]
        ));
    }
}
