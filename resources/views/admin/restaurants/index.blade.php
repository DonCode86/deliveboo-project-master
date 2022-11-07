@extends('layouts.app')

@section('content')
    <div class="container-fluid index-container">
        @foreach ($restaurants as $restaurant)
            <div class="index-title-container text-white">
                <h5 class="index-title">{{ $restaurant->name }}</h5>
            </div>
            <div class="row justify-content-center index-row">
                <div class="col-md-8">
                    <div class="card index-card">
                        <div class="card-header fw-bold">
                            {{ __('Dettagli del tuo ristorante') }}
                        </div>
                        <div class="card-body">
                            <div class="card-index-text">
                                <div class="row gy-2">
                                    <div class="col-12 col-sm-6">
                                        <div class="fw-bold">
                                            {{ __('Email') }}
                                        </div>
                                        <a href="mailto:{{ $restaurant->email }}">
                                            {{ $restaurant->email }}
                                        </a>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <div class="fw-bold">
                                            {{ __('Telefono') }}
                                        </div>
                                        <a href="tel:{{ $restaurant->phone }}">
                                            {{ $restaurant->phone }}
                                        </a>
                                    </div>
                                </div>

                                <address class="row gy-2 mt-3">
                                    <div class="col-12 col-sm-6 col-md-3">
                                        <div class="fw-bold">
                                            {{ __('Indirizzo') }}
                                        </div>
                                        <div>
                                            {{ $restaurant->street_address }}
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6 col-md-3">
                                        <div class="fw-bold">
                                            {{ __('Città') }}
                                        </div>
                                        <div>
                                            {{ $restaurant->city }}
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6 col-md-3">
                                        <div class="fw-bold">
                                            {{ __('Regione') }}
                                        </div>
                                        <div>
                                            {{ $restaurant->region }}
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6 col-md-3">
                                        <div class="fw-bold">
                                            {{ __('Codice Postale') }}
                                        </div>
                                        <div>
                                            {{ $restaurant->zip_code }}
                                        </div>
                                    </div>
                                </address>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <div class="row gy-2">
                                <div class="col-12 col-lg-4">
                                    <a class="btn btn-dark btn-index" type="button"
                                        href="{{ route('admin.restaurants.show', $restaurant) }}">
                                        {{ __('Visualizza ristorante') }}
                                    </a>
                                </div>

                                <div class="col-12 col-lg-4">
                                    <a class="btn btn-primary btn-index-show"
                                        type="button"
                                        href="{{ route('admin.restaurants.products.index', $restaurant) }}">
                                        {{ __('Visualizza piatti') }}
                                    </a>
                                </div>

                                <div class="col-12 col-lg-4">
                                    <a class="btn btn-warning" type="button"
                                        href="{{ route('admin.restaurants.orders.index', $restaurant) }}">
                                        {{ __('Visualizza ordini') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
