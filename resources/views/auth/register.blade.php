@extends('layouts.master')
@section('title', 'Tecnomovil - Registro')
{{--@section('description', 'Tecnomovil - Venta de celulares y accesorios')--}}
{{--@section('keywords', 'tecnomovil')--}}
@section('style')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
@endsection
@section('content')
    <div class="content">
        <div class="blog" style="background: #fff">
            <p style="color: #4d4d4d" class="blog__url"><a href="/">Home</a> / Registro</p>
        </div>
    </div>
    <div class="main">
        <div class="content padding-bottom-3">
            <form id="register" method="POST" novalidate data-abide action="{{ route("register") }}">
                <div class="register">
                    <h1>Registrarse</h1>
                    <div class="register__left">
                        <div>
                            Nombre * <input type="text" class="caja" required name="name">
                        </div>
                        <div>
                            Apellidos * <input type="text" class="caja" required name="last_name">
                        </div>
                        <div>
                            Email * <input type="email" class="caja" required name="email">
                        </div>
                        <div>
                            Contraseña * <input type="password" id="password" class="caja" pattern="^(.){6,}$" required name="password">
                        </div>
                        <div>
                            Confirmar Contraseña * <input type="password" class="caja" required data-equalto="password" name="password_confirmation">
                        </div>
                        <div>
                            Fecha de Nacimiento <input type="text" class="caja" name="birthdate" id="date">
                        </div>
                        <div>
                            Documento de Identidad * <input type="text" class="caja" required name="document">
                        </div>
                    </div>
                    <div class="register__right">
                        <div>
                            Dirección * <input type="text" class="caja" required name="address">
                        </div>
                        <div>
                            Barrio * <input type="text" class="caja" required name="urbanization">
                        </div>
                        <div>
                            Pais * <select name="country" id="country" required class="caja">
                                <option value="">Seleccione</option>
                                @foreach($country as $c)
                                    <option value="{{ $c->id }}">{{ $c->PaisNombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            Departamento * <select name="distric" id="distric" required class="caja opciones_d">
                                <option value="">Seleccione</option>
                            </select>
                        </div>
                        <div>
                            Ciudad * <select name="city" id="city" required class="caja opciones_c">
                                <option value="">Seleccione</option>
                            </select>
                        </div>
                        <div>
                            Teléfono Celular * <input type="text" class="caja" required name="cellphone">
                        </div>
                        <div>
                            Teléfono Fijo <input type="text" class="caja" name="phone">
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="button-buy" style="margin: 0 auto" id="client-save" value="Guardar">
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script
            src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
            integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
            crossorigin="anonymous">
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
        $(document).ready( function () {
            $("#date").datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true,
                yearRange: '-200:+0',
                monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
                dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
                dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá']
            });
        });
    </script>
@endsection