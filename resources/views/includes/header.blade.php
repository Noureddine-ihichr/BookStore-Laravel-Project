@if(isset($message))
    @foreach($message as $msg)
        <div class="message">
            <span>{{ $msg }}</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        </div>
    @endforeach
@endif

@php
    use App\Models\Cart;
    use Illuminate\Support\Facades\Auth;

    // Fetch the count of items in the cart
    $cart_rows_number = Auth::check() ? Cart::where('user_id', Auth::id())->count() : 0;
@endphp

<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">



<header class="header">
    <div class="header-1">
        <div class="flex">
            <div class="share">
                <a href="https://web.facebook.com/?_rdc=1&_rdra" class="fab fa-facebook-f"></a>
                <a href="https://twitter.com/" class="fab fa-twitter"></a>
                <a href="https://www.instagram.com/" class="fab fa-instagram"></a>
                <a href="https://www.linkedin.com/" class="fab fa-linkedin"></a>
            </div>
            @guest
                <p> new <a href="{{ route('login') }}">login</a> | <a href="{{ route('register') }}">register</a> </p>
            @else
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-class">Logout</button>
                </form>
            @endguest
        </div>
    </div>

    <div class="header-2">
        <div class="flex">
            <a href="{{ route('home') }}" class="logo">BookStrom.</a>

            <nav class="navbar">
                <a href="{{ route('home') }}">home</a>
                <a href="{{ route('about') }}">about</a>
                <a href="{{ route('shop') }}">shop</a>
                <a href="{{ route('contact') }}">contact</a>
                
            </nav>

            <div class="icons">
                <div id="menu-btn" class="fas fa-bars"></div>
                <a href="{{ route('search') }}" class="fas fa-search"></a>
                <div id="user-btn" class="fas fa-user"></div>
                <a href="{{ route('cart.index') }}"> <i class="fas fa-shopping-cart"></i> <span>({{ $cart_rows_number }})</span> </a>
            </div>
            <script>
            // Function to update cart count
            function updateCartCount(count) {
                document.getElementById('cart-count').innerText = count;
            }

            // Example usage: updateCartCount(5); // Replace 5 with the actual count
        </script>

            <div class="user-box">
                @if (session('user_name'))
                    <p>username: <span>{{ session('user_name') }}</span></p>
                @endif
                @if (session('user_email'))
                    <p>email: <span>{{ session('user_email') }}</span></p>
                @endif
            </div>
        </div>
    </div>
</header>
