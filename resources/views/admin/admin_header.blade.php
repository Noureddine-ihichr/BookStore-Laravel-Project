<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="{{ asset('css/admin_style.css') }}">

<header class="header">
    <div class="flex">
        <a href="{{ route('admin.dashboard') }}" class="logo">Admin<span>Panel</span></a>
        <nav class="navbar">
            <a href="{{ route('admin.dashboard') }}">Home</a>
            <a href="{{ route('admin.products.index') }}">Products</a> 
            <a href="{{ route('admin.orders.index') }}">Orders</a>
            <a href="{{ route('admin.users') }}">Users</a>
            <a href="{{ route('admin.contacts') }}">Messages</a>
        </nav>
        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="user-btn" class="fas fa-user"></div>
        </div>
        
        <div id="account-box" class="account-box">
            @auth
                <p>Username: <span>{{ auth()->user()->name }}</span></p>
                <p>Email: <span>{{ auth()->user()->email }}</span></p>
                <a href="{{ route('admin.create') }}" style="margin-bottom: 12px;" class="btn btn-create-admin">Create Admin Account</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="delete-btn">Logout</button>
                </form>
            @else
                <p>No user logged in</p>
                <a href="{{ route('login') }}" class="btn">Login</a>
            @endauth
        </div>
    </div>
</header>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const userBtn = document.getElementById('user-btn');
    const accountBox = document.getElementById('account-box');

    userBtn.addEventListener('click', function() {
        accountBox.classList.toggle('show');
    });
});
</script>
