<?php

namespace App\Http\Controllers;
use App\Models\ActiveMonitoring;
use App\Models\ActiveMonitoringIcon;
use App\Models\ActiveMonitoringProvide;
use App\Models\ActiveMonitoringStep;
use App\Models\Review;
use App\Models\Tag;
use App\Models\Tracking;
use Illuminate\View\View;

class ActiveMonitoringController extends BaseController
{
    public function __invoke() :View
    {
        $this->activeSecondMenu = 'active_monitoring';
        $this->tags = Tag::find(2);
        $this->data['content'] = ActiveMonitoring::all();
        $this->getItem('provides', new ActiveMonitoringProvide());
        $this->getItem('icons', new ActiveMonitoringIcon());
        $this->getItem('steps', new ActiveMonitoringStep());
        $this->getItem('reviews', new Review());
        $this->getItem('tracking', new Tracking());
        return $this->showView('active_monitoring');
    }
}
