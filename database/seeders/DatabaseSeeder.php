<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Создаем тестового пользователя (из твоего исходного кода)
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // 2. ВАЖНО: Вызываем твой сидер товаров
        // Без этой строки база данных товаров будет оставаться пустой
        $this->call([
            ProductSeeder::class,
        ]);
    }
}
