<?php

namespace App\Http\Controllers;

use App\Http\Requests\Feedback\CallbackRequest;
use App\Http\Requests\Feedback\SignUpRequest;
use App\Http\Requests\Feedback\TechnicFeedbackRequest;
use App\Models\Event;
use App\Models\EventPerson;
use App\Models\Technic;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;

class FeedbackController extends Controller
{
    public function callback(CallbackRequest $request): JsonResponse
    {
        return $this->sendMessage('feedback', $request->validated());
    }

    public function signUp(SignUpRequest $request): JsonResponse
    {
        $event = Event::find($request->event_id);
        $fields = $request->validated();
        $fields['event_name'] = $event->name;
        $fields['event_date'] = $event->date ? date('d.m.Y',$event->date) : null;
        EventPerson::create([
            'name' => $fields['name'],
            'phone' => $fields['phone'],
            'event_id' => $event->id
        ]);
        return $this->sendMessage('signup', $fields);
    }

    public function technicFeedback(TechnicFeedbackRequest $request): JsonResponse
    {
        $technic = Technic::find($request->id);
        $fields = $request->validated();
        $fields['technic_name'] = $technic->name;
        $fields['technic_type'] = $technic->technicType->name;
        return $this->sendMessage('technic_feedback', $fields);
    }

    private function sendMessage(string $template, array $fields): JsonResponse
    {
        Mail::send('emails.'.$template, $fields, function($message) {
            $message->subject('Сообщение с сайта '.env('APP_NAME'));
            $message->to(env('MAIL_TO'));
        });
        $message = trans('content.we_will_contact_you');
        return response()->json(['success' => true, 'message' => $message],200);
    }
}
