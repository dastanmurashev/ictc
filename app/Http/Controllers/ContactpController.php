<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactpController extends Controller
{
    public function sendMailp(Request $request)
    {
        $request->validate([
            'pr_name'    => 'required|string|max:255',
            'pr_number' => 'required|string|max:255',
        ]);

        $messageBody = "Имя: " . $request->input('pr_name') . "\n" .
                       "Телефон: " . $request->input('pr_number');

        Mail::raw($messageBody, function ($message) use ($request) {
            $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
                    ->to(env('MAIL_FROM_ADDRESS'))
                    ->subject('Письмо с сайта, Страница Профиль'); // Новый заголовок письма
        });

        return back()->with('success', 'Ваше сообщение отправлено!');
    }
}

