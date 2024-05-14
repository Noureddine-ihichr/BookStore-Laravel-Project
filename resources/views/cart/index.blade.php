
@include('includes.header')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="heading">
   <h3>shopping cart</h3>
   <p> <a href="{{ route('home') }}">home</a> / cart </p>
</div>

<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<section class="shopping-cart">
   <h1 class="title">products added</h1>

   <div class="box-container">
      @php
         $grand_total = 0;
         $select_cart = DB::table('cart')->where('user_id', auth()->id())->get();
      @endphp

      @forelse($select_cart as $cart_item)
      <div class="box">
         <a href="{{ route('cart.delete', $cart_item->id) }}" class="fas fa-times" onclick="return confirm('delete this from cart?');"></a>
         <img src="{{ asset('uploaded_img/' . $cart_item->image) }}" alt="">
         <div class="name">{{ $cart_item->name }}</div>
         <div class="price">${{ $cart_item->price }}/-</div>

         <form action="{{ route('cart.update', $cart_item->id) }}" method="post">
            @csrf
            @method('PUT') <!-- Add this line to specify that this form submits a PUT request -->
            <input type="hidden" name="cart_id" value="{{ $cart_item->id }}">
            <input type="number" min="1" name="cart_quantity" value="{{ $cart_item->quantity }}">
            <button type="submit" name="update_cart" class="option-btn">Update</button>
        </form>

         @php
            $sub_total = ($cart_item->quantity * $cart_item->price);
            $grand_total += $sub_total;
         @endphp
         <div class="sub-total"> sub total : <span>${{ $sub_total }}/-</span> </div>
      </div>
      @empty
      <p class="empty">your cart is empty</p>
      @endforelse
   </div>

   <div style="margin-top: 2rem; text-align:center;">
      <form action="{{ route('cart.deleteAll') }}" method="post">
         @csrf
         <button type="submit" class="delete-btn" onclick="return confirm('delete all from cart?');">delete all</button>
      </form>
   </div>

   <div class="cart-total">
      <p>grand total : <span>${{ $grand_total }}/-</span></p>
      <div class="flex">
         <a href="{{ route('shop') }}" class="option-btn">continue shopping</a>
         <a href="{{ route('checkout') }}" class="btn {{ ($grand_total > 1) ? '' : 'disabled' }}">proceed to checkout</a>
      </div>
   </div>
</section>

@include('includes.footer')
