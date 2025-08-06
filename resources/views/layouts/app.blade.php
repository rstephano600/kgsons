<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - KGSONS</title>
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/kgsons.png') }}" type="image/png">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary-color: #3b82f6;
            --primary-hover: #2563eb;
            --sidebar-width: 260px;
            --header-height: 64px;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8fafc;
        }
        
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            transition: all 0.3s ease;
            z-index: 1000;
        }
        
        .main-content {
            margin-left: var(--sidebar-width);
            min-height: calc(100vh - var(--header-height));
            transition: all 0.3s ease;
        }
        
        .header {
            height: var(--header-height);
            position: sticky;
            top: 0;
            z-index: 999;
        }
        
        .nav-item.active {
            background-color: rgba(59, 130, 246, 0.1);
            border-left: 3px solid var(--primary-color);
            color: var(--primary-color);
        }
        
        .nav-item.active .nav-icon {
            color: var(--primary-color);
        }
        
        .nav-item:hover:not(.active) {
            background-color: rgba(59, 130, 246, 0.05);
        }
        
        .dropdown:hover .dropdown-menu {
            display: block;
        }
        
        @media (max-width: 1024px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 999;
            }
            
            .overlay.active {
                display: block;
            }
        }
    </style>
    
    @stack('styles')
</head>
<body class="bg-gray-50">
    <!-- Sidebar -->
    <aside class="sidebar bg-white shadow-md">
        <!-- Sidebar Header -->
        <div class="flex items-center justify-center h-16 px-4 border-b border-gray-200">
            <img src="{{ asset('images/kgsons.png') }}" alt="KGSons Logo" class="h-10">
            <span class="ml-2 text-xl font-semibold text-gray-800">KGSons</span>
        </div>
        
        <!-- Sidebar Content -->
        <div class="overflow-y-auto h-[calc(100vh-var(--header-height))] py-4">
            <!-- User Profile -->
            <div class="px-4 py-3 flex items-center border-b border-gray-200">
                <div class="relative">
                    <img src="{{ Auth::user()->photo ?? asset('images/default-avatar.png') }}" 
                         alt="User" 
                         class="w-10 h-10 rounded-full object-cover">
                    <span class="absolute bottom-0 right-0 w-3 h-3 rounded-full 
                                @if(Auth::user()->status === 'active') bg-green-500 @else bg-red-500 @endif
                                border-2 border-white"></span>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-gray-800">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-gray-500 capitalize">{{ Auth::user()->role }}</p>
                </div>
            </div>
            
            <!-- Navigation Menu -->
            <nav class="mt-4">
                <ul>
                    @includeWhen(Auth::user()->role === 'admin', 'layouts.nav-items.admin')
                    @includeWhen(Auth::user()->role === 'director', 'layouts.nav-items.director')
                    @includeWhen(Auth::user()->role === 'assistantdirector', 'layouts.nav-items.assistant-director')
                    @includeWhen(Auth::user()->role === 'manager', 'layouts.nav-items.manager')
                    @includeWhen(Auth::user()->role === 'secretary', 'layouts.nav-items.secretary')
                    @includeWhen(Auth::user()->role === 'staff', 'layouts.nav-items.staff')
                    @includeWhen(Auth::user()->role === 'customer', 'layouts.nav-items.customer')
                    
                    <!-- Common Items for All Roles -->
                    <li class="px-2">
                        <a href="{{ route('profile.edit') }}" 
                           class="nav-item flex items-center px-4 py-3 text-sm text-gray-600 rounded-lg hover:text-gray-800">
                            <i class="nav-icon fas fa-user mr-3"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li class="px-2">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" 
                                    class="w-full flex items-center px-4 py-3 text-sm text-gray-600 rounded-lg hover:text-gray-800">
                                <i class="fas fa-sign-out-alt mr-3"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
    
    <!-- Overlay for mobile -->
    <div class="overlay" onclick="toggleSidebar()"></div>
    
    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <header class="header bg-white shadow-sm border-b border-gray-200">
            <div class="flex items-center justify-between h-full px-6">
                <!-- Left Side -->
                <div class="flex items-center">
                    <button onclick="toggleSidebar()" 
                            class="lg:hidden text-gray-600 hover:text-gray-900 mr-4">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    
                    <!-- Breadcrumbs -->
                    <div class="hidden md:flex items-center text-sm">
                        @yield('breadcrumbs')
                    </div>
                </div>
                
                <!-- Right Side -->
                <div class="flex items-center space-x-4">
                    <!-- Notifications -->
                    <div class="relative dropdown">
                        <button class="p-2 text-gray-600 hover:text-gray-900 relative">
                            <i class="fas fa-bell text-xl"></i>
                            <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                        </button>
                        <div class="dropdown-menu hidden absolute right-0 mt-2 w-72 bg-white rounded-md shadow-lg py-1 z-50">
                            <div class="px-4 py-2 border-b border-gray-200">
                                <p class="text-sm font-medium">Notifications</p>
                            </div>
                            <div class="max-h-60 overflow-y-auto">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <i class="fas fa-info-circle text-blue-500 mr-2"></i>
                                        </div>
                                        <div>
                                            <p>System update available</p>
                                            <p class="text-xs text-gray-500">10 minutes ago</p>
                                        </div>
                                    </div>
                                </a>
                                <!-- More notifications -->
                            </div>
                            <div class="px-4 py-2 border-t border-gray-200 text-center">
                                <a href="#" class="text-sm text-blue-600 hover:text-blue-800">View all</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- User Dropdown -->
                    <div class="relative dropdown">
                        <button class="flex items-center space-x-2 focus:outline-none">
                            <img src="{{ Auth::user()->photo ?? asset('images/default-avatar.png') }}" 
                                 alt="User" 
                                 class="w-8 h-8 rounded-full object-cover">
                            <span class="hidden md:inline text-sm font-medium">{{ Auth::user()->name }}</span>
                            <i class="fas fa-chevron-down text-xs hidden md:inline"></i>
                        </button>
                        <div class="dropdown-menu hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                            <a href="{{ route('profile.edit') }}" 
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-user mr-2"></i> Profile
                            </a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-cog mr-2"></i> Settings
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" 
                                        class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        <!-- Page Content -->
        <main class="p-6">
            @yield('content')
        </main>
        
        <!-- Footer -->
        <footer class="bg-white border-t border-gray-200 py-4 px-6">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="text-sm text-gray-600 mb-2 md:mb-0">
                    &copy; {{ date('Y') }} KGSons. All rights reserved.
                </div>
                <div class="flex space-x-4">
                    <a href="#" class="text-sm text-gray-600 hover:text-gray-900">Privacy Policy</a>
                    <a href="#" class="text-sm text-gray-600 hover:text-gray-900">Terms of Service</a>
                    <a href="#" class="text-sm text-gray-600 hover:text-gray-900">Contact Us</a>
                </div>
            </div>
        </footer>
    </div>
    
    <!-- Scripts -->
    <script>
        function toggleSidebar() {
            document.querySelector('.sidebar').classList.toggle('active');
            document.querySelector('.overlay').classList.toggle('active');
        }
        
        // Close dropdowns when clicking outside
        document.addEventListener('click', function(event) {
            if (!event.target.matches('.dropdown *')) {
                const dropdowns = document.querySelectorAll('.dropdown-menu');
                dropdowns.forEach(dropdown => {
                    dropdown.style.display = 'none';
                });
            }
        });
        
        // Initialize dropdowns
        document.querySelectorAll('.dropdown').forEach(dropdown => {
            dropdown.addEventListener('click', function(e) {
                const menu = this.querySelector('.dropdown-menu');
                if (menu.style.display === 'block') {
                    menu.style.display = 'none';
                } else {
                    // Close all other dropdowns first
                    document.querySelectorAll('.dropdown-menu').forEach(m => {
                        m.style.display = 'none';
                    });
                    menu.style.display = 'block';
                }
                e.stopPropagation();
            });
        });
    </script>
    
    @stack('scripts')
</body>
</html>