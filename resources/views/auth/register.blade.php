@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
    <div class="row w-100 shadow rounded-4 overflow-hidden" style="max-width: 900px;">

        <div class="col-md-6 bg-white p-4 d-flex align-items-center">
            <div class="w-100">

                <h3 class="text-center fw-bold text-primary mb-4">Create an Account</h3>
                <p class="text-center text-muted mb-4">
                    Fill in your details to register.
                </p>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Name</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white">
                                <i class="fa-solid fa-user"></i>
                            </span>
                            <input 
                                id="name"
                                type="text" 
                                name="name" 
                                class="form-control @error('name') is-invalid @enderror" 
                                value="{{ old('name') }}"
                                required 
                            >
                        </div>
                        @error('name')
                            <span class="invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email Address</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white">
                                <i class="bi bi-envelope"></i>
                            </span>
                            <input 
                                id="email"
                                type="email" 
                                name="email" 
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}"
                                required 
                            >
                        </div>
                        @error('email')
                            <span class="invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white">
                                <i class="bi bi-eye"></i>
                            </span>
                            <input 
                                id="password"
                                type="password" 
                                name="password" 
                                class="form-control @error('password') is-invalid @enderror"
                                required 
                            >
                        </div>
                        @error('password')
                            <span class="invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Confirm Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white">
                                <i class="bi bi-eye"></i>
                            </span>
                            <input 
                                id="password-confirm"
                                type="password" 
                                name="password_confirmation" 
                                class="form-control"
                                required 
                            >
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold mt-2">
                        Register
                    </button>

                    <p class="text-center mt-3 mb-0">
                        Already have an account?
                        <a href="{{ route('login') }}" class="fw-semibold">Login</a>
                    </p>

                </form>

            </div>
        </div>
        <div class="col-md-6 d-none d-md-block p-0">
            <img src="{{ asset('images/1000_F_386510351_03Qk3je4FGnVLo4vXRdOpoDWfZjtmajd.jpg') }}" 
                 class="w-100 h-100 object-fit-cover" alt="">
        </div>

    </div>
</div>
@endsection
