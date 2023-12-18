<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\HelperTrait;
use App\Models\ActiveMonitoring;
use App\Models\ActiveMonitoringIcon;
use App\Models\ActiveMonitoringProvide;
use App\Models\ActiveMonitoringStep;
use App\Models\Review;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminActiveMonitoringController extends AdminBaseController
{
    use HelperTrait;

    public function __construct()
    {
        parent::__construct();
    }

    public function activeMonitoring(): View
    {
        $this->getActiveMonitoringMenu();
        $this->data['content'] = ActiveMonitoring::all();
        $this->data['provides'] = ActiveMonitoringProvide::all();
        $this->data['icons'] = ActiveMonitoringIcon::all();
        $this->data['steps'] = ActiveMonitoringStep::all();
        $this->data['reviews'] = Review::all();
        return $this->showView('active_monitoring');
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function editActiveMonitoringContent(Request $request): RedirectResponse
    {
        $fields = $this->validate($request, [
            'image' => 'nullable|'.$this->validationJpgAndPng,
            'content1_text' => $this->validationText,
            'content2_text' => $this->validationText,
            'content3_head' => $this->validationString,
            'content3_text' => $this->validationText,
            'content4_text' => $this->validationText,
        ]);

        $activeMonitoring = ActiveMonitoring::all();
        foreach ($fields as $name => $field) {
            if ($name != 'image') {
                $fieldName =  preg_replace('/^(content(\d)\_)/ui','',$name);
                $count = (int)str_replace(['content','_head','_text'],'',$name) - 1;
                $activeMonitoring[$count][$fieldName] = $field;
                $activeMonitoring[$count]->save();
            }
        }

        if ($request->hasFile('image')) {
            $this->deleteFile($activeMonitoring[2]->image);
            $pathToFile = 'images/am_images/';
            $fileName = 'am_big.'.$request->file('image')->getClientOriginalExtension();
            $activeMonitoring[2]->image = $pathToFile.$fileName;
            $request->file('image')->move(base_path('public/'.$pathToFile), $fileName);
        }

        $this->saveCompleteMessage();
        return redirect(route('admin.active_monitorings'));
    }

    public function activeMonitoringProvides(): View
    {
        $this->getActiveMonitoringMenu();
        return $this->getSomething('active_monitoring_provides', new ActiveMonitoringProvide(), null);
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function editActiveMonitoringProvide(Request $request): RedirectResponse
    {
        $this->editSomething (
            $request,
            new ActiveMonitoringProvide(),
            [
                'text' => $this->validationString,
            ]
        );
        $this->saveCompleteMessage();
        return redirect(route('admin.active_monitorings'));
    }

    public function activeMonitoringIcons($slug=null): View
    {
        $this->getActiveMonitoringMenu();
        return $this->getSomething('active_monitoring_icons', new ActiveMonitoringIcon(), $slug);
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function editActiveMonitoringIcon(Request $request): RedirectResponse
    {
        $this->editSomething (
            $request,
            new ActiveMonitoringIcon(),
            [
                'image' => $this->validationSvg,
            ],
            'images/am_icons/',
            'icon'
        );
        $this->saveCompleteMessage();
        return redirect(route('admin.active_monitorings'));
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function deleteActiveMonitoringIcon(Request $request): JsonResponse
    {
        return $this->deleteSomething($request, new ActiveMonitoringIcon());
    }

    public function activeMonitoringSteps($slug=null): View
    {
        $this->getActiveMonitoringMenu();
        return $this->getSomething('active_monitoring_steps', new ActiveMonitoringStep(), $slug);
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function editActiveMonitoringStep(Request $request): RedirectResponse
    {
        $this->editSomething (
            $request,
            new ActiveMonitoringStep(),
            [
                'image' => $this->validationJpgAndPng,
                'head' => $this->validationString,
                'text' => $this->validationText
            ],
//            'images/am_images/',
//            'am_step'
        );
        $this->saveCompleteMessage();
        return redirect(route('admin.active_monitorings'));
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function deleteActiveMonitoringStep(Request $request): JsonResponse
    {
        return $this->deleteSomething($request, new ActiveMonitoringStep());
    }

    public function addReview(Request $request): RedirectResponse
    {
        $this->editSomething (
            $request,
            new Review(),
            [
                'image' => $this->validationJpgAndPng
            ],
            'images/reviews/reviews/',
            'review'
        );
        $this->saveCompleteMessage();
        return redirect(route('admin.edit_active_monitoring'));
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function deleteReview(Request $request): JsonResponse
    {
        return $this->deleteSomething($request, new Review());
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function editActiveMonitoringImage(Request $request): RedirectResponse
    {
        $this->validate($request, ['image' => $this->validationJpg]);
        $request->file('image')->move(base_path('public/images/'), 'active_m_image.jpg');
        $this->saveCompleteMessage();
        return redirect(route('admin.active_monitoring'));
    }

    private function getActiveMonitoringMenu(): void
    {
        $this->data['menu_key'] = 'active_monitorings';
        $this->breadcrumbs[] = $this->menu['active_monitorings'];
    }
}
