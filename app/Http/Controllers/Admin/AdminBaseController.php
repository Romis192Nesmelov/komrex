<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\HelperTrait;
use App\Http\Controllers\Controller;
use App\Models\TechnicFile;
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
            'technic_types' => [
                'key' => 'technic_types',
                'icon' => 'icon-cogs',
                'hidden' => false,
            ],
            'technics' => [
                'key' => 'technics',
                'hidden' => true,
            ],
            'constructive_features' => [
                'key' => 'constructive_features',
                'hidden' => true,
            ],
            'technic_videos' => [
                'key' => 'technic_videos',
                'hidden' => true,
            ],
            'technic_files' => [
                'key' => 'technic_files',
                'hidden' => true,
            ],
            'unit_types' => [
                'key' => 'unit_types',
                'icon' => 'icon-cog6',
                'hidden' => false,
            ],
            'units' => [
                'key' => 'units',
                'hidden' => true,
            ],
            'active_monitorings' => [
                'key' => 'active_monitorings',
                'icon' => 'icon-satellite-dish2',
                'hidden' => false,
            ],
            'active_monitoring_provides' => [
                'key' => 'active_monitoring_provides',
                'hidden' => true,
            ],
            'active_monitoring_icons' => [
                'key' => 'active_monitoring_icons',
                'hidden' => true,
            ],
            'active_monitoring_steps' => [
                'key' => 'active_monitoring_steps',
                'hidden' => true,
            ],
            'reviews' => [
                'key' => 'reviews',
                'hidden' => true,
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

    protected function getSomething(string $key, Model $model, $slug=null, Model|null $parentModel=null, string|null $parentRelation=null): View
    {
        if (request('parent_id')) {
            $parentItem = $parentModel->findOrFail(request('parent_id'));
            $this->data['parents'] = $parentModel->all();

            if ($parentRelation) {
                $this->data['menu_key'] = $this->data['parent_key'];
                $this->data['current_sub_item'] = $parentItem[$parentRelation]->id;
                $this->breadcrumbs[] = [
                    'key' => $this->menu[$this->data['parent_key']]['key'],
                    'name' => trans('admin_menu.'.$this->data['parent_key']),
                ];
                $this->breadcrumbs[] = [
                    'key' => $this->menu[$this->data['parent_key']]['key'],
                    'params' => ['id' => $parentItem[$parentRelation]->id],
                    'name' => $parentItem[$parentRelation]->name ?? $parentItem[$parentRelation]->head,
                ];
                $this->breadcrumbs[] = [
                    'key' => $this->menu[$this->data['near_parent_key']]['key'],
                    'params' => ['id' => $parentItem->id, 'parent_id' => $parentItem[$parentRelation]->id],
                    'name' => $parentItem->name ?? $parentItem->head,
                ];
            } else {
                $this->data['menu_key'] = $this->data['parent_key'];
                $this->breadcrumbs[] = [
                    'key' => $this->menu[$this->data['parent_key']]['key'],
                    'name' => trans('admin_menu.'.$this->data['parent_key']),
                ];
                $this->breadcrumbs[] = [
                    'key' => $this->menu[$this->data['parent_key']]['key'],
                    'params' => ['id' => $parentItem->id],
                    'name' => $parentItem->name ?? $parentItem->head,
                ];
            }
        } else if (!$this->menu[$key]['hidden']) {
            $this->data['menu_key'] = $key;
            $this->breadcrumbs[] = $this->menu[$key];
        }

        $this->getSingularKey($key);

        $breadcrumbsParams = [];
        if ($parentModel) $breadcrumbsParams['parent_id'] = $parentItem->id;

        if (request('id')) {
            $this->data[$this->data['singular_key']] = $model->findOrFail(request('id'));
            $breadcrumbsParams['id'] = $this->data[$this->data['singular_key']]->id;
            $this->breadcrumbs[] = [
                'key' => $this->menu[$key]['key'],
                'params' => $breadcrumbsParams,
                'name' => trans('admin.edit_'.$this->data['singular_key']),
            ];
            return $this->showView($this->data['singular_key']);
        } else if ($slug && $slug == 'add') {
            $breadcrumbsParams['slug'] = 'add';
            $this->breadcrumbs[] = [
                'key' => $this->menu[$key]['key'],
                'params' => $breadcrumbsParams,
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
            if ($model instanceof TechnicFile) $validationArr['pdf'] = 'required|'.$validationArr['pdf'];

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

        if (isset($table->pdf) && $table->pdf) $this->deleteFile($table->pdf);
        $table->delete();
        return response()->json(['message' => trans('admin.delete_complete')],200);
    }

    protected function getSpecialFields(Model $model, array $fields): array
    {
        if (in_array('active',$model->getFillable())) $fields['active'] = request('active') ? 1 : 0;
        if (in_array('date',$model->getFillable())) $fields['date'] = $this->convertTimestamp(request('date'));
        if (in_array('video',$model->getFillable())) $fields['video'] = preg_replace('/(\swidth=\"(\d{3})\" height=\"(\d{3})\")/', '', $fields['video']);
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
        if (in_array('pdf',$model->getFillable())) {
            $this->processingFiles($request, $model, 'pdf', 'pdfs/', 'pdf'.$model->getTable().'_');
        }
    }

    protected function processingFiles(Request $request, Model $model, string $fileField, string|null $pathToFile=null, string|null $fileName=null): void
    {
        if ($pathToFile && $request->hasFile($fileField)) {
            if ($model[$fileField]) $this->deleteFile($model[$fileField]);
            $fileName .= $model->id.'.'.$request->file($fileField)->getClientOriginalExtension();
            $model[$fileField] = $pathToFile.$fileName;
            $model->save();
            $request->file($fileField)->move(base_path('public/'.$pathToFile), $fileName);
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
