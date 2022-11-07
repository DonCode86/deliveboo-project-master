@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center g-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        Conferma Ordine
                    </div>
                    <div class="card-body">
                        <h5 class="card-title card-title-order-confirm">Il tuo ordine
                            è stato
                            effettuato con
                            successo!</h5>
                        <div class="card-text card-order-confirm">
                            <div>
                                Ecco il riepilogo del tuo ordine presso:
                                {{ $restaurant->name }}
                            </div>
                            <ul>
                                @foreach ($order->products as $product)
                                    <li><span
                                            class="fw-bold">{{ $product->name }}</span>
                                        x{{ $product->pivot->quantity }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <a class="btn btn-primary text-white" href="/">Torna
                            alla
                            home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
