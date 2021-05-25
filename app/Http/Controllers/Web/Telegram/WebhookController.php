<?php

namespace App\Http\Controllers\Web\Telegram;

use App\Http\Controllers\Controller;
use App\Models\UserVerification;
use Illuminate\Http\Request;

class WebhookController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if (isset($request->message['chat']['id']))
        {
            $code = $request->message['text'];

            $verification = UserVerification::whereCode($code)->first();

            if ($verification)
            {
                $verification->user->telegram_id = $request->message['from']['id'];
                $verification->user->save();
                $verification->delete();
            }
        }
    }
}
