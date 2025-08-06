@extends('website.services.template')

@section('service-title', 'Professional Catering Services')
@section('service-description', 'Exceptional food services for all occasions')
@section('service-image', 'https://images.unsplash.com/photo-1555244162-803834f70033?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80')

@section('service-subtitle', 'Culinary Excellence for Every Event')
@section('service-lead', 'Delicious food and impeccable service')
@section('service-content', 'We provide comprehensive catering services for corporate events, weddings, government functions, and private parties. Our team of chefs creates diverse menus using fresh, high-quality ingredients while our service staff ensures flawless execution.')
@section('service-features')
    <li class="mb-2 d-flex align-items-start">
        <i class="fas fa-check-circle text-primary me-2 mt-1"></i>
        <span>Custom menu development</span>
    </li>
    <li class="mb-2 d-flex align-items-start">
        <i class="fas fa-check-circle text-primary me-2 mt-1"></i>
        <span>Professional service staff</span>
    </li>
    <li class="mb-2 d-flex align-items-start">
        <i class="fas fa-check-circle text-primary me-2 mt-1"></i>
        <span>Full event catering solutions</span>
    </li>
@endsection

@section('service-secondary-image', 'https://images.unsplash.com/photo-1547592180-85f173990554?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80')
@section('service-icon', 'fas fa-utensils')
@section('service-highlight-title', 'Hygiene Certified')
@section('service-highlight-text', 'Fully compliant with food safety regulations')

@section('service-process-title', 'Catering Process')
@section('service-process-description', 'From planning to perfect execution')
@section('service-process-steps')
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-block mb-3">
                    <span class="fs-2 fw-bold">1</span>
                </div>
                <h4 class="mb-3">Consultation</h4>
                <p class="text-muted">Understanding your event needs and preferences</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-block mb-3">
                    <span class="fs-2 fw-bold">2</span>
                </div>
                <h4 class="mb-3">Menu Planning</h4>
                <p class="text-muted">Creating customized menus for your event</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-block mb-3">
                    <span class="fs-2 fw-bold">3</span>
                </div>
                <h4 class="mb-3">Preparation</h4>
                <p class="text-muted">Professional cooking with fresh ingredients</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-block mb-3">
                    <span class="fs-2 fw-bold">4</span>
                </div>
                <h4 class="mb-3">Service</h4>
                <p class="text-muted">Impeccable food presentation and service</p>
            </div>
        </div>
    </div>
@endsection

@section('service-solutions-title', 'Catering Services')
@section('service-solutions-description', 'Tailored solutions for every event type')
@section('service-solutions')
    <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded p-2 mb-3 d-inline-block">
                    <i class="fas fa-briefcase fa-2x"></i>
                </div>
                <h4 class="mb-3">Corporate Catering</h4>
                <ul class="text-muted ps-3">
                    <li class="mb-2">Business meetings</li>
                    <li class="mb-2">Conferences</li>
                    <li class="mb-2">Product launches</li>
                    <li>Corporate parties</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded p-2 mb-3 d-inline-block">
                    <i class="fas fa-glass-cheers fa-2x"></i>
                </div>
                <h4 class="mb-3">Wedding Catering</h4>
                <ul class="text-muted ps-3">
                    <li class="mb-2">Reception dinners</li>
                    <li class="mb-2">Cocktail parties</li>
                    <li class="mb-2">Traditional ceremonies</li>
                    <li>Buffet or plated service</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded p-2 mb-3 d-inline-block">
                    <i class="fas fa-user-tie fa-2x"></i>
                </div>
                <h4 class="mb-3">Government Functions</h4>
                <ul class="text-muted ps-3">
                    <li class="mb-2">Official dinners</li>
                    <li class="mb-2">Diplomatic events</li>
                    <li class="mb-2">Award ceremonies</li>
                    <li>High-level meetings</li>
                </ul>
            </div>
        </div>
    </div>
@endsection