<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - KGSONS</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Bootstrap CSS -->
<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

<!-- Font Awesome -->
<link href="{{ asset('assets/css/all.min.css') }}" rel="stylesheet">

<!-- Select2 CSS -->
<link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet">

<!-- Your custom CSS if needed -->
<link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8fafc;
        }
        .auth-card {
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background-color: #3b82f6;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #2563eb;
        }
        .form-input:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 1px #3b82f6;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex flex-col items-center justify-center p-4">
        <div class="w-full max-w-md mx-auto">
            <!-- Company Logo -->
            <div class="flex justify-center mb-8">
                <img src="{{ asset('images/kgsons.png') }}" alt="KGSons Logo" class="h-20">
            </div>
            
            <!-- Card Container -->
            <div class="bg-white rounded-lg shadow-md auth-card overflow-hidden">
                <!-- Card Header -->
                <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                    <h2 class="text-xl font-semibold text-gray-800 text-center">
                        @yield('auth-title')
                    </h2>
                </div>
                
                <!-- Card Body -->
                <div class="p-6">
                    @yield('content')
                </div>
                
                <!-- Card Footer -->
                <div class="px-6 py-4 bg-gray-50 text-center text-sm text-gray-600">
                    @yield('auth-footer')
                </div>
            </div>
            
            <!-- Additional Links -->
            <div class="mt-6 text-center text-sm text-gray-600">
                @yield('auth-links')
            </div>
        </div>
    </div>
</body>
</html>