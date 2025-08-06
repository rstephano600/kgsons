@extends('layouts.web-app')

@section('content')
<!-- Hero Section -->
<section class="py-5 bg-primary text-white">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h1 class="display-4 fw-bold mb-4">@yield('service-title')</h1>
                <p class="lead mb-4">@yield('service-description')</p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('contact') }}" class="btn btn-light btn-lg px-4">Request a Quote</a>
                    <a href="{{ route('projects') }}?filter=@yield('service-filter')" class="btn btn-outline-light btn-lg px-4">View Our Projects</a>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="@yield('service-image')" 
                     alt="@yield('service-title')" 
                     class="img-fluid rounded-3 shadow">
            </div>
        </div>
    </div>
</section>

<!-- Introduction Section -->
<section class="py-5">
    <div class="container py-4">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <h2 class="fw-bold mb-4">@yield('service-subtitle')</h2>
                <p class="lead">@yield('service-lead')</p>
                <p>@yield('service-content')</p>
                <ul class="list-unstyled">
                    @yield('service-features')
                </ul>
            </div>
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm overflow-hidden">
                    <img src="@yield('service-secondary-image')" 
                         alt="@yield('service-title') process" 
                         class="img-fluid">
                    <div class="card-body bg-light">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 bg-primary text-white rounded-circle p-3 me-3">
                                <i class="@yield('service-icon') fa-lg"></i>
                            </div>
                            <div>
                                <h5 class="mb-0">@yield('service-highlight-title')</h5>
                                <p class="mb-0 text-muted">@yield('service-highlight-text')</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Process Section -->
<section class="py-5 bg-light">
    <div class="container py-4">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Our @yield('service-process-title') Process</h2>
            <p class="lead text-muted">@yield('service-process-description')</p>
        </div>
        
        <div class="row g-4">
            @yield('service-process-steps')
        </div>
    </div>
</section>

<!-- Solutions Section -->
<section class="py-5">
    <div class="container py-4">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Our @yield('service-solutions-title') Solutions</h2>
            <p class="lead text-muted">@yield('service-solutions-description')</p>
        </div>
        
        <div class="row g-4">
            @yield('service-solutions')
        </div>
    </div>
</section>

<!-- Final CTA Section -->
<section class="py-5 bg-primary text-white">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="fw-bold mb-4">Ready to Discuss Your @yield('service-title') Needs?</h2>
                <p class="lead mb-5">Contact KGSons Company Limited today for professional, reliable service.</p>
                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <a href="{{ route('contact') }}" class="btn btn-light btn-lg px-4">Get a Free Consultation</a>
                    <a href="tel:+255657856790" class="btn btn-outline-light btn-lg px-4">
                        <i class="fas fa-phone me-2"></i> Call Us Now
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection