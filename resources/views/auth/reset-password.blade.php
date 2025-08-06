@extends('auth.auth')

@section('title', 'Reset Password')
@section('auth-title', 'Set a New Password')

@section('content')
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        
        <input type="hidden" name="token" value="{{ $token }}">
        
        <!-- Email Input (hidden) -->
        <input type="hidden" name="email" value="{{ $email ?? old('email') }}">
        
        @if (session('status'))
            <div class="mb-4 px-4 py-3 bg-green-100 border border-green-200 text-green-700 rounded">
                {{ session('status') }}
            </div>
        @endif
        
        <!-- Password Input -->
        <div class="mb-4">
            <label for="password" class="block text-gray-700 text-sm font-medium mb-2">New Password</label>
            <input id="password" type="password" class="form-input w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-500 @error('password') border-red-500 @enderror" name="password" required autocomplete="new-password" placeholder="Enter new password">
            
            @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <!-- Confirm Password Input -->
        <div class="mb-6">
            <label for="password-confirm" class="block text-gray-700 text-sm font-medium mb-2">Confirm New Password</label>
            <input id="password-confirm" type="password" class="form-input w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-500" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm new password">
        </div>
        
        <!-- Submit Button -->
        <button type="submit" class="w-full btn-primary text-white font-medium py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">
            Reset Password
        </button>
    </form>
@endsection

@section('auth-footer')
    Remember your password?
    <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-800">Login here</a>
@endsection