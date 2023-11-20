@include('widgets.header')
@include('widgets.navbar')

    <div class="content">
        <div class="backbot">
            <a href="javascript:history.back()" class="backbot--link"><i class="mdi mdi-chevron-left"></i> Volver</a>
        </div>
        <div class="header--publication">
            <div class="card--repository card--publication">
                <img src="{{ asset($publication->image) }}" class="card__img">
                <div class="card--content">
                    <h3 class="title">

                    {{ __($publication->title) }}

                    </h3>
                    <hr class="hr--green">
                    <div class="txt--gray">
                        <p></p>
                        <p></p>
                        <p> {{ $publication->isbn }} </p>
                        <p> {{ $publication->topographic_signature }} </p>
                    </div>
                    <a class="btn btn--green"
                        href="/uploads/publications/files/e27501d4b9f6eb77cb292a1b717931a0b8718e5d.pdf" download="3.pdf"
                        target="_blank">Descargar</a>
                </div>
            </div>
        </div>


        <div class="container mb-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="card--publication">
                        <h3 class="title title--sideline">Detalles de la publicación</h3>
                        <ul>
                            <li><strong>Signatura topográfica:</strong> {{ $publication->topographic_signature }} </li>
                            <li><strong>Fecha de vencimiento:</strong>
                            @if ($publication->expiration_date)
                                {{ $publication->expiration_date }}
                            @else
                                No disponible
                            @endif
                        </li>

                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <h3 class="title title--sideline">Resumen</h3>
                    <div class="txt--gray">
                        <p>

                        {!! __($publication->description) !!}

                        </p>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <footer>
        <div>
            <a class="logo">OIMA/MIOA</a>
            <img class="d-none d-md-block" src="/img/map-white.png" width="100" />
        </div>
        <div class="d-none d-md-block">
            <p><strong>Explora</strong></p>
            <ul class="footer__list footer__links ">
                <li><a href="/es/">Inicio</a></li>
                <li><a href="/es/repositorio">Repositorio</a></li>
                <li><a href="/es/blog">Blog</a></li>
                <li><a href="/es/oima">OIMA</a></li>
                <li><a href="/es/catalogo">Catálogo</a></li>
                <li><a href="/es/contacto">Contacto</a></li>
            </ul>
        </div>
        <hr class="d-md-none">
        <div>
            <p><strong>Contáctanos</strong></p>
            <ul class="footer__list">
                <!-- <li><a href="tel:+50622160232"><i class="mdi mdi-phone"></i> +(506) 2216 0232</a></li> -->
                <li><a href="mailto:oima@iica.int"><i class="mdi mdi-email"></i> oima@iica.int</a></li>
            </ul>
        </div>
    </footer>
    <script type="text/javascript" src="/js/main.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!--    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-151598454-1"></script>
            <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-151598454-1');
            </script>
	-->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-17L57FSXE7"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'G-17L57FSXE7');
    </script>

</body>

</html>