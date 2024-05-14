<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 

class AdminProductController extends Controller
{
    public function index()
{
    $products = Product::all();
    return view('admin.products.index', compact('products'));
}

public function create()
{
    return view('admin.products.create');
}

public function store(Request $request)
{
 
    $validatedData = $request->validate([
        'name' => 'required',
        'price' => 'required|numeric|min:0',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
    ]);


    $imageName = time() . '.' . $request->image->extension();
    $request->image->move(public_path('uploaded_img'), $imageName);

    $product = new Product;
    $product->name = $validatedData['name'];
    $product->price = $validatedData['price'];
    $product->image = $imageName;
    $product->save();

    return redirect()->route('admin.products.index')->with('success', 'Product added successfully!');
}

public function edit($id)
{
    $product = Product::findOrFail($id);
    return view('admin.products.edit', compact('product'));
}

public function update(Request $request, $id)
{

    $validatedData = $request->validate([
        'name' => 'required',
        'price' => 'required|numeric|min:0',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
    ]);


    $product = Product::findOrFail($id);


    $product->name = $validatedData['name'];
    $product->price = $validatedData['price'];


    if ($request->hasFile('image')) {

        $oldImage = public_path('uploaded_img/' . $product->image);
        if (file_exists($oldImage)) {
            unlink($oldImage);
        }


        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploaded_img'), $imageName);
        $product->image = $imageName;
    }

 
    $product->save();

    return redirect()->route('admin.products.index')->with('success', 'Product updated successfully!');
}

public function destroy($id)
{
 
    $product = Product::findOrFail($id);


    $imagePath = public_path('uploaded_img/' . $product->image);
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }

 
    $product->delete();

    return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully!');
}


}
