@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Services</h2>

    <div class="mb-3">
        <a href="{{ route('customer_services.create') }}" class="btn btn-primary">+ Add Service</a>
    </div>

    <form method="GET" action="{{ route('customer_services.index') }}" class="mb-3">
        <input type="text" name="search" class="form-control" placeholder="Search by service name or user..." value="{{ request('search') }}">
    </form>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Service Name</th>
                <th>User</th>
                <th>Created By</th>
                <th>Updated By</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($services as $service)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $service->service_name }}</td>
                    <td>{{ $service->user->name ?? 'N/A' }}</td>
                    <td>{{ $service->creator->name ?? 'N/A' }}</td>
                    <td>{{ $service->updater->name ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('customer_services.show', $service->id) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('customer_services.edit', $service->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('customer_services.destroy', $service->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this service?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="text-center">No services found</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $services->links('pagination::bootstrap-5') }}
</div>
@endsection
