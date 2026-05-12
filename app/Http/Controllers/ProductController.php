<?php

namespace App\Http\Controllers;

use App\Models\Product; // Подключаем модель товара
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Главная страница магазина
     */
    public function index(): View
    {
        // 1. Берем все товары из базы данных
        $products = Product::all();

        // 2. Передаем их в шаблон welcome.blade.php
        return view('welcome', compact('products'));
    }
}