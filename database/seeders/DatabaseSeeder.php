<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\News;

class DatabaseSeeder extends Seeder
{
    public function run()
{
    News::where('category', 'old_category_1')->update(['category' => 'Все новости']);
    News::where('category', 'old_category_2')->update(['category' => 'Новости организации']);
}
}
