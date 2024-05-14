@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="form-container">
    <form action="{{ route('admin.login') }}" method="post">
        @csrf 

        <h3>Admin Login</h3>
        <input type="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required class="box">
        <input type="password" name="password" placeholder="Enter your password" required class="box">
        <input type="submit" name="submit" value="Login Now" class="btn">

        

        <p>User? <a href="{{ route('login') }}">Login as User</a></p>
    </form>
</div>

</body>
</html>
