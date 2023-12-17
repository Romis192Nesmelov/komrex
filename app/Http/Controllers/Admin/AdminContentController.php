<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\HelperTrait;
use App\Models\Home;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminContentController extends AdminBaseController
{
    use HelperTrait;

    public function __construct()
    {
        parent::__construct();
    }

    public function contents(): View
    {
        $this->data['menu_key'] = 'contents';
        $this->breadcrumbs[] = $this->menu['contents'];

        if (request('id')) {
            $this->data['content'] = Home::findOrFail(request('id'));
            $this->breadcrumbs[] = [
                'key' => $this->menu['contents']['key'],
                'params' => ['id' => $this->data['content']->id],
                'name' => trans('admin.edit_content'),
            ];
            return $this->showView('content');
        } else {
            $this->data['contents'] = Home::whereIn('id',[2,3,6,7])->get();
            return $this->showView('contents');
        }
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function editContent(Request $request): RedirectResponse
    {
        $this->editSomething (
            $request,
            new Home(),
            [
                'head' => $this->validationString,
                'text' => $this->validationText,
                'pdf' => $this->validationPdf,
            ]
        );
        $this->saveCompleteMessage();
        return redirect(route('admin.contents'));
    }
}
