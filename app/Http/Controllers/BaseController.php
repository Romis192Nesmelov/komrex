<?php

namespace App\Http\Controllers;
use App\Models\Content;
use Illuminate\View\View;

class BaseController extends Controller
{
    use HelperTrait;

    protected array $data = [];
    protected string $activeMainMenu = '';
    protected string $activeSecondMenu = '';

    public function index(string $slug=null): View
    {
        $this->activeMainMenu = 'home';
        $this->data['scroll'] = $slug;
        $this->data['contents'] = Content::all();
        return $this->showView('home');
    }

    protected function showView($view) :View
    {
        return view($view, array_merge(
            $this->data,
            [
                'mainMenu' => [
                    'service_solutions'                 => ['href' => false],
                    'about_company'                     => ['href' => false],
                    'team'                              => ['href' => false],
                    'our_projects'                      => ['href' => false],
                    'partners'                          => ['href' => false],
                    'contacts'                          => ['href' => false]
                ],
                'secondMenu' => [
                    'active_monitoring'                 => ['href' => false],
                    'technique'                         => ['href' => false],
                    'units_and_components'              => ['href' => false],
                    'service_solutions_and_consulting'  => ['href' => false],
                ],
                'metas' => $this->metas,
                'activeMainMenu' => $this->activeMainMenu,
                'activeSecondMenu' => $this->activeSecondMenu
            ]
        ));
    }
}
