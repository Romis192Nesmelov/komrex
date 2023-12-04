<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\HelperTrait;
use App\Models\TechnicType;
use App\Models\Technic;
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

    public function technicsType($slug=null): View
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
        return $this->getSomething('technics', new Technic(), $slug);
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function editTechnic(Request $request): RedirectResponse
    {
//        $project = $this->editSomething (
//            $request,
//            new Technic(),
//            [
//                'image' => $this->validationJpgAndPng,
//                'name' => $this->validationString,
//                'date' => 'nullable|min:3|max:15',
//                'text' => $this->validationText,
//            ],
//        );
//        $this->saveCompleteMessage();
//        return redirect(route('admin.project_types',['id' => $project->project_type_id]));
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function deleteTechnic(Request $request): JsonResponse
    {

    }
}
