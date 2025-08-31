<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KGSons Company Ltd - @yield('title')</title>
    <!-- Bootstrap 5.3.3 CSS -->
<!-- Bootstrap CSS -->
<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

<!-- Font Awesome -->
<link href="{{ asset('assets/css/all.min.css') }}" rel="stylesheet">

<!-- Select2 CSS -->
<link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet">

<!-- Your custom CSS if needed -->
<link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

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

<!-- Bootstrap JS -->
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

<!-- Select2 JS -->
<script src="{{ asset('assets/js/select2.min.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('js/web-app.js') }}"></script>
    @yield('scripts')
</body>
</html>