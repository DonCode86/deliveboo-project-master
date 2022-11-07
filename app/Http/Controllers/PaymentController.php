<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\NewOrderConfirmation;
use App\Mail\NewOrderRequest;
use App\Order;
use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function checkout()
    {
        $gateway = new \Braintree\Gateway([
            'environment' => env('BRAINTREE_ENV'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY')
        ]);

        $clientToken = $gateway->clientToken()->generate();

        return view('checkout', compact('clientToken'));
    }

    public function process(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|min:12|max:14|regex:/^\+(?:[0-9] ?){6,14}[0-9]$/',
            'street_address' => 'required|string|max:255',
            'city' => 'nullable|sometimes|string|min:3|max:50',
            'region' => 'nullable|sometimes|string|min:3|max:50',
            'state' => 'nullable|sometimes|string|min:3|max:50',
            'zip_code' => 'required|numeric',
            'restaurant' => 'required',
            'products' => 'required',
            'cart_total' => 'required|regex:/^\d{1,3}([,.]\d{0,2})?$/'
        ]);

        $gateway = new \Braintree\Gateway([
            'environment' => env('BRAINTREE_ENV'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY')
        ]);

        $result = $this->makeTransaction($gateway, $request, $data);

        if ($result->success) {
            $order = $this->createOrder($data);
            $restaurant = json_decode($data['restaurant']);

            // send to restaurant
            Mail::to($restaurant->email)->send(new NewOrderRequest($order));
            // send to customer
            Mail::to($data['email'])->send(new NewOrderConfirmation($restaurant->id, $order));

            return view('order-confirmed', [
                'restaurant' => Restaurant::find($restaurant->id),
                'order' => $order
            ]);
        } else {
            $errors = $result->errors->deepAll();
            dd($errors);
        }
    }

    private function createOrder(array $data) {
        $order = new Order();
        $order->fill([
            'customer_first_name' => $data['first_name'],
            'customer_last_name' => $data['last_name'],
            'customer_email' => $data['email'],
            'customer_phone' => $data['phone'],
            'customer_street_address' => $data['street_address'],
            'customer_city' => 'Roma',
            'customer_region' => 'Lazio',
            'customer_state' => 'Italy',
            'customer_zip_code' => $data['zip_code']
        ]);
        $order->total = $data['cart_total'];

        $order->save();

        $products = $this->getProducts($data);
        $order->products()->sync($products);

        return $order;
    }

    private function getProducts(array $data) {
        $products = collect(str_replace('|', '', explode("|,", $data['products'])));
        $products = $products
            ->map(function ($product) {
                return json_decode($product);
            });
        $productIds = $products
            ->map(function ($product) {
                return $product->id;
            });
        $productQuantities = $products
            ->map(function ($product) {
                return [
                    'quantity' => $product->quantity
                ];
            });
        $products = array_combine($productIds->toArray(), $productQuantities->toArray());

        return $products;
    }

    private function makeTransaction(\Braintree\Gateway $gateway, Request $request, array $data) {
        $result = $gateway->transaction()->sale([
            'amount' => $data['cart_total'],
            'paymentMethodNonce' => $request->get('payment_method_nonce'),
            'customer' => [
                'firstName' => $data['first_name'],
                'lastName' => $data['last_name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
            ],
            'billing' => [
                'firstName' => $data['first_name'],
                'lastName' => $data['last_name'],
                'streetAddress' => $data['street_address'],
                'locality' => 'Roma',
                'region' => 'Lazio',
                'countryName' => 'Italy',
                'postalCode' => $data['zip_code'],
            ],
            'shipping' => [
                'firstName' => $data['first_name'],
                'lastName' => $data['last_name'],
                'streetAddress' => $data['street_address'],
                'locality' => 'Roma',
                'region' => 'Lazio',
                'countryName' => 'Italy',
                'postalCode' => $data['zip_code'],
            ],
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        return $result;
    }
}
