<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'total_price' => 'required',
        ]);

        $order = new Order();
        $order->user_id = Auth::id();
        $order->total_price = $request->total_price;
        $order->status = 'pending';
        $order->save();

        // Возвращаемся на 'home'
        return redirect()->route('home')->with('success', 'Замовлення успішно оформлено!');
    }

    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->latest()->get();
        return view('orders.index', compact('orders'));
    }
}