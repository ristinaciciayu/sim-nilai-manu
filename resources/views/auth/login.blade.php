@extends('layouts.app')

@section('content')
<div class="container" style="min-height: 100vh; display: flex; align-items: center; justify-content: center;">
    <div class="col-md-5">
        <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
            <!-- Header -->
            <div class="card-header bg-gradient text-white text-center fs-4 fw-semibold rounded-top-4" 
                 style="background: linear-gradient(135deg, #0d6efd, #6610f2);">
                <i class="bi bi-box-arrow-in-right"></i> {{ __('Login') }}
            </div>

            <!-- Body -->
            <div class="card-body p-5">
                <!-- Heading Welcome -->
                <div class="text-center mb-4">
                    <h3 class="fw-bold">Login</h3>
                    <p class="text-muted">Silakan masukan userrname dan password</p>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="form-label fw-medium">{{ __('Email Address') }}</label>
                        <input id="email" type="email"
                               class="form-control form-control-lg rounded-pill px-4 @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password with eye toggle -->
                    <div class="mb-4">
                        <label for="password" class="form-label fw-medium">{{ __('Password') }}</label>
                        <div class="input-group">
                            <input id="password" type="password"
                                   class="form-control form-control-lg rounded-start-pill px-4 @error('password') is-invalid @enderror"
                                   name="password" required autocomplete="current-password">
                            <button type="button" class="btn btn-outline-secondary rounded-end-pill" onclick="togglePassword()">
                                <i class="bi bi-eye" id="toggleIcon"></i>
                            </button>
                        </div>
                        @error('password')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Login button -->
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg fw-semibold rounded-pill shadow-sm">
                            <i class="bi bi-box-arrow-in-right"></i> {{ __('Login') }}
                        </button>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link text-center text-decoration-none fw-medium mt-2" 
                               href="{{ route('password.request') }}">
                                <i class="bi bi-question-circle"></i> {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Custom Style -->
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(120deg, #f0f4ff, #e8f0fe);
    }
    .card {
        background-color: #ffffff;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    }
    .btn-primary {
        background: linear-gradient(135deg, #0d6efd, #6610f2);
        border: none;
    }
    .btn-primary:hover {
        background: linear-gradient(135deg, #0b5ed7, #520dc2);
    }
    .form-control:focus {
        box-shadow: 0 0 0 0.2rem rgba(13,110,253,.25);
    }
</style>

<!-- Toggle password script -->
<script>
    function togglePassword() {
        const input = document.getElementById('password');
        const icon = document.getElementById('toggleIcon');
        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("bi-eye");
            icon.classList.add("bi-eye-slash");
        } else {
            input.type = "password";
            icon.classList.remove("bi-eye-slash");
            icon.classList.add("bi-eye");
        }
    }
</script>
@endsection
