<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    // Метод для отображения главной страницы
    public function index()
    {
        return view('home');
    }

    // Метод для обработки отправки формы обращения клиента
    public function sendContact(Request $request)
    {
        // Валидация данных формы
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|string|email|max:255',
            'message' => 'required|string|max:1000',
        ]);

        // Логика отправки письма или сохранения в БД
        // Пример отправки письма
        Mail::raw($request->message, function ($message) use ($request) {
            $message->to('your-email@example.com')
                ->subject('New Contact Form Submission')
                ->from($request->email, $request->first_name . ' ' . $request->last_name);
        });

        // Возврат сессии с подтверждением успешной отправки
        return redirect()->route('home')->with('success', 'Your message has been sent successfully!');
    }
}
