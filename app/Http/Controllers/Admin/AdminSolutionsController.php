<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\HelperTrait;
use App\Models\ServiceSolution;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminSolutionsController extends AdminBaseController
{
    use HelperTrait;

    public function __construct()
    {
        parent::__construct();
    }

    public function solutions($slug=null): View
    {
        $this->getSubMenu(new ServiceSolution(), 'solutions');
        return $this->getSomething('solutions', new ServiceSolution(), $slug);
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function editSolution(Request $request): RedirectResponse
    {
        $this->editSomething (
            $request,
            new ServiceSolution(),
            [
                'head' => 'required|min:3|max:50',
                'text' => $this->validationText,
                'image' => $this->validationSvg
            ],
            'images/service_solutions/',
            'ss'
        );
        $this->saveCompleteMessage();
        return redirect(route('admin.solutions'));
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function deleteSolution(Request $request): JsonResponse
    {
        return $this->deleteSomething($request, new ServiceSolution());
    }
}
