<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    // Разрешаем массовое присваивание для этих полей
    protected $fillable = [
        'title',
        'description',
        'image',
        'category',
    ];
}
