<footer>
    <div class="footer">
        <div class="content">
            <p class="web">TECNOMOVIL.COM</p>
            <div class="footer__row">
                <div class="footer__contact">
                    <p class="footer__title">Información de contacto</p>
                    <p class="footer__text">{{ $cct->address }}</p>
                    <p class="footer__text"><span>CEL</span> {{ $cct->phone }}</p>
                    <p class="footer__text"><span>EMAIL</span><br>{{ $cct->email }}</p>
                </div>
                <div class="footer__info">
                    <p class="footer__title">Información</p>
                    <ul>
                        <li><a href="{{ url("/contacto") }}">Contacte con nosotros</a></li>
                        <li>Términos y condiciones</li>
                        <li>Puntos de venta</li>
                    </ul>
                </div>
                <div class="footer__info">
                    <p class="footer__title">Mi cuenta</p>
                    <ul>
                        <li><a href="{{ url("/pagos") }}">Mis pedidos</a></li>
                        <li><a href="{{ url("/direcciones") }}">Mis direcciones</a></li>
                        <li><a href="{{ url("/cuenta") }}">Mis datos personales</a></li>
                    </ul>
                </div>
                <div class="footer__news">
                    <p class="footer__t-news">SUSCRÍBETE</p>
                    <p class="footer__sub">Infórmate de lo último de Tecnomovil. Nuestras ofertas y novedades directamente en tu e-mail.</p>
                    <div class="footer__fil">
                        <input type="email" name="email" placeholder="Dejanos tu email">
                        <button type="submit">ENVIAR</button>
                    </div>
                    <p class="footer__sub">Acepto <a href="">Términos y Condiciones</a> y autorizo el <a href="">Tratamiento de datos personales.</a></p>
                    <div class="follow">
                        <p>SÍGUENOS EN:</p>
                        <a target="_blank" href="{{ $cct->instagram }}"><img src="{{ asset("img/follow-06.png") }}" alt="follow insta"></a>
                        <a target="_blank" href="{{ $cct->facebook }}"><img src="{{ asset("img/follow-07.png") }}" alt="follow face"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>