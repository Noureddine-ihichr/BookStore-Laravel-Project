@include('admin.admin_header')

@extends('layouts.admin')

@section('content')

    <section class="add-products">
    <h1 class="title">Shop Products</h1>

        <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <h3>Add Product</h3>
            <input type="text" name="name" class="box" placeholder="Enter product name" required>
            <input type="number" min="0" name="price" class="box" placeholder="Enter product price" required>
            <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required>
            <input type="submit" value="Add Product" class="btn">
        </form>
    </section>


    <section class="show-products">
        <div class="box-container">
            @forelse ($products as $product)
                <div class="box">
                    <img src="{{ asset('uploaded_img/' . $product->image) }}" alt="">
                    <div class="name">{{ $product->name }}</div>
                    <div class="price">${{ $product->price }}/-</div>

                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-btn" onclick="return confirm('Delete this product?');">Delete</button>
                    </form>
                </div>
            @empty
                <p class="empty">No products added yet!</p>
            @endforelse
        </div>
    </section>
@endsection
