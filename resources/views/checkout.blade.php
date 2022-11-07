@extends('layouts.app')

@section('content')
    <div class="checkout-container">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <h5 class="card-header text-center">{{ __('Checkout') }}</h5>

                        <div class="card-body">
                            <form class="row g-3" id="payment-form"
                                action="{{ route('payment.checkout') }}"
                                method="POST">
                                @csrf
                                @method('POST')

                                <div class="col-md-6">
                                    <label class="form-label"
                                        for="first_name">{{ __('Nome') }}
                                        *</label>
                                    <input
                                        class="form-control @error('first_name') is-invalid @enderror"
                                        id="first_name" name="first_name"
                                        type="text"
                                        value="{{ old('first_name') }}" required
                                        autocomplete="given-name" autofocus>

                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label"
                                        for="last_name">{{ __('Cognome') }}
                                        *</label>
                                    <input
                                        class="form-control @error('last_name') is-invalid @enderror"
                                        id="last_name" name="last_name"
                                        type="text"
                                        value="{{ old('last_name') }}" required
                                        autocomplete="family-name">

                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label"
                                        for="email">{{ __('Email') }} *</label>
                                    <input
                                        class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" type="email"
                                        value="{{ old('email') }}"
                                        autocomplete="email"
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
                                        for="city">{{ __('Città') }}
                                        *</label>
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
                                        for="region">{{ __('Regione') }}
                                        *</label>
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
                                        for="state">{{ __('Stato') }}
                                        *</label>
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
                                        id="zip_code" name="zip_code"
                                        type="text"
                                        value="{{ old('zip_code') }}"
                                        pattern="[0-9]{5}" required>

                                    @error('zip_code')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div id="dropin-container"></div>

                                <div class="col-12">
                                    <button
                                        class="btn btn-success btn-checkout w-100 fs-5"
                                        type="submit">{{ __('Conferma Pagamento') }}</button>
                                </div>

                                <input id="nonce" name="payment_method_nonce"
                                    type="hidden" />
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card" id="cart">
                        <div class="card-header">
                            Carrello
                        </div>
                        <ul class="list-group list-group-flush" id="cart-products"
                            style="max-height: 40rem; overflow-y: auto">
                            <li class="list-group-item">
                                <span class="fw-bold fs-5"
                                    id="cart-restaurant">Nome
                                    Ristorante</span>
                            </li>
                        </ul>
                        <div class="card-footer">
                            <span class="fw-bold">Totale:</span>
                            <span id="cart-total">0,00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/validation.js') }}"></script>

    <script
        src="https://js.braintreegateway.com/web/dropin/1.33.4/js/dropin.min.js">
    </script>

    <script>
        const form = document.getElementById('payment-form');

        braintree.dropin.create({
            authorization: '{{ $clientToken }}',
            container: '#dropin-container'
        }).then((dropinInstance) => {
            form.addEventListener('submit', (event) => {
                event.preventDefault();

                dropinInstance.requestPaymentMethod().then((
                    payload) => {
                    // Step four: when the user is ready to complete their
                    //   transaction, use the dropinInstance to get a payment
                    //   method nonce for the user's selected payment method, then add
                    //   it a the hidden field before submitting the complete form to
                    //   a server-side integration
                    document.getElementById('nonce').value =
                        payload.nonce;
                    localStorage.removeItem('cart');
                    form.submit();
                }).catch((error) => {
                    throw error;
                });
            });
        }).catch((error) => {
            // handle errors
        });
    </script>

    <script>
        function addHidden(form, key, value) {
            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = key;
            input.value = value;
            form.appendChild(input);
        }

        let cart = null;
        if (localStorage.getItem('cart')) {
            try {
                cart = JSON.parse(localStorage.getItem('cart'));
            } catch (ex) {
                localStorage.removeItem('cart');
            }
        }

        // temporary fix
        if (!cart || (cart && Object.values(cart).length <= 0)) {
            window.location.replace("/");
        }

        const cartValues = Object.values(cart);
        const cartFirstEntry = cartValues[0];
        const restaurant = cartFirstEntry.restaurant;
        const products = cartValues
            .map(order => order.product)
            .map(product => JSON.stringify(product) + '|');
        const total = cartValues.reduce((sum, {
            product
        }) => sum + product.total, 0);

        const paymentForm = document.getElementById('payment-form');
        addHidden(paymentForm, 'restaurant', JSON.stringify(restaurant));
        addHidden(paymentForm, 'products', products);
        addHidden(paymentForm, 'cart_total', total);

        // render cart
        const restaurantDiv = document.getElementById('cart-restaurant');
        restaurantDiv.innerHTML = restaurant.name;

        const productsList = document.getElementById("cart-products");
        const realProducts = cartValues.map(order => order.product)
        realProducts.forEach(product => {
            productsList.innerHTML +=
                `<li class="list-group-item"><span class="fw-bold">${product.name}</span> <span>x${product.quantity}</span></li>`
        })

        const currency = new Intl.NumberFormat('it-IT', {
            style: 'currency',
            currency: 'EUR',
            minimumFractionDigits: 2,
            maximumFractionDigits: 2,
        });
        const totalDiv = document.getElementById('cart-total');
        totalDiv.innerHTML = currency.format(total);
    </script>
@endsection
