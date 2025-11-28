@extends('layouts.app')

@section('content')
<div class="min-vh-100 d-flex justify-content-center align-items-center bg-white p-4">

    <div class="shadow-lg rounded-3 p-4 bg-white" style="max-width: 1100px; width: 100%;">
        
        <div class="text-center mb-4">
            <img src="{{ asset('images/logo login light mode.png') }}" class="mb-3" style="width: 380px; height: 60px;">
        </div>

        <div class="row g-4 align-items-center">

            <div class="col-md-6 order-md-2 text-center">
                <img src="https://readymadeui.com/signin-image.webp" 
                     class="img-fluid" style="max-height: 420px;" alt="login-image">
            </div>

            <div class="col-md-6 order-md-1">
                <form method="POST" action="{{ route('login') }}" class="mx-auto" style="max-width: 360px;">
                    @csrf

                    <h1 class="fw-bold text-primary mb-4" style="font-size: 32px;">Sign In</h1>

                    <div class="mb-4 position-relative">
                        <input type="email" name="email"
                            class="form-control border-0 border-bottom rounded-0 px-2 py-3 @error('email') is-invalid @enderror"
                            placeholder="Enter email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                        <i class="bi bi-envelope position-absolute" 
                           style="right: 10px; top: 50%; transform: translateY(-50%); color: #bbb;"></i>

                        @error('email')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4 position-relative">
                        <input type="password" name="password"
                            class="form-control border-0 border-bottom rounded-0 px-2 py-3 @error('password') is-invalid @enderror"
                            placeholder="Enter password"
                            required autocomplete="current-password">

                        <i class="bi bi-eye position-absolute toggle-password" data-target="#password"
                           style="right: 10px; top: 50%; transform: translateY(-50%); color: #bbb; cursor: pointer;"></i>

                        @error('password')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input type="checkbox" id="remember" name="remember"
                                   class="form-check-input" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-primary small text-decoration-none">
                                Forgot Password?
                            </a>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold shadow-sm">
                        Sign in
                    </button>

                    <p class="text-center text-muted mt-4 small">
                        Don’t have an account?
                        <a href="{{ route('register') }}" class="text-primary fw-semibold text-decoration-none">
                            Register here
                        </a>
                    </p>

                </form>
            </div>

        </div>
    </div>
</div>
@endsection
