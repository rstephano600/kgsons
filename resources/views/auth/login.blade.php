@extends('auth.auth')

@section('title', 'Login')
@section('auth-title', 'Welcome Back')

@section('content')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        
        <!-- Email Input -->
        <div class="mb-4">
            <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email Address</label>
            <input id="email" type="email" class="form-input w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-500 @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter your email">
            
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <!-- Password Input -->
        <div class="mb-6">
            <label for="password" class="block text-gray-700 text-sm font-medium mb-2">Password</label>
            <input id="password" type="password" class="form-input w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-500 @error('password') border-red-500 @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password">
            
            @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                <label for="remember" class="ml-2 block text-sm text-gray-700">Remember me</label>
            </div>
            
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:text-blue-800">Forgot password?</a>
            @endif
        </div>
        
        <!-- Submit Button -->
        <button type="submit" class="w-full btn-primary text-white font-medium py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">
            Login
        </button>
    </form>
@endsection

@section('auth-footer')
    Don't have an account?
    <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:text-blue-800">Register here</a>
@endsection