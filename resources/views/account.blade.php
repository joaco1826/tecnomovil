@if(Auth::check())
<div class="account__left align-middle">
    <div class="account__left__img">
        <img src="{{ asset($user) }}" alt="account Yellow Club">
    </div>
    <div class="account__left__opc">
        <div>información de la cuenta</div>
        <div @if($active == 'account') class="is-active" @endif><a href="{{ url("/cuenta") }}">datos personales</a></div>
        <div @if($active == 'address') class="is-active" @endif><a href="{{ url("/direcciones") }}">mis direcciones</a></div>
        <div @if($active == 'password') class="is-active" @endif><a href="{{ url("/contrasena") }}">cambiar contraseña</a></div>
    </div>
    <div class="account__left__line clear"></div>
    <div class="account__left__img">
        <img src="{{ asset($cart) }}" alt="account Yellow Club">
    </div>
    <div class="account__left__opc">
        <div>Mis pedidos</div>
        <div @if($active == 'cart') class="is-active" @endif><a href="{{ url("/carrito") }}">mi carrito</a></div>
        <div @if($active == 'payments') class="is-active" @endif><a href="{{ url("/pagos") }}">mis compras</a></div>
    </div>
    <div class="account__left__line clear"></div>
    <div class="account__left__img">
        <img src="{{ asset("img/account-32.png") }}" alt="account Yellow Club">
    </div>
    <div class="account__left__opc">
        <div>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">cerrar sessión</a>
        </div>
    </div>
</div>
@else
    <div class="account__left align-middle">
        <div class="account__left__img">
            <img src="{{ asset($cart) }}" alt="account Yellow Club">
        </div>
        <div class="account__left__opc">
            <div>Mis pedidos</div>
            <div @if($active == 'cart') class="is-active" @endif><a href="{{ url("/carrito") }}">mi carrito</a></div>
        </div>
        <div class="account__left__line clear"></div>
    </div>
@endif