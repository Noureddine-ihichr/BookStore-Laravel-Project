@include('includes.header')

<div class="heading">
    <h3>our shop</h3>
    <p><a href="{{ route('home') }}">home</a> / shop</p>
</div>

<section class="products">
    <h1 class="title">latest products</h1>

    <div class="box-container">
        @if (Session::has('cart_message'))
            <div class="alert">
                {{ Session::get('cart_message') }}
            </div>
        @endif

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
                <input type="submit" value="Add to Cart" name="add_to_cart" class="btn">
            </form>
        @empty
            <p class="empty">No products added yet!</p>
        @endforelse
    </div>
</section>

@include('includes.footer')
</body>
</html>
