<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - KGSONS</title>
    
    <!-- Bootstrap 5.3.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/kgsons.png') }}" type="image/png">
    
    <style>
        :root {
            --sidebar-width: 260px;
        }
        
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            transition: all 0.3s ease;
            z-index: 1030;
        }
        
        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            transition: all 0.3s ease;
        }
        
        .nav-item.active {
            background-color: rgba(59, 130, 246, 0.1);
            border-left: 3px solid var(--bs-primary);
        }
        
        .nav-item.active .nav-icon {
            color: var(--bs-primary);
        }
        
        .nav-item:hover:not(.active) {
            background-color: rgba(59, 130, 246, 0.05);
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
                z-index: 1029;
            }
            
            .overlay.active {
                display: block;
            }
        }
        
        .status-indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            position: absolute;
            bottom: 0;
            right: 0;
            border: 2px solid #fff;
        }
    </style>
    
    @stack('styles')
</head>
<body class="bg-light">
    <!-- Sidebar -->
    <aside class="sidebar bg-white shadow">
        <!-- Sidebar Header -->
        <div class="d-flex align-items-center justify-content-center border-bottom py-3 px-3">
            <img src="{{ asset('images/kgsons.png') }}" alt="KGSons Logo" class="img-fluid" style="height: 40px;">
            <span class="ms-2 fs-5 fw-semibold text-dark">KGSons</span>
        </div>
        
        <!-- Sidebar Content -->
        <div class="overflow-auto h-100 py-3">
            <!-- User Profile -->
            <div class="px-3 py-3 d-flex align-items-center border-bottom">
                <div class="position-relative">
                    <img src="{{ Auth::user()->photo ?? asset('images/default-avatar.png') }}" 
                         alt="User" 
                         class="rounded-circle object-fit-cover" style="width: 40px; height: 40px;">
                    <span class="status-indicator 
                                @if(Auth::user()->status === 'active') bg-success @else bg-danger @endif">
                    </span>
                </div>
                <div class="ms-3">
                    <p class="mb-0 fw-medium text-dark">{{ Auth::user()->name }}</p>
                    <p class="mb-0 small text-muted text-capitalize">{{ Auth::user()->role }}</p>
                </div>
            </div>
            
            <!-- Navigation Menu -->
            <nav class="mt-3">
                <ul class="list-unstyled">
                    @includeWhen(Auth::user()->role === 'admin', 'layouts.nav-items.admin')
                    @includeWhen(Auth::user()->role === 'director', 'layouts.nav-items.director')
                    @includeWhen(Auth::user()->role === 'assistantdirector', 'layouts.nav-items.assistant-director')
                    @includeWhen(Auth::user()->role === 'manager', 'layouts.nav-items.manager')
                    @includeWhen(Auth::user()->role === 'secretary', 'layouts.nav-items.secretary')
                    @includeWhen(Auth::user()->role === 'staff', 'layouts.nav-items.staff')
                    @includeWhen(Auth::user()->role === 'customer', 'layouts.nav-items.customer')
                    
                    <!-- Common Items for All Roles -->
                    <li class="px-2">
                        <a href="{{ route('profile.show') }}" 
                           class="nav-item d-flex align-items-center px-3 py-2 text-decoration-none text-muted rounded">
                            <i class="nav-icon fa-solid fa-user me-3"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li class="px-2">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" 
                                    class="nav-item w-100 d-flex align-items-center px-3 py-2 text-decoration-none text-muted rounded border-0 bg-transparent">
                                <i class="fa-solid fa-right-from-bracket me-3"></i>
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
    <div class="main-content d-flex flex-column">
        <!-- Header -->
        <header class="bg-white shadow-sm border-bottom sticky-top py-2" style="z-index: 1020;">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between">
                    <!-- Left Side -->
                    <div class="d-flex align-items-center">
                        <button onclick="toggleSidebar()" 
                                class="btn btn-sm d-lg-none text-muted me-2">
                            <i class="fas fa-bars fs-5"></i>
                        </button>
                        
                        <!-- Breadcrumbs -->
                        <div class="d-none d-md-flex align-items-center small">
                            @yield('breadcrumbs')
                        </div>
                    </div>
                    
                    <!-- Right Side -->
                    <div class="d-flex align-items-center">
                        <!-- Notifications -->
                        <div class="dropdown me-3">
                            <button class="btn btn-sm position-relative text-muted" type="button" data-bs-toggle="dropdown">
                                <i class="fas fa-bell fs-5"></i>
                                <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle">
                                    <span class="visually-hidden">Notifications</span>
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end shadow" style="width: 288px;">
                                <div class="px-3 py-2 border-bottom">
                                    <p class="mb-0 small fw-medium">Notifications</p>
                                </div>
                                <div class="overflow-auto" style="max-height: 240px;">
                                    <a href="#" class="dropdown-item d-block">
                                        <div class="d-flex align-items-start">
                                            <div class="flex-shrink-0">
                                                <i class="fas fa-info-circle text-primary me-2"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="mb-0 small">System update available</p>
                                                <p class="mb-0 small text-muted">10 minutes ago</p>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- More notifications -->
                                </div>
                                <div class="px-3 py-2 border-top text-center">
                                    <a href="#" class="small text-primary text-decoration-none">View all</a>
                                </div>
                            </div>
                        </div>
                        
                        <!-- User Dropdown -->
                        <div class="dropdown">
                            <button class="btn d-flex align-items-center text-muted p-0" type="button" data-bs-toggle="dropdown">
                                <img src="{{ Auth::user()->photo ?? asset('images/default-avatar.png') }}" 
                                     alt="User" 
                                     class="rounded-circle object-fit-cover" style="width: 32px; height: 32px;">
                                <span class="d-none d-md-inline ms-2 small fw-medium">{{ Auth::user()->name }}</span>
                                <i class="fas fa-chevron-down small d-none d-md-inline ms-1"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow">
                                <li>
                                    <a href="{{ route('profile.edit') }}" 
                                       class="dropdown-item d-flex align-items-center">
                                        <i class="fas fa-user me-2"></i> Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item d-flex align-items-center">
                                        <i class="fas fa-cog me-2"></i> Settings
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" 
                                                class="dropdown-item d-flex align-items-center">
                                            <i class="fas fa-sign-out-alt me-2"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        <!-- Page Content -->
        <main class="container-fluid py-3 flex-grow-1">
            @yield('content')
        </main>
        
        <!-- Footer -->
        <footer class="bg-white border-top py-3 mt-auto">
            <div class="container-fluid">
                <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                    <div class="small text-muted mb-2 mb-md-0">
                        &copy; {{ date('Y') }} KGSons. All rights reserved.
                    </div>
                    <div class="d-flex">
                        <a href="#" class="small text-muted text-decoration-none me-3">Privacy Policy</a>
                        <a href="#" class="small text-muted text-decoration-none me-3">Terms of Service</a>
                        <a href="#" class="small text-muted text-decoration-none">Contact Us</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    
    <!-- Bootstrap 5.3.3 JS with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        function toggleSidebar() {
            document.querySelector('.sidebar').classList.toggle('active');
            document.querySelector('.overlay').classList.toggle('active');
            document.body.classList.toggle('overflow-hidden');
        }
    </script>
    
    @stack('scripts')
</body>
</html>