@extends('auth.auth')

@section('title', 'Forgot Password')
@section('auth-title', 'Reset Your Password')

@section('content')
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        
        @if (session('status'))
            <div class="mb-4 px-4 py-3 bg-green-100 border border-green-200 text-green-700 rounded">
                {{ session('status') }}
            </div>
        @endif
        
        <!-- Email Input -->
        <div class="mb-6">
            <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email Address</label>
            <input id="email" type="email" class="form-input w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-500 @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter your email">
            
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <!-- Submit Button -->
        <button type="submit" class="w-full btn-primary text-white font-medium py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">
            Send Password Reset Link
        </button>
    </form>
@endsection

@section('auth-footer')
    Remember your password?
    <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-800">Login here</a>
@endsection