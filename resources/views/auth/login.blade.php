@extends('layouts.app')

@section('content')
<div class="container mt-5" style="max-width: 700px; display: flex; align-items: center; gap: 3rem; margin-top:800px">

    {{-- Başlık --}}
    <div style="flex: 1; text-align: center; margin-left:-90px;">
        <h1 style="font-weight: 700; font-size: 2.5rem;">Müşteri Yönetimi Sistemi</h1>
    </div>

    {{-- Login Formu --}}
    <div style="flex: 1; max-width: 420px;">

        {{-- Oturum Durumu Mesajı --}}
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Email --}}
            <div class="mb-3">
                <label for="email" class="form-label">{{ __('Email') }}</label>
                <input
                    id="email"
                    type="email"
                    class="form-control @error('email') is-invalid @enderror"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    autocomplete="username"
                >
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Şifre --}}
            <div class="mb-3">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <input
                    id="password"
                    type="password"
                    class="form-control @error('password') is-invalid @enderror"
                    name="password"
                    required
                    autocomplete="current-password"
                >
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Beni Hatırla --}}
            <div class="form-check mb-3">
                <input
                    class="form-check-input"
                    type="checkbox"
                    name="remember"
                    id="remember_me"
                    {{ old('remember') ? 'checked' : '' }}
                >
                <label class="form-check-label" for="remember_me">
                    {{ __('Remember me') }}
                </label>
            </div>

            {{-- Buton ve Şifremi Unuttum Linki --}}
            <div class="d-flex justify-content-between align-items-center mb-3">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-decoration-underline">
                        {{ __('Şifrenizi mi unuttunuz?') }}
                    </a>
                @endif

                <button type="submit" class="btn btn-primary">
                    {{ __('Giriş Yap') }}
                </button>
            </div>
        </form>

        {{-- Kayıt Ol Linki --}}
        <div class="mt-3 text-center">
            <span>Hesabınız yok mu? </span>
            <a href="{{ route('register') }}">Kayıt olun</a>
        </div>
    </div>

</div>
@endsection
