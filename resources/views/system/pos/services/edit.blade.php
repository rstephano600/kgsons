@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Service</h2>

    <form method="POST" action="{{ route('customer_services.update', $service->id) }}">
        @csrf @method('PUT')

        <div class="mb-3">
            <label class="form-label">Service Name</label>
            <input type="text" name="service_name" value="{{ $service->service_name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Assign to User</label>
            <select name="user_id" class="form-select" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" @if($user->id == $service->user_id) selected @endif>
                        {{ $user->name }} ({{ $user->email }})
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('customer_services.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
