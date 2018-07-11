@extends('layouts.master')
@section('title', 'Tecnomovil - Contactenos')
@section('content')
    <form id="frmContact" data-abide novalidate>
    <div class="contact">
        <div class="contact__form">
            <div class="contact__left">
                <label for="subject"> Asunto
                    <select name="subject" id="subject">
                        <option value="Soporte Técnico">Soporte Técnico</option>
                        <option value="Contacto">Contacto</option>
                    </select>
                </label>
                <label for="name"> Nombre Completo
                    <input type="text" name="name" id="name">
                </label>
                <label for="email"> Dirección de correo electrónico
                    <input type="email" name="email" id="email">
                </label>
            </div>
            <div class="contact__right">
                <label for="message"> Enviar un mensaje
                    <textarea name="message" id="message" rows="8"></textarea>
                </label>
                <button>ENVIAR</button>
            </div>
        </div>
    </div>
    </form>
@endsection
@section('script')
@endsection