@extends('website.services.template')

@section('service-title', 'Roads & Landscape Architecture')
@section('service-description', 'Integrating infrastructure with environmental design')
@section('service-image', 'https://images.unsplash.com/photo-1566669437687-7040a6926753?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80')

@section('service-subtitle', 'Functional and Aesthetic Infrastructure')
@section('service-lead', 'Blending engineering with environmental design')
@section('service-content', 'Our comprehensive road and landscape architecture services create functional, durable, and visually appealing infrastructure. We design road networks that harmonize with their surroundings while meeting all technical requirements.')
@section('service-features')
    <li class="mb-2 d-flex align-items-start">
        <i class="fas fa-check-circle text-primary me-2 mt-1"></i>
        <span>Road design and construction</span>
    </li>
    <li class="mb-2 d-flex align-items-start">
        <i class="fas fa-check-circle text-primary me-2 mt-1"></i>
        <span>Landscape integration</span>
    </li>
    <li class="mb-2 d-flex align-items-start">
        <i class="fas fa-check-circle text-primary me-2 mt-1"></i>
        <span>Environmental considerations</span>
    </li>
@endsection

@section('service-secondary-image', 'https://images.unsplash.com/photo-1586771107445-d3ca888129ce?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80')
@section('service-icon', 'fas fa-tree')
@section('service-highlight-title', 'Sustainable Design')
@section('service-highlight-text', 'Balancing infrastructure needs with environmental preservation')

@section('service-process-title', 'Road & Landscape Design')
@section('service-process-description', 'From concept to completion')
@section('service-process-steps')
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-block mb-3">
                    <span class="fs-2 fw-bold">1</span>
                </div>
                <h4 class="mb-3">Site Analysis</h4>
                <p class="text-muted">Assessing terrain and environmental factors</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-block mb-3">
                    <span class="fs-2 fw-bold">2</span>
                </div>
                <h4 class="mb-3">Concept Design</h4>
                <p class="text-muted">Creating integrated road and landscape plans</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-block mb-3">
                    <span class="fs-2 fw-bold">3</span>
                </div>
                <h4 class="mb-3">Implementation</h4>
                <p class="text-muted">Constructing with environmental sensitivity</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-block mb-3">
                    <span class="fs-2 fw-bold">4</span>
                </div>
                <h4 class="mb-3">Maintenance</h4>
                <p class="text-muted">Preserving functionality and aesthetics</p>
            </div>
        </div>
    </div>
@endsection

@section('service-solutions-title', 'Infrastructure Solutions')
@section('service-solutions-description', 'Comprehensive road and landscape services')
@section('service-solutions')
    <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded p-2 mb-3 d-inline-block">
                    <i class="fas fa-road fa-2x"></i>
                </div>
                <h4 class="mb-3">Road Design</h4>
                <ul class="text-muted ps-3">
                    <li class="mb-2">Urban roads</li>
                    <li class="mb-2">Highway design</li>
                    <li class="mb-2">Rural access roads</li>
                    <li>Parking lots</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded p-2 mb-3 d-inline-block">
                    <i class="fas fa-leaf fa-2x"></i>
                </div>
                <h4 class="mb-3">Landscape Architecture</h4>
                <ul class="text-muted ps-3">
                    <li class="mb-2">Roadside landscaping</li>
                    <li class="mb-2">Roundabout design</li>
                    <li class="mb-2">Pedestrian spaces</li>
                    <li>Erosion control</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded p-2 mb-3 d-inline-block">
                    <i class="fas fa-recycle fa-2x"></i>
                </div>
                <h4 class="mb-3">Sustainable Solutions</h4>
                <ul class="text-muted ps-3">
                    <li class="mb-2">Permeable paving</li>
                    <li class="mb-2">Stormwater management</li>
                    <li class="mb-2">Native plantings</li>
                    <li>Wildlife corridors</li>
                </ul>
            </div>
        </div>
    </div>
@endsection