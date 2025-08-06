@extends('layouts.web-app')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/services.css') }}">

<!-- Hero Section -->
<section class="py-5 bg-primary text-white">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h1 class="display-4 fw-bold mb-4">{{$service_title ?? 'Professional Services'}}</h1>
                <p class="lead mb-4">{{$service_description ?? 'KGSONS Company Ltd delivers exceptional services across Tanzania with a commitment to quality, reliability, and customer satisfaction.'}}</p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="mailto:bus@kgsons.co.tz" class="btn btn-light btn-lg px-4">Get a Free Consultation</a>
                    <a href="tel:+255657856790" class="btn btn-outline-light btn-lg px-4">Call: 0657856790</a>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="{{$hero_image ?? 'https://images.unsplash.com/photo-1560472354-b33ff0c44a43?ixlib=rb-4.0.3&auto=format&fit=crop&w=1528&q=80'}}" 
                     alt="{{$service_title ?? 'KGSONS Services'}}" 
                     class="img-fluid rounded-3 shadow">
            </div>
        </div>
    </div>
</section>

<!-- Introduction Section -->
<section class="py-5">
    <div class="container py-4">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <h2 class="fw-bold mb-4">Excellence in Every Service We Provide</h2>
                <p class="lead">KGSONS Company Ltd has been serving Tanzania with comprehensive business solutions across multiple industries.</p>
                <p>Based in Tanzania, we combine local expertise with international standards to deliver services that meet and exceed our clients' expectations. Our team of professionals is committed to providing reliable, cost-effective solutions that drive business success.</p>
                <ul class="list-unstyled">
                    <li class="mb-2 d-flex align-items-start">
                        <i class="fas fa-check-circle text-primary me-2 mt-1"></i>
                        <span>Licensed and certified professionals</span>
                    </li>
                    <li class="mb-2 d-flex align-items-start">
                        <i class="fas fa-check-circle text-primary me-2 mt-1"></i>
                        <span>Competitive pricing across all services</span>
                    </li>
                    <li class="mb-2 d-flex align-items-start">
                        <i class="fas fa-check-circle text-primary me-2 mt-1"></i>
                        <span>24/7 customer support</span>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?ixlib=rb-4.0.3&auto=format&fit=crop&w=1469&q=80" 
                         alt="KGSONS team at work" 
                         class="img-fluid">
                    <div class="card-body bg-light">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 bg-primary text-white rounded-circle p-3 me-3">
                                <i class="fas fa-trophy fa-lg"></i>
                            </div>
                            <div>
                                <h5 class="mb-0">Trusted by Tanzanian Businesses</h5>
                                <p class="mb-0 text-muted">Proven track record of excellence</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Core Services Section -->
<section class="py-5">
    <div class="container py-4">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Our Core Services</h2>
            <p class="lead text-muted">Comprehensive solutions for diverse business needs</p>
        </div>
        
        <div class="row g-4">
            <!-- Electrical Services -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="bg-primary bg-opacity-10 text-primary rounded p-2 mb-3 d-inline-block">
                            <i class="fas fa-bolt fa-2x"></i>
                        </div>
                        <h4 class="mb-3">Electrical Solutions</h4>
                        <ul class="text-muted ps-3">
                            <li class="mb-2">Electrical wire and cable supply</li>
                            <li class="mb-2">Wire harness manufacturing</li>
                            <li class="mb-2">Electrical equipment & components</li>
                            <li>Professional installation services</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Construction Materials -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="bg-primary bg-opacity-10 text-primary rounded p-2 mb-3 d-inline-block">
                            <i class="fas fa-building fa-2x"></i>
                        </div>
                        <h4 class="mb-3">Construction Materials</h4>
                        <ul class="text-muted ps-3">
                            <li class="mb-2">Structural building products</li>
                            <li class="mb-2">Blocks, bricks, and tiles</li>
                            <li class="mb-2">Flagstones and pavers</li>
                            <li>Quality construction materials</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Civil Engineering -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="bg-primary bg-opacity-10 text-primary rounded p-2 mb-3 d-inline-block">
                            <i class="fas fa-road fa-2x"></i>
                        </div>
                        <h4 class="mb-3">Civil Engineering</h4>
                        <ul class="text-muted ps-3">
                            <li class="mb-2">Labour-based road works</li>
                            <li class="mb-2">Landscape architecture</li>
                            <li class="mb-2">Construction materials supply</li>
                            <li>Infrastructure development</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Hospitality Services -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="bg-primary bg-opacity-10 text-primary rounded p-2 mb-3 d-inline-block">
                            <i class="fas fa-hotel fa-2x"></i>
                        </div>
                        <h4 class="mb-3">Hospitality Services</h4>
                        <ul class="text-muted ps-3">
                            <li class="mb-2">Hotel reservation services</li>
                            <li class="mb-2">Event venue decoration</li>
                            <li class="mb-2">Professional catering</li>
                            <li>Complete event management</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Food Services -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="bg-primary bg-opacity-10 text-primary rounded p-2 mb-3 d-inline-block">
                            <i class="fas fa-utensils fa-2x"></i>
                        </div>
                        <h4 class="mb-3">Food Services</h4>
                        <ul class="text-muted ps-3">
                            <li class="mb-2">Government facility canteens</li>
                            <li class="mb-2">Cafeteria operations</li>
                            <li class="mb-2">Corporate catering</li>
                            <li>Food service management</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Business Services -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="bg-primary bg-opacity-10 text-primary rounded p-2 mb-3 d-inline-block">
                            <i class="fas fa-briefcase fa-2x"></i>
                        </div>
                        <h4 class="mb-3">Business Services</h4>
                        <ul class="text-muted ps-3">
                            <li class="mb-2">Revenue collection agency</li>
                            <li class="mb-2">Warehousing & storage</li>
                            <li class="mb-2">Building cleaning services</li>
                            <li>Compound maintenance</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose KGSONS Section -->
