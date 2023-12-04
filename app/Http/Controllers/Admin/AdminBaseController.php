<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\HelperTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\View;

class AdminBaseController extends Controller
{
    use HelperTrait;

    protected array $data = [];
    protected array $breadcrumbs = [];
    protected array $menu;

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
            'events' => [
                'key' => 'events',
                'icon' => 'icon-calendar3',
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

    protected function getSomething(string $key, Model $model, $slug=null, Model|null $parentModel=null): View
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
    protected function editSomething (
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
            $this->processingFiles($request, $model, 'image', $pathToImages, $imageName);
            $this->processingPdf($request, $model);
        } else {
            if ($imageName) $validationArr['image'] = 'required|'.$validationArr['image'];

            $fields = $this->validate($request, $validationArr);
            $fields = $this->getSpecialFields($model, $fields);

            $model = $model->create($fields);
            $this->processingFiles($request, $model, 'image', $pathToImages, $imageName);
            $this->processingPdf($request, $model);
        }
        $this->saveCompleteMessage();
        return $model;
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function deleteSomething(Request $request, Model $model): JsonResponse
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

    protected function getSpecialFields(Model $model, array $fields): array
    {
        if (in_array('active',$model->getFillable())) $fields['active'] = request('active') ? 1 : 0;
        if (in_array('date',$model->getFillable())) $fields['date'] = $this->convertTimestamp(request('date'));
        return $fields;
    }

    protected function convertTimestamp($time): int
    {
        $time = explode('/', $time);
        return strtotime($time[1].'/'.$time[0].'/'.$time[2]);
    }

    protected function getSingularKey($key): void
    {
        $this->data['singular_key'] = substr($key, 0, -1);
    }

    protected function getSubMenu(Model $model, string $parentKey, string $headField='head'): void
    {
        $this->data['submenu'] = $model->select('id',$headField)->get();
        $this->data['parent_key'] = $parentKey;
    }

    protected function processingPdf(Request $request, Model $model): void
    {
        if (in_array('presentation',$model->getFillable())) {
            $this->processingFiles($request, $model, 'presentation', 'pdfs/', 'presentation');
        }
    }

    protected function processingFiles(Request $request, Model $model, string $fileField, string $pathToFile, string $fileName): void
    {
        if ($pathToFile && $request->hasFile($fileField)) {
            $fileName .= $model->id.'.'.$request->file($fileField)->getClientOriginalExtension();
            $model->image = $pathToFile.$fileName;
            $model->save();
            $request->file('image')->move(base_path('public/'.$pathToFile), $fileName);
        }
    }

    protected function showView($view): View
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
