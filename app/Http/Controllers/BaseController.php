<?php

namespace App\Http\Controllers;
use App\Models\Consulting;
use App\Models\Event;
use App\Models\Home;
use App\Models\OurTeam;
use App\Models\OurValue;
use App\Models\Partner;
use App\Models\Project;
use App\Models\ProjectType;
use App\Models\Requisite;
use App\Models\ServiceSolution;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class BaseController extends Controller
{
    use HelperTrait;

    protected array $data = [];
    protected string $activeMainMenu = '';
    protected string $activeSecondMenu = '';
    protected Tag|null $tags = null;

    public function index(): View
    {
        $this->activeMainMenu = 'home';
        $this->tags = Tag::find(1);
        $this->data['scroll'] = request('scroll');
        $this->data['contents'] = Home::all();
        $this->getItem('solutions', new ServiceSolution());
        $this->data['consulting'] = Consulting::all();
        $this->getItem('values', new OurValue());
        $this->getItem('team', new OurTeam());
        $this->getItem('projects_all', new Project());
        $this->getItem('project_types', new ProjectType(), 'created_at');
        $this->getItem('partners', new Partner());
        $this->data['events'] = Event::where('date','>',time())->orWhere('date',null)->where('active',1)->get();
        return $this->showView('home');
    }

    public function privacy(): View
    {
        $this->activeMainMenu = 'home';
        return $this->showView('privacy');
    }

    protected function showView($view) :View
    {
        if (!Session::has('cookie_info')) {
            Session::put('cookie_info', true);
            $cookieInfo = true;
        } else $cookieInfo = false;

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
                    'active_monitoring'                 => ['href' => true],
                    'technics'                          => ['href' => true, 'slug' => 'komrex'],
                    'units_and_components'              => ['href' => false],
                    'service_solutions_and_consulting'  => ['href' => false],
                ],
                'activeMainMenu' => $this->activeMainMenu,
                'activeSecondMenu' => $this->activeSecondMenu,
                'mainPhone' => Requisite::find(1),
                'mainEmail' => Requisite::find(2),
                'requisites' => Requisite::where('id','>',2)->where('active',1)->get(),
                'cookieInfo' => $cookieInfo,
                'tags' => $this->tags
            ]
        ));
    }

    protected function getItem($itemName, Model $model, string $orderBy='', string $direction='desc'): void
    {
        $items = $model->where('active',1);
        if ($orderBy) $items = $items->orderBy($orderBy,$direction);
        $this->data[$itemName] = $items->get();
    }
}
