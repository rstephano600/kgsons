@extends('website.services.template')

@section('service-title', 'Revenue Collection Services')
@section('service-description', 'Efficient and transparent revenue collection solutions')
@section('service-image', 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1511&q=80')

@section('service-subtitle', 'Professional Revenue Management')
@section('service-lead', 'Streamlining your revenue collection processes')
@section('service-content', 'We provide comprehensive revenue collection services for government agencies, municipalities, and private organizations. Our systems ensure accurate, efficient, and transparent collection of fees, taxes, and other revenues while maintaining strict accountability.')
@section('service-features')
    <li class="mb-2 d-flex align-items-start">
        <i class="fas fa-check-circle text-primary me-2 mt-1"></i>
        <span>Digital payment solutions</span>
    </li>
    <li class="mb-2 d-flex align-items-start">
        <i class="fas fa-check-circle text-primary me-2 mt-1"></i>
        <span>Cash management</span>
    </li>
    <li class="mb-2 d-flex align-items-start">
        <i class="fas fa-check-circle text-primary me-2 mt-1"></i>
        <span>Detailed reporting</span>
    </li>
@endsection

@section('service-secondary-image', 'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80')
@section('service-icon', 'fas fa-money-bill-wave')
@section('service-highlight-title', 'Certified Processes')
@section('service-highlight-text', 'Fully compliant with financial regulations')

@section('service-process-title', 'Revenue Collection')
@section('service-process-description', 'Streamlined processes for maximum efficiency')
@section('service-process-steps')
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-block mb-3">
                    <span class="fs-2 fw-bold">1</span>
                </div>
                <h4 class="mb-3">System Setup</h4>
                <p class="text-muted">Customizing collection systems to your needs</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-block mb-3">
                    <span class="fs-2 fw-bold">2</span>
                </div>
                <h4 class="mb-3">Collection</h4>
                <p class="text-muted">Efficient revenue collection processes</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-block mb-3">
                    <span class="fs-2 fw-bold">3</span>
                </div>
                <h4 class="mb-3">Reconciliation</h4>
                <p class="text-muted">Daily verification and accounting</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-block mb-3">
                    <span class="fs-2 fw-bold">4</span>
                </div>
                <h4 class="mb-3">Reporting</h4>
                <p class="text-muted">Detailed financial reports and analysis</p>
            </div>
        </div>
    </div>
@endsection

@section('service-solutions-title', 'Revenue Services')
@section('service-solutions-description', 'Comprehensive collection solutions')
@section('service-solutions')
    <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded p-2 mb-3 d-inline-block">
                    <i class="fas fa-city fa-2x"></i>
                </div>
                <h4 class="mb-3">Municipal Collections</h4>
                <ul class="text-muted ps-3">
                    <li class="mb-2">Property taxes</li>
                    <li class="mb-2">Business licenses</li>
                    <li class="mb-2">Parking fees</li>
                    <li>Utility bills</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded p-2 mb-3 d-inline-block">
                    <i class="fas fa-landmark fa-2x"></i>
                </div>
                <h4 class="mb-3">Government Revenue</h4>
                <ul class="text-muted ps-3">
                    <li class="mb-2">Tax collection</li>
                    <li class="mb-2">Fee collection</li>
                    <li class="mb-2">Permit payments</li>
                    <li>Fine payments</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded p-2 mb-3 d-inline-block">
                    <i class="fas fa-building fa-2x"></i>
                </div>
                <h4 class="mb-3">Private Sector</h4>
                <ul class="text-muted ps-3">
                    <li class="mb-2">Rent collection</li>
                    <li class="mb-2">Service fees</li>
                    <li class="mb-2">Membership dues</li>
                    <li>Event payments</li>
                </ul>
            </div>
        </div>
    </div>
@endsection