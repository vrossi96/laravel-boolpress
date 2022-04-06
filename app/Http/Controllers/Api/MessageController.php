<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\MessageMail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->all();

        $mail = new MessageMail($data);
        Mail::to(env('MAIL_ADMIN_ADDRESS'))->send($mail);

        return response('Mail sent', 204);
    }
}
