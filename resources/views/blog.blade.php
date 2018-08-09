@extends('layouts.master')
@section('title', 'Tecnomovil Del Caribe - Blog')
@section('content')
    <div class="blog">
        <div class="content">
            <p class="blog__url"><a href="/">Home</a> / Blog</p>
            <h1>Blog</h1>
            <div class="blog__contain">
                @foreach($blog as $b)
                    <div class="blog__contain__content">
                        <a href="{{ url("/blog/".str_slug($b->title)."/".$b->id) }}">
                            <img src="{{ asset($b->image) }}" alt="Yellow Club blog">
                            <p>{{ $b->title }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection