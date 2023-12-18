<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\HelperTrait;
use App\Models\UnitType;
use App\Models\Unit;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminUnitController extends AdminBaseController
{
    use HelperTrait;

    public function __construct()
    {
        parent::__construct();
    }

    public function UnitTypes($slug=null): View
    {
        $this->getSubMenu(new UnitType(), 'unit_types', 'name');
        return $this->getSomething('unit_types', new UnitType(), $slug);
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function editUnitType(Request $request): RedirectResponse
    {
        $this->editSomething (
            $request,
            new UnitType(),
            ['name' => $this->validationString]
        );
        $this->saveCompleteMessage();
        return redirect(route('admin.unit_types'));
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function deleteUnitType(Request $request): JsonResponse
    {
        $UnitType = UnitType::findOrFail($request->input('id'));
        if ($UnitType->units->count()) return response()->json(['message' => trans('admin.error_delete_unit_type')],403);
        else {
            $UnitType->delete();
            return response()->json(['message' => trans('admin.delete_complete')],200);
        }
    }

    public function units($slug=null): View
    {
        $this->getSubMenu(new UnitType(), 'unit_types', 'name');
        return $this->getSomething('units', new Unit(), $slug, new UnitType());
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function editUnit(Request $request): RedirectResponse
    {
        $Unit = $this->editSomething (
            $request,
            new Unit(),
            [
                'image' => $this->validationJpgAndPng,
                'name' => $this->validationString,
                'description' => $this->validationText,
                'price' => $this->validationInteger,
                'unit_type_id' => 'nullable|integer|exists:unit_types,id'
            ],
            'images/units/',
            'unit'
        );

        $this->saveCompleteMessage();
        return redirect(route('admin.unit_types',['id' => $Unit->unit_type_id]));
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function deleteUnit(Request $request): JsonResponse
    {
        return $this->deleteSomething($request, new Unit());
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function editUnitImage(Request $request): RedirectResponse
    {
        $this->validate($request, ['image' => $this->validationJpg]);
        $request->file('image')->move(base_path('public/images/'), 'units_image.jpg');
        $this->saveCompleteMessage();
        return redirect(route('admin.unit_types'));
    }
}
