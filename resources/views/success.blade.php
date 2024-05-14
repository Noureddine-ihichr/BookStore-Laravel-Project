@extends('layouts.app')

@section('title', 'Checkout')

@section('content')

<div class="heading">
   <h3>Checkout</h3>
   <p><a href="{{ route('home') }}">Home</a> / Checkout</p>
</div>

@if(session('success'))
   <div class="alert alert-success">
      {{ session('success') }}
   </div>
@endif

<section class="display-order">
   @php
      $grand_total = 0;
      $cart_items = auth()->user()->cart ?? null; // Ensure $cart_items is not null
   @endphp

   @if($cart_items && $cart_items->isNotEmpty())
      @foreach($cart_items as $cart_item)
         @php
            $total_price = $cart_item->price * $cart_item->quantity;
            $grand_total += $total_price;
         @endphp
         <p>{{ $cart_item->name }} <span>({{ '$'.$cart_item->price.'/-'.' x '. $cart_item->quantity }})</span></p>
      @endforeach
      <div class="grand-total">Grand Total: <span>${{ $grand_total }}/-
      </div>
   @else
      <p class="empty">Your cart is empty</p>
   @endif
</section>

<section class="checkout">
   <form action="{{ route('place.order') }}" method="post">
      @csrf
      <h3>Place Your Order</h3>
      <div class="flex">
         <div class="inputBox">
            <span>Your Name:</span>
            <input type="text" name="name" required placeholder="Enter your name">
         </div>
         <div class="inputBox">
            <span>Your Number:</span>
            <input type="text" name="number" required placeholder="Enter your number">
         </div>
         <div class="inputBox">
            <span>Your Email:</span>
            <input type="email" name="email" required placeholder="Enter your email">
         </div>
         <div class="inputBox">
            <span>Payment Method:</span>
            <select name="method" required>
               <option value="cash on delivery">Cash on Delivery</option>
               <option value="credit card">Credit Card</option>
               <option value="paypal">Paypal</option>
               <option value="paytm">Paytm</option>
            </select>
         </div>
         <div class="inputBox">
            <span>Address Line 01:</span>
            <input type="text" name="flat" required placeholder="e.g. Flat No.">
         </div>
         <div class="inputBox">
            <span>Address Line 02:</span>
            <input type="text" name="street" required placeholder="e.g. Street Name">
         </div>
         <div class="inputBox">
            <span>City:</span>
            <input type="text" name="city" required placeholder="e.g. Mumbai">
         </div>
         <div class="inputBox">
            <span>State:</span>
            <input type="text" name="state" required placeholder="e.g. Maharashtra">
         </div>
         <div class="inputBox">
            <span>Country:</span>
            <input type="text" name="country" required placeholder="e.g. India">
         </div>
         <div class="inputBox">
            <span>Pin Code:</span>
            <input type="text" name="pin_code" required placeholder="e.g. 123456">
         </div>
      </div>
      <button type="submit" class="btn" name="order_btn">Order Now</button>
   </form>
</section>

@endsection
