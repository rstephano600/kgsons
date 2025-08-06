<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KGSons Company Ltd - @yield('title')</title>
    <!-- Bootstrap 5.3.3 CSS -->
<!-- Bootstrap 5.3.3 CSS -->
<link href="{{ asset('vendor/bootstrap/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <link href="{{ asset('css/web-app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        @include('layouts.web-header')
        
            <main>
            @yield('content')
            </main>
        
        @include('layouts.web-footer')
    </div>

<!-- Bootstrap 5.3.3 JS Bundle with Popper -->
<script src="{{ asset('vendor/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- Custom JS -->
    <script src="{{ asset('js/web-app.js') }}"></script>
    @yield('scripts')
</body>
</html>