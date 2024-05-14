<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel App')</title>
    <!-- Include your CSS files here -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>
    @include('includes.header')

    
    <!-- Content section -->
        @yield('content')
    </div>

    @include('includes.footer')

    <!-- Include your JavaScript files here -->
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
