@extends('layouts.master')
@section('title', 'Tecnomovil del caribe - Sobre nosotros')
@section('content')
    <div class="about" style="background-image: url('https://admin.tecnomovildelcaribe.com/{{ $about->image }}');">
        <div class="about__text">
            {!! $about->text !!}
        </div>
    </div>
@endsection
@section('script')
@endsection