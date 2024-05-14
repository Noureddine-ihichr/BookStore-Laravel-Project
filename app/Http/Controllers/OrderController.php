<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->get();

        return view('orders.index', ['orders' => $orders]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'number' => 'required|string',
            'email' => 'required|email',
            'method' => 'required|string',
            'total_products' => 'required|integer',
            'total_price' => 'required|numeric',
       
        ]);

        $order = new Order();
        $order->name = $request->input('name');
        $order->number = $request->input('number');
        $order->email = $request->input('email');
        $order->method = $request->input('method');
        $order->total_products = $request->input('total_products');
        $order->total_price = $request->input('total_price');
        $order->user_id = Auth::id(); 
        $order->placed_on = now(); 
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Order placed successfully!');
    }
}
