@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-3">System Activity Logs</h2>
<form method="GET" action="{{ route('system.logs.index') }}" class="mb-3">
    <div class="row g-2">
<div class="col-md-3">
        <input type="text" name="user" class="form-control" 
               placeholder="Search by user name" value="{{ request('user') }}">
    </div>

        <div class="col-md-2">
            <select name="action" class="form-select">
                <option value="">-- Action --</option>
                <option value="create" {{ request('action')=='create' ? 'selected' : '' }}>Create</option>
                <option value="update" {{ request('action')=='update' ? 'selected' : '' }}>Update</option>
                <option value="delete" {{ request('action')=='delete' ? 'selected' : '' }}>Delete</option>
            </select>
        </div>

        <div class="col-md-2">
            <input type="text" name="model" value="{{ request('model') }}" class="form-control" placeholder="Model">
        </div>

        <div class="col-md-2">
            <input type="date" name="date_from" value="{{ request('date_from') }}" class="form-control">
        </div>

        <div class="col-md-2">
            <input type="date" name="date_to" value="{{ request('date_to') }}" class="form-control">
        </div>

        <div class="col-md-1">
            <button type="submit" class="btn btn-primary w-100">Filter</button>
        </div>
    </div>
</form>

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>User</th>
                <th>Action</th>
                <th>Model</th>
                <th>Record ID</th>
                <th>Description</th>
                <th>IP Address</th>
                <th>User Agent</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($logs as $log)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $log->user->name ?? 'System' }}</td>
                    <td>{{ ucfirst($log->action) }}</td>
                    <td>{{ $log->model }}</td>
                    <td>{{ $log->model_id }}</td>
                    <td>{{ $log->description }}</td>
                    <td>{{ $log->ip_address }}</td>
                    <td>{{ Str::limit($log->user_agent, 30) }}</td>
                    <td>{{ $log->created_at->format('Y-m-d H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $logs->links('pagination::bootstrap-5') }}
</div>
@endsection
