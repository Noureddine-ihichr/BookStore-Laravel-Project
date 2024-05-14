@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<div class="heading">
   <h3>Checkout</h3>
   <p><a href="{{ route('home') }}">Home</a> / Checkout</p>
</div>

<section class="display-order">
   @foreach($cartItems as $item)
       <p>{{ $item->name }} <span>(${{ $item->price }}/-
           x {{ $item->quantity }})</span></p>
   @endforeach
   <div class="grand-total">Grand Total: <span>${{ $grand_total }}</span></div>
</section>

<section class="checkout">
   <form action="{{ url('/checkout') }}" method="post">
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
               <option value="paypal">PayPal</option>
               <option value="paytm">Paytm</option>
            </select>
         </div>
         <div class="inputBox">
            <span>Address Line 01:</span>
            <input type="text" name="flat" required placeholder="e.g. Flat No.">
         </div>
         <div class="inputBox">
            <span>Street:</span>
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
      <input type="submit" value="Order Now" class="btn" name="order_btn">
   </form>
</section>

@endsection
