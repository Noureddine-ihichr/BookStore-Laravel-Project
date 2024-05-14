
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    {{-- Include any necessary CSS stylesheets --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    {{-- Admin sidebar or navigation --}}
   

    {{-- Main content --}}
    <div class="main-content">
        @yield('content')
    </div>

    {{-- Include any necessary JavaScript files --}}
    <script src="{{ asset('js/admin_script.js') }}"></script>
</body>
</html>
