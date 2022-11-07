@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">

        <div class="container">
            <div class="d-flex justify-content-between mb-5">
                <a class="btn btn-primary text-white"
                    href="{{ route('admin.restaurants.show', $restaurant) }}">
                    {{ __('Home Ristorante') }}
                </a>
                <a class="btn btn-primary text-white"
                    href="{{ route('admin.restaurants.index', $restaurant) }}">
                    {{ __('I tuoi ristoranti') }}
                </a>
                <a class="btn btn-primary text-white"
                    href="{{ route('admin.restaurants.products.create', $restaurant) }}">
                    {{ __('Aggiungi un piatto') }} &#43
                </a>
            </div>
            <div class="mb-5 text-center">
                <h1>I tuoi piatti</h1>
            </div>
            <table class="table-striped table-hover table align-baseline">
                <thead>
                    <tr>
                        <th scope="col">{{ __('Nome') }}</th>
                        <th scope="col">{{ __('Descrizione') }}</th>
                        <th scope="col">{{ __('Prezzo') }}</th>
                        <th class="text-center" scope="col">{{ __('Immagine') }}
                        </th>
                        <th class="text-center" scope="col">
                            {{ __('Disponibilità') }}
                        </th>
                    </tr>
                </thead>
                <div class="row">
                    @foreach ($products as $product)
                        <tr class="table-active">
                            <td scope="col">{{ $product->name }}</td>
                            <td scope="col">
                                <span class="d-inline-block text-truncate"
                                    style="max-width: 150px;">
                                    {{ $product->description }}
                                </span>
                            </td>
                            <td scope="col">{{ $product->price }} €</td>
                            <td class="text-center" scope="col">
                                @if ($product->image)
                                    <img src="{{ asset("storage/{$product->image}") }}"
                                        alt="" style="width: 5rem">
                                @endif
                            </td>
                            <td class="text-center" scope="col">
                                @if ($product->is_available)
                                    <span>{{ __('Disponibile') }}</span>
                                @else
                                    <span>{{ __('Non disponibile') }}</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a class="btn btn-primary text-white"
                                    href="{{ route('admin.restaurants.products.show', compact(['restaurant', 'product'])) }}">{{ __('Visualizza') }}</a>

                                <a class="btn btn-warning mx-4"
                                    href="{{ route('admin.restaurants.products.edit', compact(['restaurant', 'product'])) }}">{{ __('Modifica') }}</a>

                                <!-- Button trigger modal -->
                                <button class="btn btn-danger text-white"
                                    data-bs-toggle="modal"
                                    data-bs-target="#delete-product" type="button">
                                    {{ __('Elimina') }}
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="delete-product"
                                    aria-labelledby="delete-productLabel"
                                    aria-hidden="true" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"
                                                    id="delete-productLabel">
                                                    {{ __('Conferma eliminazione') }}
                                                </h5>
                                                <button class="btn-close"
                                                    data-bs-dismiss="modal"
                                                    type="button"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                {{ __('Sei sicuro di voler eliminare il prodotto') }}
                                                {{ "\"{$product->name}\"?" }}
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary"
                                                    data-bs-dismiss="modal"
                                                    type="button">Chiudi</button>
                                                <form class="d-inline"
                                                    action="{{ route('admin.restaurants.products.destroy', compact(['restaurant', 'product'])) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button
                                                        class="btn btn-danger text-white"
                                                        type="submit">{{ __('Elimina') }}</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </div>
            </table>
        </div>
    </div>
@endsection
