<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function index()
    {
      
        $cartItems = Cart::where('user_id', auth()->id())->get();


        return view('cart.index', compact('cartItems'));
        return view('checkout', compact('cart_items'));

    }

    public function addToCart(Request $request)
    {
        $userId = auth()->id();
        if (!$userId) {
            return redirect()->route('login'); 
        }

        

        $productName = $request->input('product_name');
        $productPrice = $request->input('product_price');
        $productImage = $request->input('product_image');
        $productQuantity = $request->input('product_quantity');

        
        $existingCartItem = Cart::where('user_id', $userId)
                                ->where('name', $productName)
                                ->first();

        if ($existingCartItem) {
           
            return back()->with('message', 'Product already added to cart!');
        } else {
          
            Cart::create([
                'user_id' => $userId,
                'name' => $productName,
                'price' => $productPrice,
                'quantity' => $productQuantity,
                'image' => $productImage
            ]);
            return back()->with('message', 'Product added to cart!');
        }
    }

    public function update(Request $request)
{
    $cartItemId = $request->input('cart_id');
    $quantity = $request->input('cart_quantity');

    $cartItem = Cart::findOrFail($cartItemId);

    
    $cartItem->update([
        'quantity' => $quantity
    ]);

    return redirect()->route('cart.index')->with('success', 'Cart item updated successfully!');
}

    public function delete($id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->delete();

        return redirect()->route('cart.index')->with('success', 'Cart item deleted successfully!');
    }

    public function deleteAll()
    {
        Cart::where('user_id', auth()->id())->delete();

        return redirect()->route('cart.index')->with('success', 'All cart items deleted successfully!');
    }
}
