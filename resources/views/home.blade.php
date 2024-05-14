@extends('layouts.app')

@section('content')

<section class="home">

   <div class="content">
      <h3>Hand Picked Book to your door.</h3>
      <p>Welcome to <span style="color: white;">BookStrom</span>, where every book is a doorway to adventure and every page holds a new world waiting to be discovered. Come explore with us!.</p>
      <a href="{{ route('about') }}" class="white-btn">discover more</a>
   </div>

</section>

<section class="products">

   <h1 class="title">latest products</h1>

   <div class="box-container">

      @forelse ($products as $product)
         <form action="{{ route('addToCart') }}" method="post" class="box">
            @csrf
            <img class="image" src="{{ asset('uploaded_img/' . $product->image) }}" alt="">
            <div class="name">{{ $product->name }}</div>
            <div class="price">${{ $product->price }}/-</div>
            <input type="number" min="1" name="product_quantity" value="1" class="qty">
            <input type="hidden" name="product_name" value="{{ $product->name }}">
            <input type="hidden" name="product_price" value="{{ $product->price }}">
            <input type="hidden" name="product_image" value="{{ $product->image }}">
            <input type="submit" value="add to cart" name="add_to_cart" class="btn">
         </form>
      @empty
         <p class="empty">No products added yet!</p>
      @endforelse

      <link rel="stylesheet" href="{{ asset('css/style.css') }}">

   </div>

   <div class="load-more" style="margin-top: 2rem; text-align:center">
      <a href="{{ route('shop') }}" class="option-btn">load more</a>
   </div>

</section>

<section class="about">

   <div class="flex">

      <div class="image">
         <img src="{{ asset('images/about-img.jpg') }}" alt="">
      </div>

      <div class="content">
         <h3>about us</h3>
         <p>we're more than just a bookstore; we're a sanctuary for bibliophiles, a haven for the curious, and a gathering place for those who cherish the written word.</p>
         <a href="{{ route('about') }}" class="btn">read more</a>
      </div>

   </div>

</section>

<section class="home-contact">

   <div class="content">
      <h3>have any questions?</h3>
      <p>We're here to help! Whether you're looking for a specific title, seeking reading recommendations, or just want to chat about books, our knowledgeable staff is ready to assist you. Don't hesitate to reach out—we're always happy to lend a hand.</p>
      <a href="{{ route('contact') }}" class="white-btn">contact us</a>
   </div>

</section>

@endsection
