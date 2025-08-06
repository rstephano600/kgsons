@extends('layouts.web-app')

@section('title', 'Home - KGSons Company Ltd')

@section('content')
<div class="container-fluid py-5">
    <!-- Hero Section -->
<section class="hero-section bg-light rounded-3 py-5 px-4 px-md-5 mb-5 shadow-sm">
    <div class="container">
        <div class="row align-items-center gy-4">
            <!-- Text Section -->
            <div class="col-lg-6 order-2 order-lg-1 text-center text-lg-start">
                <h1 class="display-5 fw-bold mb-4">Powering Progress Across Industries</h1>
                <p class="lead mb-4">
                    KGSons Company Ltd delivers expert solutions in <strong>electrical installations</strong>, 
                    <strong>labour based works</strong>, <strong>building materials</strong>, 
                    <strong>government foods</strong>, <strong>catering</strong>, and more.
                </p>
                <div class="d-flex justify-content-center justify-content-lg-start gap-3">
                    <a href="{{ route('services.services') }}" class="btn btn-primary btn-lg px-4">Explore Services</a>
                    <a href="{{ route('contact') }}" class="btn btn-outline-primary btn-lg px-4">Get in Touch</a>
                </div>
            </div>

            <!-- Image Section -->
            <div class="col-lg-6 order-1 order-lg-2 text-center">
<img src="https://images.pexels.com/photos/3183197/pexels-photo-3183197.jpeg" 
     alt="KGSons Company Services Overview" 
     class="img-fluid rounded-4 shadow-lg">

            </div>
        </div>
    </div>
</section>


    <!-- Services Section -->
