<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\HelperTrait;
use App\Models\OurValue;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminValuesController extends AdminBaseController
{
    use HelperTrait;

    public function __construct()
    {
        parent::__construct();
    }

    public function values($slug=null): View
    {
        $this->getSubMenu(new OurValue(), 'values');
        return $this->getSomething('values', new OurValue(), $slug);
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function editValue(Request $request): RedirectResponse
    {
        $this->editSomething (
            $request,
            new OurValue(),
            [
                'head' => 'required|min:3|max:20',
                'text' => $this->validationText,
                'image' => $this->validationSvg
            ],
            'images/our_values/',
            'home_icon'
        );
        $this->saveCompleteMessage();
        return redirect(route('admin.values'));
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function deleteValue(Request $request): JsonResponse
    {
        return $this->deleteSomething($request, new OurValue());
    }
}
