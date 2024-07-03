@extends('tablar::auth.layout')
@section('title', 'Login')
@section('content')
<div style="display: flex; width: 100vw; height: 100vh; margin: 0;">
    <!-- Contenedor del logo y texto de bienvenida a la izquierda -->
    <div style="flex: 1; background: linear-gradient(to right, #add8e6, #add8e6); display: flex; flex-direction: column; align-items: center; justify-content: center;">
        <img src="{{ asset('assets/Ferro.png') }}" alt="Ferro Center Logo" style="width: 50%; margin-bottom: 20px;">
        <h1 style="color: #333; font-size: 24px;">Bienvenido a tu ferreteria</h1>
    </div>

    <!-- Contenedor del formulario de login a la derecha -->
    <div style="flex: 1; display: flex; align-items: center; justify-content: center; background: linear-gradient(to right, #6a11cb, #2575fc);">
        <div class="card" style="width: 100%; max-width: 420px; background-color: rgba(255, 255, 255, 0.8); padding: 20px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
            <div class="card-body">
                <h2 class="text-center mb-4">Login to your account</h2>
                <form action="{{ route('login') }}" method="post" novalidate>
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="your@email.com" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Your password" required>
                        <div class="mt-3">
                            <a href="{{ route('password.request') }}">I forgot my password</a>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Sign in</button>
                </form>
                @if(Route::has('register'))
                    <div class="mt-3 text-center">
                        Don't have an account? <a href="{{ route('register') }}">Sign up</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

