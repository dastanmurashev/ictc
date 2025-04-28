<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Обновление категорий на 'Все новости' и 'Новости организации'
        \DB::table('news')->whereIn('category', ['Технологии', 'Бизнес', 'Спорт', 'Развлечения'])
            ->update(['category' => 'Все новости']); // Присваиваем все новости
    
        // Дополнительно, если необходимо, можно разделить категории для организаций
        \DB::table('news')->where('category', 'Все новости')
            ->update(['category' => 'Новости организации']);
    }
    
    public function down()
    {
        // В случае отката миграции восстанавливаем старые категории
        \DB::table('news')->where('category', 'Все новости')
            ->update(['category' => 'Технологии']);
        \DB::table('news')->where('category', 'Новости организации')
            ->update(['category' => 'Бизнес']);
    }
    
};
