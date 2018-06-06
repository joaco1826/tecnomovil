@extends('layouts.master')
@section('title', 'Tecnomovil - Olvidé mi contraseña')
@section('content')
    <div class="content">
        <div class="blog" style="background: #fff">
            <p style="color: #4d4d4d" class="blog__url"><a href="/">Home</a> / Olvidé mi contraseña</p>
        </div>
    </div>
    <div class="main">
        <div class="content">
            <form id="login" method="POST" novalidate data-abide action="{{ route('password.email') }}">
                <div class="login" style="max-width: 400px">
                    @if (session('status'))
                        <div data-closable class="alert-box callout success">
                            ¡Listo!<br>Te acabamos de enviar un correo electrónico con las instrucciones. Sigue las instrucciones para reestablecer tu contraseña
                            <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                                <span aria-hidden="true">&CircleTimes;</span>
                            </button>
                        </div>
                    @endif
                    <h1>Restablece tu contraseña</h1>
                    <p>Te enviaremos instrucciones para que puedas restablecer tu contraseña.</p>
                    <label>
                        <div class="input-group">
                            <input class="input-group-field caja" id="InputEmail" name="email" type="email" value="{{ old('email') }}" required placeholder="Correo electrónico" />
                        </div>
                        <span class="form-error" data-form-error-for="InputEmail">Por favor digite el email</span>
                        @if ($errors->has('email'))
                            <span class="form-error" style="display: block;">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </label>

                    {{ csrf_field() }}
                    <button type="submit" class="b-login">Enviar <img src="{{ asset("img/login-28.png") }}" class="margin-left-1" alt="login"></button>
                </div>
            </form>
        </div>
    </div>
@endsection
