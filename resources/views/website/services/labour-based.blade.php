@extends('website.services.template')

@section('service-title', 'Labour-Based Road Works')
@section('service-description', 'Community-focused road construction and maintenance')
@section('service-image', 'https://images.unsplash.com/photo-1519608487953-e999c86e7455?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80')

@section('service-subtitle', 'Sustainable Road Infrastructure')
@section('service-lead', 'Empowering communities through employment-intensive methods')
@section('service-content', 'We specialize in labour-based road construction and maintenance techniques that create employment opportunities while delivering quality infrastructure. Our approach combines local workforce with technical expertise to build durable rural and urban roads.')
@section('service-features')
    <li class="mb-2 d-flex align-items-start">
        <i class="fas fa-check-circle text-primary me-2 mt-1"></i>
        <span>Community employment creation</span>
    </li>
    <li class="mb-2 d-flex align-items-start">
        <i class="fas fa-check-circle text-primary me-2 mt-1"></i>
        <span>Cost-effective solutions</span>
    </li>
    <li class="mb-2 d-flex align-items-start">
        <i class="fas fa-check-circle text-primary me-2 mt-1"></i>
        <span>Environmentally friendly methods</span>
    </li>
@endsection

@section('service-secondary-image', 'https://images.unsplash.com/photo-1509316785289-025f5b846b35?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1476&q=80')
@section('service-icon', 'fas fa-people-carry')
@section('service-highlight-title', 'Community Impact')
@section('service-highlight-text', 'Creating local employment while building infrastructure')

@section('service-process-title', 'Road Construction')
@section('service-process-description', 'Our community-focused construction methodology')
@section('service-process-steps')
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-block mb-3">
                    <span class="fs-2 fw-bold">1</span>
                </div>
                <h4 class="mb-3">Community Engagement</h4>
                <p class="text-muted">Mobilizing and training local workforce</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-block mb-3">
                    <span class="fs-2 fw-bold">2</span>
                </div>
                <h4 class="mb-3">Site Preparation</h4>
                <p class="text-muted">Clearing and earthworks using manual methods</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-block mb-3">
                    <span class="fs-2 fw-bold">3</span>
                </div>
                <h4 class="mb-3">Construction</h4>
                <p class="text-muted">Labour-based road building techniques</p>
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
                <p class="text-muted">Ensuring standards while maximizing employment</p>
            </div>
        </div>
    </div>
@endsection

@section('service-solutions-title', 'Road Works')
@section('service-solutions-description', 'Comprehensive labour-based solutions')
@section('service-solutions')
    <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded p-2 mb-3 d-inline-block">
                    <i class="fas fa-road fa-2x"></i>
                </div>
                <h4 class="mb-3">New Road Construction</h4>
                <ul class="text-muted ps-3">
                    <li class="mb-2">Rural access roads</li>
                    <li class="mb-2">Feeder roads</li>
                    <li class="mb-2">Low-volume urban roads</li>
                    <li>Community pathways</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded p-2 mb-3 d-inline-block">
                    <i class="fas fa-tools fa-2x"></i>
                </div>
                <h4 class="mb-3">Road Maintenance</h4>
                <ul class="text-muted ps-3">
                    <li class="mb-2">Pothole repairs</li>
                    <li class="mb-2">Drainage maintenance</li>
                    <li class="mb-2">Shoulder repairs</li>
                    <li>Resealing</li>
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
                <h4 class="mb-3">Community Training</h4>
                <ul class="text-muted ps-3">
                    <li class="mb-2">Labour-based techniques</li>
                    <li class="mb-2">Road maintenance skills</li>
                    <li class="mb-2">Safety training</li>
                    <li>Equipment operation</li>
                </ul>
            </div>
        </div>
    </div>
@endsection