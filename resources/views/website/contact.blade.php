
@extends('layouts.web-app')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/contact.css') }}">

<!-- Hero Section -->
<section class="py-5 bg-primary text-white">
    <div class="container py-4">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-3">Get In Touch</h1>
                <p class="lead mb-4">Ready to partner with KGSONS Company Ltd? We're here to provide exceptional services across Tanzania. Contact us today for your business needs.</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form Section -->
<section class="py-5">
    <div class="container">
        <div class="row g-5">
            <!-- Contact Form -->
            <div class="col-lg-7">
                <div class="card border-0 shadow-lg">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="fw-bold mb-4">Send Us a Message</h2>
                        
                        <form action="#" method="POST">
                            @csrf
                            <!-- Success/Error Messages -->
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif

                            @if(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif
                            
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
                                        <label for="email">Email Address</label>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone Number">
                                        <label for="phone">Phone Number (Optional)</label>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="company" name="company" placeholder="Company Name">
                                        <label for="company">Company Name (Optional)</label>
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="form-floating">
                                        <select class="form-select" id="service" name="service" required>
                                            <option value="" selected disabled>Select a service</option>
                                            <option value="catering-services">Catering Services</option>
                                            <option value="electrical-wire-cable">Electrical Wire and Cable & Harness</option>
                                            <option value="government-food-services">Government Food Services (Canteens/Cafeteria)</option>
                                            <option value="building-products">Structural Building Products (Blocks/Bricks/Tiles)</option>
                                            <!-- <option value="hotel-reservation">Hotel Reservation Services</option> -->
                                            <!-- <option value="venue-decoration">Venues Decoration Services</option> -->
                                            <option value="electrical-equipment">Electrical Equipment & Components</option>
                                            <option value="civil-road-works">Specialist Civil - Labour Based Road Works</option>
                                            <option value="landscape-construction">Roads & Landscape Architecture</option>

                                            <!-- <option value="revenue-collection">Revenue Collection Agency Services</option> -->
                                            <!-- <option value="warehousing-storage">Warehousing and Storage Services</option> -->
                                            <option value="cleaning-services">Building and Compound Cleaning Services</option>
                                            <!-- <option value="consultation">General Consultation</option> -->
                                            <option value="other">Other Inquiry</option>
                                        </select>
                                        <label for="service">Service Interested In</label>
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="form-floating">
                                        <select class="form-select" id="project_budget" name="project_budget">
                                            <option value="" selected disabled>Select project budget range</option>
                                            <option value="under-1m">Under 1M TSH</option>
                                            <option value="1m-5m">1M - 5M TSH</option>
                                            <option value="5m-10m">5M - 10M TSH</option>
                                            <option value="10m-25m">10M - 25M TSH</option>
                                            <option value="25m-50m">25M - 50M TSH</option>
                                            <option value="over-50m">Over 50M TSH</option>
                                            <option value="discuss">Prefer to Discuss</option>
                                        </select>
                                        <label for="project_budget">Project Budget (Optional)</label>
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" id="message" name="message" style="height: 150px" placeholder="Your Message" required></textarea>
                                        <label for="message">Tell us about your project or requirements</label>
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="urgent" name="urgent" value="1">
                                        <label class="form-check-label" for="urgent">
                                            This is an urgent request
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-lg px-4 py-3 w-100">
                                        <i class="fas fa-paper-plane me-2"></i> Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Contact Info -->
            <div class="col-lg-5">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="fw-bold mb-4">Contact Information</h2>
                        
                        <div class="d-flex mb-4">
                            <div class="me-3 text-primary">
                                <i class="fas fa-building fa-2x"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1">Company Name</h5>
                                <p class="mb-0">KGSONS Company Ltd</p>
                                <small class="text-muted">Your trusted business partner in Tanzania</small>
                            </div>
                        </div>
                        
                        <div class="d-flex mb-4">
                            <div class="me-3 text-primary">
                                <i class="fas fa-map-marker-alt fa-2x"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1">Head Office</h5>
                                <p class="mb-0">Kigoma, Tanzania</p>
                                <small class="text-muted">Serving clients nationwide</small>
                            </div>
                        </div>
                        
                        <div class="d-flex mb-4">
                            <div class="me-3 text-primary">
                                <i class="fas fa-envelope fa-2x"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1">Email Us</h5>
                                <p class="mb-0">
                                    <a href="mailto:bus@kgsons.co.tz" class="text-decoration-none">bus@kgsons.co.tz</a>
                                </p>
                                <small class="text-muted">We respond within 24 hours</small>
                            </div>
                        </div>
                        
                        <div class="d-flex mb-4">
                            <div class="me-3 text-primary">
                                <i class="fas fa-phone-alt fa-2x"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1">Call Us</h5>
                                <p class="mb-0">
                                    <a href="tel:+255657856790" class="text-decoration-none">+255 657 856 790</a>
                                </p>
                                <small class="text-muted">Available during business hours</small>
                            </div>
                        </div>
                        
                        <hr class="my-4">
                        
                        <h5 class="fw-bold mb-3">Follow Us</h5>
                        <div class="d-flex gap-3">
                            <a href="#" class="btn btn-outline-primary rounded-circle p-2" title="Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <!-- <a href="#" class="btn btn-outline-primary rounded-circle p-2" title="Twitter">
                                <i class="fab fa-twitter"></i>
                            </a> -->
                            <a href="#" class="btn btn-outline-primary rounded-circle p-2" title="Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <!-- <a href="#" class="btn btn-outline-primary rounded-circle p-2" title="LinkedIn">
                                <i class="fab fa-linkedin-in"></i>
                            </a> -->
                            <a href="https://wa.me/255657856790" class="btn btn-outline-primary rounded-circle p-2" title="WhatsApp">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>
                        
                        <hr class="my-4">
                        
                        <h5 class="fw-bold mb-3">Business Hours</h5>
                        <ul class="list-unstyled">
                            <li class="d-flex justify-content-between mb-2">
                                <span>Monday - Sunday</span>
                                <span>7:00 AM - 00:00 PM</span>
                            </li>
                            <!-- <li class="d-flex justify-content-between">
                                <span>Sunday</span>
                                <span>By Appointment Only</span>
                            </li> -->
                        </ul>
                        
                        <div class="mt-4 p-3 bg-light rounded">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-clock text-primary me-2"></i>
                                <small class="text-muted">
                                    <strong>Emergency Services:</strong> Available 24/7 for urgent electrical and infrastructure issues
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Quick Contact Cards Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Quick Contact Options</h2>
            <p class="lead text-muted">Choose the best way to reach us</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 shadow-sm h-100 text-center">
                    <div class="card-body p-4">
                        <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-block mb-3">
                            <i class="fas fa-phone fa-2x"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Call Direct</h5>
                        <p class="text-muted mb-3">Speak with our team immediately</p>
                        <a href="tel:+255657856790" class="btn btn-primary">Call Now</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 shadow-sm h-100 text-center">
                    <div class="card-body p-4">
                        <div class="bg-success bg-opacity-10 text-success rounded-circle p-3 d-inline-block mb-3">
                            <i class="fab fa-whatsapp fa-2x"></i>
                        </div>
                        <h5 class="fw-bold mb-3">WhatsApp</h5>
                        <p class="text-muted mb-3">Quick messaging and file sharing</p>
                        <a href="https://wa.me/255657856790" class="btn btn-success">Chat on WhatsApp</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 shadow-sm h-100 text-center">
                    <div class="card-body p-4">
                        <div class="bg-info bg-opacity-10 text-info rounded-circle p-3 d-inline-block mb-3">
                            <i class="fas fa-envelope fa-2x"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Email Us</h5>
                        <p class="text-muted mb-3">Detailed project discussions</p>
                        <a href="mailto:bus@kgsons.co.tz" class="btn btn-info">Send Email</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 shadow-sm h-100 text-center">
                    <div class="card-body p-4">
                        <div class="bg-warning bg-opacity-10 text-warning rounded-circle p-3 d-inline-block mb-3">
                            <i class="fas fa-calendar-alt fa-2x"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Schedule Meeting</h5>
                        <p class="text-muted mb-3">Book a consultation session</p>
                        <a href="mailto:bus@kgsons.co.tz?subject=Meeting Request" class="btn btn-warning">Book Meeting</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Service Areas Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Our Service Areas</h2>
            <p class="lead text-muted">We serve clients across Tanzania</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4 text-center">
                        <i class="fas fa-map-marker-alt text-primary fa-2x mb-3"></i>
                        <h5 class="fw-bold mb-3">Kigoma Region</h5>
                        <p class="text-muted">Our main operational hub with full service coverage</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4 text-center">
                        <i class="fas fa-building text-primary fa-2x mb-3"></i>
                        <h5 class="fw-bold mb-3">Dodoma & Central</h5>
                        <p class="text-muted">Government and institutional projects</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4 text-center">
                        <i class="fas fa-globe-africa text-primary fa-2x mb-3"></i>
                        <h5 class="fw-bold mb-3">Nationwide</h5>
                        <p class="text-muted">Major projects across all regions of Tanzania</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-primary text-white p-3">
                        <h5 class="mb-0"><i class="fas fa-map-marker-alt me-2"></i>Find Us in Tanzania</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="ratio ratio-16x9">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127298.25105883698!2d39.20000000000001!3d-6.82!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x185c4c8d7ee0780d%3A0x5bf6f8a11fc4eda1!2sDar%20es%20Salaam%2C%20Tanzania!5e0!3m2!1sen!2stz!4v1699999999999!5m2!1sen!2stz" 
                                    style="border:0;" 
                                    allowfullscreen="" 
                                    loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Frequently Asked Questions</h2>
            <p class="lead text-muted">Quick answers to common questions</p>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="accordion" id="contactFaqAccordion">
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h3 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                How quickly do you respond to inquiries?
                            </button>
                        </h3>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#contactFaqAccordion">
                            <div class="accordion-body">
                                We typically respond to all inquiries within 24 hours during business days. For urgent matters, please call us directly at 0657856790 or mark your message as urgent in the contact form.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h3 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Do you provide free consultations?
                            </button>
                        </h3>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#contactFaqAccordion">
                            <div class="accordion-body">
                                Yes, we offer free initial consultations for all our services. This helps us understand your requirements and provide accurate recommendations and quotations.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h3 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                What information should I include in my inquiry?
                            </button>
                        </h3>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#contactFaqAccordion">
                            <div class="accordion-body">
                                Please include details about your project scope, timeline, budget range, and any specific requirements. The more information you provide, the better we can assist you with a tailored solution.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item border-0 shadow-sm">
                        <h3 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Can you travel to project sites outside in The country?
                            </button>
                        </h3>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#contactFaqAccordion">
                            <div class="accordion-body">
                                Absolutely! We serve clients nationwide across Tanzania. Travel arrangements and associated costs will be discussed during the consultation phase based on your project location and requirements.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection