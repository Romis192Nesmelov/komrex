<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\HelperTrait;
use App\Models\Requisite;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminRequisitesController extends AdminBaseController
{
    use HelperTrait;

    public function __construct()
    {
        parent::__construct();
    }

    public function requisites(): View
    {
        return $this->getSomething('requisites', new Requisite());
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function editRequisites(Request $request): RedirectResponse
    {
        $this->data['menu_key'] = 'requisites';
        $fields = $this->validate($request, [
            'id_1' => $this->validationPhone,
            'id_2' => 'required|email',
            'id_3' => 'required|size:13',
            'id_4' => 'required|size:10',
            'id_5' => $this->validationString,
            'id_6' => 'required|size:9',
            'id_7' => 'required|size:20',
            'id_8' => $this->validationString,
            'pdf' => $this->validationPdf,
        ]);
        foreach ($fields as $field => $value) {
            if ($field !== 'pdf') {
                $id = (int)str_replace('id_','',$field);
                $requisite = Requisite::find($id);
                $requisite->value = $value;
                $requisite->save();
            }
        }

        if ($request->hasFile('pdf')) {
            $request->file('pdf')->move(base_path('public/pdfs'), 'requisites.pdf');
        }

        $this->saveCompleteMessage();
        return redirect(route('admin.requisites'));
    }
}
