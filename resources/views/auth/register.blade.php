@extends('auth.auth')

@section('title', 'Register')
@section('auth-title', 'Create Your Account')

@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf
        
        <!-- Name Input -->
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-medium mb-2">Full Name</label>
            <input id="name" type="text" class="form-input w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-500 @error('name') border-red-500 @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter your full name">
            
            @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <!-- Email Input -->
        <div class="mb-4">
            <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email Address</label>
            <input id="email" type="email" class="form-input w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-500 @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your email">
            
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <!-- Phone Input -->
        <div class="mb-4">
            <label for="phone" class="block text-gray-700 text-sm font-medium mb-2">Phone Number</label>
            <input id="phone" type="text" class="form-input w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-500 @error('phone') border-red-500 @enderror" name="phone" value="{{ old('phone') }}" placeholder="Enter your phone number">
            
            @error('phone')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <!-- Password Input -->
        <div class="mb-4">
            <label for="password" class="block text-gray-700 text-sm font-medium mb-2">Password</label>
            <input id="password" type="password" class="form-input w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-500 @error('password') border-red-500 @enderror" name="password" required autocomplete="new-password" placeholder="Create a password">
            
            @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <!-- Confirm Password Input -->
        <div class="mb-6">
            <label for="password-confirm" class="block text-gray-700 text-sm font-medium mb-2">Confirm Password</label>
            <input id="password-confirm" type="password" class="form-input w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-500" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password">
        </div>
        
        <!-- Submit Button -->
        <button type="submit" class="w-full btn-primary text-white font-medium py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">
            Register
        </button>
    </form>
@endsection

@section('auth-footer')
    Already have an account?
    <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-800">Login here</a>
@endsection