@extends('website.services.template')

@section('service-title', 'Building & Compound Cleaning')
@section('service-description', 'Professional cleaning services for all facilities')
@section('service-image', 'https://images.unsplash.com/photo-1581578731548-c64695cc6952?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80')

@section('service-subtitle', 'Hygienic and Pristine Environments')
@section('service-lead', 'Maintaining clean, healthy spaces')
@section('service-content', 'We provide comprehensive cleaning services for office buildings, government facilities, residential compounds, and industrial sites. Our trained staff uses eco-friendly products and modern equipment to deliver exceptional results.')
@section('service-features')
    <li class="mb-2 d-flex align-items-start">
        <i class="fas fa-check-circle text-primary me-2 mt-1"></i>
        <span>Daily, weekly, or periodic cleaning</span>
    </li>
    <li class="mb-2 d-flex align-items-start">
        <i class="fas fa-check-circle text-primary me-2 mt-1"></i>
        <span>Specialized cleaning equipment</span>
    </li>
    <li class="mb-2 d-flex align-items-start">
        <i class="fas fa-check-circle text-primary me-2 mt-1"></i>
        <span>Eco-friendly cleaning products</span>
    </li>
@endsection

@section('service-secondary-image', 'https://images.unsplash.com/photo-1598300042247-d088f8ab3a91?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80')
@section('service-icon', 'fas fa-broom')
@section('service-highlight-title', 'Certified Cleaners')
@section('service-highlight-text', 'Trained staff using approved cleaning protocols')

@section('service-process-title', 'Cleaning Services')
@section('service-process-description', 'Systematic approach to facility cleanliness')
@section('service-process-steps')
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-block mb-3">
                    <span class="fs-2 fw-bold">1</span>
                </div>
                <h4 class="mb-3">Assessment</h4>
                <p class="text-muted">Evaluating your cleaning requirements</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-block mb-3">
                    <span class="fs-2 fw-bold">2</span>
                </div>
                <h4 class="mb-3">Planning</h4>
                <p class="text-muted">Creating customized cleaning schedules</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-block mb-3">
                    <span class="fs-2 fw-bold">3</span>
                </div>
                <h4 class="mb-3">Execution</h4>
                <p class="text-muted">Professional cleaning by trained staff</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-block mb-3">
                    <span class="fs-2 fw-bold">4</span>
                </div>
                <h4 class="mb-3">Inspection</h4>
                <p class="text-muted">Quality checks to ensure standards</p>
            </div>
        </div>
    </div>
@endsection

@section('service-solutions-title', 'Cleaning Services')
@section('service-solutions-description', 'Comprehensive cleaning solutions')
@section('service-solutions')
    <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded p-2 mb-3 d-inline-block">
                    <i class="fas fa-building fa-2x"></i>
                </div>
                <h4 class="mb-3">Office Cleaning</h4>
                <ul class="text-muted ps-3">
                    <li class="mb-2">Daily office maintenance</li>
                    <li class="mb-2">Carpet cleaning</li>
                    <li class="mb-2">Window washing</li>
                    <li>Sanitization services</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded p-2 mb-3 d-inline-block">
                    <i class="fas fa-home fa-2x"></i>
                </div>
                <h4 class="mb-3">Residential Cleaning</h4>
                <ul class="text-muted ps-3">
                    <li class="mb-2">Apartment complexes</li>
                    <li class="mb-2">Gated communities</li>
                    <li class="mb-2">Common areas</li>
                    <li>Landscaped areas</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded p-2 mb-3 d-inline-block">
                    <i class="fas fa-industry fa-2x"></i>
                </div>
                <h4 class="mb-3">Industrial Cleaning</h4>
                <ul class="text-muted ps-3">
                    <li class="mb-2">Factory cleaning</li>
                    <li class="mb-2">Warehouse maintenance</li>
                    <li class="mb-2">High-pressure washing</li>
                    <li>Specialized equipment</li>
                </ul>
            </div>
        </div>
    </div>
@endsection