@extends('layouts.master')
@section('title', 'Tecnomobile - Venta de celulares y accesorios')
@section('description', 'Tecnomobile - Venta de celulares y accesorios')
@section('keywords', 'tecnomobile')
@section('content')
    <div class="content">
        <div class="product">
            <div class="product__img">
                <div class="pro-vertical">
                    <div>
                        <img class="img-vertical" src="{{ asset($product->image) }}" alt="Yellow Club {{ $product->name }}">
                    </div>
                    @foreach($product->images as $im)
                        <div>
                            <img class="img-vertical" src="{{ asset($im->image) }}" alt="Yellow Club {{ $product->name }}">
                        </div>
                    @endforeach
                </div>
                <div class="pro-carousel">
                    <div>
                        <div class="pro-carousel__contain zoom" data-src="{{ asset($product->image) }}">
                            <img src="{{ asset($product->image) }}" alt="Yellow Club {{ $product->name }}">
                        </div>
                    </div>
                    @foreach($product->images as $im)
                        <div>
                            <div class="pro-carousel__contain zoom" data-src="{{ asset($im->image) }}">
                                <img class="img-vertical" src="{{ asset($im->image) }}" alt="Yellow Club {{ $product->name }}">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="product__info">
                <h1>{{ $product->name }}</h1>
                <p class="product__reg margin-top-2">Precio regular</p>
                <p class="price margin-bottom-0">${{ number_format($product->price, 0, ',', '.') }}</p>
                <p class="product__reg">Disponibilidad: <span>En existencia</span></p>
                <div class="product__info__line"></div>
                <div class="product__info__content">
                    <div class="product__info__content__cant">
                        <span>Cantidad</span> <input type="number" value="1" id="cart-quanty">
                    </div>
                    <div class="product__info__content__button">
                        <button data-id="{{ $product->id }}" onclick="cart(this,'add',$('#cart-quanty').val())" class="button-buy">Agregar al carrito <span></span></button>
                    </div>
                </div>
                <img src="{{ asset("img/payu-06.jpg") }}" alt="payu">
            </div>
        </div>
        <div class="product-cart">
            <h3>Características</h3>
            {!! $product->description !!}
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset("js/zoom.min.js") }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
        $(document).ready(function () {
            $(".zoom").zoom({
                magnify: 1.2
            });
            $(".carousel-pro").slick({
                slidesToShow: 3,
                slidesToScrool: 1,
                dots: true,
                autoplay: true,
                infinite: true,
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            arrows: false,
                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            arrows: false,
                            slidesToShow: 2
                        }
                    }
                ]
            });
            $(".pro-vertical").slick({
                slidesToShow: 3,
                slidesToScrool: 1,
                vertical: true,
                asNavFor: '.pro-carousel',
                focusOnSelect: true
            })
            $(".pro-carousel").slick({
                slidesToShow: 1,
                slidesToScrool: 1,
                asNavFor: '.pro-vertical',
                arrows: false

            })

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
