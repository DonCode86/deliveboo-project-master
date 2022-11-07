@extends('layouts.app')

@section('content')
<div class="container-fluid dashboard-container">
        <div class="dashboard-title text-white">
            <h5 class="card-dashboard-title fw-bold">
                            {{ __('Benvenuto') }}
                            <span class="text-white">
                                {{ $user->first_name }}
                            </span>
                        </h5>
        </div>
        <div class="row justify-content-center dashboard-row">
            <div class="col-md-8">
                <div class="card dashboard-card">
                    <h5 class="card-header">{{ __('Le tue informazioni') }}</h5>

                    <div class="card-body">
                        

                        <div class="card-dashboard-text">
                            <div class="row gy-2">
                                <div class="col-12 col-sm-6">
                                    <div class="fw-bold">
                                        {{ __('Email') }}
                                    </div>
                                    <a href="mailto:{{ $user->email }}">
                                        {{ $user->email }}
                                    </a>
                                </div>

                                <div class="col-12 col-sm-6">
                                    <div class="fw-bold">
                                        {{ __('Telefono') }}
                                    </div>
                                    <a href="tel:{{ $user->phone }}">
                                        {{ $user->phone }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <a class="btn btn-dark btn-dashboard" type="button"
                            href="{{ route('admin.restaurants.index') }}">
                            {{ __('Visualizza i tuoi ristoranti') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