<section class="py-5 bg-light">
    <div class="container py-4">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Why Choose KGSONS Company Ltd</h2>
            <p class="lead text-muted">Your trusted partner for business solutions in Tanzania</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm text-center">
                    <div class="card-body p-4">
                        <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-block mb-3">
                            <i class="fas fa-award fa-2x"></i>
                        </div>
                        <h4 class="mb-3">Local Expertise</h4>
                        <p class="text-muted">Deep understanding of the Tanzanian market and regulatory environment.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm text-center">
                    <div class="card-body p-4">
                        <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-block mb-3">
                            <i class="fas fa-handshake fa-2x"></i>
                        </div>
                        <h4 class="mb-3">Reliable Partnership</h4>
                        <p class="text-muted">Committed to building long-term relationships with our clients.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm text-center">
                    <div class="card-body p-4">
                        <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-block mb-3">
                            <i class="fas fa-clock fa-2x"></i>
                        </div>
                        <h4 class="mb-3">Timely Delivery</h4>
                        <p class="text-muted">We understand the importance of deadlines and deliver on time, every time.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm text-center">
                    <div class="card-body p-4">
                        <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-block mb-3">
                            <i class="fas fa-dollar-sign fa-2x"></i>
                        </div>
                        <h4 class="mb-3">Competitive Pricing</h4>
                        <p class="text-muted">Quality services at competitive rates that fit your budget.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-5">
    <div class="container py-4">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Frequently Asked Questions</h2>
            <p class="lead text-muted">Common questions about our services</p>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h3 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                What areas of Tanzania do you serve?
                            </button>
                        </h3>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                KGSONS Company Ltd serves clients across Tanzania. While our main office is located in Dar es Salaam, we have the capability to provide services nationwide through our network of partners and field teams.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h3 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Do you provide free consultations?
                            </button>
                        </h3>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes, we offer free initial consultations to understand your requirements and provide recommendations. This helps us propose the most suitable solutions for your specific needs.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h3 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                What are your payment terms?
                            </button>
                        </h3>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                We offer flexible payment terms depending on the project scope and duration. Typically, we require a deposit to begin work with the balance paid according to agreed milestones or upon completion.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h3 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Are you licensed and insured?
                            </button>
                        </h3>
                        <div id="collapseeFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes, KGSONS Company Ltd is fully licensed to operate in Tanzania and carries appropriate insurance coverage for all our service areas. We comply with all relevant regulations and industry standards.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h3 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                How can I get a quote for services?
                            </button>
                        </h3>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                You can request a quote by calling us at 0657856790, emailing bus@kgsons.co.tz, or filling out our online contact form. We'll respond promptly with a detailed quote based on your requirements.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item border-0 shadow-sm">
                        <h3 class="accordion-header" id="headingSix">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                Do you offer maintenance services?
                            </button>
                        </h3>
                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes, we provide ongoing maintenance and support services for many of our solutions. This includes regular inspections, preventive maintenance, and emergency support when needed.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Information Section -->
<section class="py-5 bg-dark text-white">
    <div class="container py-4">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="text-center">
                    <div class="bg-primary bg-opacity-20 text-primary rounded-circle p-3 d-inline-block mb-3">
                        <i class="fas fa-phone fa-2x"></i>
                    </div>
                    <h4 class="mb-3">Call Us</h4>
                    <p class="lead">0657856790</p>
                    <p class="text-muted">Monday - Friday: 8:00 AM - 6:00 PM<br>Saturday: 9:00 AM - 2:00 PM</p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="text-center">
                    <div class="bg-primary bg-opacity-20 text-primary rounded-circle p-3 d-inline-block mb-3">
                        <i class="fas fa-envelope fa-2x"></i>
                    </div>
                    <h4 class="mb-3">Email Us</h4>
                    <p class="lead">bus@kgsons.co.tz</p>
                    <p class="text-muted">We respond to all emails within 24 hours</p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="text-center">
                    <div class="bg-primary bg-opacity-20 text-primary rounded-circle p-3 d-inline-block mb-3">
                        <i class="fas fa-map-marker-alt fa-2x"></i>
                    </div>
                    <h4 class="mb-3">Visit Us</h4>
                    <p class="lead">Dar es Salaam, Tanzania</p>
                    <p class="text-muted">Serving clients across Tanzania</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Final CTA Section -->
<section class="py-5 bg-primary text-white">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="fw-bold mb-4">Ready to Work with KGSONS?</h2>
                <p class="lead mb-5">Contact us today to discuss your project requirements and get a free consultation.</p>
                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <a href="mailto:bus@kgsons.co.tz" class="btn btn-light btn-lg px-4">Get a Free Quote</a>
                    <a href="tel:+255657856790" class="btn btn-outline-light btn-lg px-4">
                        <i class="fas fa-phone me-2"></i> Call: 0657856790
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection