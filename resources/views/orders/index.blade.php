<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Мої замовлення') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if($orders->isEmpty())
                    <p class="text-gray-500">У вас ще немає замовлень.</p>
                @else
                    <table class="w-full text-left text-gray-100">
                        <thead>
                            <tr>
                                <th class="border-b dark:border-gray-700 py-2">№</th>
                                <th class="border-b dark:border-gray-700 py-2">Ціна</th>
                                <th class="border-b dark:border-gray-700 py-2">Статус</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td class="py-2 border-b dark:border-gray-700">{{ $loop->iteration }}</td>
                                    <td class="py-2 border-b dark:border-gray-700">${{ $order->total_price }}</td>
                                    <td class="py-2 border-b dark:border-gray-700">{{ $order->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
                <div class="mt-6">
                    <a href="{{ route('home') }}" class="text-indigo-600 hover:underline">← Назад до магазину</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>