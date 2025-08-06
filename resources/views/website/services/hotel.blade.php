@extends('website.services.template')

@section('service-title', 'Hotel Reservation Services')
@section('service-description', 'Premium accommodation booking solutions for business and leisure')
@section('service-image', 'https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80')

@section('service-subtitle', 'Seamless Hotel Booking Experience')
@section('service-lead', 'Your trusted partner for accommodation solutions')
@section('service-content', 'We provide comprehensive hotel reservation services with access to premium properties across Tanzania. Our partnerships with hotels, lodges, and resorts ensure competitive rates and guaranteed availability for our clients.')
@section('service-features')
    <li class="mb-2 d-flex align-items-start">
        <i class="fas fa-check-circle text-primary me-2 mt-1"></i>
        <span>Nationwide hotel network</span>
    </li>
    <li class="mb-2 d-flex align-items-start">
        <i class="fas fa-check-circle text-primary me-2 mt-1"></i>
        <span>Corporate rates</span>
    </li>
    <li class="mb-2 d-flex align-items-start">
        <i class="fas fa-check-circle text-primary me-2 mt-1"></i>
        <span>24/7 booking support</span>
    </li>
@endsection

@section('service-secondary-image', 'https://images.unsplash.com/photo-1535827841776-24afc1e255ac?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80')
@section('service-icon', 'fas fa-concierge-bell')
@section('service-highlight-title', 'Preferred Partner')
@section('service-highlight-text', 'Official partner for major hotel chains in Tanzania')

@section('service-process-title', 'Reservation')
@section('service-process-description', 'Simple steps to secure your accommodation')
@section('service-process-steps')
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-block mb-3">
                    <span class="fs-2 fw-bold">1</span>
                </div>
                <h4 class="mb-3">Requirements</h4>
                <p class="text-muted">Tell us your accommodation needs</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-block mb-3">
                    <span class="fs-2 fw-bold">2</span>
                </div>
                <h4 class="mb-3">Options</h4>
                <p class="text-muted">We present suitable hotel options</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-block mb-3">
                    <span class="fs-2 fw-bold">3</span>
                </div>
                <h4 class="mb-3">Confirmation</h4>
                <p class="text-muted">Instant booking confirmation</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-block mb-3">
                    <span class="fs-2 fw-bold">4</span>
                </div>
                <h4 class="mb-3">Support</h4>
                <p class="text-muted">24/7 assistance during your stay</p>
            </div>
        </div>
    </div>
@endsection

@section('service-solutions-title', 'Accommodation')
@section('service-solutions-description', 'Tailored solutions for every travel need')
@section('service-solutions')
    <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded p-2 mb-3 d-inline-block">
                    <i class="fas fa-briefcase fa-2x"></i>
                </div>
                <h4 class="mb-3">Business Travel</h4>
                <ul class="text-muted ps-3">
                    <li class="mb-2">Corporate hotel rates</li>
                    <li class="mb-2">Extended stay options</li>
                    <li class="mb-2">Meeting facilities</li>
                    <li>Airport transfers</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded p-2 mb-3 d-inline-block">
                    <i class="fas fa-umbrella-beach fa-2x"></i>
                </div>
                <h4 class="mb-3">Leisure Travel</h4>
                <ul class="text-muted ps-3">
                    <li class="mb-2">Resort bookings</li>
                    <li class="mb-2">Safari lodges</li>
                    <li class="mb-2">Befront hotels</li>
                    <li>Tour packages</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded p-2 mb-3 d-inline-block">
                    <i class="fas fa-users fa-2x"></i>
                </div>
                <h4 class="mb-3">Group Travel</h4>
                <ul class="text-muted ps-3">
                    <li class="mb-2">Conference accommodations</li>
                    <li class="mb-2">School groups</li>
                    <li class="mb-2">Wedding blocks</li>
                    <li>Incentive travel</li>
                </ul>
            </div>
        </div>
    </div>
@endsection