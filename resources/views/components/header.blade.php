<header>
    <div class="content">
        <div class="header">
            <div class="header__logo"><a href="{{ url("/") }}"><img src="{{ asset("img/logo-tecnomobile.png") }}" alt="logo tecnomobile"></a></div>
            <div class="header__menu align-self-bottom">
                <div><a href="{{ url("/") }}">Inicio</a></div>
                <div>|</div>
                <div><a href="{{ url("/nosotros") }}">Empresa</a></div>
                <div>|</div>
                <div><a href="{{ url("/productos") }}">Productos</a></div>
                <div>|</div>
                <div><a href="{{ url("/contacto") }}">Contáctenos</a></div>
            </div>
            <div class="header__session align-self-bottom">
                @if(Auth::check())
                    <div class="header__login"><a href="{{ url("/cuenta") }}">MI CUENTA</a><a href="{{ url("/register") }}">CERRAR SESIÓN</a></div>
                @else
                    <div class="header__login"><a href="{{ url("/login") }}">INGRESAR</a><a href="{{ url("/register") }}">REGISTRARSE</a></div>
                @endif
                    <a href="{{ url("/carrito") }}"><div class="header__cart"><img src="{{ asset("img/cart-07.png") }}" alt="cart"> {{ \Gloudemans\Shoppingcart\Facades\Cart::count() }} articulo(s) - ${{ \Gloudemans\Shoppingcart\Facades\Cart::subtotal() }}</div></a>
            </div>
            <div class="header__user">
                <a href="{{ url("/cuenta") }}"><img style="width: 26px;" src="{{ asset("img/user.png") }}" alt="user"></a>
                <a href="{{ url("/carrito") }}"><img src="{{ asset("img/cart-07.png") }}" alt="carrito"> (<span>{{ \Gloudemans\Shoppingcart\Facades\Cart::count() }}</span>)</a>
                <div class="header__user__menu">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
    </div>
</header>