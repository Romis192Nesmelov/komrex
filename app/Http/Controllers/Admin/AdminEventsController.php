<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\HelperTrait;
use App\Models\Event;
use App\Models\EventPerson;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminEventsController extends AdminBaseController
{
    use HelperTrait;

    public function __construct()
    {
        parent::__construct();
    }

    public function events($slug=null): View
    {
        $this->data['menu_key'] = 'events';
        $this->data['submenu'] = [
            ['id' => 'future', 'name' => trans('admin.future_events')],
            ['id' => 'past', 'name' => trans('admin.past_events')]
        ];
        $this->data['parent_key'] = 'events';
        $this->data['singular_key'] = 'event';

        if ($slug && $slug == 'add') {
            $this->breadcrumbs[] = [
                'key' => $this->menu['events']['key'],
                'name' => trans('admin.future_events'),
            ];
            $this->breadcrumbs[] = [
                'key' => $this->menu['events']['key'],
                'slug' => 'add',
                'name' => trans('admin.adding_event'),
            ];
            $this->data['current_sub_item'] = 'future';
            return $this->showView('event');
        } else if (!request('id') || request('id') == 'future') {
            $this->breadcrumbs[] = [
                'key' => $this->menu['events']['key'],
                'name' => trans('admin.future_events'),
            ];
            $this->data['current_sub_item'] = 'future';
            $this->data['events'] = Event::where('date','>',time())->orwhere('date',null)->orderBy('date')->get();
            return $this->showView('events');
        } else if (request('id') == 'past') {
            $this->breadcrumbs[] = [
                'key' => $this->menu['events']['key'],
                'name' => trans('admin.past_events'),
            ];
            $this->data['current_sub_item'] = 'past';
            $this->data['events'] = Event::where('date','<=',time())->orderBy('date')->get();
            return $this->showView('events');
        } elseif (request('id')) {
            $this->data['event'] = Event::findOrFail(request('id'));
            $this->breadcrumbs[] = [
                'key' => $this->menu['events']['key'],
                'name' => $this->data['event']->date > time() ? trans('admin.future_events') : trans('admin.past_events'),
            ];
            $this->breadcrumbs[] = [
                'key' => $this->menu['events']['key'],
                'params' => ['id' => $this->data['event']->id],
                'name' => trans('admin.edit_event'),
            ];
            $this->data['current_sub_item'] = $this->data['event']->date > time() ? 'future' : 'past';
            return $this->showView('event');
        } else {
            abort(404);
        }
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function editEvent(Request $request): RedirectResponse
    {
        $event = $this->editSomething (
            $request,
            new Event(),
            [
                'name' => $this->validationString,
//                'date' => $this->validationDate,
                'target_audience' => $this->validationString,
                'course_objectives' => $this->validationString,
                'description' => 'required|min:5|max:3000',
                'duration' => 'required|min:1|max:20',
            ]
        );
        $this->saveCompleteMessage();
        return redirect(route('admin.events',['id' => (!isset($event->date) || $event->date > time() ? 'future' : 'past' )]));
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function deleteEvent(Request $request): JsonResponse
    {
        return $this->deleteSomething($request, new Event());
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function deleteEventPerson(Request $request): JsonResponse
    {
        return $this->deleteSomething($request, new EventPerson());
    }
}
