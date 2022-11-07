@extends('layouts.app')

@section('content')
    <div class="background-login pt-5">
        <div class="container">
            <div class="row justify-content-center login-form-container">
                <div class="col-md-8">
                    <div class="card login-card">
                        <h5 class="card-header card-header-color">{{ __('Accedi') }}
                        </h5>

                        <div class="card-body card-body-color">
                            <form class="row g-3" action="{{ route('login') }}"
                                method="POST">
                                @csrf
                                @method('POST')

                                <div class="col-md-12">
                                    <div class="row">
                                        <label
                                            class="col-md-4 col-form-label text-md-end"
                                            for="email">{{ __('Email') }}</label>

                                        <div class="col-md-6">
                                            <input
                                                class="form-control @error('email') is-invalid @enderror"
                                                id="email" name="email"
                                                type="email"
                                                value="{{ old('email') }}"
                                                autocomplete="email"
                                                pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$"
                                                required autofocus>

                                            @error('email')
                                                <span class="invalid-feedback"
                                                    role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="row">
                                        <label
                                            class="col-md-4 col-form-label text-md-end"
                                            for="password">{{ __('Password') }}</label>

                                        <div class="col-md-6">
                                            <input
                                                class="form-control @error('password') is-invalid @enderror"
                                                id="password" name="password"
                                                type="password"
                                                autocomplete="current-password"
                                                minlength="8" required>

                                            @error('password')
                                                <span class="invalid-feedback"
                                                    role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input"
                                                    id="remember" name="remember"
                                                    type="checkbox"
                                                    {{ old('remember') ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="remember">
                                                    {{ __('Ricordami') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-8 offset-md-4">
                                    <button class="btn btn-primary login-btn"
                                        type="submit">{{ __('Accedi') }}</button>
                                    <a class="btn btn-secondary login-btn"
                                        type="button"
                                        href="{{ route('register') }}">
                                        {{ __('Non hai un account? Registrati ora!') }}
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/validation.js') }}"></script>
@endsection
