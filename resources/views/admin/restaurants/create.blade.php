@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h5 class="card-header">{{ __('Registra il tuo ristorante') }}
                    </h5>

                    <div class="card-body">
                        <form class="row g-3"
                            action="{{ route('admin.restaurants.store') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')

                            <div class="col-md-6">
                                <label class="form-label"
                                    for="name">{{ __('Nome') }} *</label>
                                <input
                                    class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" type="text"
                                    value="{{ old('name') }}" minlength="3"
                                    autocomplete="organization" required autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
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

                            <div class="col-md-6">
                                <label class="form-label"
                                    for="street_address">{{ __('Indirizzo') }}
                                    *</label>
                                <input
                                    class="form-control @error('street_address') is-invalid @enderror"
                                    id="street_address" name="street_address"
                                    type="text"
                                    value="{{ old('street_address') }}"
                                    placeholder="Via Monte Pascoli 38"
                                    autocomplete="street-address" required>

                                @error('street_address')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label"
                                    for="city">{{ __('Città') }} *</label>
                                <input
                                    class="form-control @error('city') is-invalid @enderror"
                                    id="city" name="city" type="text"
                                    value="Roma" disabled>

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label"
                                    for="region">{{ __('Regione') }} *</label>
                                <input
                                    class="form-control @error('region') is-invalid @enderror"
                                    id="region" name="region" type="text"
                                    value="Lazio" disabled>

                                @error('region')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label"
                                    for="state">{{ __('Stato') }} *</label>
                                <input
                                    class="form-control @error('state') is-invalid @enderror"
                                    id="state" name="state" type="text"
                                    value="Italia" disabled>

                                @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label"
                                    for="zip_code">{{ __('Codice Postale') }}
                                    *</label>
                                <input
                                    class="form-control @error('zip_code') is-invalid @enderror"
                                    id="zip_code" name="zip_code" type="text"
                                    value="{{ old('zip_code') }}"
                                    pattern="[0-9]{5}" required>

                                @error('zip_code')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label class="form-label"
                                    for="image">{{ __("Carica un'immagine") }}</label>
                                <input
                                    class="form-control @error('image') is-invalid @enderror"
                                    id="image" name="image" type="file"
                                    value="{{ old('image') }}"
                                    accept=".jpg,.jpeg,.png">

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label class="form-label"
                                    for="categories">{{ __('Categorie') }}
                                    *</label>
                                <div id="categories">
                                    @foreach ($categories as $category)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input"
                                                id="{{ $category->slug }}"
                                                name="categories[]"
                                                type="checkbox"
                                                value="{{ $category->id }}"
                                                {{ in_array($category->id, old('categories', [])) ? 'checked' : '' }}>
                                            <label class="form-check-label"
                                                for="{{ $category->slug }}">{{ $category->name }}</label>
                                        </div>
                                    @endforeach
                                </div>

                                @error('categories')
                                    <div class="alert alert-danger" role="alert">
                                        {{ __('Un ristorante non può appartenere a nessuna categoria.') }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary"
                                    type="submit">{{ __('Registra') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/validation.js') }}"></script>
@endsection
