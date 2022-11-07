@extends('layouts.app')

@section('content')
    <div class="restaurant-show-container">

        <div class="div d-flex justify-content-center container-fluid pt-4">
            <a class="btn btn-primary mb-4 text-white"
                href="{{ route('admin.restaurants.index', $restaurant) }}">
                {{ __('I tuoi ristoranti') }}
            </a>
        </div>
        <div class="d-flex justify-content-center container">
            <div class="card show-card text-center" style="width: 30rem;">
                @if ($restaurant->image)
                    <div class="d-flex justify-content-center mt-4">
                        <img src="{{ asset("storage/{$restaurant->image}") }}"
                            alt="{{ $restaurant->name }}" width="200"
                            height="200">
                    </div>
                @endif
                <div class="card-body">
                    <h1 class="card-title">
                        {{ $restaurant->name }}
                    </h1>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <span class="fw-bold">{{ __('Indirizzo') }}</span>:
                        {{ $restaurant->street_address }}
                    </li>
                    <li class="list-group-item"><span
                            class="fw-bold">{{ __('Città') }}</span>:
                        {{ $restaurant->city }}</li>
                    <li class="list-group-item"><span
                            class="fw-bold">{{ __('Telefono') }}</span>:
                        {{ $restaurant->phone }}</li>
                    <li class="list-group-item"><span
                            class="fw-bold">{{ __('Email') }}</span>:
                        {{ $restaurant->email }}</li>
                </ul>
                <div class="card-body d-flex justify-content-around">
                    <a class="btn btn-primary text-white"
                        href="{{ route('admin.restaurants.products.index', $restaurant) }}">
                        {{ __('I tuoi piatti') }}
                    </a>
                    <a class="btn btn-primary text-white"
                        href="{{ route('admin.restaurants.products.create', $restaurant) }}">
                        {{ __('Crea un nuovo piatto') }}
                    </a>
                    <a class="btn btn-primary text-white"
                        href="{{ route('admin.restaurants.orders.index', $restaurant) }}">
                        {{ __('I tuoi ordini') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
