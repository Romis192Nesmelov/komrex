<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\HelperTrait;
use App\Models\Home;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminQuotesController extends AdminBaseController
{
    use HelperTrait;

    public function __construct()
    {
        parent::__construct();
    }

    public function quotes(): View
    {
        $this->data['menu_key'] = 'quotes';
        $this->breadcrumbs[] = $this->menu['quotes'];

        if (request('id')) {
            $this->data['quote'] = Home::findOrFail(request('id'));
            $this->breadcrumbs[] = [
                'key' => $this->menu['quotes']['key'],
                'params' => ['id' => $this->data['quote']->id],
                'name' => trans('admin.edit_quote'),
            ];
            return $this->showView('quote');
        } else {
            $this->data['quotes'] = Home::whereIn('id',[1,4])->get();
            return $this->showView('quotes');
        }
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function editQuote(Request $request): RedirectResponse
    {
        $this->editSomething (
            $request,
            new Home(),
            ['text' => $this->validationText]
        );
        $this->saveCompleteMessage();
        return redirect(route('admin.quotes'));
    }
}
