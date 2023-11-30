<?php

namespace App\Http\Controllers;
use App\Models\Requisite;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
//use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\View\View;

//use Illuminate\Support\Str;

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
                'id' => 'home',
                'href' => 'admin.home',
                'name' => trans('admin_menu.home'),
                'description' => '',
                'icon' => 'icon-home2',
            ],
            'users' => [
                'id' => 'users',
                'href' => 'admin.users',
                'name' => trans('admin_menu.admins'),
                'description' => trans('admin_menu.admins_description'),
                'icon' => 'icon-users',
            ],
            'requisites' => [
                'id' => 'requisites',
                'href' => 'admin.requisites',
                'name' => trans('admin_menu.requisites'),
                'description' => trans('admin_menu.requisites_description'),
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
    public function users(Request $request, $slug=null): View
    {
        $this->data['menu_key'] = 'users';
        $this->breadcrumbs[] = $this->menu['users'];
        if ($request->has('id')) {
            $this->data['user'] = User::findOrFail($request->input('id'));
            $this->breadcrumbs[] = [
                'id' => $this->menu['users']['id'],
                'href' => $this->menu['users']['href'],
                'params' => ['id' => $this->data['user']->id],
                'name' => trans('admin.edit_user', ['user' => $this->data['user']->email]),
            ];
            return $this->showView('user');
        } else if ($slug && $slug == 'add') {
            $this->breadcrumbs[] = [
                'id' => $this->menu['users']['id'],
                'href' => $this->menu['users']['href'],
                'slug' => 'add',
                'name' => trans('admin.adding_user'),
            ];
            return $this->showView('user');
        } else {
            $this->data['users'] = User::all();
            return $this->showView('users');
        }
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

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function deleteUser(Request $request): JsonResponse
    {
        return $this->deleteSomething($request, new User());
    }

    public function requisites(): View
    {
        $this->data['menu_key'] = 'requisites';
        $this->breadcrumbs[] = $this->menu['requisites'];
        $this->data['requisites'] = Requisite::all();
        return $this->showView('requisites');
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

//    private function getSomething (
//        Request $request,
//        Model $model,
//        string $menuKey,
//        string $itemName,
//        string $editNameTitle,
//        string $addNameTitle,
//        string $viewForList,
//        string $viewForOne,
//        string $slug = null,
//    ): View
//    {
//        $this->data['menu_key'] = $menuKey;
//        $this->breadcrumbs[] = $this->menu[$menuKey];
//        if ($request->has('id')) {
//            if ($itemName != 'news') $itemName = substr($itemName, 0, -1);
//            $this->data[$itemName] = $model->find($request->input('id'));
//            $this->breadcrumbs[] = [
//                'id' => $this->menu[$menuKey]['id'],
//                'href' => $this->menu[$menuKey]['href'],
//                'params' => ['id' => $this->data[$itemName]->id],
//                'name' => trans($editNameTitle, ['id' => $this->data[$itemName]->id]),
//            ];
//            return $this->showView($viewForOne);
//        } else if ($slug && $slug == 'add') {
//            $this->breadcrumbs[] = [
//                'id' => $this->menu[$menuKey]['id'],
//                'href' => $this->menu[$menuKey]['href'],
//                'slug' => 'add',
//                'name' => trans($addNameTitle),
//            ];
//            return $this->showView($viewForOne);
//        } else {
//            if ($model instanceof News) $this->data[$itemName] = $model->where('active',1)->orderBy('time','desc')->get();
//            else $this->data[$itemName] = $model->all();
//            return $this->showView($viewForList);
//        }
//    }

//    private function editSomething (
//        Request $request,
//        Model $model,
//        array $validationArr
//    ): Model
//    {
//        if ($request->has('id')) {
//            $validationArr['id'] = 'required|integer|exists:'.$model->getTable().',id';
//
//            $fields = $this->validate($request, $validationArr);
//            $fields['active'] = isset($request->active) && $request->active ? 1 : 0;
//            if (isset($fields['time'])) $fields['time'] = $this->convertTime($fields['time']);
//
//            $table = $model->find($request->input('id'));
//            $table->update($fields);
//        } else {
//            $fields = $this->validate($request, $validationArr);
//            $fields['active'] = $request->active ? 1 : 0;
//            if (isset($fields['time'])) $fields['time'] = $this->convertTime($fields['time']);
//
//            $table = $model->create($fields);
//
//            if ($model instanceof News) {
//                $news = News::where('active',1)->orderBy('time','asc')->get();
//                if (count($news) > 6) {
//                    $news[0]->delete();
//                    unlink(base_path('public/images/news/news' . $news[0]->id . '.jpg'));
//                }
//            }
//        }
//        $this->saveCompleteMessage();
//        return $table;
//    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    private function deleteSomething(Request $request, Model $model): JsonResponse
    {
        $this->validate($request, ['id' => 'required|integer|exists:'.$model->getTable().',id']);
        $table = $model->find($request->input('id'));

        if (isset($table->image) && $model->image && file_exists(base_path('public/'.$model->image))) {
            unlink(base_path('public/'.$model->image));
        } elseif (isset($table->path) && $model->path && file_exists(base_path('public/'.$model->path))) {
            unlink(base_path('public/'.$model->path));
        } elseif (isset($table->images)) {
            foreach ($table->images as $image) {
                if (file_exists(base_path('public/'.$image->preview))) unlink(base_path('public/'.$image->preview));
                if (file_exists(base_path('public/'.$image->full))) unlink(base_path('public/'.$image->full));
            }
        }
        $table->delete();
        return response()->json(['message' => trans('admin.delete_complete')],200);
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
