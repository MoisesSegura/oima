<!DOCTYPE html>
<html>

<!-- Mirrored from www.mioa.org/es/blog/eventos/15 by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Oct 2023 23:35:47 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OIMA |
        Sistema de Información de Mercados Agrícolas de Uruguay

    </title>

    <link rel="apple-touch-icon" sizes="180x180" href="../../../apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../../favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../../favicon-16x16.png">
    <link rel="manifest" href="../../../site.html">
    <link rel="mask-icon" href="../../../safari-pinned-tab.svg" color="#376697">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" type="text/css"
        href="../../../../cdn.jsdelivr.net/npm/%40mdi/font%403.5.95/css/materialdesignicons.min.css">

    <link rel="stylesheet" type="text/css" href="../../../css/index.css">

</head>

<body>
    <div class="nav" role="navigation">
        <a class="logo" href="https://www.mioa.org/">OIMA / MIOA</a>
        <ul class="nav__list">
            <li><a class="nav__list--link " href="https://www.mioa.org/">Inicio</a></li>
            <li><a class="nav__list--link " href="../../oima.html">OIMA</a></li>
            <li><a class="nav__list--link " href="../../repositorio/publicaciones.html">Repositorio</a></li>
            <li><a class="nav__list--link
            " href="../../catalogo/Frutas.html">Catálogo</a></li>
            <li class="d-none d-md-block"><a class="nav__list--link active" href="../eventos.html">Blog</a></li>
            <li class="d-none d-md-block"><a class="nav__list--link " href="../../contacto.html">Contacto</a></li>

            <li class="nav-item dropdown d-md-none">
                <a id="nav-collapse-trigger" class="nav__list--link nav-link dropdown-toggle" href="#"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Más <i
                        class="mdi mdi-chevron-down"></i></a>
                <div class="dropdown-menu" aria-labelledby="nav-collapse-trigger">
                    <a class="nav__list--link active" href="../eventos.html">Blog</a>
                    <a class="nav__list--link " href="../../contacto.html">Contacto</a>
                </div>
            </li>
        </ul>
        <div class="nav--others">
            <a class="text-decoration-none lang--select" href="http://www.mioa.org/en/blog/eventos">EN</a>
            <a class="text-decoration-none lang--select" href="http://www.mioa.org/pt/blog/eventos/19">PT</a>



            <button class="btn btn--clear search--trigger"><i class="mdi mdi-magnify"></i></button>
            <div class="search__box-container">
                <div class="search__box">
                    <form action="https://www.mioa.org/es/buscar" method="get">
                        <div class="input--wrap-nav">
                            <input type="text" name="q" placeholder="Ingrese su búsqueda">
                        </div>
                        <button type="submit" class="btn btn--small btn--green">IR</button>
                    </form>
                    <button class="btn btn--clear search--trigger"><i class="mdi mdi-close"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="backbot">
            <a href="javascript:history.back()" class="backbot--link"><i class="mdi mdi-chevron-left"></i> Volver</a>
        </div>



        <div class="hero hero-has-text hero--event" style="background-image:url('{{ asset($event->image) }}')">
            <!-- <img src="{{ asset($event->image) }}" alt="{{ $event->name }}"> -->

            <div class="hero--txt">
                <h2 class="section--title txt--blue d-none d-md-block">{{ __($event->name) }}</h2>
                <div class="txt--gray">
                    <ul class="event__list-icons">
                        <li><img src="../../../img/location-icon.svg" alt="">
                            <p> {{ __($event->address) }} </p>
                        </li>
                        <li><img src="../../../img/calendar-icon.svg" alt="">
                            <p>{{\Carbon\Carbon::parse($event->start)->isoFormat('D [-] MMMM') }}, {{ __($event->year)
                                }}</p>
                        </li>
                        <li><img src="../../../img/meeting-icon.svg" alt="">
                            @foreach ($event->assistanceTypes as $assistanceType)
                            <p>{{ __($assistanceType->name) }}</p>
                            @endforeach
                        </li>
                    </ul>
                </div>
                <a class="btn btn--green" href="../../contacto.html">CONTACTAR</a>
            </div>
        </div>

        <section class="event--content">
            <div class="container">
                <div class="row">

                    <div class="col-md-6">
                        <h2 class="title title--sideline">Descripción</h2>
                        <div class="txt--gray">
                            @if($event->description)
                            {!! $event->description !!}
                            @else
                            <p>No hay descripción disponible.</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card--md-only">
                            <h2 class="title title--sideline">Idiomas disponibles</h2>
                            <div class="txt--gray">
                                <ul>
                                    @foreach ($event->languages as $language)
                                    <li>{{ __($language->name) }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </div>


    <footer>
        <div>
            <a class="logo">OIMA/MIOA</a>
            <img class="d-none d-md-block" src="../../../img/map-white.png" width="100" />
        </div>
        <div class="d-none d-md-block">
            <p><strong>Explora</strong></p>
            <ul class="footer__list footer__links ">
                <li><a href="../../index.html">Inicio</a></li>
                <li><a href="../../repositorio.html">Repositorio</a></li>
                <li><a href="../eventos.html">Blog</a></li>
                <li><a href="../../oima.html">OIMA</a></li>
                <li><a href="../../catalogo/Frutas.html">Catálogo</a></li>
                <li><a href="../../contacto.html">Contacto</a></li>
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
    <script type="text/javascript" src="../../../js/main.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-151598454-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'UA-151598454-1');
    </script>
</body>

<!-- Mirrored from www.mioa.org/es/blog/eventos/15 by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Oct 2023 23:35:47 GMT -->

</html>