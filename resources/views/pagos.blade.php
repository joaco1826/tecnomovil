@extends('layouts.master')
@section('title', 'Yellow Club - Mis pedidos')
@section('content')
    <div class="content">
        <div class="blog" style="background: #fff">
            <p style="color: #4d4d4d" class="blog__url"><a href="/">Home</a> / Mis Compras</p>
        </div>
    </div>
    <div class="main">
        <div class="content padding-bottom-3">
            <div class="account">
                @component('account', ['user' => 'img/account-30.png', 'cart' => 'img/account-29.png', 'active' => 'payments'])
                @endcomponent
                <div class="account__right">
                    <h1>Mis compras</h1>
                    <div class="account__right__form" style="max-width: 100%">
                        <div class="over-w">
                            <table>
                                <tr>
                                    <th>PEDIDO NO.</th>
                                    <th>FECHA DEL PEDIDO</th>
                                    <th>VALOR</th>
                                    <th>ESTADO</th>
                                    <th>PRECIO TOTAL</th>
                                    <th></th>
                                </tr>
                                @foreach($payments as $p)
                                    <tr>
                                        <td>
                                            {{ $p->number }}
                                        </td>
                                        <td>
                                            {{ $p->created_at }}
                                        </td>
                                        <td>${{ number_format($p->total,0,',','.') }}</td>
                                        <td>{{ $p->status }}</td>
                                        <td><a href="{{ url("/pagos/".$p->id) }}">Ver detalle</a></td>
                                        <td></td>
                                    </tr>
                                @endforeach

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection