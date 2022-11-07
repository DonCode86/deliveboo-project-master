@php
$total = collect($order->products)->sum(function ($product) {
    return $product->price * $product->pivot->quantity;
});
$total = number_format($total, 2);
@endphp

@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-12 mb-3">
                <div class="card">
                    <div class="card-header">Dati Cliente</div>
                    <div class="card-body">
                        <div class="row g-3 mb-3">
                            <div class="col">
                                <div class="fw-bold">Nome</div>
                                <div>{{ $order->customer_first_name }}</div>
                            </div>
                            <div class="col">
                                <div class="fw-bold">Cognome</div>
                                <div>{{ $order->customer_last_name }}</div>
                            </div>
                            <div class="col">
                                <div class="fw-bold">Email</div>
                                <a
                                    href="mailto:{{ $order->customer_email }}">{{ $order->customer_email }}</a>
                            </div>
                            <div class="col">
                                <div class="fw-bold">Telefono</div>
                                <a href="tel:{{ $order->customer_phone }}">
                                    {{ $order->customer_phone }}</a>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col">
                                <div class="fw-bold">Indirizzo</div>
                                <div>{{ $order->customer_street_address }}</div>
                            </div>
                            <div class="col">
                                <div class="fw-bold">Città</div>
                                <div>{{ $order->customer_city }}</div>
                            </div>
                            <div class="col">
                                <div class="fw-bold">Regione</div>
                                <div>{{ $order->customer_region }}</div>
                            </div>
                            <div class="col">
                                <div class="fw-bold">Codice Postale</div>
                                <div>{{ $order->customer_zip_code }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <table class="table-striped table-hover table">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('Nome') }}</th>
                            <th class="text-end" scope="col">
                                {{ __('Quantità') }}</th>
                            <th class="text-end" scope="col">{{ __('Costo') }}
                            </th>
                            <th class="text-end" scope="col">{{ __('Totale') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($order->products as $product)
                            <tr>
                                <td>
                                    <a
                                        href="{{ route('admin.restaurants.products.show', compact('restaurant', 'product')) }}">
                                        {{ $product->name }}
                                    </a>
                                </td>
                                <td class="text-end">
                                    {{ $product->pivot->quantity }}</td>
                                <td class="text-end">{{ $product->price }} €</td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-end">
                                {{ $total }} €
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
