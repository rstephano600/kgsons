@extends('website.services.template')

@section('service-title', 'Warehousing & Storage')
@section('service-description', 'Secure and efficient storage solutions')
@section('service-image', 'https://images.unsplash.com/photo-1483728642387-6c3bdd6c93e5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1476&q=80')

@section('service-subtitle', 'Professional Storage Solutions')
@section('service-lead', 'Optimizing your inventory management')
@section('service-content', 'We offer secure, climate-controlled warehousing and storage facilities with advanced inventory management systems. Our services help businesses streamline their supply chain and reduce operational costs.')
@section('service-features')
    <li class="mb-2 d-flex align-items-start">
        <i class="fas fa-check-circle text-primary me-2 mt-1"></i>
        <span>Secure storage facilities</span>
    </li>
    <li class="mb-2 d-flex align-items-start">
        <i class="fas fa-check-circle text-primary me-2 mt-1"></i>
        <span>Climate-controlled options</span>
    </li>
    <li class="mb-2 d-flex align-items-start">
        <i class="fas fa-check-circle text-primary me-2 mt-1"></i>
        <span>Inventory management</span>
    </li>
@endsection

@section('service-secondary-image', 'https://images.unsplash.com/photo-1602108987421-11f707d9e2d3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80')
@section('service-icon', 'fas fa-boxes')
@section('service-highlight-title', 'Certified Facilities')
@section('service-highlight-text', 'ISO-certified warehousing with 24/7 security')

@section('service-process-title', 'Storage Solutions')
@section('service-process-description', 'Comprehensive warehousing services')
@section('service-process-steps')
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-block mb-3">
                    <span class="fs-2 fw-bold">1</span>
                </div>
                <h4 class="mb-3">Assessment</h4>
                <p class="text-muted">Evaluating your storage requirements</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-block mb-3">
                    <span class="fs-2 fw-bold">2</span>
                </div>
                <h4 class="mb-3">Space Allocation</h4>
                <p class="text-muted">Assigning appropriate storage space</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-block mb-3">
                    <span class="fs-2 fw-bold">3</span>
                </div>
                <h4 class="mb-3">Inventory Management</h4>
                <p class="text-muted">Tracking and organizing your goods</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-block mb-3">
                    <span class="fs-2 fw-bold">4</span>
                </div>
                <h4 class="mb-3">Distribution</h4>
                <p class="text-muted">Efficient dispatch when needed</p>
            </div>
        </div>
    </div>
@endsection

@section('service-solutions-title', 'Warehousing')
@section('service-solutions-description', 'Flexible storage solutions')
@section('service-solutions')
    <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded p-2 mb-3 d-inline-block">
                    <i class="fas fa-pallet fa-2x"></i>
                </div>
                <h4 class="mb-3">General Warehousing</h4>
                <ul class="text-muted ps-3">
                    <li class="mb-2">Dry storage</li>
                    <li class="mb-2">Pallet racking</li>
                    <li class="mb-2">Bulk storage</li>
                    <li>Shelving systems</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded p-2 mb-3 d-inline-block">
                    <i class="fas fa-snowflake fa-2x"></i>
                </div>
                <h4 class="mb-3">Climate-Controlled</h4>
                <ul class="text-muted ps-3">
                    <li class="mb-2">Temperature-sensitive goods</li>
                    <li class="mb-2">Pharmaceutical storage</li>
                    <li class="mb-2">Food products</li>
                    <li>Specialty items</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded p-2 mb-3 d-inline-block">
                    <i class="fas fa-lock fa-2x"></i>
                </div>
                <h4 class="mb-3">Secure Storage</h4>
                <ul class="text-muted ps-3">
                    <li class="mb-2">High-value items</li>
                    <li class="mb-2">Document storage</li>
                    <li class="mb-2">Confidential materials</li>
                    <li>Vault services</li>
                </ul>
            </div>
        </div>
    </div>
@endsection