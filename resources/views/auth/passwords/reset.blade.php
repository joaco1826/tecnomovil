@extends('layouts.master')
@section('title', 'Tecnomovil - Recuperar contraseña')

@section('content')
    <div class="content">
        <div class="blog" style="background: #fff">
            <p style="color: #4d4d4d" class="blog__url"><a href="/">Home</a> / Recuperar contraseña</p>
        </div>
    </div>
    <div class="main">
        <div class="content">
            <form id="login" method="POST" novalidate data-abide action="{{ route('password.request') }}">
                {{ csrf_field() }}

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="login" style="max-width: 400px">
                    @if (session('status'))
                        <div data-closable class="alert-box callout success">
                            <i class="fa fa-check"></i> {{ session('status') }}
                            <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                                <span aria-hidden="true">&CircleTimes;</span>
                            </button>
                        </div>
                    @endif
                    <h1>Restablece tu contraseña</h1>
                    <label>
                        <div class="input-group">
                            <input class="input-group-field caja" id="InputEmail" name="email" value="{{ $email or old('email') }}"  type="email" required autofocus placeholder="Correo electrónico" />
                        </div>
                        <span class="form-error" data-form-error-for="InputEmail">Por favor digite el email</span>
                        @if ($errors->has('email'))
                            <span class="form-error" style="display: block;">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                        <div class="input-group">
                            <input class="input-group-field caja" id="password" name="password" type="password" required placeholder="Contraseña" />
                        </div>
                        <span class="form-error" data-form-error-for="password">Por favor digite la contraseña</span>
                        @if ($errors->has('password'))
                            <span class="form-error" style="display: block;">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                        <div class="input-group">
                            <input class="input-group-field caja" id="password_confirmation" name="password_confirmation" type="password" required placeholder="Confirmar Contraseña" />
                        </div>
                        <span class="form-error" data-form-error-for="password_confirmation">Por favor confirme la contraseña</span>
                        @if ($errors->has('password_confirmation'))
                            <span class="form-error" style="display: block;">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                        @endif
                    </label>
                    <button type="submit" class="b-login">Restablecer <img src="{{ asset("img/login-28.png") }}" class="margin-left-1" alt="login"></button>
                </div>
            </form>
        </div>
    </div>
@endsection
