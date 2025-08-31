@extends('layouts.app')

@section('title', 'Edit Profile')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item">
                <a href="#" class="text-decoration-none">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('profile.show') }}" class="text-decoration-none">My Profile</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
        </ol>
    </nav>
@endsection

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <h2 class="h3 fw-semibold text-dark mb-4">Edit Profile</h2>

        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row mb-4">
                <!-- Personal Information -->
                <div class="col-md-6 mb-4 mb-md-0">
                    <div class="border-bottom pb-2 mb-3">
                        <h3 class="h5 fw-medium text-dark">Personal Information</h3>
                    </div>
                    
                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" 
                               class="form-control @error('name') is-invalid @enderror" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                               class="form-control @error('email') is-invalid @enderror" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Phone -->
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" name="phone" id="phone" value="{{ old('phone', $user->phone) }}"
                               class="form-control @error('phone') is-invalid @enderror">
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Profile Photo & Password -->
                <div class="col-md-6">
                    <!-- Profile Photo -->
                    <div class="mb-4">
                        <div class="border-bottom pb-2 mb-3">
                            <h3 class="h5 fw-medium text-dark">Profile Photo</h3>
                        </div>
                        
                        <div class="d-flex align-items-center">
                            <div class="me-4">
                                <img id="photo-preview" 
                                     src="{{ $user->photo ? asset('storage/'.$user->photo) : asset('images/default-avatar.png') }}" 
                                     class="rounded-circle object-fit-cover border" style="width: 80px; height: 80px;">
                            </div>
                            <div class="flex-grow-1">
                                <input type="file" name="photo" id="photo" 
                                       class="form-control @error('photo') is-invalid @enderror"
                                       accept="image/*" onchange="previewPhoto(event)">
                                @error('photo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">JPG, PNG or GIF (Max: 2MB)</div>
                            </div>
                        </div>
                    </div>

                    <!-- Password Change -->
                    <div id="password">
                        <div class="border-bottom pb-2 mb-3">
                            <h3 class="h5 fw-medium text-dark">Change Password</h3>
                        </div>
                        
                        <!-- Current Password -->
                        <div class="mb-3">
                            <label for="current_password" class="form-label">Current Password</label>
                            <input type="password" name="current_password" id="current_password"
                                   class="form-control @error('current_password') is-invalid @enderror">
                            @error('current_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- New Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" name="password" id="password"
                                   class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                   class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('profile.show') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-times me-2"></i> Cancel
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i> Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function previewPhoto(event) {
        const input = event.target;
        const reader = new FileReader();
        
        reader.onload = function(){
            const preview = document.getElementById('photo-preview');
            preview.src = reader.result;
        };
        
        if (input.files && input.files[0]) {
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush