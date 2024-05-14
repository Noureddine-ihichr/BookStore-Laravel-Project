<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Admin Account</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="form-container">
    <form action="{{ route('admin.store') }}" method="post">
        @csrf 

        <h3>Create Admin Account</h3>
        <input type="text" name="name" placeholder="Enter admin name" value="{{ old('name') }}" required class="box">
        <input type="email" name="email" placeholder="Enter admin email" value="{{ old('email') }}" required class="box">
        <input type="password" name="password" placeholder="Enter admin password" required class="box">
        <input type="password" name="password_confirmation" placeholder="Confirm admin password" required class="box">
        <input type="submit" name="submit" value="Create Admin Account" class="btn">
        <p>Already have an account? <a href="{{ route('admin.dashboard') }}">Go back to dashboard</a></p>
    </form>
</div>

</body>
</html>
