@extends('layouts.master')
@section('title', 'Tecnomovil - Login')
{{--@section('description', 'Tecnomovil - Venta de celulares y accesorios')--}}
{{--@section('keywords', 'tecnomovil')--}}
@section('content')
    <div class="content">
        <div class="blog" style="background: #fff">
            <p style="color: #4d4d4d" class="blog__url"><a href="/">Home</a> / Iniciar sesión</p>
        </div>
    </div>
    <div class="main">
        <div class="content">
            <form id="login" method="POST" novalidate data-abide action="{{ route("login") }}">
                <div class="login">
                    <h1>Iniciar sesión</h1>
                    <label>
                        <div class="input-group">
                            <input class="input-group-field caja" id="InputEmail" name="email" type="email" required placeholder="Correo electrónico" />
                        </div>
                        <span class="form-error" data-form-error-for="InputEmail">Por favor digite el email</span>
                        @if ($errors->has('email'))
                            <span class="form-error" style="display: block;">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </label>
                    <label>
                        <div class="input-group">
                            <input class="input-group-field caja" id="InputPassword" name="password" type="password" required placeholder="Contraseña" />
                        </div>
                        <span class="form-error" data-form-error-for="InputPassword">Por favor digite la contraseña</span>
                        @if ($errors->has('password'))
                            <span class="form-error" style="display: block;">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </label>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme
                        </label>
                    </div>
                    {{ csrf_field() }}
                    <button type="submit" class="b-login">Ingresar <img src="{{ asset("img/login-28.png") }}" class="margin-left-1" alt="login"></button>
                    <a href="{{ route('password.request') }}"><div class="forgot">Olvidé mi contraseña</div></a>
                    <a href="{{ url("/register") }}" class="l-register">¿No estás registrado? Regístrate</a>
                </div>
            </form>
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