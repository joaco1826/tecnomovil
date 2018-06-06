@extends('layouts.master')
@section('title', 'Yellow Club - Cambiar Contraseña')
@section('content')
    <div class="content">
        <div class="blog" style="background: #fff">
            <p style="color: #4d4d4d" class="blog__url"><a href="/">Home</a> / Cambiar Contraseña</p>
        </div>
    </div>
    <div class="main">
        <div class="content padding-bottom-3">
            <div class="account">
                @component('account', ['user' => 'img/account-28.png', 'cart' => 'img/account-31.png', 'active' => 'password'])
                @endcomponent
                <div class="account__right">
                    <h1>Cambiar contraseña</h1>
                    <form id="changePassword" data-abide novalidate>
                        <div class="account__right__form" style="max-width: 500px">
                            <div>
                                Contraseña actual* <input class="caja" id="InputActual" name="old" type="password" required/>
                            </div>
                            <span class="form-error" data-form-error-for="InputActual">Por favor digite la contraseña actual</span>
                            <div>
                                Nueva contraseña* <input class="caja" id="InputPassword" name="password" pattern="^(.){6,}$" type="password" required/>
                            </div>
                            <span class="form-error" data-form-error-for="InputPasswordConfirmation">Por favor digite la nueva contraseña (debe contener al menos 6 caracteres)</span>
                            <div>
                                Confirmar nueva contraseña* <input class="caja" id="InputPasswordConfirmation" data-equalto="InputPassword" name="password_confirmation" type="password" required/>
                            </div>
                            <span class="form-error" data-form-error-for="InputPasswordConfirmation">Por favor confirme la nueva contraseña</span>
                            <input type="submit" class="button-buy width-100 margin-top-1" value="Guardar">
                        </div>
                    </form>
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