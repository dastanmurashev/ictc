<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ContactController;
use Illuminate\Http\Request;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\ContactpController;







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



