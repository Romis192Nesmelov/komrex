<?php

namespace App\Http\Controllers;

use App\Http\Requests\Feedback\CallbackRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;

class FeedbackController extends Controller
{
    public function callback(CallbackRequest $request): JsonResponse
    {
        return $this->sendMessage('feedback', $request->validated(), $request);
    }

    private function sendMessage(string $template, array $fields, Request $request): JsonResponse
    {
        Mail::send('emails.'.$template, $fields, function($message) {
            $message->subject('Сообщение с сайта '.env('APP_NAME'));
            $message->to(env('MAIL_TO'));
        });
        $message = trans('content.we_will_contact_you');
        return response()->json(['success' => true, 'message' => $message],200);
    }
}
