@extends('layouts.master')
@section('title', 'Yellow Club - Cuenta')
@section('style')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
@endsection
@section('content')
    <div class="content">
        <div class="blog" style="background: #fff">
            <p style="color: #4d4d4d" class="blog__url"><a href="/">Home</a> / Datos Personales</p>
        </div>
    </div>
    <div class="main">
        <div class="content padding-bottom-3">
            <div class="account">
                @component('account', ['user' => 'img/account-28.png', 'cart' => 'img/account-31.png', 'active' => 'account'])
                @endcomponent
                <div class="account__right">
                    <h1>Datos personales</h1>
                    <form id="account" data-abide novalidate>
                        <div class="account__right__form" style="max-width: 450px">
                            <div>
                                Nombre* <input class="caja" id="InputName" name="name" type="text"
                                               value="{{ $client->name }}" required/>
                            </div>
                            <span class="form-error" data-form-error-for="InputName">Por favor digite el nombre</span>
                            <div>
                                Apellidos* <input class="caja" id="InputLast_Name" name="last_name"
                                                  type="text" value="{{ $client->last_name }}" required/>
                            </div>
                            <span class="form-error"
                                  data-form-error-for="InputLast_Name">Por favor digite los apellidos</span>
                            <div>
                                Email* <input class="caja" id="InputEmail" name="email" type="email"
                                              value="{{ $client->email }}" required/>
                            </div>
                            <span class="form-error" data-form-error-for="InputEmail">Por favor digite el email</span>
                            <div>
                                Fecha de nacimiento <input class="caja" id="InputBirthdate"
                                                           name="birthdate" type="text"
                                                           value="{{ $client->birthdate }}"/>
                            </div>
                            {{ csrf_field() }}
                            <input type="submit" class="button-buy width-100 margin-top-1" value="Guardar cambios"
                                   >
                        </div>
                    </form>
                </div>
            </div>
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
        $(document).ready( function () {
            $("#InputBirthdate").datepicker({
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