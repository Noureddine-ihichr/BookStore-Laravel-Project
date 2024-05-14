<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Admin Account</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-container">
        <form action="{{ route('admin.create') }}" method="post">
            @csrf 

            <h3>Create Admin Account</h3>
            <input type="text" name="name" placeholder="Enter your name" value="{{ old('name') }}" required class="box">
            <input type="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required class="box">
            <input type="password" name="password" placeholder="Enter your password" required class="box">
            <input type="password" name="password_confirmation" placeholder="Confirm your password" required class="box">
            <input type="hidden" name="user_type" value="admin"> <!-- Set user_type to 'admin' -->
            <input type="submit" name="submit" value="Create Admin Account" class="btn">
            <p>Already have an account? <a href="{{ route('login') }}">Login Now</a></p>
        </form>
    </div>
</body>
</html>
