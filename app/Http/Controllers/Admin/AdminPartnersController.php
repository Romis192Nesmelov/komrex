<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\HelperTrait;
use App\Models\Partner;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminPartnersController extends AdminBaseController
{
    use HelperTrait;

    public function __construct()
    {
        parent::__construct();
    }

    public function partners($slug=null): View
    {
        return $this->getSomething('partners', new Partner(), $slug);
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function editPartner(Request $request): RedirectResponse
    {
        $this->editSomething (
            $request,
            new Partner(),
            [
                'image' => $this->validationJpgAndPng,
                'href' => 'nullable|max:255'
            ],
            'images/partners/',
            'logo'
        );
        $this->saveCompleteMessage();
        return redirect(route('admin.partners'));
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function deletePartner(Request $request): JsonResponse
    {
        return $this->deleteSomething($request, new Partner());
    }
}
