<?php

namespace App\Http\Controllers;
use App\Models\ActiveMonitoring;
use App\Models\ActiveMonitoringIcon;
use App\Models\ActiveMonitoringProvide;
use App\Models\ActiveMonitoringStep;
use App\Models\Review;
use Illuminate\View\View;

class ActiveMonitoringController extends BaseController
{
    public function __invoke() :View
    {
        $this->activeSecondMenu = 'active_monitoring';
        $this->data['content'] = ActiveMonitoring::all();
        $this->getItem('provides', new ActiveMonitoringProvide());
        $this->getItem('icons', new ActiveMonitoringIcon());
        $this->getItem('steps', new ActiveMonitoringStep());
        $this->getItem('reviews', new Review());
        return $this->showView('active_monitoring');
    }
}
