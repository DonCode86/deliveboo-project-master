@extends('layouts.app')

@section('content')
<div class="background-register">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card register-card">
                    <h5 class="card-header card-header-color">{{ __('Registrati') }}</h5>

                    <div class="card-body card-body-color">
                        <form class="row g-3" action="{{ route('register') }}"
                            method="POST">
                            @csrf
                            @method('POST')

                            <div class="col-md-6">
                                <label class="form-label"
                                    for="first_name">{{ __('Nome') }} *</label>
                                <input
                                    class="form-control @error('first_name') is-invalid @enderror"
                                    id="first_name" name="first_name" type="text"
                                    value="{{ old('first_name') }}" required
                                    autocomplete="given-name" autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label"
                                    for="last_name">{{ __('Cognome') }} *</label>
                                <input
                                    class="form-control @error('last_name') is-invalid @enderror"
                                    id="last_name" name="last_name" type="text"
                                    value="{{ old('last_name') }}" required
                                    autocomplete="family-name">

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label class="form-label"
                                    for="email">{{ __('Email') }} *</label>
                                <input
                                    class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" type="email"
                                    value="{{ old('email') }}" autocomplete="email"
                                    pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$"
                                    required>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label"
                                    for="password">{{ __('Password') }} *</label>
                                <input
                                    class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" type="password"
                                    autocomplete="new-password" minlength="8"
                                    required>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label"
                                    for="password_confirmation">{{ __('Conferma Password') }}
                                    *</label>
                                <input class="form-control"
                                    id="password_confirmation"
                                    name="password_confirmation" type="password"
                                    autocomplete="new-password" minlength="8"
                                    required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label"
                                    for="phone">{{ __('Numero di telefono') }}
                                    *</label>
                                <input
                                    class="form-control @error('phone') is-invalid @enderror"
                                    id="phone" name="phone" type="tel"
                                    value="{{ old('phone') }}"
                                    placeholder="+393#########" required
                                    autocomplete="tel"
                                    pattern="^\+(?:[0-9] ?){6,14}[0-9]$">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label"
                                    for="vat">{{ __('Partita IVA') }}
                                    *</label>
                                <input
                                    class="form-control @error('vat') is-invalid @enderror"
                                    id="vat" name="vat" type="text"
                                    value="{{ old('vat') }}"
                                    placeholder="IT###########"
                                    pattern="(?:(AT)\s*(U\d{8}))|(?:(BE)\s*(0?\d{*}))|(?:(CZ)\s*(\d{8,10}))|(?:(DE)\s*(\d{9}))|(?:(CY)\s*(\d{8}[A-Z]))|(?:(DK)\s*(\d{8}))|(?:(EE)\s*(\d{9}))|(?:(GR)\s*(\d{9}))|(?:(ES|NIF:?)\s*([0-9A-Z]\d{7}[0-9A-Z]))|(?:(FI)\s*(\d{8}))|(?:(FR)\s*([0-9A-Z]{2}\d{9}))|(?:(GB)\s*((\d{9}|\d{12})~(GD|HA)\d{3}))|(?:(HU)\s*(\d{8}))|(?:(IE)\s*(\d[A-Z0-9\\+\\*]\d{5}[A-Z]))|(?:(IT)\s*(\d{11}))|(?:(LT)\s*((\d{9}|\d{12})))|(?:(LU)\s*(\d{8}))|(?:(LV)\s*(\d{11}))|(?:(MT)\s*(\d{8}))|(?:(NL)\s*(\d{9}B\d{2}))|(?:(PL)\s*(\d{10}))|(?:(PT)\s*(\d{9}))|(?:(SE)\s*(\d{12}))|(?:(SI)\s*(\d{8}))|(?:(SK)\s*(\d{10}))|(?:\D|^)(\d{11})(?:\D|$)|(?:(CHE)(-|\s*)(\d{3}\.\d{3}\.\d{3}))|(?:(SM)\s*(\d{5}))/i"
                                    required>

                                @error('vat')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary"
                                    type="submit">{{ __('Registrati') }}</button>
                                <a class="btn btn-secondary" type="button"
                                    href="{{ route('login') }}">
                                    {{ __('Hai già un account? Accedi ora!') }}
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
