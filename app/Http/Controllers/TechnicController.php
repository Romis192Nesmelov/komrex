<?php

namespace App\Http\Controllers;
use App\Models\TechnicType;
use Illuminate\View\View;

class TechnicController extends BaseController
{
    use HelperTrait;

    public function technics(TechnicType $technicType, $slug=null): View
    {
        $this->activeSecondMenu = 'technics';
        $this->data['technic_types'] = $technicType->select('id','name')->where('active',1)->get();
        if (!$slug || $slug == 'komrex') {
            $this->data['slug'] = 'komrex';
            $this->data['relation'] = 'technicsKomrex';
        } else if ($slug == 'current-offer') {
            $this->data['slug'] = 'current-offer';
            $this->data['relation'] = 'technicsCurrentOffer';
        } else abort(404);

        $this->data['current_id'] = request('id') ? request('id') : 1;
        $this->data['current_type'] = $technicType->select('name')->where('id',$this->data['current_id'])->first();
        $this->data['technics'] = $technicType->where('id',$this->data['current_id'])->where('active',1)->with($this->data['relation'])->first();
        return $this->showView('technics');
    }

    public function technic(): View
    {
        die();
    }
}
