@extends('layouts.master')
@section('title', 'Yellow Club - Pagar')
@section('content')
    <div class="content">
        <div class="blog" style="background: #fff">
            <p style="color: #4d4d4d" class="blog__url"><a href="/">Home</a> / Carrito</p>
        </div>
    </div>
    <div class="main">
        <div class="content padding-bottom-3">
            <div class="account">
                @component('account', ['user' => 'img/account-30.png', 'cart' => 'img/account-29.png', 'active' => 'cart'])
                @endcomponent
                <div class="account__right">
                    <h1>Detalle del pedido</h1>
                    <div class="account__right__form" style="max-width: 100%">
                        @php $subtotal = 0;
                    use Gloudemans\Shoppingcart\Facades\Cart;
                        @endphp
                        @foreach(Cart::content() as $c)
                            @php
                                $pro = \App\Models\Product::find($c->id);
                            @endphp
                            <table class="table-buy" style="width: 100% !important;">
                                <tr>
                                    <td><img src="{{ asset($pro->image) }}" alt="yellow product"></td>
                                    <td>{{ $c->name }}<br>Cantidad: {{ $c->qty }} <p>${{ number_format($c->price,0,',','.') }}</p></td>
                                </tr>
                            </table>
                        @endforeach
                        <p class="summary">Resumen de tu pedido</p>
                        <div class="c-summary clearfix width-100">
                            <div class="info-address border-blue">
                                <h2>Envío a domicilio<br>Dirección: {{ $address->description }}</h2>
                                <p>Nombre: {{ $address->name }}</p>
                                <p>Dirección: {{ $address->address }}</p>
                                <p>País: {{ $address->country->PaisNombre }}</p>
                                <p>Departamento: {{ $address->distric->DisNombre }}</p>
                                <p>Ciudad: {{ $address->city->CiuNombre }}</p>
                                <p>Celular: {{ $address->cellphone }}</p>
                                <p>Teléfono: {{ $address->phone }}</p>
                                <input type="hidden" id="address" value="{{ $id }}">
                            </div>
                            <div class="info-address border-blue float-right margin-right-0">
                                <div class="subtotal align-middle row">
                                    <div class="columns medium-6">Subtotal</div>
                                    <div class="columns medium-6">${{ number_format(str_replace(',','', Cart::subtotal()),0,',','.') }}</div>
                                </div>
                                <div class="subtotal align-middle row">
                                    <div class="columns medium-6">Envío</div>
                                    <div class="columns medium-6">${{ number_format($address->city->flete,0,',','.') }}</div>
                                </div>
                                <div class="subtotal align-middle row" style="border: 0">
                                    <div class="columns medium-6">Total</div>
                                    <div class="columns medium-6">${{ number_format(str_replace(',','', Cart::subtotal()) + $address->city->flete,0,',','.') }}</div>
                                </div>
                            </div>
                        </div>
                        <input type="button" id="finish" class="button-buy float-right margin-top-2" value="Pagar">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        const baseUrl = '{{ url('/') }}';
        function cargar(reference) {
            location.href = "/payu/" + reference;
        }
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
    </script>
@endsection