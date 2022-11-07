@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center g-3">
            <div class="col-12">
                <a class="btn btn-primary mb-3 text-white"
                    href="{{ route('admin.restaurants.show', $restaurant) }}">
                    {{ __('Torna al ristorante') }}
                </a>
                <a class="btn btn-primary mb-3 text-white"
                    href="{{ route('admin.restaurants.index') }}">
                    {{ __('Torna alla lista ristoranti') }}
                </a>
            </div>

            <div class="col-12">
                <table class="table-striped table-hover table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ __('Nome') }}</th>
                            <th scope="col">{{ __('Cognome') }}</th>
                            <th scope="col">{{ __('Email') }}</th>
                            <th scope="col">{{ __('Telefono') }}</th>
                            <th scope="col">{{ __('Indirizzo') }}</th>
                            <th scope="col">{{ __('Città') }}</th>
                            <th scope="col">{{ __('Regione') }}</th>
                            <th scope="col">{{ __('Stato') }}</th>
                            <th scope="col">
                                {{ __('Codice Postale') }}</th>
                            <th scope="col">
                                {{ __('Totale Ordine') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <th scope="row">
                                    <a
                                        href="{{ route('admin.restaurants.orders.show', compact('restaurant', 'order')) }}">
                                        {{ $order->id }}
                                    </a>
                                </th>
                                <td>{{ $order->customer_first_name }}</td>
                                <td>{{ $order->customer_last_name }}</td>
                                <td>{{ $order->customer_email }}</td>
                                <td>{{ $order->customer_phone }}</td>
                                <td>{{ $order->customer_street_address }}</td>
                                <td>{{ $order->customer_city }}</td>
                                <td>{{ $order->customer_region }}</td>
                                <td>{{ $order->customer_state }}</td>
                                <td>{{ $order->customer_zip_code }}</td>
                                <td>{{ $order->total }} €</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
