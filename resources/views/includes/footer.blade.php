<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>quick links</h3>
            <a href="{{ route('home') }}">home</a>
            <a href="{{ route('about') }}">about</a>
            <a href="{{ route('shop') }}">shop</a>
            <a href="{{ route('contact') }}">contact</a>
        </div>

        <div class="box">
            <h3>extra links</h3>
            <a href="{{ route('login') }}">login</a>
            <a href="{{ route('register') }}">register</a>
            <a href="{{ route('cart.index') }}">cart</a>
            <a href="{{ route('orders') }}">orders</a>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <p> <i class="fas fa-phone"></i> +212 639793295 </p>
            <p> <i class="fas fa-phone"></i> +212 500793295 </p>
            <p> <i class="fas fa-envelope"></i> nour.ihichr@gmail.com</p>
            <p> <i class="fas fa-map-marker-alt"></i> Guelmime, Morocco - 81000 </p>
        </div>

        <div class="box">
            <h3>follow us</h3>
            <a href="https://web.facebook.com/?_rdc=1&_rdra"> <i class="fab fa-facebook-f"></i> facebook </a>
            <a href="https://twitter.com/home"> <i class="fab fa-twitter"></i> twitter </a>
            <a href="https://www.instagram.com/"> <i class="fab fa-instagram"></i> instagram </a>
            <a href="https://www.linkedin.com/"> <i class="fab fa-linkedin"></i> linkedin </a>
        </div>

    </div>

    <p class="credit"> &copy; copyright  @ {{ date('Y') }} by <span>Noureddine Ihichr</span> </p>

</section>
