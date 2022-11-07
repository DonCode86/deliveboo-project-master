@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="py-4">
            <a class="btn btn-primary mb-4 text-white"
                href="{{ route('admin.restaurants.products.index', compact(['restaurant', 'product'])) }}">
                {{ __("Torna all'elenco piatti") }}
            </a>
        </div>
        <h1 class="text-center">{{ $product->name }}</h1>

        @if ($product->image)
            <div class="row justify-content-center">
                <img class="img-fluid" src="{{ asset('storage/' . $product->image) }}"
                    alt="{{ $product->name }}" style="width: 10rem">
            </div>
        @endif

        <table class="table-striped table-bordered table-show table py-4">
            <tr>
                <td><strong>{{ __('Nome del piatto') }}</strong></td>
                <td>{{ $product->name }}</td>
            </tr>
            <tr>
                <td><strong>{{ __('Prezzo') }}</strong></td>
                <td>{{ $product->price }} €</td>
            </tr>
            <tr>
                <td><strong>{{ __('Descrizione') }}</strong></td>
                <td>{{ $product->description }}</td>
            </tr>
            <tr>
                <td><strong>{{ __('Disponibile') }}</strong></td>
                <td>
                    @if ($product->is_available)
                        {{ __('Si') }}
                    @else
                        {{ __('No') }}
                    @endif
                </td>
            </tr>
        </table>
        <div class="d-flex justify-content-end container">
            <a class="btn btn-warning mx-5"
                href="{{ route('admin.restaurants.products.edit', compact(['restaurant', 'product'])) }}">
                {{ __('Modifica') }}
            </a>
            <form
                action="{{ route('admin.restaurants.products.destroy', compact(['restaurant', 'product'])) }}"
                method="POST">
                @csrf
                @method('DELETE')

                <button class="btn btn-danger text-white" type="submit">
                    {{ __('Elimina') }}
                </button>
            </form>
        </div>
    </div>
@endsection
