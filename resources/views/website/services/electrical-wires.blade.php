@extends('website.services.template')

@section('service-title', 'Electrical Wires & Cables Solutions')
@section('service-description', 'High-quality electrical wiring solutions for residential, commercial and industrial applications')
@section('service-image', 'https://images.unsplash.com/photo-1581093450021-4a7360e9a6d3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80')

@section('service-subtitle', 'Reliable Electrical Infrastructure Solutions')
@section('service-lead', 'Quality wiring is the backbone of any electrical system')
@section('service-content', 'We provide premium electrical wires and cables that meet international safety and performance standards. Our products are suitable for a wide range of applications from residential buildings to large industrial complexes.')
@section('service-features')
    <li class="mb-2 d-flex align-items-start">
        <i class="fas fa-check-circle text-primary me-2 mt-1"></i>
        <span>Copper and aluminum conductors</span>
    </li>
    <li class="mb-2 d-flex align-items-start">
        <i class="fas fa-check-circle text-primary me-2 mt-1"></i>
        <span>PVC and XLPE insulation</span>
    </li>
    <li class="mb-2 d-flex align-items-start">
        <i class="fas fa-check-circle text-primary me-2 mt-1"></i>
        <span>Armored and non-armored options</span>
    </li>
@endsection

@section('service-secondary-image', 'https://images.unsplash.com/photo-1605100804763-247f67b3557e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80')
@section('service-icon', 'fas fa-bolt')
@section('service-highlight-title', 'Certified Products')
@section('service-highlight-text', 'All our electrical products meet TBS and international standards')

@section('service-process-title', 'Electrical Wiring')
@section('service-process-description', 'Professional solutions from design to installation')
@section('service-process-steps')
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-block mb-3">
                    <span class="fs-2 fw-bold">1</span>
                </div>
                <h4 class="mb-3">Assessment</h4>
                <p class="text-muted">We evaluate your electrical requirements and load calculations</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-block mb-3">
                    <span class="fs-2 fw-bold">2</span>
                </div>
                <h4 class="mb-3">Product Selection</h4>
                <p class="text-muted">Choosing the right cables and wires for your specific needs</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-block mb-3">
                    <span class="fs-2 fw-bold">3</span>
                </div>
                <h4 class="mb-3">Installation</h4>
                <p class="text-muted">Professional installation by certified electricians</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-block mb-3">
                    <span class="fs-2 fw-bold">4</span>
                </div>
                <h4 class="mb-3">Testing</h4>
                <p class="text-muted">Rigorous testing to ensure safety and performance</p>
            </div>
        </div>
    </div>
@endsection

@section('service-solutions-title', 'Electrical Wiring')
@section('service-solutions-description', 'Comprehensive solutions for all your electrical needs')
@section('service-solutions')
    <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded p-2 mb-3 d-inline-block">
                    <i class="fas fa-home fa-2x"></i>
                </div>
                <h4 class="mb-3">Residential Wiring</h4>
                <ul class="text-muted ps-3">
                    <li class="mb-2">House wiring solutions</li>
                    <li class="mb-2">Lighting circuits</li>
                    <li class="mb-2">Socket outlets</li>
                    <li>Safety switches</li>
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
                <h4 class="mb-3">Commercial Wiring</h4>
                <ul class="text-muted ps-3">
                    <li class="mb-2">Office buildings</li>
                    <li class="mb-2">Retail spaces</li>
                    <li class="mb-2">Three-phase systems</li>
                    <li>Energy efficient solutions</li>
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
                <h4 class="mb-3">Industrial Wiring</h4>
                <ul class="text-muted ps-3">
                    <li class="mb-2">Heavy-duty cables</li>
                    <li class="mb-2">Motor circuits</li>
                    <li class="mb-2">Control systems</li>
                    <li>Hazardous area solutions</li>
                </ul>
            </div>
        </div>
    </div>
@endsection