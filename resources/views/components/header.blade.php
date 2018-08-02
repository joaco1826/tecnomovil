<div class="menu-mov">
    <img src="{{ asset("img/close-29.png") }}" alt="close" class="menu-mov__close">
    <img src="{{ asset("img/logo-tecnomobile.png") }}" alt="logo tecnomovil" class="menu-mov__logo">
    <a href="{{ url("/") }}"><div class="menu-mov__opc">Inicio</div></a>
    <a href="{{ url("/nosotros") }}"><div class="menu-mov__opc">Empresa</div></a>
    <a href="{{ url("/productos") }}"><div class="menu-mov__opc">Productos</div></a>
    <a href="{{ url("/contacto") }}"><div class="menu-mov__opc">Contáctenos</div></a>
    <div class="menu-mov__follow">
        <p>SÍGUENOS EN:</p>
        <a href=""><img src="{{ asset("img/follow-06.png") }}" alt="follow face"></a>
        <a href=""><img src="{{ asset("img/follow-07.png") }}" alt="follow face"></a>
    </div>
</div>
<header>
    <div class="content">
        <div class="header">
            <div class="header__logo"><a href="{{ url("/") }}"><img src="{{ asset("img/logo-tecnomobile.png") }}" alt="logo tecnomobile"></a></div>
            <div class="header__menu">
                <div><a href="{{ url("/") }}">Inicio</a></div>
                <div>|</div>
                <div><a href="{{ url("/nosotros") }}">Empresa</a></div>
                <div>|</div>
                <div><a href="{{ url("/productos") }}">Productos</a></div>
                <div>|</div>
                <div><a href="{{ url("/contacto") }}">Contáctenos</a></div>
            </div>
            <div class="header__session">
                @if(Auth::check())
                    <div class="header__login"><a href="{{ url("/cuenta") }}">MI CUENTA</a><a href="{{ url("/register") }}">CERRAR SESIÓN</a></div>
                @else
                    <div class="header__login"><a href="{{ url("/login") }}">INGRESAR</a><a href="{{ url("/register") }}">REGISTRARSE</a></div>
                @endif
                    <a href="{{ url("/carrito") }}"><div class="header__cart"><img src="{{ asset("img/cart-07.png") }}" alt="cart"> <span class="cart-count">{{ \Gloudemans\Shoppingcart\Facades\Cart::count() }}</span> articulo(s) - <span class="cart-total">${{ \Gloudemans\Shoppingcart\Facades\Cart::subtotal() }}</span></div></a>
            </div>
            <div class="header__user">
                <a href="{{ url("/cuenta") }}"><img style="width: 26px;" src="{{ asset("img/user.png") }}" alt="user"></a>
                <a href="{{ url("/carrito") }}"><img src="{{ asset("img/cart-07.png") }}" alt="carrito"> (<span>{{ \Gloudemans\Shoppingcart\Facades\Cart::count() }}</span>)</a>
                <div class="header__user__menu" id="open-menu">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
    </div>
</header>