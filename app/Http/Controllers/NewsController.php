<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    // Метод для отображения последних 3 новостей
    public function index()
    {
        $news = News::latest()->take(3)->get(); // Получаем последние 3 новости
        return view('welcome', compact('news'));

    }

public function school()
{
    $news2 = News::where('category', 'school') // Фильтруем по категории
                 ->latest() // Сортируем по дате (от новых к старым)
                 ->take(3) // Берем только 3 последних
                 ->get(); 

    return view('school', compact('news2'));
}
	
   // Метод для отображения полной новости
    public function show($id)
    {
        $news = News::findOrFail($id); // Ищем новость по ID
        if ($news->category == 'all_news') {
            $news->category = 'Все новости';
        } elseif ($news->category == 'organization_news') {
            $news->category = 'Новости организации';
        }
        return view('show', compact('news')); // Передаем новость в шаблон
    }

    public function indexAll()
{
    // Получаем все новости
    $news = News::all();
    
    // Отправляем их на страницу
    return view('news', compact('news'));

}
	
	public function schoolNews()
{
    $schoolNews = News::where('category', 'school')->get();
    return view('school-news', compact('schoolNews'));
}
}