<section class="services-section py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title fw-bold display-5">Our Comprehensive Services</h2>
            <p class="lead text-muted">Delivering excellence across multiple industries</p>
        </div>
        
        <div class="row g-4">

                        <!-- Catering Services -->
            <div class="col-md-6 col-lg-4">
                <div class="service-preview card h-100 border-0 shadow-sm transition-all">
                    <div class="card-body text-center p-4">
                        <div class="service-icon bg-primary bg-opacity-10 text-primary rounded-circle mx-auto mb-4">
                            <i class="fas fa-concierge-bell fa-2x"></i>
                        </div>
                        <h3 class="service-name h5 fw-bold">Catering Services</h3>
                        <p class="service-description text-muted">Professional catering for corporate events, weddings, and special occasions.</p>
                        <a href="{{ route('services.catering') }}" class="service-link btn btn-link text-primary text-decoration-none">
                            Learn more <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Government Food Services -->
            <div class="col-md-6 col-lg-4">
                <div class="service-preview card h-100 border-0 shadow-sm transition-all">
                    <div class="card-body text-center p-4">
                        <div class="service-icon bg-success bg-opacity-10 text-success rounded-circle mx-auto mb-4">
                            <i class="fas fa-utensils fa-2x"></i>
                        </div>
                        <h3 class="service-name h5 fw-bold">Government Food Services</h3>
                        <p class="service-description text-muted">Professional operation and management of government canteens, cafeterias, and food facilities.</p>
                        <a href="{{ route('services.government-food') }}" class="service-link btn btn-link text-primary text-decoration-none">
                            Learn more <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            
             <!-- Electrical Wires & Cables -->
            <div class="col-md-6 col-lg-4">
                <div class="service-preview card h-100 border-0 shadow-sm transition-all">
                    <div class="card-body text-center p-4">
                        <div class="service-icon bg-primary bg-opacity-10 text-primary rounded-circle mx-auto mb-4">
                            <i class="fas fa-bolt fa-2x"></i>
                        </div>
                        <h3 class="service-name h5 fw-bold">Electrical Wires & Cables</h3>
                        <p class="service-description text-muted">High-quality electrical wiring solutions for residential, commercial, and industrial applications.</p>
                        <a href="{{ route('services.electrical-wires') }}" class="service-link btn btn-link text-primary text-decoration-none">
                            Learn more <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Electrical Equipment -->
            <div class="col-md-6 col-lg-4">
                <div class="service-preview card h-100 border-0 shadow-sm transition-all">
                    <div class="card-body text-center p-4">
                        <div class="service-icon bg-secondary bg-opacity-10 text-secondary rounded-circle mx-auto mb-4">
                            <i class="fas fa-plug fa-2x"></i>
                        </div>
                        <h3 class="service-name h5 fw-bold">Electrical Equipment and components</h3>
                        <p class="service-description text-muted">Comprehensive range of electrical components and supplies for all your power needs.</p>
                        <a href="{{ route('services.electrical-equipment') }}" class="service-link btn btn-link text-primary text-decoration-none">
                            Learn more <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>

                        <!-- Civil Road Works -->
            <div class="col-md-6 col-lg-4">
                <div class="service-preview card h-100 border-0 shadow-sm transition-all">
                    <div class="card-body text-center p-4">
                        <div class="service-icon bg-dark bg-opacity-10 text-dark rounded-circle mx-auto mb-4">
                            <i class="fas fa-road fa-2x"></i>
                        </div>
                        <h3 class="service-name h5 fw-bold">Labour Based Works </h3>
                        <p class="service-description text-muted">Specialist labor-based  services.</p>
                        <a href="{{ route('services.labour-based') }}" class="service-link btn btn-link text-primary text-decoration-none">
                            Learn more <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>


            <!-- Structural Building Products -->
            <div class="col-md-6 col-lg-4">
                <div class="service-preview card h-100 border-0 shadow-sm transition-all">
                    <div class="card-body text-center p-4">
                        <div class="service-icon bg-info bg-opacity-10 text-info rounded-circle mx-auto mb-4">
                            <i class="fas fa-cubes fa-2x"></i>
                        </div>
                        <h3 class="service-name h5 fw-bold">Structural Building Products</h3>
                        <p class="service-description text-muted">High-quality blocks, bricks, tiles, and flagstones for all your construction needs.</p>
                        <a href="{{ route('services.building-products') }}" class="service-link btn btn-link text-primary text-decoration-none">
                            Learn more <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Structural Building Products -->
            <div class="col-md-6 col-lg-4">
                <div class="service-preview card h-100 border-0 shadow-sm transition-all">
                    <div class="card-body text-center p-4">
                        <div class="service-icon bg-info bg-opacity-10 text-info rounded-circle mx-auto mb-4">
                            <i class="fas fa-broom fa-2x"></i>
                        </div>
                        <h3 class="service-name h5 fw-bold">Building and Compound Cleaning</h3>
                        <p class="service-description text-muted">High-quality cleaning, with full prepared cleaning equipments.</p>
                        <a href="{{ route('services.building-compound') }}" class="service-link btn btn-link text-primary text-decoration-none">
                            Learn more <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Hotel Reservation Services -->
            <!-- <div class="col-md-6 col-lg-4">
                <div class="service-preview card h-100 border-0 shadow-sm transition-all">
                    <div class="card-body text-center p-4">
                        <div class="service-icon bg-warning bg-opacity-10 text-warning rounded-circle mx-auto mb-4">
                            <i class="fas fa-hotel fa-2x"></i>
                        </div>
                        <h3 class="service-name h5 fw-bold">Hotel Reservation Services</h3>
                        <p class="service-description text-muted">Premium hotel booking and accommodation services for business and leisure travelers.</p>
                        <a href="{{ route('services.hotel') }}" class="service-link btn btn-link text-primary text-decoration-none">
                            Learn more <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div> -->
            
            <!-- Venue Decoration Services -->
            <!-- <div class="col-md-6 col-lg-4">
                <div class="service-preview card h-100 border-0 shadow-sm transition-all">
                    <div class="card-body text-center p-4">
                        <div class="service-icon bg-danger bg-opacity-10 text-danger rounded-circle mx-auto mb-4">
                            <i class="fas fa-paint-brush fa-2x"></i>
                        </div>
                        <h3 class="service-name h5 fw-bold">Venue Decoration Services</h3>
                        <p class="service-description text-muted">Transform your events with our professional venue decoration and design services.</p>
                        <a href="#" class="service-link btn btn-link text-primary text-decoration-none">
                            Learn more <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div> -->
            

            
            <!-- Warehousing -->
            <!-- <div class="col-md-6 col-lg-4">
                <div class="service-preview card h-100 border-0 shadow-sm transition-all">
                    <div class="card-body text-center p-4">
                        <div class="service-icon bg-success bg-opacity-10 text-success rounded-circle mx-auto mb-4">
                            <i class="fas fa-warehouse fa-2x"></i>
                        </div>
                        <h3 class="service-name h5 fw-bold">Warehousing</h3>
                        <p class="service-description text-muted">Secure and efficient storage solutions for your goods and inventory.</p>
                        <a href="{{ route('services.warehousing') }}" class="service-link btn btn-link text-primary text-decoration-none">
                            Learn more <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</section>

