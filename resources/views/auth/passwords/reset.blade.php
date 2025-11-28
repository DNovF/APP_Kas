@extends('layouts.app')

@section('content')
<div class="min-vh-100 d-flex justify-content-center align-items-center bg-light py-4">

    <div class="card shadow-lg p-4" style="max-width: 420px; width: 100%;">
        <div class="text-center mb-4">
            <h3 class="fw-bold text-dark">Reset Password</h3>
            <p class="text-muted">Enter your new password below</p>
        </div>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">
            <div class="mb-3">
                <label for="email" class="form-label fw-semibold">Email</label>

                <div class="input-group">
                    <span class="input-group-text bg-white">
                        <i class="bi bi-envelope"></i>
                    </span>

                    <input id="email" 
                        type="email" 
                        class="form-control @error('email') is-invalid @enderror" 
                        name="email" 
                        value="{{ $email ?? old('email') }}" 
                        required autocomplete="email" autofocus
                        placeholder="you@example.com">

                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label fw-semibold">New Password</label>

                <div class="input-group">
                    <span class="input-group-text bg-white">
                        <i class="bi bi-lock"></i>
                    </span>

                    <input id="password" 
                        type="password" 
                        class="form-control @error('password') is-invalid @enderror" 
                        name="password" 
                        required autocomplete="new-password"
                        placeholder="••••••••">

                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="password-confirm" class="form-label fw-semibold">Confirm Password</label>

                <div class="input-group">
                    <span class="input-group-text bg-white">
                        <i class="bi bi-lock-fill"></i>
                    </span>

                    <input id="password-confirm" 
                        type="password" 
                        class="form-control" 
                        name="password_confirmation" 
                        required autocomplete="new-password"
                        placeholder="••••••••">
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">
                Reset Password
            </button>

        </form>

    </div>

</div>
@endsection
