<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function create()
    {
        $cart = Session::get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng trống!');
        }

        return view('checkout', compact('cart'));
    }

    public function store(Request $request)
    {
        $cart = Session::get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng trống!');
        }

        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email',
            'customer_phone' => 'required|string|max:15',
            'customer_address' => 'required|string|max:500',
        ]);

        $totalPrice = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

        Order::create([
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'customer_address' => $request->customer_address,
            'total_price' => $totalPrice,
        ]);

        Session::forget('cart'); // Xóa giỏ hàng sau khi đặt hàng

        return redirect()->route('home')->with('success', 'Đơn hàng đã được đặt thành công!');
    }
}
