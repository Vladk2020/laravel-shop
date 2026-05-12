<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // УДАЛИ ИЛИ ЗАКОММЕНТИРУЙ ЭТИ СТРОКИ:
        // Product::truncate(); 
        // Category::truncate();

        // Оставляй только создание категорий и товаров:
        $electronics = Category::create(['name' => 'Электроника']);

        Product::create([
            'category_id' => $electronics->id,
            'name' => 'Samsung Galaxy S24 Ultra',
            'description' => 'Флагман со стилусом и ИИ',
            'price' => 1200,
            'stock' => 10
        ]);

        Product::create([
            'category_id' => $electronics->id,
            'name' => 'MacBook Air 2020',
            'description' => 'Классика на чипе M1 для работы',
            'price' => 900,
            'stock' => 5
        ]);
        
        // ... твои остальные товары
    }
}