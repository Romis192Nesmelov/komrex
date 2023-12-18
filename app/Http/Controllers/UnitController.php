<?php

namespace App\Http\Controllers;
use App\Models\Unit;
use App\Models\UnitType;
use Illuminate\View\View;

class UnitController extends BaseController
{
    use HelperTrait;

    public function __invoke(UnitType $unitType): View
    {
        $this->activeSecondMenu = 'units_and_components';
        $this->data['unit_types'] = $unitType->select('id','name')->where('active',1)->get();
        $this->data['current_id'] = request('id') ? request('id') : 1;
        $this->data['current_type'] = $unitType->select('name')->where('id',$this->data['current_id'])->first();
        if (!$this->data['units'] = $unitType->where('id',$this->data['current_id'])->where('active',1)->first()) abort(404);
        return $this->showView('units');
    }
}
