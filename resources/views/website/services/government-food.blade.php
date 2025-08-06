@extends('website.services.template')

@section('service-title', 'Government Food Services Facilities Management')
@section('service-description', 'Professional operation and management of government canteens and cafeterias')
@section('service-image', 'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80')

@section('service-subtitle', 'Efficient Food Service Facility Management')
@section('service-lead', 'Quality food services for government institutions')
@section('service-content', 'We specialize in managing government food service facilities including canteens, cafeterias, and dining halls. Our comprehensive services ensure hygienic, efficient, and cost-effective operations that meet all government standards.')
@section('service-features')
    <li class="mb-2 d-flex align-items-start">
        <i class="fas fa-check-circle text-primary me-2 mt-1"></i>
        <span>Daily meal services</span>
    </li>
    <li class="mb-2 d-flex align-items-start">
        <i class="fas fa-check-circle text-primary me-2 mt-1"></i>
        <span>Hygiene and safety compliance</span>
    </li>
    <li class="mb-2 d-flex align-items-start">
        <i class="fas fa-check-circle text-primary me-2 mt-1"></i>
        <span>Nutritionally balanced menus</span>
    </li>
@endsection

@section('service-secondary-image', 'https://images.unsplash.com/photo-1514320291840-2e0a9bf2a9ae?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80')
@section('service-icon', 'fas fa-utensils')
@section('service-highlight-title', 'Certified Caterers')
@section('service-highlight-text', 'Our staff are trained in food safety and hygiene standards')

@section('service-process-title', 'Food Facility Management')
@section('service-process-description', 'End-to-end management of government food services')
@section('service-process-steps')
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-block mb-3">
                    <span class="fs-2 fw-bold">1</span>
                </div>
                <h4 class="mb-3">Needs Assessment</h4>
                <p class="text-muted">Understanding your facility requirements and staff needs</p>
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
                <p class="text-muted">Creating nutritious, balanced meal plans</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-block mb-3">
                    <span class="fs-2 fw-bold">3</span>
                </div>
                <h4 class="mb-3">Daily Operations</h4>
                <p class="text-muted">Professional management of all food services</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-block mb-3">
                    <span class="fs-2 fw-bold">4</span>
                </div>
                <h4 class="mb-3">Quality Control</h4>
                <p class="text-muted">Regular inspections and feedback systems</p>
            </div>
        </div>
    </div>
@endsection

@section('service-solutions-title', 'Food Services')
@section('service-solutions-description', 'Comprehensive solutions for government food facilities')
@section('service-solutions')
    <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded p-2 mb-3 d-inline-block">
                    <i class="fas fa-school fa-2x"></i>
                </div>
                <h4 class="mb-3">Institutional Canteens</h4>
                <ul class="text-muted ps-3">
                    <li class="mb-2">Government office cafeterias</li>
                    <li class="mb-2">School feeding programs</li>
                    <li class="mb-2">Hospital food services</li>
                    <li>Military dining facilities</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded p-2 mb-3 d-inline-block">
                    <i class="fas fa-chess-knight fa-2x"></i>
                </div>
                <h4 class="mb-3">VIP Dining</h4>
                <ul class="text-muted ps-3">
                    <li class="mb-2">Executive dining rooms</li>
                    <li class="mb-2">Official functions catering</li>
                    <li class="mb-2">High-level meeting refreshments</li>
                    <li>Diplomatic events</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded p-2 mb-3 d-inline-block">
                    <i class="fas fa-truck fa-2x"></i>
                </div>
                <h4 class="mb-3">Mobile Food Services</h4>
                <ul class="text-muted ps-3">
                    <li class="mb-2">Field operations catering</li>
                    <li class="mb-2">Remote location food supply</li>
                    <li class="mb-2">Emergency response feeding</li>
                    <li>Temporary facility management</li>
                </ul>
            </div>
        </div>
    </div>
@endsection