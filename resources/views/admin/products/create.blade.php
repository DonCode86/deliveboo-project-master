@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="div d-flex justify-content-between">
                    <a class="btn btn-primary mb-3 text-white"
                        href="{{ route('admin.restaurants.show', $restaurant) }}">
                        {{ __('Torna al ristorante') }}
                    </a>
                    <a class="btn btn-primary mb-3 text-white"
                        href="{{ route('admin.restaurants.products.index', compact(['restaurant'])) }}">
                        {{ __('Vai alla lista dei piatti') }}
                    </a>

                </div>
                <div class="card">
                    <h5 class="card-header">{{ __('Aggiungi un prodotto') }}</h5>

                    <div class="card-body">
                        <form class="row g-3"
                            action="{{ route('admin.restaurants.products.store', $restaurant) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')

                            <div class="col-md-12">
                                <label class="form-label"
                                    for="name">{{ __('Nome') }} *</label>
                                <input
                                    class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" type="text"
                                    value="{{ old('name') }}" required autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label class="form-label"
                                    for="description">{{ __('Descrizione') }}</label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                    id="description" name="description" value="{{ old('description') }}"
                                    rows="3"></textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label"
                                    for="price">{{ __('Prezzo') }} *</label>
                                <div class="input-group">
                                    <div class="input-group-text">€</div>
                                    <input
                                        class="form-control @error('price') is-invalid @enderror"
                                        id="price" name="price" type="number"
                                        value="{{ old('price') }}" min="0"
                                        max="999" step=".10"
                                        placeholder="0.00"
                                        pattern="^\d{1,3}([,.]\d{0,2})?$" required>
                                </div>

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
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

                            <div class="form-group form-check mx-2">
                                <input
                                    class="form-check-input @error('is_available') is-invalid @enderror"
                                    id="is_available" name="is_available"
                                    type="checkbox"
                                    {{ old('is_available') ? 'checked' : '' }}>
                                <label class="form-check-label"
                                    for="is_available">Disponibile</label>

                                @error('is_available')
                                    <div class="alert alert-danger">{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary text-white"
                                    type="submit">{{ __('Aggiungi') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/validation.js') }}"></script>
@endsection
