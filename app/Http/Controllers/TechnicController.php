<?php

namespace App\Http\Controllers;
use App\Models\Technic;
use App\Models\TechnicType;
use Illuminate\View\View;

class TechnicController extends BaseController
{
    use HelperTrait;

    public function technics(TechnicType $technicType, $slug=null): View
    {
        $this->activeSecondMenu = 'technics';
        if (!$slug || $slug == 'komrex') {
            $this->data['slug'] = 'komrex';
            $this->data['relation'] = 'technicsKomrex';
        } else if ($slug == 'current-offer') {
            $this->data['slug'] = 'current-offer';
            $this->data['relation'] = 'technicsCurrentOffer';
        } else abort(404);
        $this->data['technic_types'] = $technicType->select('id','name')->where('active',1)->with($this->data['relation'])->get();
        $this->data['current_id'] = request('id') ? request('id') : 0;

        do {
            $this->data['current_id']++;
            if (!$this->data['technics'] = $technicType->where('id',$this->data['current_id'])->where('active',1)->with($this->data['relation'])->first()) abort(404);
            $this->data['current_type'] = $technicType->select('name')->where('id',$this->data['current_id'])->first();
        } while (!$this->data['technics'][$this->data['relation']]->count());

        return $this->showView('technics');
    }

    public function technic(): View
    {
        $this->activeSecondMenu = 'technics';
        if (!request('id') || !$this->data['technic'] = Technic::where('id',request('id'))->where('active',1)->first()) abort(404);
        $this->data['buttons'] = ['design_features','characteristics','video','files_for_download'];
        return $this->showView('technic');
    }
}
