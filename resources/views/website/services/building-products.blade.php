@extends('website.services.template')

@section('service-title', 'Structural Building Products')
@section('service-description', 'High-quality construction materials for durable structures')
@section('service-image', 'https://images.unsplash.com/photo-1600585152220-90363fe7e115?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80')

@section('service-subtitle', 'Premium Construction Materials')
@section('service-lead', 'Building the foundation for Tanzania\'s infrastructure')
@section('service-content', 'We manufacture and supply high-quality structural building products including concrete blocks, bricks, tiles, and flagstones that meet national construction standards. Our materials are used in residential, commercial, and government projects across the country.')
@section('service-features')
    <li class="mb-2 d-flex align-items-start">
        <i class="fas fa-check-circle text-primary me-2 mt-1"></i>
        <span>Durable concrete blocks</span>
    </li>
    <li class="mb-2 d-flex align-items-start">
        <i class="fas fa-check-circle text-primary me-2 mt-1"></i>
        <span>Clay and cement bricks</span>
    </li>
    <li class="mb-2 d-flex align-items-start">
        <i class="fas fa-check-circle text-primary me-2 mt-1"></i>
        <span>Decorative tiles and flagstones</span>
    </li>
@endsection

@section('service-secondary-image', 'https://images.unsplash.com/photo-1600607688969-a5bfcd646154?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80')
@section('service-icon', 'fas fa-cubes')
@section('service-highlight-title', 'TBS Certified')
@section('service-highlight-text', 'All our building products meet Tanzania Bureau of Standards')

@section('service-process-title', 'Building Materials')
@section('service-process-description', 'Quality materials from production to delivery')
@section('service-process-steps')
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-block mb-3">
                    <span class="fs-2 fw-bold">1</span>
                </div>
                <h4 class="mb-3">Material Selection</h4>
                <p class="text-muted">Choosing the right raw materials for quality products</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-block mb-3">
                    <span class="fs-2 fw-bold">2</span>
                </div>
                <h4 class="mb-3">Manufacturing</h4>
                <p class="text-muted">Precision production under controlled conditions</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-block mb-3">
                    <span class="fs-2 fw-bold">3</span>
                </div>
                <h4 class="mb-3">Quality Testing</h4>
                <p class="text-muted">Rigorous testing for strength and durability</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-block mb-3">
                    <span class="fs-2 fw-bold">4</span>
                </div>
                <h4 class="mb-3">Delivery</h4>
                <p class="text-muted">Timely delivery to construction sites</p>
            </div>
        </div>
    </div>
@endsection

@section('service-solutions-title', 'Building Products')
@section('service-solutions-description', 'Comprehensive range of construction materials')
@section('service-solutions')
    <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded p-2 mb-3 d-inline-block">
                    <i class="fas fa-border-style fa-2x"></i>
                </div>
                <h4 class="mb-3">Concrete Blocks</h4>
                <ul class="text-muted ps-3">
                    <li class="mb-2">Hollow blocks</li>
                    <li class="mb-2">Solid blocks</li>
                    <li class="mb-2">Interlocking blocks</li>
                    <li>Decorative blocks</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded p-2 mb-3 d-inline-block">
                    <i class="fas fa-cube fa-2x"></i>
                </div>
                <h4 class="mb-3">Bricks</h4>
                <ul class="text-muted ps-3">
                    <li class="mb-2">Clay bricks</li>
                    <li class="mb-2">Cement bricks</li>
                    <li class="mb-2">Engineering bricks</li>
                    <li>Specialty bricks</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded p-2 mb-3 d-inline-block">
                    <i class="fas fa-th-large fa-2x"></i>
                </div>
                <h4 class="mb-3">Tiles & Flagstones</h4>
                <ul class="text-muted ps-3">
                    <li class="mb-2">Floor tiles</li>
                    <li class="mb-2">Wall tiles</li>
                    <li class="mb-2">Paving stones</li>
                    <li>Decorative finishes</li>
                </ul>
            </div>
        </div>
    </div>
@endsection