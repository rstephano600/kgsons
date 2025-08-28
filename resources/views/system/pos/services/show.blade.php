@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Service Details</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>Service Name:</strong> {{ $service->service_name }}</p>
            <p><strong>User:</strong> {{ $service->user->name ?? 'N/A' }}</p>
            <p><strong>Created By:</strong> {{ $service->creator->name ?? 'N/A' }}</p>
            <p><strong>Updated By:</strong> {{ $service->updater->name ?? 'N/A' }}</p>
            <p><strong>Created At:</strong> {{ $service->created_at->format('d-m-Y H:i') }}</p>
            <p><strong>Updated At:</strong> {{ $service->updated_at->format('d-m-Y H:i') }}</p>
        </div>
    </div>

    <a href="{{ route('services.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
