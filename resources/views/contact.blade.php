@extends('layouts.master')
@section('title', 'Tecnomovil - Contactenos')
@section('content')
    <form id="frmContact" data-abide novalidate>
    <div class="contact">
        <div class="contact__form">
            <div class="contact__left">
                {{ csrf_field() }}
                <label for="type"> Asunto
                    <select name="type" id="type" required>
                        <option value="Soporte Técnico">Soporte Técnico</option>
                        <option value="Contacto">Contacto</option>
                    </select>
                </label>
                <label for="name"> Nombre Completo
                    <input type="text" name="name" id="name" required>
                </label>
                <label for="phone"> Celular
                    <input type="text" name="phone" id="phone" required>
                </label>
                <label for="email"> Dirección de correo electrónico
                    <input type="email" name="email" id="email" required>
                </label>
            </div>
            <div class="contact__right">
                <label for="message"> Enviar un mensaje
                    <textarea name="message" id="message" rows="12" required></textarea>
                </label>
                <button>ENVIAR</button>
            </div>
        </div>
    </div>
    </form>
@endsection
@section('script')
@endsection