<?php namespace App\Http\Controllers\zdorovie48;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;
use Mail;

class EmailFrom extends Controller
{

    public function postSend(Request $requests)
    {
        $url = $requests->all();

        Mail::send('emails.error', array('request' => $requests), function ($message) use ($url) {
            $message->to('serg.razg@yandex.ru', 'МИС')->subject('Ошибка на странице: ' . $url['url-error']);
        });
        return redirect($url['url-error']);
    }
}
