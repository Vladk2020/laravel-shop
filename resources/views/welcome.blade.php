<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Магазин Boss</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-white">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        
        @if(session('success'))
            <div class="mb-8 p-4 bg-green-500 text-white rounded-xl shadow-lg text-center font-bold">
                {{ session('success') }}
            </div>
        @endif

        <header class="flex justify-between items-center mb-12 bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700">
            <h1 class="text-3xl font-black uppercase tracking-widest text-indigo-600">Boss Shop</h1>
            <div class="flex items-center space-x-6">
                @auth
                    <a href="{{ route('orders.index') }}" class="text-sm font-bold text-gray-700 dark:text-gray-200 hover:text-indigo-600 transition">Мої замовлення</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-sm font-bold text-red-500 hover:text-red-700">Вийти ({{ Auth::user()->name }})</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-bold text-gray-700 dark:text-gray-200 hover:text-indigo-600 transition">Увійти</a>
                    <a href="{{ route('register') }}" class="bg-indigo-600 text-white px-5 py-2 rounded-lg text-sm font-bold hover:bg-indigo-700 transition shadow-md">Реєстрація</a>
                @endauth
            </div>
        </header>

        <main>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($products as $product)
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm p-6 border border-gray-100 dark:border-gray-700 flex flex-col justify-between">
                        <div>
                            <h3 class="text-xl font-bold">{{ $product->name }}</h3>
                            <p class="text-gray-500 mt-2">{{ $product->description }}</p>
                        </div>
                        <div class="flex justify-between items-center mt-6">
                            <span class="text-2xl font-black">${{ number_format($product->price, 0) }}</span>
                            <form action="{{ route('order.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="total_price" value="{{ $product->price }}">
                                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-lg font-bold">Купити</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </main>
    </div>
</body>
</html>