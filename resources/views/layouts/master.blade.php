<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <meta name="description" content="{{ $cct->description }}">
    <meta name="keywords" content="{{ $cct->keywords }}">
    <link rel="shortcut icon" href="{{ asset("img/favicon.ico") }}">
    <link rel="stylesheet" href="{{ mix("css/app.css") }}">
    @yield('style')
</head>
<body>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-123651145-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-123651145-1');
</script>
<a target="_blank" id="hWhas" href="https://api.whatsapp.com/send?l=es&amp;phone=573003398277"><div class="whas"><img src="{{ asset("img/whatsapp3x.png") }}" alt="Whatsapp" title="Whatsapp"></div></a>
@component('components.header')
@endcomponent
@yield('content')
@component('components.footer')
@endcomponent
<script src="{{ mix("js/app.js") }}"></script>
@yield('script')
</body>
</html>