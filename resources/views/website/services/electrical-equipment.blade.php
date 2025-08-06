@extends('website.services.template')

@section('service-title', 'Electrical Equipment & Components')
@section('service-description', 'Premium electrical supplies for all applications')
@section('service-image', 'https://images.unsplash.com/photo-1551269901-5c5e14c25df7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1469&q=80')

@section('service-subtitle', 'Comprehensive Electrical Solutions')
@section('service-lead', 'Quality components for reliable electrical systems')
@section('service-content', 'We supply a wide range of electrical equipment and components including switchgear, circuit breakers, transformers, and distribution boards. Our products meet international standards and are suitable for industrial, commercial, and residential applications.')
@section('service-features')
    <li class="mb-2 d-flex align-items-start">
        <i class="fas fa-check-circle text-primary me-2 mt-1"></i>
        <span>Switchgear and control gear</span>
    </li>
    <li class="mb-2 d-flex align-items-start">
        <i class="fas fa-check-circle text-primary me-2 mt-1"></i>
        <span>Power distribution equipment</span>
    </li>
    <li class="mb-2 d-flex align-items-start">
        <i class="fas fa-check-circle text-primary me-2 mt-1"></i>
        <span>Wiring accessories</span>
    </li>
@endsection

@section('service-secondary-image', 'https://images.unsplash.com/photo-1603732551681-2e91159b9dc2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80')
@section('service-icon', 'fas fa-plug')
@section('service-highlight-title', 'Certified Products')
@section('service-highlight-text', 'All equipment meets TBS and international electrical standards')

@section('service-process-title', 'Electrical Supply')
@section('service-process-description', 'From selection to delivery and support')
@section('service-process-steps')
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-block mb-3">
                    <span class="fs-2 fw-bold">1</span>
                </div>
                <h4 class="mb-3">Assessment</h4>
                <p class="text-muted">Understanding your electrical requirements</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-block mb-3">
                    <span class="fs-2 fw-bold">2</span>
                </div>
                <h4 class="mb-3">Selection</h4>
                <p class="text-muted">Recommending suitable equipment</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-block mb-3">
                    <span class="fs-2 fw-bold">3</span>
                </div>
                <h4 class="mb-3">Delivery</h4>
                <p class="text-muted">Timely supply of components</p>
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
                <p class="text-muted">Technical assistance and warranty</p>
            </div>
        </div>
    </div>
@endsection

@section('service-solutions-title', 'Electrical Components')
@section('service-solutions-description', 'Comprehensive range of electrical equipment')
@section('service-solutions')
    <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded p-2 mb-3 d-inline-block">
                    <i class="fas fa-tools fa-2x"></i>
                </div>
                <h4 class="mb-3">Distribution Equipment</h4>
                <ul class="text-muted ps-3">
                    <li class="mb-2">Distribution boards</li>
                    <li class="mb-2">Circuit breakers</li>
                    <li class="mb-2">Switchgear</li>
                    <li>Load centers</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded p-2 mb-3 d-inline-block">
                    <i class="fas fa-bolt fa-2x"></i>
                </div>
                <h4 class="mb-3">Power Components</h4>
                <ul class="text-muted ps-3">
                    <li class="mb-2">Transformers</li>
                    <li class="mb-2">Generators</li>
                    <li class="mb-2">UPS systems</li>
                    <li>Voltage regulators</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded p-2 mb-3 d-inline-block">
                    <i class="fas fa-lightbulb fa-2x"></i>
                </div>
                <h4 class="mb-3">Wiring Accessories</h4>
                <ul class="text-muted ps-3">
                    <li class="mb-2">Switches & sockets</li>
                    <li class="mb-2">Conduits & trunking</li>
                    <li class="mb-2">Junction boxes</li>
                    <li>Cable management</li>
                </ul>
            </div>
        </div>
    </div>
@endsection