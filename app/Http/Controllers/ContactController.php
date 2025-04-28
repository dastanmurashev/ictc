<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendMail(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $messageBody = "Имя: " . $request->input('name') . "\n" .
                       "Email: " . $request->input('email') . "\n" .
                       "Тема: " . $request->input('subject') . "\n\n" .
                       "Сообщение:\n" . $request->input('message');

        Mail::raw($messageBody, function ($message) use ($request) {
            $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
                    ->to(env('MAIL_FROM_ADDRESS'))
                    ->subject('Письмо с сайта, Страница Контакты'); // Новый заголовок письма
        });

        return back()->with('success', 'Ваше сообщение отправлено!');
    }
}

