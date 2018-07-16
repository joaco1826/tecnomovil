@extends('layouts.master')
@section('title', 'Tecnomovil - Sobre nosotros')
@section('content')
    <div class="about" style="background-image: url('{{ asset($about->image) }}');">
        <div class="about__text">
            {!! $about->text !!}
        </div>
    </div>
@endsection
@section('script')
@endsection