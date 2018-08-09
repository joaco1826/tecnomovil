@extends('layouts.master')
@section('title', 'Tecnomovil Del Caribe - ' . $blog->title)
@section('content')
    <div class="blog">
        <div class="content">
            <p class="blog__url"><a href="/">Home</a> / Blog</p>
            <div class="blog__contain">
                <div class="blog__contain__info">
                    <h1>{{ $blog->title }}</h1>
                    <div class="blog__contain__info__date">@php echo strftime("%B %d, %Y", strtotime($blog->created_at)) @endphp</div>
                    <img src="{{ asset($blog->image) }}" alt="Yellow Club blog">
                    <div class="blog__contain__info__text">
                        {!! $blog->text !!}
                    </div>
                </div>
                <div class="blog__contain__more">
                    <p class="blog__contain__more__title">Más Noticias</p>
                    @foreach($blogs as $b)
                        <div class="blog__contain__more__content">
                            <a href="{{ url("/blog/".str_slug($b->title)."/".$b->id) }}">
                                <span>@php echo strftime("%b %d", strtotime($blog->created_at)) @endphp</span>
                                <h4>{{ $b->title }}</h4>
                                <p>Leer más</p>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection