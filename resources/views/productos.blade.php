@extends('layouts.master')
@section('title', 'Tecnomovil - Productos')
@section('style')
    <style>
        #slider-range {
            background: #fff;
            margin: .7rem auto;
            width: 95%;
        }
        .ui-slider-range { background: #ffea71; }
        .ui-slider-handle {background: #fff; border-radius: 3px }
    </style>
@endsection
@section('content')
    @php
        $min = \App\Models\Product::min('price');
        $max = \App\Models\Product::max('price');
    @endphp
    <div class="content">
        <div class="p-contain">
            <div class="p-contain__content">
                <div class="pro-white">
                    <div class="clearfix">
                        <div class="cant"></div>
                        <div class="pagination">
                        </div>
                        <div class="order">
                            <select name="order" id="order" onchange="pagination(1,$(this).val(),$('#pmin').val(),$('#pmax').val())">
                                <option value="0">Relevancia</option>
                                <option value="1">Precio menor a mayor</option>
                                <option value="2">Precio mayor a menor</option>
                                <option value="3">Alfabéticamente</option>
                            </select>
                        </div>
                    </div>
                    <div class="products">
                    </div>
                    <div class="clearfix margin-top-2">
                        <div class="cant"></div>
                        <div class="pagination">
                        </div>
                        <div class="order">
                            <select name="order" id="order" onchange="pagination(1,$(this).val(),$('#pmin').val(),$('#pmax').val())">
                                <option value="0">Relevancia</option>
                                <option value="1">Precio menor a mayor</option>
                                <option value="2">Precio mayor a menor</option>
                                <option value="3">Alfabéticamente</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ asset("js/multiple-select.js") }}"></script>
    <script>

        var gpmin = 0;
        var gpmax = 99999999;
        var gorder = 0;
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
            pagination(1,0,0,9999999)
        });
        var p1, p2;
        function pagination(page, order, pmin, pmax) {
            if (parseInt(pmin) > parseInt(pmax) && parseInt(pmax) > 0) {
                swal('Ops!', 'El precio desde no puede ser mayor que precio hasta');
                return false;
            }
            gorder = order;
            gpmin = pmin;
            gpmax = pmax;
            $('.products').html('<img style="width: 300px;height: 161px;display: table;margin: 0 auto;" src="{{ asset('img/loading.gif') }}" alt="loading">');
            $(this).css('font-weight', '700')
            var pag = '';
            $.ajax({
                async: true,
                type: "POST",
                dataType: "json",
                url: "/pagination-products",
                data: "page="+ page + "&order=" + gorder + "&pmin=" + gpmin + "&pmax=" + gpmax,
                success: function (datos) {
                    $("html, body").stop().animate({scrollTop:100}, 500, 'swing', function() {  });
                    if (datos.total > 0) {
                        if (gpmin == "") gpmin = 0;
                        if (gpmax == "") gpmax = 9999999;
                        $('.products').html('');
                        $('.cant').html(datos.from + ' - ' + datos.to + ' de ' + datos.total);
                        for (var i = 1; i <= datos.last_page; i++) {
                            if (page == i) {
                                pag += '<span onclick="pagination(' + i + ',' + order + ',' + gpmin + ',' + gpmax + ')"><strong>' + i + '</strong></span>';
                            } else {
                                pag += '<span onclick="pagination(' + i + ',' + order + ',' + gpmin + ',' + gpmax + ')">' + i + '</span>';
                            }

                        }
                        $('.order').css('display', 'block');
                        $('.pagination').html(pag);
                        $.each(datos.data, function (i, item) {
                            if (item.discount > 0) {
                                p1 = '<span class="contain-pro__info__sub">$ ' + addCommas(item.price) + '</span>';
                                p2 = '<span>$ ' + addCommas(parseInt(parseInt(item.price) - (parseInt(item.price) / 100 * item.discount))) + '</span>';
                            } else {
                                p1 = '<span>$ ' + addCommas(item.price) + '</span>';
                                p2 = '';
                            }

                            $('.products').append('<div class="products__contain">' +
                                '<div class="contain-pro">' +
                                '<a href="{{ url("/") }}/producto/' + slug(item.name) + '/' + item.id + '">' +
                                '<div class="contain-pro__img">' +
                                '<img src="{{ url("/") }}/' + item.image + '" alt="Yellow Club ' + item.name + '">' +
                                '</div>' +
                                '<div class="contain-pro__info">' +
                                item.name + '<br>' +
                                p1 +
                                p2 +
                                '</div>' +
                                '<button data-id="' + item.id + '">Agregar <span></span></button>' +
                                '</a>' +
                                '</div>' +
                                '</div>');

                        });
                    } else {
                        $('.cant').html('0 productos');
                        $('.order').css('display', 'none');
                        $('.pagination').html('');
                        $('.products').html('Lo sentimos! en el momento no hay productos disponibles para tu búsqueda. Por favor intenta pronto!');
                    }


                }
            });
        }


        function slug(Text) {
            return Text
                .toLowerCase()
                .replace(/ /g, '-')
                .replace(/[^\w-]+/g, '')
                ;
        }

        function addCommas(nStr)
        {
            nStr += '';
            x = nStr.split('.');
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + '.' + '$2');
            }
            return x1 + x2;
        }

    </script>
@endsection