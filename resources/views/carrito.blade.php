@extends('layouts.master')
@section('title', 'Tecnomovil - Mi carrito')
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
                        <div class="over-w">
                            <table>
                                <tr>
                                    <th>PRODUCTO</th>
                                    <th>CANTIDAD</th>
                                    <th>PRECIO</th>
                                    <th>%</th>
                                    <th>PRECIO TOTAL</th>
                                    <th></th>
                                </tr>
                                @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $c)
                                    @php
                                        $pro = \App\Models\Product::find($c->id);
                                    @endphp
                                    <tr>
                                        <td>
                                            <img src="{{ asset($pro->image) }}" alt="Yellow Club productos"><br>
                                            {{ $c->name }}
                                            @if ($c->options->size > 0)
                                                <br><span style="font-weight: 300">Talla: {{ $c->options->size }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <input type="number" data-id="{{ $c->rowId }}" onchange="cart(this,'update',this.value)" class="caja margin-bottom-0" value="{{ $c->qty }}" style="width: 60px; display: inline-block;">
                                        </td>
                                        <td>{{ number_format($pro->price, 0, ',', '.') }}</td>
                                        <td>{{ $pro->discount }}</td>
                                        <td>{{ number_format($c->price,0,',','.') }}</td>
                                        <td> <img data-id="{{ $c->rowId }}" onclick="cart(this,'remove',0)" src="{{ asset("img/delete-28.png") }}" alt="Yellow Club delete"></td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <a href="{{ url("/seleccionar") }}"><input type="button" class="button-buy float-right margin-top-1" value="Pagar"></a>
                    </div>
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
        function cart(obj,action,qty) {

            $.ajax({
                type: "POST",
                url: '/cart',
                dataType: "json",
                data: "qty="+ qty+ "&id=" + $(obj).attr("data-id") + "&action="+action,
                statusCode: {
                    201: function () {
                        location.reload();



                    },
                    501: function () {
                        swal('¡Lo sentimos!', 'Algo ha salido mal. Es nuestra culpa.', 'error');
                    },
                    500: function () {
                        swal('¡Lo sentimos!', 'Algo ha salido mal. Es nuestra culpa.', 'error');
                    }
                }
            });
        }
    </script>
@endsection