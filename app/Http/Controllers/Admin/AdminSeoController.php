<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\HelperTrait;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminSeoController extends AdminBaseController
{
    use HelperTrait;

    public function __construct()
    {
        parent::__construct();
    }

    public function tags(): View
    {
        return $this->getSomething('tags', new Tag());
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function editTag(Request $request): RedirectResponse
    {
        $this->editSomething (
            $request,
            new Tag(),
            [
                'title' => $this->validationString,
                'description' => $this->validationText
            ],
        );
        $this->saveCompleteMessage();
        return redirect(route('admin.tags'));
    }
}
