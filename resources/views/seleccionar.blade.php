@extends('layouts.master')
@section('title', 'Tecnomovil del caribe - Seleccionar dirección')
@section('content')
    <div class="content">
        <div class="blog" style="background: #fff">
            <p style="color: #4d4d4d" class="blog__url"><a href="/">Home</a> / Seleccionar dirección</p>
        </div>
    </div>
    <div class="main">
        <div class="content padding-bottom-3">
            <div class="account">
                @component('account', ['user' => 'img/account-30.png', 'cart' => 'img/account-29.png', 'active' => 'cart'])
                @endcomponent
                <div class="account__right">
                    <h1>Seleccionar dirección</h1>
                    <form id="address">
                        <div class="account__right__form clearfix" style="max-width: 85%">
                            @foreach($address as $a)
                                <div class="info-address margin-bottom-1" data-id="{{ $a->id }}">
                                    <input type="radio" class="radio" name="radioAddress" value="{{ $a->id }}"><br>
                                    <h2>Dirección: {{ $a->description }}</h2>
                                    <p>Nombre: {{ $a->name }}</p>
                                    <p>Dirección: {{ $a->address }}</p>
                                    <p>País: {{ $a->country->PaisNombre }}</p>
                                    <p>Departamento: {{ $a->distric->DisNombre }}</p>
                                    <p>Ciudad: {{ $a->city->CiuNombre }}</p>
                                    <p>Celular: {{ $a->cellphone }}</p>
                                    <p>Teléfono: {{ $a->phone }}</p>
                                </div>
                            @endforeach
                        </div>
                        <a href="{{ url("/nueva-direccion") }}"><input type="button" class="button-agg float-left" value="Agregar dirección" style="background-color: #999;"></a>
                        <a class="continue" href=""><input type="button" class="button-buy float-left" value="Continuar al pago" style="font-weight: 700;"></a>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection