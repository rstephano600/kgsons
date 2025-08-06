<header>
    <!-- Top Bar with Contact Info -->
    <div class="bg-dark text-white py-2 d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="d-flex align-items-center gap-4">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-phone-alt me-2 text-primary"></i>
                            <small>+255 657 856 790</small>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-envelope me-2 text-primary"></i>
                            <small>bus@kgsons.co.tz</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-end">
                    <div class="d-flex align-items-center justify-content-end gap-3">
                        <span class="text-white-50">Follow Us:</span>
                        <a href="#" class="text-white"><i class="fab fa-facebook-f"></i></a>
                        <!-- <a href="#" class="text-white"><i class="fab fa-twitter"></i></a> -->
                        <a href="#" class="text-white"><i class="fab fa-instagram"></i></a>
                        <!-- <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a> -->
                        <a href="#" class="text-white"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container">
            <!-- Brand Logo -->
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                <img src="{{ asset('images/kgsons.png') }}" 
                     alt="KGSons Company Logo" 
                     class="rounded-circle me-2" 
                     style="width: 40px; height: 40px; object-fit: cover;">
                <span class="fw-bold text-primary">KGSONS</span>
                <span class="text-dark">Company Ltd</span>
            </a>

            <!-- Mobile Toggle Button -->
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#sideMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Desktop Navigation -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">About Us</a>
                    </li>
                    
                    <!-- Services Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                           Our Services
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg">

                            <li><h6 class="dropdown-header text-primary fw-bold">Facility Services</h6></li>
                            <li><a class="dropdown-item d-flex align-items-center" href="{{ route('services.catering') }}">
                                <i class="fas fa-concierge-bell me-2 text-info"></i>Catering Services</a></li>
                            <li><a class="dropdown-item d-flex align-items-center" href="{{ route('services.government-food') }}">
                                <i class="fas fa-utensils me-2 text-danger"></i>Government Food Services</a></li>

                            <li><h6 class="dropdown-header text-warning fw-bold">Electrical Services</h6></li>
                            <li><a class="dropdown-item d-flex align-items-center" href="{{ route('services.electrical-wires') }}">
                                <i class="fas fa-charging-station me-2 text-warning"></i>Electrical Wires & Cables</a></li>
                            <li><a class="dropdown-item d-flex align-items-center" href="{{ route('services.electrical-equipment') }}">
                                <i class="fas fa-bolt me-2 text-warning"></i>Electrical Equipment & Components</a></li>


                            <li><h6 class="dropdown-header text-info fw-bold">Construction Services</h6></li>
                            <li><a class="dropdown-item d-flex align-items-center" href="{{ route('services.building-products') }}">
                                <i class="fas fa-cubes me-2 text-info"></i>Structural Building Products</a></li>
                            <li><a class="dropdown-item d-flex align-items-center" href="{{ route('services.building-compound') }}">
                                <i class="fas fa-broom me-2 text-info"></i>Building & Compound Cleaning</a></li>

                            <li><a class="dropdown-item d-flex align-items-center" href="{{ route('services.labour-based') }}">
                                <i class="fas fa-road me-2 text-info"></i>Labour based works</a></li>
                            <li><hr class="dropdown-divider"></li>
                            
                            <!-- <li><h6 class="dropdown-header text-primary fw-bold">Other Services</h6></li> -->
                            <!-- <li><a class="dropdown-item d-flex align-items-center" href="{{ route('services.hotel') }}">
                                <i class="fas fa-hotel me-2 text-primary"></i>Hotel Reservation</a></li> -->
                            <!-- <li><a class="dropdown-item d-flex align-items-center" href="{{ route('services.venue-decoration') }}">
                                <i class="fas fa-location me-2 text-primary"></i>Event venue decoration</a></li> -->

                            <!-- <li><a class="dropdown-item d-flex align-items-center" href="{{ route('services.warehousing') }}">
                                <i class="fas fa-warehouse me-2 text-dark"></i>Warehousing</a></li> -->
                            <!-- <li><a class="dropdown-item d-flex align-items-center" href="{{ route('services.road-works') }}">
                                <i class="fas fa-road me-2 text-secondary"></i>Civil Road Works</a></li> -->
                        </ul>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                    </li>
                    
                    <!-- Request Quote Button -->
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-primary px-3" href="{{ route('contact') }}">
                            <i class="fas fa-envelope me-1"></i> Request Quote
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Mobile Offcanvas Menu -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="sideMenu">
        <div class="offcanvas-header border-bottom">
            <div class="d-flex align-items-center">
                <img src="{{ asset('images/kgsons.png') }}" 
                     alt="KGSons Logo"
                     class="rounded-circle me-2" 
                     style="width: 40px; height: 40px;">
                <h5 class="offcanvas-title mb-0">KGSONS Company Ltd</h5>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        
        <div class="offcanvas-body">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('home') }}">
                        <i class="fas fa-home text-primary me-2"></i> Home
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">
                        <i class="fas fa-info-circle text-info me-2"></i> About Us
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">
                        <i class="fas fa-info-circle text-mail me-2"></i> Contact Us
                    </a>
                </li>
                 <br>
                <li><h6 class="dropdown-header text-primary fw-bold">Facility Services</h6></li>
                            <li><a class="dropdown-item d-flex align-items-center" href="{{ route('services.catering') }}">
                                <i class="fas fa-concierge-bell me-2 text-info"></i>Catering Services</a></li>
                            <li><a class="dropdown-item d-flex align-items-center" href="{{ route('services.government-food') }}">
                                <i class="fas fa-utensils me-2 text-danger"></i>Government Food Services</a></li>

                            <li><h6 class="dropdown-header text-warning fw-bold">Electrical Services</h6></li>
                            <li><a class="dropdown-item d-flex align-items-center" href="{{ route('services.electrical-wires') }}">
                                <i class="fas fa-charging-station me-2 text-warning"></i>Electrical Wires & Cables</a></li>
                            <li><a class="dropdown-item d-flex align-items-center" href="{{ route('services.electrical-equipment') }}">
                                <i class="fas fa-bolt me-2 text-warning"></i>Electrical Equipment & Components</a></li>


                            <li><h6 class="dropdown-header text-info fw-bold">Construction Services</h6></li>
                            <li><a class="dropdown-item d-flex align-items-center" href="{{ route('services.building-products') }}">
                                <i class="fas fa-cubes me-2 text-info"></i>Structural Building Products</a></li>
                            <li><a class="dropdown-item d-flex align-items-center" href="{{ route('services.building-compound') }}">
                                <i class="fas fa-broom me-2 text-info"></i>Building & Compound Cleaning</a></li>

                            <li><a class="dropdown-item d-flex align-items-center" href="{{ route('services.labour-based') }}">
                                <i class="fas fa-road me-2 text-info"></i>Labour based works</a></li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('services.services') }}">
                        <i class="fas fa-project-diagram text-info me-2"></i> All Services
                    </a>
                </li>
                
                <li class="nav-item">
                    <h6 class="mt-4 mb-2 ps-3 text-uppercase text-muted small fw-bold">Company</h6>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('mission') }}">
                        <i class="fas fa-bullseye text-success me-2"></i> Mission & Vision
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('projects') }}">
                        <i class="fas fa-project-diagram text-primary me-2"></i> Our Projects
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('clients') }}">
                        <i class="fas fa-users text-info me-2"></i> Our Clients
                    </a>
                </li>
                
                <li class="nav-item mt-4">
                    <a class="btn btn-primary w-100" href="{{ route('contact') }}">
                        <i class="fas fa-envelope me-2"></i> Request Quote
                    </a>
                </li>
            </ul>
            
            <div class="mt-4 pt-3 border-top">
                <h6 class="text-uppercase text-muted small fw-bold mb-3">Contact Info</h6>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <i class="fas fa-phone-alt text-primary me-2"></i>
                        +255 657 856 790
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-envelope text-primary me-2"></i>
                        bus@kgsons.co.tz
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-map-marker-alt text-primary me-2"></i>
                        Takwimu house kigoma
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Space for fixed navbar -->
    <!-- <div class="fixeddivspace"></div> -->

    <style>
        /* Custom Styles */
        .navbar {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.25rem;
        }
        
        .nav-link {
            font-weight: 500;
            padding: 0.5rem 1rem;
            transition: all 0.3s;
        }
        
        .nav-link:hover {
            color: var(--bs-primary) !important;
        }
        
        .dropdown-menu {
            border-radius: 0.5rem;
            padding: 0.5rem 0;
        }
        
        .dropdown-item {
            padding: 0.5rem 1.5rem;
            border-radius: 0.25rem;
            margin: 0.15rem 0.5rem;
            width: auto;
            transition: all 0.2s;
        }
        
        .dropdown-item:hover {
            background-color: #f8f9fa;
            transform: translateX(5px);
        }
        
        .offcanvas {
            width: 300px;
        }
        

        @media (max-width: 991.98px) {
            .navbar-collapse {
                padding-top: 1rem;
            }
        }
    </style>
</header>