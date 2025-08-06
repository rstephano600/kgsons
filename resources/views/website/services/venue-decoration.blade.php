@extends('website.services.template')

@section('service-title', 'Venue Decoration Services')
@section('service-description', 'Transforming spaces into memorable experiences')
@section('service-image', 'https://images.unsplash.com/photo-1519671482749-fd09be7ccebf?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80')

@section('service-subtitle', 'Creating Stunning Event Atmospheres')
@section('service-lead', 'Professional decor for all occasions')
@section('service-content', 'We specialize in venue decoration for weddings, corporate events, government functions, and private celebrations. Our creative team designs unique themes that reflect your vision while maintaining the highest standards of quality and aesthetics.')
@section('service-features')
    <li class="mb-2 d-flex align-items-start">
        <i class="fas fa-check-circle text-primary me-2 mt-1"></i>
        <span>Custom theme development</span>
    </li>
    <li class="mb-2 d-flex align-items-start">
        <i class="fas fa-check-circle text-primary me-2 mt-1"></i>
        <span>Premium decor materials</span>
    </li>
    <li class="mb-2 d-flex align-items-start">
        <i class="fas fa-check-circle text-primary me-2 mt-1"></i>
        <span>Full setup and teardown</span>
    </li>
@endsection

@section('service-secondary-image', 'https://images.unsplash.com/photo-1492684223066-81342ee5ff30?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80')
@section('service-icon', 'fas fa-paint-brush')
@section('service-highlight-title', 'Award-Winning Designs')
@section('service-highlight-text', 'Recognized for creative excellence in event decor')

@section('service-process-title', 'Decoration')
@section('service-process-description', 'From concept to flawless execution')
@section('service-process-steps')
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-block mb-3">
                    <span class="fs-2 fw-bold">1</span>
                </div>
                <h4 class="mb-3">Consultation</h4>
                <p class="text-muted">Understanding your vision and requirements</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-block mb-3">
                    <span class="fs-2 fw-bold">2</span>
                </div>
                <h4 class="mb-3">Design</h4>
                <p class="text-muted">Creating custom decor concepts</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-block mb-3">
                    <span class="fs-2 fw-bold">3</span>
                </div>
                <h4 class="mb-3">Setup</h4>
                <p class="text-muted">Professional installation at your venue</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-block mb-3">
                    <span class="fs-2 fw-bold">4</span>
                </div>
                <h4 class="mb-3">Management</h4>
                <p class="text-muted">On-site coordination during your event</p>
            </div>
        </div>
    </div>
@endsection

@section('service-solutions-title', 'Event Decor')
@section('service-solutions-description', 'Comprehensive decoration solutions')
@section('service-solutions')
    <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded p-2 mb-3 d-inline-block">
                    <i class="fas fa-ring fa-2x"></i>
                </div>
                <h4 class="mb-3">Weddings</h4>
                <ul class="text-muted ps-3">
                    <li class="mb-2">Ceremony decor</li>
                    <li class="mb-2">Reception styling</li>
                    <li class="mb-2">Bridal party flowers</li>
                    <li>Theme development</li>
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
                <h4 class="mb-3">Corporate Events</h4>
                <ul class="text-muted ps-3">
                    <li class="mb-2">Conference staging</li>
                    <li class="mb-2">Product launches</li>
                    <li class="mb-2">Award ceremonies</li>
                    <li>Branded decor</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded p-2 mb-3 d-inline-block">
                    <i class="fas fa-glass-cheers fa-2x"></i>
                </div>
                <h4 class="mb-3">Social Events</h4>
                <ul class="text-muted ps-3">
                    <li class="mb-2">Birthday parties</li>
                    <li class="mb-2">Anniversaries</li>
                    <li class="mb-2">Graduations</li>
                    <li>Cultural celebrations</li>
                </ul>
            </div>
        </div>
    </div>
@endsection