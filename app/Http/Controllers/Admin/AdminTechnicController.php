<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\HelperTrait;
use App\Models\ConstructiveFeature;
use App\Models\TechnicFile;
use App\Models\TechnicImage;
use App\Models\TechnicType;
use App\Models\Technic;
use App\Models\TechnicVideo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminTechnicController extends AdminBaseController
{
    use HelperTrait;

    public function __construct()
    {
        parent::__construct();
    }

    public function technicTypes($slug=null): View
    {
        $this->getSubMenu(new TechnicType(), 'technic_types', 'name');
        return $this->getSomething('technic_types', new TechnicType(), $slug);
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function editTechnicType(Request $request): RedirectResponse
    {
        $this->editSomething (
            $request,
            new TechnicType(),
            ['name' => $this->validationString]
        );
        $this->saveCompleteMessage();
        return redirect(route('admin.technic_types'));
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function deleteTechnicType(Request $request): JsonResponse
    {
        $technicType = TechnicType::findOrFail($request->input('id'));
        if ($technicType->technics->count()) return response()->json(['message' => trans('admin.error_delete_technic_type')],403);
        else {
            $technicType->delete();
            return response()->json(['message' => trans('admin.delete_complete')],200);
        }
    }

    public function technics($slug=null): View
    {
        $this->getSubMenu(new TechnicType(), 'technic_types', 'name');
        return $this->getSomething('technics', new Technic(), $slug, new TechnicType());
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function editTechnic(Request $request): RedirectResponse
    {
        $technic = $this->editSomething (
            $request,
            new Technic(),
            [
                'name' => $this->validationString,
                'weight' => $this->validationInteger,
                'power' => $this->validationInteger,
                'engine_model' => $this->validationString,
                'komrex'  => $this->validationInteger.'|in:0,1',
                'characteristics' => 'nullable|min:5|max:10000',
                'description' => $this->validationText,
                'csv' => $this->validationCsv,
                'technic_type_id' => 'nullable|integer|exists:technic_types,id'
            ],
        );
        if ($request->hasFile('csv')) {
            $allCapsRegExp = '/^(([А-Я]+(\s)?)+)$/ui';
            $fileName = 'characteristics'.$technic->id.'.csv';
            $request->file('csv')->move(base_path('public/temp/'), $fileName);
            $content = file_get_contents(base_path('public/temp/'.$fileName));
            $rows = explode("\r\n",$content);
            $resultTable = '<table class="table table-striped">';
            $prevCellsCount = 0;
            foreach ($rows as $r => $row) {
                $resultTable .= '<tr>';
                $cells = explode(';',$row);
                if (count($cells) == 1 && $cells[0]) $resultTable .= '<td colspan="'.$prevCellsCount.'">'.$cells[0].'</td>';
                else {
                    $prevCellsCount = count($cells);
                    foreach ($cells as $c => $cell) {
                        $cellClassName = !$c ? 'text-start' : 'text-center';
//                        $cellClassName .= ' w-25';
                        $resultTable .= '<td class="'.$cellClassName.'">'.$cell.'</td>';
                    }
                }
                $resultTable .= '</tr>';
            }
            $resultTable .= '</table>';
            $technic->characteristics = $resultTable;
            $this->deleteFile('temp/'.$fileName);
            $technic->save();
        }

        $this->saveCompleteMessage();
        return redirect(route('admin.technic_types',['id' => $technic->technic_type_id]));
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function deleteTechnic(Request $request): JsonResponse
    {
        $technic = Technic::findOrFail($request->input('id'));
        if ($technic->constructiveFeatures->count() || $technic->images->count() || $technic->files->count()) {
            return response()->json(['message' => trans('admin.error_delete_technic')],403);
        } else {
            $technic->delete();
            return response()->json(['message' => trans('admin.delete_complete')],200);
        }
    }

    public function constructiveFeatures($slug=null): View
    {
        $this->getSubMenu(new TechnicType(), 'technic_types', 'name');
        $this->data['near_parent_key'] = 'technics';
        return $this->getSomething('constructive_features', new ConstructiveFeature(), $slug, new Technic(), 'technicType');
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function editConstructiveFeature(Request $request): RedirectResponse
    {
        $constructiveFeature = $this->editSomething (
            $request,
            new ConstructiveFeature(),
            [
                'head' => $this->validationString,
                'text' => $this->validationText,
                'image' => 'nullable|'.$this->validationJpgAndPng,
                'technic_id' => 'nullable|integer|exists:technics,id'
            ],
            'images/tech_images/',
            'tech_image',
        );
        $this->saveCompleteMessage();
        return redirect(route('admin.technics',['id' => $constructiveFeature->technic_id, 'parent_id' => $constructiveFeature->technic->technic_type_id]));
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function deleteConstructiveFeature(Request $request): JsonResponse
    {
        return $this->deleteSomething($request, new ConstructiveFeature());
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function addTechnicImage(Request $request): RedirectResponse
    {
        $image = $this->editSomething (
            $request,
            new TechnicImage(),
            [
                'image' => $this->validationJpgAndPng,
                'technic_id' => 'required|integer|exists:projects,id'
            ],
            'images/technics/',
            'technic'.$request->technic_id.'_'
        );
        $this->saveCompleteMessage();
        return redirect(route('admin.technics',['id' => $image->technic_id, 'parent_id' => $image->technic->technic_type_id]));
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function deleteTechnicImage(Request $request): JsonResponse
    {
        return $this->deleteSomething($request, new TechnicImage());
    }

    public function technicVideos($slug=null): View
    {
        $this->getSubMenu(new TechnicType(), 'technic_types', 'name');
        $this->data['near_parent_key'] = 'technics';
        return $this->getSomething('technic_videos', new TechnicVideo(), $slug, new Technic(), 'technicType');
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function editTechnicVideo(Request $request): RedirectResponse
    {
        $video = $this->editSomething (
            $request,
            new TechnicVideo(),
            [
                'video' => $this->validationString,
                'head' => $this->validationString,
                'technic_id' => 'nullable|integer|exists:technics,id'
            ],
        );
        $this->saveCompleteMessage();
        return redirect(route('admin.technics',['id' => $video->technic_id, 'parent_id' => $video->technic->technic_type_id]));
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function deleteTechnicVideo(Request $request): JsonResponse
    {
        return $this->deleteSomething($request, new TechnicVideo());
    }

    public function technicFiles($slug=null): View
    {
        $this->getSubMenu(new TechnicType(), 'technic_types', 'name');
        $this->data['near_parent_key'] = 'technics';
        return $this->getSomething('technic_files', new TechnicFile(), $slug, new Technic(), 'technicType');
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function editTechnicFile(Request $request): RedirectResponse
    {
        $file = $this->editSomething (
            $request,
            new TechnicFile(),
            [
                'name' => $this->validationString,
                'pdf' => $this->validationPdf
            ],
        );
        $this->saveCompleteMessage();
        return redirect(route('admin.technics',['id' => $file->technic_id, 'parent_id' => $file->technic->technic_type_id]));
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function deleteTechnicFile(Request $request): JsonResponse
    {
        return $this->deleteSomething($request, new TechnicFile());
    }
}
