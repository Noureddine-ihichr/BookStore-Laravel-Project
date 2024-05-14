

@extends('layouts.app')

@section('title', 'Search Results')

@section('content')
<div class="heading">
    <h3>Search Results</h3>
    <p><a href="{{ route('home') }}">Home</a> / Search Results</p>
</div>

<section class="products">
    <div class="box-container">
        @forelse ($products as $product)
        <div class="box">
            <img src="{{ asset('uploaded_img/' . $product->image) }}" class="image" alt="">
            <div class="name">{{ $product->name }}</div>
            <div class="price">${{ $product->price }}/-</div>
            <form action="{{ route('addToCart') }}" method="post">
            @csrf
            <input type="hidden" name="product_name" value="{{ $product->name }}">
            <input type="hidden" name="product_price" value="{{ $product->price }}">
            <input class="image" type="hidden" name="product_image" value="{{ $product->image }}">
            <input type="number" name="product_quantity" value="1" min="1">
            <button type="submit" class="btn">Add to Cart</button>
            <div class="image-container">
            </div>
</form>

        </div>
        @empty
        <p class="empty">No results found!</p>
        @endforelse
    </div>
</section>
@endsection
