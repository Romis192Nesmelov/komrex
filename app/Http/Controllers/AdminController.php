<?php

namespace App\Http\Controllers;
use App\Models\Consulting;
use App\Models\Home;
use App\Models\OurTeam;
use App\Models\OurValue;
use App\Models\Partner;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Models\ProjectType;
use App\Models\Requisite;
use App\Models\ServiceSolution;
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
                'hidden' => false,
            ],
            'users' => [
                'key' => 'users',
                'icon' => 'icon-users',
                'hidden' => false,
            ],
            'quotes' => [
                'key' => 'quotes',
                'icon' => 'icon-quotes-right',
                'hidden' => false,
            ],
            'contents' => [
                'key' => 'contents',
                'icon' => 'icon-pencil6',
                'hidden' => false,
            ],
            'solutions' => [
                'key' => 'solutions',
                'icon' => 'icon-key',
                'hidden' => false,
            ],
            'consultings' => [
                'key' => 'consultings',
                'icon' => 'icon-user-tie',
                'hidden' => false,
            ],
            'values' => [
                'key' => 'values',
                'icon' => 'icon-safe',
                'hidden' => false,
            ],
            'participants' => [
                'key' => 'participants',
                'icon' => 'icon-users4',
                'hidden' => false,
            ],
            'project_types' => [
                'key' => 'project_types',
                'icon' => 'icon-archive',
                'hidden' => false,
            ],
            'projects' => [
                'key' => 'projects',
                'hidden' => true,
            ],
            'partners' => [
                'key' => 'partners',
                'icon' => 'icon-shrink7',
                'hidden' => false,
            ],
            'requisites' => [
                'key' => 'requisites',
                'icon' => 'icon-pen',
                'hidden' => false,
            ],
        ];
        $this->breadcrumbs[] = $this->menu['home'];
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function home(): View
    {
        $this->data['menu_key'] = 'home';
        return $this->showView('home');
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function users($slug=null): View
    {
        return $this->getSomething('users', new User(), $slug);
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

    public function quotes(): View
    {
        $this->data['menu_key'] = 'quotes';
        $this->breadcrumbs[] = $this->menu['quotes'];

        if (request('id')) {
            $this->data['quote'] = Home::findOrFail(request('id'));
            $this->breadcrumbs[] = [
                'key' => $this->menu['quotes']['key'],
                'params' => ['id' => $this->data['quote']->id],
                'name' => trans('admin.edit_quote'),
            ];
            return $this->showView('quote');
        } else {
            $this->data['quotes'] = Home::whereIn('id',[1,4])->get();
            return $this->showView('quotes');
        }
    }

    public function contents(): View
    {
        $this->data['menu_key'] = 'contents';
        $this->breadcrumbs[] = $this->menu['contents'];

        if (request('id')) {
            $this->data['content'] = Home::findOrFail(request('id'));
            $this->breadcrumbs[] = [
                'key' => $this->menu['contents']['key'],
                'params' => ['id' => $this->data['content']->id],
                'name' => trans('admin.edit_content'),
            ];
            return $this->showView('content');
        } else {
            $this->data['contents'] = Home::whereIn('id',[2,3,6,7])->get();
            return $this->showView('contents');
        }
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function editContent(Request $request): RedirectResponse
    {
        $this->editSomething (
            $request,
            new Home(),
            [
                'head' => $this->validationString,
                'text' => $this->validationText
            ]
        );
        $this->saveCompleteMessage();
        return redirect(route('admin.contents'));
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function editQuote(Request $request): RedirectResponse
    {
        $this->editSomething (
            $request,
            new Home(),
            ['text' => $this->validationText]
        );
        $this->saveCompleteMessage();
        return redirect(route('admin.quotes'));
    }

    public function solutions($slug=null): View
    {
        return $this->getSomething('solutions', new ServiceSolution(), $slug);
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function editSolution(Request $request): RedirectResponse
    {
        $this->editSomething (
            $request,
            new ServiceSolution(),
            [
                'head' => 'required|min:3|max:50',
                'text' => $this->validationText,
                'image' => $this->validationSvg
            ],
            'images/service_solutions',
            'ss'
        );
        $this->saveCompleteMessage();
        return redirect(route('admin.solutions'));
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function deleteSolution(Request $request): JsonResponse
    {
        return $this->deleteSomething($request, new ServiceSolution());
    }

    public function consultings(): View
    {
        $this->data['content'] = Home::find(5);
        return $this->getSomething('consultings', new Consulting(), null);
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function editConsultingContent(Request $request): RedirectResponse
    {
        $fields = $this->validate($request, [
            'head' => $this->validationString,
            'text' => $this->validationText,
        ]);
        $content = Home::find(5);
        $content->update($fields);
        $this->saveCompleteMessage();
        return redirect(route('admin.consultings'));
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function editConsulting(Request $request): RedirectResponse
    {
        $this->editSomething (
            $request,
            new Consulting(),
            [
                'head' => $this->validationString,
                'text' => $this->validationText,
                'image' => $this->validationSvg
            ],
            'images/consulting',
            'consulting'
        );
        $this->saveCompleteMessage();
        return redirect(route('admin.consultings'));
    }

    public function values($slug=null): View
    {
        return $this->getSomething('values', new OurValue(), $slug);
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

    public function participants(Request $request, $slug=null): View
    {
        return $this->getSomething('participants', new OurTeam(), $slug);
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

    public function projectTypes($slug=null): View
    {
        $this->getProjectTypesSubMenu();
        return $this->getSomething('project_types', new ProjectType(), $slug);
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function editProjectType(Request $request): RedirectResponse
    {
        $this->editSomething (
            $request,
            new ProjectType(),
            ['name' => 'required|min:3|max:50']
        );
        $this->saveCompleteMessage();
        return redirect(route('admin.project_types'));
    }

    public function deleteProjectType(Request $request): JsonResponse
    {
        $projectType = ProjectType::findOrFail($request->input('id'));
        if ($projectType->projects->count()) {
            return response()->json(['message' => trans('admin.error_delete_project_type')],403);
        } else {
            $projectType->delete();
            return response()->json(['message' => trans('admin.delete_complete')],200);
        }
    }

    public function projects($slug=null): View
    {
        $this->getProjectTypesSubMenu();
        return $this->getSomething('projects', new Project(), $slug, new ProjectType());
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function editProject(Request $request): RedirectResponse
    {
        $project = $this->editSomething (
            $request,
            new Project(),
            [
                'head' => $this->validationString,
                'date' => 'nullable|min:3|max:15',
                'text' => $this->validationText,
            ],
        );
        $this->saveCompleteMessage();
        return redirect(route('admin.project_types',['id' => $project->project_type_id]));
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function deleteProject(Request $request): JsonResponse
    {
        $project = Project::findOrFail($request->input('id'));
        if ($project->images->count()) {
            return response()->json(['message' => trans('admin.error_delete_project')],403);
        } else {
            $project->delete();
            return response()->json(['message' => trans('admin.delete_complete')],200);
        }
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function addProjectImage(Request $request): RedirectResponse
    {
        $project = Project::select('id','project_type_id')->where('id',$request->input('project_id'))->first();
        $this->editSomething (
            $request,
            new ProjectImage(),
            [
                'image' => $this->validationJpgAndPng,
                'project_id' => 'required|integer|exists:projects,id'
            ],
            'images/projects/project_type'.$project->project_type_id.'/',
            'project'.$project->id.'_'
        );
        $this->saveCompleteMessage();
        return redirect(route('admin.projects',['id' => $project->id, 'parent_id' => $project->project_type_id]));
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function deleteProjectImage(Request $request): JsonResponse
    {
        return $this->deleteSomething($request, new ProjectImage());
    }

    public function partners($slug=null): View
    {
        return $this->getSomething('partners', new Partner(), $slug);
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
        return $this->getSomething('requisites', new Requisite());
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function editRequisites(Request $request): RedirectResponse
    {
        $this->data['menu_key'] = 'requisites';
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

    private function getSomething(string $key, Model $model, $slug=null, Model|null $parentModel=null): View
    {
        $this->data['menu_key'] = $key;
        $this->breadcrumbs[] = $this->menu[$key];

        if (request('parent_id')) {
            $parentItem = $parentModel->findOrFail(request('parent_id'));
            $this->data['parents'] = $parentModel->all();
            $this->breadcrumbs[] = [
                'key' => $this->menu[$this->data['parent_key']]['key'],
                'params' => ['id' => $parentItem->id],
                'name' => $parentItem->name ?? $parentItem->head,
            ];
        }

        $this->getSingularKey($key);
        if (request('id')) {
            $this->data[$this->data['singular_key']] = $model->findOrFail(request('id'));
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
        $this->validate($request, ['id' => 'required|integer|exists:'.$model->getTable().',id']);
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

    private function getSingularKey($key): void
    {
        $this->data['singular_key'] = substr($key, 0, -1);
    }

    private function getProjectTypesSubMenu(): void
    {
        $this->data['submenu'] = ProjectType::select('id','name')->get();
        $this->data['parent_key'] = 'project_types';
    }

    private function processingImages(Request $request, Model $model, string|null $pathToImages, string|null $imageName): void
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
