@extends('layouts.web-app')

@section('content')
<div class="container-fluid">
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-primary to-secondary text-white py-5 mb-5 rounded-lg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-3">About KGSons Company Limited</h1>
                    <p class="lead mb-4">Delivering Comprehensive Solutions Across Multiple Industries</p>
                    <p class="fs-5">We are a diversified services company providing high-quality solutions in electrical, construction, catering, and facility management sectors across Tanzania.</p>
                </div>
                <div class="col-lg-4 text-center">
                    <div class="bg-white bg-opacity-10 rounded-circle p-4 d-inline-block">
                        <i class="fas fa-building fa-5x text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <!-- Company Overview -->
        <section class="row mb-5">
            <div class="col-lg-6 mb-4">
                <h2 class="h3 fw-bold text-primary mb-3">Who We Are</h2>
                <p class="text-muted mb-3">
                    KGSons Company Limited is a multi-service enterprise established to provide comprehensive solutions across various sectors including electrical, construction, catering, and facility management. Founded with a vision to deliver excellence, we specialize in providing integrated services tailored to meet the diverse needs of our clients.
                </p>
                <p class="text-muted mb-3">
                    With extensive experience in government contracts and private sector projects, we bring professionalism, reliability, and quality to every engagement. Our team of experts ensures that all projects meet the highest standards of quality and safety.
                </p>
                <div class="d-flex align-items-center">
                    <div class="bg-primary bg-opacity-10 rounded-circle p-3 me-3">
                        <i class="fas fa-map-marker-alt text-primary"></i>
                    </div>
                    <div>
                        <h6 class="mb-1 fw-bold">Headquartered in Tanzania</h6>
                        <small class="text-muted">Serving clients nationwide</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row g-3">
                    <div class="col-6">
                        <div class="card border-0 shadow-sm h-100 text-center">
                            <div class="card-body">
                                <div class="bg-primary bg-opacity-10 rounded-circle p-3 d-inline-block mb-3">
                                    <i class="fas fa-calendar-alt text-primary fa-2x"></i>
                                </div>
                                <h5 class="fw-bold text-primary">2024</h5>
                                <p class="text-muted small mb-0">Established</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card border-0 shadow-sm h-100 text-center">
                            <div class="card-body">
                                <div class="bg-success bg-opacity-10 rounded-circle p-3 d-inline-block mb-3">
                                    <i class="fas fa-users text-success fa-2x"></i>
                                </div>
                                <h5 class="fw-bold text-success">15+</h5>
                                <p class="text-muted small mb-0">Dedicated Staff</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card border-0 shadow-sm h-100 text-center">
                            <div class="card-body">
                                <div class="bg-warning bg-opacity-10 rounded-circle p-3 d-inline-block mb-3">
                                    <i class="fas fa-project-diagram text-warning fa-2x"></i>
                                </div>
                                <h5 class="fw-bold text-warning">20+</h5>
                                <p class="text-muted small mb-0">Projects Completed</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card border-0 shadow-sm h-100 text-center">
                            <div class="card-body">
                                <div class="bg-info bg-opacity-10 rounded-circle p-3 d-inline-block mb-3">
                                    <i class="fas fa-industry text-info fa-2x"></i>
                                </div>
                                <h5 class="fw-bold text-info">7</h5>
                                <p class="text-muted small mb-0">Core Services</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Mission, Vision, Values -->
        <section class="row mb-5">
            <div class="col-lg-4 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <div class="bg-primary bg-opacity-10 rounded-circle p-4 d-inline-block mb-3">
                            <i class="fas fa-bullseye text-primary fa-3x"></i>
                        </div>
                        <h4 class="fw-bold text-primary mb-3">Our Mission</h4>
                        <p class="text-muted">
                            To provide exceptional, reliable, and comprehensive services across all our sectors, delivering value to our clients through quality workmanship and professional service.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <div class="bg-success bg-opacity-10 rounded-circle p-4 d-inline-block mb-3">
                            <i class="fas fa-eye text-success fa-3x"></i>
                        </div>
                        <h4 class="fw-bold text-success mb-3">Our Vision</h4>
                        <p class="text-muted">
                            To become Tanzania's leading multi-service company, recognized for excellence in all our service areas and for our contribution to national development.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <div class="bg-warning bg-opacity-10 rounded-circle p-4 d-inline-block mb-3">
                            <i class="fas fa-heart text-warning fa-3x"></i>
                        </div>
                        <h4 class="fw-bold text-warning mb-3">Our Values</h4>
                        <ul class="list-unstyled text-muted text-start">
                            <li class="mb-2"><i class="fas fa-check-circle text-warning me-2"></i>Commitment to quality</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-warning me-2"></i>Client satisfaction</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-warning me-2"></i>Safety first approach</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-warning me-2"></i>Integrity and transparency</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Our Services -->
        <section class="mb-5">
            <div class="text-center mb-5">
                <h2 class="display-6 fw-bold text-primary mb-3">Our Comprehensive Services</h2>
                <p class="lead text-muted">Diverse solutions to meet all your business and facility needs</p>
            </div>

            <div class="row g-4">
                <!-- Electrical Services -->
                <div class="col-lg-6 mb-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                <div class="bg-primary bg-opacity-10 rounded-circle p-3 me-3 flex-shrink-0">
                                    <i class="fas fa-bolt text-primary fa-2x"></i>
                                </div>
                                <div>
                                    <h4 class="fw-bold text-primary mb-3">Electrical Services</h4>
                                    <p class="text-muted mb-3">Complete electrical solutions for all applications.</p>
                                    <ul class="list-unstyled text-muted">
                                        <li class="mb-2"><i class="fas fa-arrow-right text-primary me-2"></i>Electrical wires and cables</li>
                                        <li class="mb-2"><i class="fas fa-arrow-right text-primary me-2"></i>Electrical equipment and components</li>
                                        <li class="mb-2"><i class="fas fa-arrow-right text-primary me-2"></i>Wiring harnesses</li>
                                        <li class="mb-2"><i class="fas fa-arrow-right text-primary me-2"></i>Industrial electrical installations</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Construction Services -->
                <div class="col-lg-6 mb-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                <div class="bg-success bg-opacity-10 rounded-circle p-3 me-3 flex-shrink-0">
                                    <i class="fas fa-hard-hat text-success fa-2x"></i>
                                </div>
                                <div>
                                    <h4 class="fw-bold text-success mb-3">Construction Services</h4>
                                    <p class="text-muted mb-3">Quality building products and construction solutions.</p>
                                    <ul class="list-unstyled text-muted">
                                        <li class="mb-2"><i class="fas fa-arrow-right text-success me-2"></i>Structural building products</li>
                                        <li class="mb-2"><i class="fas fa-arrow-right text-success me-2"></i>Blocks, bricks, tiles and flagstones</li>
                                        <li class="mb-2"><i class="fas fa-arrow-right text-success me-2"></i>Specialist civil road works</li>
                                        <!-- <li class="mb-2"><i class="fas fa-arrow-right text-success me-2"></i>Landscape architecture</li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Facility Management -->
                <div class="col-lg-6 mb-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                <div class="bg-info bg-opacity-10 rounded-circle p-3 me-3 flex-shrink-0">
                                    <i class="fas fa-building text-info fa-2x"></i>
                                </div>
                                <div>
                                    <h4 class="fw-bold text-info mb-3">Facility Management</h4>
                                    <p class="text-muted mb-3">Comprehensive facility operation services.</p>
                                    <ul class="list-unstyled text-muted">
                                        <li class="mb-2"><i class="fas fa-arrow-right text-info me-2"></i>Government food service buildings</li>
                                        <li class="mb-2"><i class="fas fa-arrow-right text-info me-2"></i>Canteens and cafeterias</li>
                                        <li class="mb-2"><i class="fas fa-arrow-right text-info me-2"></i>Building and compound cleaning</li>
                                        <!-- <li class="mb-2"><i class="fas fa-arrow-right text-info me-2"></i>Revenue collection agency services</li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Hospitality Services -->
                <div class="col-lg-6 mb-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                <div class="bg-warning bg-opacity-10 rounded-circle p-3 me-3 flex-shrink-0">
                                    <i class="fas fa-concierge-bell text-warning fa-2x"></i>
                                </div>
                                <div>
                                    <h4 class="fw-bold text-warning mb-3">Hospitality Services</h4>
                                    <p class="text-muted mb-3">Premium hospitality and event solutions.</p>
                                    <ul class="list-unstyled text-muted">
                                        <!-- <li class="mb-2"><i class="fas fa-arrow-right text-warning me-2"></i>Hotel reservation services</li> -->
                                        <!-- <li class="mb-2"><i class="fas fa-arrow-right text-warning me-2"></i>Venue decoration services</li> -->
                                        <li class="mb-2"><i class="fas fa-arrow-right text-warning me-2"></i>Catering services</li>
                                        <!-- <li class="mb-2"><i class="fas fa-arrow-right text-warning me-2"></i>Event management</li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- Specialized Services -->
                <div class="col-lg-6 mb-4">
                    <div class="card border-0 shadow-sm h-100 border-start border-4 border-danger">
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                <div class="bg-danger bg-opacity-10 rounded-circle p-3 me-3 flex-shrink-0">
                                    <i class="fas fa-star text-danger fa-2x"></i>
                                </div>
                                <div>
                                    <h4 class="fw-bold text-danger mb-3">Specialized Services</h4>
                                    <div class="badge bg-danger mb-2">PREMIUM</div>
                                    <p class="text-muted mb-3">Custom solutions for unique requirements.</p>
                                    <ul class="list-unstyled text-muted">
                                        <li class="mb-2"><i class="fas fa-arrow-right text-danger me-2"></i>Labor-based road works</li>
                                        <!-- <li class="mb-2"><i class="fas fa-arrow-right text-danger me-2"></i>Revenue collection systems</li> -->
                                        <li class="mb-2"><i class="fas fa-arrow-right text-danger me-2"></i>Government facility operations</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Why Choose Us -->
        <section class="mb-5">
            <div class="row">
                <div class="col-lg-8">
                    <h2 class="h3 fw-bold text-primary mb-4">Why Choose KGSons Company Limited?</h2>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="d-flex align-items-start">
                                <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-3 flex-shrink-0">
                                    <i class="fas fa-award text-primary"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-2">Proven Experience</h6>
                                    <p class="text-muted small mb-0">Years of successful projects with government and private sector clients.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-start">
                                <div class="bg-success bg-opacity-10 rounded-circle p-2 me-3 flex-shrink-0">
                                    <i class="fas fa-clipboard-check text-success"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-2">Quality Assurance</h6>
                                    <p class="text-muted small mb-0">Rigorous quality control processes in all our services.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-start">
                                <div class="bg-info bg-opacity-10 rounded-circle p-2 me-3 flex-shrink-0">
                                    <i class="fas fa-users text-info"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-2">Skilled Team</h6>
                                    <p class="text-muted small mb-0">Professional and certified staff in all service areas.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-start">
                                <div class="bg-warning bg-opacity-10 rounded-circle p-2 me-3 flex-shrink-0">
                                    <i class="fas fa-shield-alt text-warning"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-2">Safety Focus</h6>
                                    <p class="text-muted small mb-0">Strict adherence to safety standards in all operations.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm bg-primary text-white">
                        <div class="card-body text-center">
                            <i class="fas fa-quote-left fa-2x mb-3 opacity-50"></i>
                            <p class="mb-3">"KGSons Company Limited has consistently delivered excellent service in our government facility management. Their professionalism and attention to detail are unmatched."</p>
                            <hr class="border-white opacity-25">
                            <small>- Government Ministry Representative</small>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Information -->
        <section class="bg-primary text-white rounded-lg">
            <div class="container py-5">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <h2 class="fw-bold mb-3">Ready to Partner With Us?</h2>
                        <p class="mb-4">Contact KGSons Company Limited today to discuss how we can meet your service requirements across our diverse offerings.</p>
                    </div>
                    <div class="col-lg-4 text-center">
                        <a href="{{ route('contact') }}" class="btn btn-light btn-lg">
                            <i class="fas fa-phone me-2"></i>Contact Us Now
                        </a>
                    </div>
                </div>
                <hr class="border-white opacity-25 my-4">
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-map-marker-alt fa-2x me-3"></i>
                            <div>
                                <h6 class="mb-1">Location</h6>
                                <p class="mb-0 opacity-75">123 Business Street, Industrial Area, Tanzania</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-envelope fa-2x me-3"></i>
                            <div>
                                <h6 class="mb-1">Email</h6>
                                <p class="mb-0 opacity-75">info@kgsons.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-phone fa-2x me-3"></i>
                            <div>
                                <h6 class="mb-1">Phone</h6>
                                <p class="mb-0 opacity-75">+255 123 456 789</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<style>
.bg-gradient-to-r {
    background: linear-gradient(135deg, #007bff 0%, #28a745 100%);
}

.card:hover {
    transform: translateY(-2px);
    transition: transform 0.3s ease;
}

.rounded-lg {
    border-radius: 1rem !important;
}

.bg-opacity-10 {
    background-color: rgba(var(--bs-primary-rgb), 0.1) !important;
}
</style>
@endsection