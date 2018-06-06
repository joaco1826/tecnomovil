<header>
    <div class="content">
        <div class="header">
            <div class="header__logo"><img src="{{ asset("img/logo-tecnomobile.png") }}" alt="logo tecnomobile"></div>
            <div class="header__menu align-self-bottom">
                <div><a href="{{ url("/") }}">Inicio</a></div>
                <div>|</div>
                <div><a href="">Empresa</a></div>
                <div>|</div>
                <div><a href="{{ url("/productos") }}">Productos</a></div>
                <div>|</div>
                <div><a href="">Zona Social</a></div>
                <div>|</div>
                <div><a href="">Soporte</a></div>
                <div>|</div>
                <div><a href="">Contáctenos</a></div>
            </div>
            <div class="header__session align-self-bottom">
                @if(Auth::check())
                    <div class="header__login"><a href="{{ url("/cuenta") }}">MI CUENTA</a><a href="{{ url("/register") }}">CERRAR SESIÓN</a></div>
                @else
                    <div class="header__login"><a href="{{ url("/login") }}">INGRESAR</a><a href="{{ url("/register") }}">REGISTRARSE</a></div>
                @endif
                    <a href="{{ url("/carrito") }}"><div class="header__cart"><img src="{{ asset("img/cart-07.png") }}" alt="cart"> {{ \Gloudemans\Shoppingcart\Facades\Cart::count() }} articulo(s) - ${{ \Gloudemans\Shoppingcart\Facades\Cart::total() }}</div></a>
            </div>
        </div>
    </div>
</header>