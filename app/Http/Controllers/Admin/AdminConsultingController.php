<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\HelperTrait;
use App\Models\Consulting;
use App\Models\Home;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminConsultingController extends AdminBaseController
{
    use HelperTrait;

    public function __construct()
    {
        parent::__construct();
    }

    public function consulting(): View
    {
        $this->data['content'] = Home::find(5);
        $this->getSubMenu(new Consulting(), 'consultings');
        return $this->getSomething('consultings', new Consulting(), null);
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function editConsultingContent(Request $request): RedirectResponse
    {
        $fields = $this->validate($request, [
            'head' => $this->validationString,
            'text' => $this->validationText,
        ]);
        $content = Home::find(5);
        $content->update($fields);
        $this->saveCompleteMessage();
        return redirect(route('admin.consultings'));
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function editConsulting(Request $request): RedirectResponse
    {
        $this->editSomething (
            $request,
            new Consulting(),
            [
                'head' => $this->validationString,
                'text' => $this->validationText,
                'image' => $this->validationSvg
            ],
            'images/consulting/',
            'consulting'
        );
        $this->saveCompleteMessage();
        return redirect(route('admin.consultings'));
    }
}
