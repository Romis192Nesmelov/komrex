<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\HelperTrait;
use App\Models\OurTeam;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminTeamController extends AdminBaseController
{
    use HelperTrait;

    public function __construct()
    {
        parent::__construct();
    }

    public function participants(Request $request, $slug=null): View
    {
        $this->getSubMenu(new OurTeam(), 'participants', 'name');
        return $this->getSomething('participants', new OurTeam(), $slug);
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function editParticipant(Request $request): RedirectResponse
    {
        $this->editSomething (
            $request,
            new OurTeam(),
            [
                'name' => 'required|min:3|max:100',
                'image' => $this->validationJpgAndPng
            ],
            'images/our_team/',
            'person'
        );
        $this->saveCompleteMessage();
        return redirect(route('admin.participants'));
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function deleteParticipant(Request $request): JsonResponse
    {
        return $this->deleteSomething($request, new OurTeam());
    }
}