<style>
    .services-section {
        position: relative;
    }
    
    .service-preview {
        transition: all 0.3s ease;
        border-radius: 10px;
        overflow: hidden;
    }
    
    .service-preview:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    
    .service-icon {
        width: 70px;
        height: 70px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }
    
    .service-preview:hover .service-icon {
        background-color: var(--bs-primary) !important;
        color: white !important;
    }
    
    .service-name {
        transition: color 0.3s ease;
    }
    
    .service-preview:hover .service-name {
        color: var(--bs-primary);
    }
    
    .service-link {
        transition: all 0.3s ease;
    }
    
    .service-preview:hover .service-link {
        padding-right: 5px;
    }
</style>
    
    <!-- About Section -->
    <section id="about" class="mb-5 py-5 bg-light rounded-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <img src="{{ asset('images/home page.jpg') }}" alt="About KGSons" class="img-fluid rounded-3 shadow">
                </div>
                <div class="col-lg-6">
                    <h2 class="fw-bold mb-4">About KGSons Company Ltd</h2>
                    <p class="lead">A trusted name in multiple service sectors since our establishment.</p>
                    <p>We pride ourselves on delivering exceptional quality across all our service offerings, from construction materials to catering services. Our team of professionals ensures that every project meets the highest standards.</p>
                    <div class="d-flex gap-3 mt-4">
                        <div class="flex-shrink-0">
                            <i class="fas fa-award text-primary fa-3x"></i>
                        </div>
                        <div>
                            <h5 class="mb-1">Certified Professionals</h5>
                            <p class="mb-0">Our team consists of certified experts in their respective fields.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="mb-5">
        <div class="row">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h2 class="fw-bold mb-4">Get In Touch</h2>
                <form>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Your Name</label>
                            <input type="text" class="form-control" id="name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="col-12">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="subject" required>
                        </div>
                        <div class="col-12">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" rows="5" required></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6">
                <div class="bg-light p-4 h-100 rounded-3">
                    <h3 class="fw-bold mb-4">Contact Information</h3>
                    <ul class="list-unstyled">
                        <li class="mb-3">
                            <i class="fas fa-map-marker-alt text-primary me-2"></i>
                            <span>Takwimu house, kigoma</span>
                        </li>
                        <li class="mb-3">
                            <i class="fas fa-phone text-primary me-2"></i>
                            <span>+123 456 7890</span>
                        </li>
                        <li class="mb-3">
                            <i class="fas fa-envelope text-primary me-2"></i>
                            <span>info@kgsons.com</span>
                        </li>
                        <li class="mb-3">
                            <i class="fas fa-clock text-primary me-2"></i>
                            <span>Monday - Sunday: 8:00 AM - 10:00 PM</span>
                        </li>
                    </ul>
                    <div class="mt-4">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.952912260219!2d3.375295414266605!3d6.5276316452788785!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b8b2ae68280c1%3A0xdc9e87a367c3d9cb!2sLagos!5e0!3m2!1sen!2sng!4v1625062441237!5m2!1sen!2sng" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('scripts')
<script>
    // Additional page-specific JavaScript can go here
</script>
@endsection