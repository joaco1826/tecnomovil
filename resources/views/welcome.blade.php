@extends('layouts.master')
@section('title', 'Tecnomobile - Venta de celulares y accesorios')
@section('description', 'Tecnomobile - Venta de celulares y accesorios')
@section('keywords', 'tecnomobile')
@section('content')
<div class="slick-carousel">
    @foreach($banners as $b)
        <div>
            <a href="{{ $b->link }}"><div class="banner" style="background-image: url({{ asset($b->image) }})"></div></a>
        </div>
    @endforeach
</div>
<p class="t-destacados">PRODUCTOS DESTACADOS</p>
<div class="content">
    <div class="destacados-left" id="des-left"><img src="{{ asset("img/go-10.png") }}" alt="slick arrow"></div>
    <div class="destacados-right" id="des-right"><img src="{{ asset("img/go-10.png") }}" alt="slick arrow"></div>
    <div class="slick-destacados">
        @foreach($destacados as $d)
            <div>
                <div class="products-d">
                    <a href="{{ url("/producto/".str_slug($d->name)."/".$d->id) }}">
                        <div class="products-d__img">
                            <img src="{{ asset($d->image) }}" alt="tecnomobile productos">
                        </div>
                        <p class="products-d__name">{{ $d->name }}</p>
                        <p class="products-d__price">${{ number_format($d->price, 0, ',', '.') }}</p>
                    </a>
                    <button data-id="{{ $d->id }}" onclick="cart(this,'add',1)"><img src="{{ asset("img/cart-07.png") }}" alt="cart"> AÑADIR AL CARRITO</button>
                </div>
            </div>
        @endforeach
    </div>
</div>
<p class="t-destacados">PRODUCTOS EN OFERTA</p>
<div class="content">
    <div class="destacados-left" id="ofe-left"><img src="{{ asset("img/go-10.png") }}" alt="slick arrow"></div>
    <div class="destacados-right" id="ofe-right"><img src="{{ asset("img/go-10.png") }}" alt="slick arrow"></div>
    <div class="slick-oferta">
        @foreach($ofertas as $d)
            <div>
                <div class="products-d">
                    <a href="{{ url("/producto/".str_slug($d->name)."/".$d->id) }}">
                        <div class="products-d__img">
                            <div class="products-d__discount"><span>-{{ $d->discount }}%</span></div>
                            <img src="{{ asset($d->image) }}" alt="tecnomobile productos">
                        </div>
                        <p class="products-d__name">{{ $d->name }}</p>
                        <p class="products-d__price">${{ number_format($d->price, 0, ',', '.') }}</p>
                    </a>
                    <button data-id="{{ $d->id }}" onclick="cart(this,'add',1)"><img src="{{ asset("img/cart-07.png") }}" alt="cart"> AÑADIR AL CARRITO</button>
                </div>
            </div>
        @endforeach
    </div>
</div>
    <div class="contain">
        <div class="promo">
            <div class="promo__col"><img src="{{ asset("img/promo-12.jpg") }}" alt="tecnomovil promociones"></div>
            <div class="promo__col"><img src="{{ asset("img/promo-13.jpg") }}" alt="tecnomovil promociones"></div>
            <div class="promo__col"><img src="{{ asset("img/promo-12.jpg") }}" alt="tecnomovil promociones"></div>
        </div>
    </div>
    <div class="inquietudes">
        <div class="content">
            <div class="inquietudes__form">
                <p>¿INQUIETUDES?</p>
                <p>Las responderemos en el menor tiempo posible.</p>
                <form id="frmContact" data-abide novalidate>
                    {{ csrf_field() }}
                    <input type="hidden" name="type" value="Contacto">
                    <input type="text" name="name" required placeholder="Nombre">
                    <input type="text" name="phone" required placeholder="Celular">
                    <input type="email" name="email" required placeholder="E-mail">
                    <textarea name="message" rows="5" placeholder="Comentario" required></textarea>
                    <div class="inquietudes__row">
                        <div><label for="accept"><input type="checkbox" id="accept" required> Acepta la política de privacidad</label></div>
                        <button type="submit">ENVIAR</button>
                    </div>
                </form>
                <div class="inquietudes__line"></div>
            </div>
            <div class="clear"></div>
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
        $(document).ready(function () {
           $(".slick-carousel").slick({
              dots: true

           });
            $(".slick-destacados").slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                prevArrow: $("#des-left"),
                nextArrow: $("#des-right"),
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]
            });

            $(".slick-oferta").slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                prevArrow: $("#ofe-left"),
                nextArrow: $("#ofe-right"),
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]
            });
        });
        function cart(obj,action,qty) {
            var size = 0;
            if ($("#size")) {
                if ($("#size").val() == "") {
                    swal("Ops!", "Por favor seleccione la talla");
                    return false;
                }
                size = $("#size").val();
            }

            $.ajax({
                type: "POST",
                url: '/cart',
                dataType: "json",
                data: "qty="+ qty+ "&id=" + $(obj).attr("data-id") + "&action=" + action + "&size=" + size,
                statusCode: {
                    201: function (data) {
                        $(".cart-count").html('('+ data.message +')');
                        swal({
                                title: "Producto añadido!",
                                text: "",
                                type: "success",
                                confirmButtonText: "Ir al carrito",
                                confirmButtonColor: "#194486",
                                showCancelButton: true,
                                cancelButtonText: "Seguir comprando",
                                animation: "slide-from-top"
                            },
                            function (isConfirm) {
                                if (isConfirm) {
                                    location.href="/carrito";
                                }
                            }
                        );

                    },
                    200: function (data) {
                        swal('¡Lo sentimos!', data.message);
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
