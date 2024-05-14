<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index()
    {
        
        $products = Product::all();

 
        return view('shop', compact('products'));
    }

    public function addToCart(Request $request)
    {
        $product_name = $request->input('product_name');
        $product_price = $request->input('product_price');
        $product_image = $request->input('product_image');
        $product_quantity = $request->input('product_quantity');

   
        $cart = Session::get('cart', []);

        
        $existingCartItem = collect($cart)->firstWhere('name', $product_name);

        if ($existingCartItem) {
            
            $existingCartItem['quantity'] += $product_quantity;
        } else {
            
            $cartItem = [
                'name' => $product_name,
                'price' => $product_price,
                'quantity' => $product_quantity,
                'image' => $product_image,
            ];

           
            $cart[] = $cartItem;
        }

       
        Session::put('cart', $cart);

  
        Session::flash('alert', 'Product added to cart!');

        
        return redirect()->route('shop');
    }


    public function search(Request $request)
    {
        $keyword = $request->input('search');

        
        $products = Product::search($keyword)->get();

        return view('search_results', compact('products'));
    }

    public function showSearchForm()
    {
        return view('search');
    }


    
}
