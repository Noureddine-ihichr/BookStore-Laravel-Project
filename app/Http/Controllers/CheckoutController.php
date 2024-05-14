<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function show()
    {
        $user_id = Auth::id();
        $cartItems = Cart::where('user_id', $user_id)->get();
    
      
        $grand_total = 0;
    
     
        foreach ($cartItems as $item) {
            $grand_total += $item->price * $item->quantity;
        }
        
        return view('checkout', compact('cartItems', 'grand_total'));
    }

    public function placeOrder(Request $request)
    {
        $user_id = Auth::id();
        $cartItems = Cart::where('user_id', $user_id)->get();

        $validatedData = $request->validate([
            'name' => 'required|string',
            'number' => 'required|string',
            'email' => 'required|email',
            'method' => 'required|string',
        ]);

        $orderData = [
            'user_id' => $user_id,
            'name' => $validatedData['name'],
            'number' => $validatedData['number'],
            'email' => $validatedData['email'],
            'method' => $validatedData['method'],
            'address' => $request->input('flat') . ', ' . $request->input('street') . ', ' . $request->input('city') . ', ' . $request->input('country') . ' - ' . $request->input('pin_code'),
            'placed_on' => now(),
            'total_products' => $cartItems->pluck('name')->implode(', '),
            'total_price' => $cartItems->sum('price')
        ];

        Order::create($orderData);

        
        Cart::where('user_id', $user_id)->delete();

        return redirect()->back()->with('success', 'Order placed successfully!');
    }

    
}
