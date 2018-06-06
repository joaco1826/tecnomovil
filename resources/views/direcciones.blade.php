@extends('layouts.master')
@section('title', 'Yellow Club - Direcciones')
@section('content')
    <div class="content">
        <div class="blog" style="background: #fff">
            <p style="color: #4d4d4d" class="blog__url"><a href="/">Home</a> / Mis Direcciones</p>
        </div>
    </div>
    <div class="main">
        <div class="content padding-bottom-3">
            <div class="account">
                @component('account', ['user' => 'img/account-28.png', 'cart' => 'img/account-31.png', 'active' => 'address'])
                @endcomponent
                <div class="account__right">
                    <h1>Mis direcciones</h1>
                    <div class="account__right__form clearfix" style="max-width: 85%">
                        @foreach($address as $a)
                            <div class="info-address margin-bottom-1">
                                <h2>Dirección: {{ $a->description }}</h2>
                                <p>Nombre: {{ $a->name }}</p>
                                <p>Dirección: {{ $a->address }}</p>
                                <p>País: {{ $a->country->PaisNombre }}</p>
                                <p>Departamento: {{ $a->distric->DisNombre }}</p>
                                <p>Ciudad: {{ $a->city->CiuNombre }}</p>
                                <p>Celular: {{ $a->cellphone }}</p>
                                <p>Teléfono: {{ $a->phone }}</p>
                                <div class="margin-top-1">
                                    <a href="{{ url("/editar-direccion/".$a->id) }}"><img src="{{ asset("img/ad-28.png") }}" alt="edit"> Editar</a>
                                    <a href="#" class="delete_address" data-id="{{ $a->id }}"><img class="margin-left-1" src="{{ asset("img/ad-29.png") }}" alt="delete"> Eliminar</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a href="{{ url("/nueva-direccion") }}"><input type="button" class="button-buy margin-top-2 margin-left-0" value="Agregar dirección" style="color: #333; font-weight: 700; padding: .5rem 2rem"></a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
    </script>
@endsection