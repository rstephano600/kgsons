@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Service</h2>

    <form method="POST" action="{{ route('services.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Service Name</label>
            <input type="text" name="service_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Assign to User</label>
            <select name="user_id" class="form-select" required>
                <option value="">Select User</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('services.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
