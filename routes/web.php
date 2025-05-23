<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactpController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SurveyController;
use Illuminate\Support\Facades\Route;


Route::get('lang/{locale}', function ($locale) {
    if (!in_array($locale, ['kk', 'ru', 'en'])) {
        abort(400);
    }
    session(['locale' => $locale]);
    app()->setLocale($locale);
    return redirect()->back();
})->name('lang.switch');

Route::get('/', function () {
    return view('welcome');
});
Route::get('/news', function () {
    return view('news');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/profile', function () {
    return view('profile');
});
Route::get('/services', function () {
    return view('services');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/survey', function () {
    return view('survey');
});
Route::get('/waiting', function () {
    return view('waiting');
});
Route::get('/school', function () {
    return view('school');
});
Route::get('/school-news', function () {
    return view('school-news');
});

Route::get('/', [NewsController::class, 'index'])->name('home');
Route::get('/school', [NewsController::class, 'school'])->name('school');
Route::get('/news', [NewsController::class, 'indexAll'])->name('news');
Route::get('/school-news', [NewsController::class, 'schoolNews']);
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');

Route::post('/send-mail', [ContactController::class, 'sendMail'])->name('send.mail');
Route::post('/send-survey', [SurveyController::class, 'sendSurvey'])->name('send.survey');
Route::post('/send-mailp', [ContactpController::class, 'sendMailp'])->name('send.mailp');



