<!DOCTYPE html> <html> <head> <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>OIMA | Inicio</title>

<link rel="apple-touch-icon" sizes="180x180" href="../apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png">
<link rel="manifest" href="../site.html">
<link rel="mask-icon" href="../safari-pinned-tab.svg" color="#376697">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="theme-color" content="#ffffff">

<link rel="stylesheet" type="text/css"
    href="../../cdn.jsdelivr.net/npm/%40mdi/font%403.5.95/css/materialdesignicons.min.css">

<link rel="stylesheet" type="text/css" href="../css/index.css">

</head>
<body>
<div class="nav" role="navigation">
    <a class="logo" href="https://www.mioa.org/">OIMA / MIOA</a> <ul class="nav__list"> <li><a
            class="nav__list--link  active " href="{{ route('home')}}">Inicio</a></li>
        <li><a class="nav__list--link " href="oima.html">OIMA</a></li>
        <li><a class="nav__list--link " href="repositorio/publicaciones.html">Repositorio</a></li>
        <li><a class="nav__list--link" href="{{ route('frutas')}}">Catálogo</a></li>
        <li class=" d-none d-md-block"><a class="nav__list--link " href="{{ route('eventos')}}">Blog</a></li>
        <li class="d-none d-md-block"><a class="nav__list--link " href="{{ route('contacto')}}">Contacto</a></li>

        <li class="nav-item dropdown d-md-none">
            <a id="nav-collapse-trigger" class="nav__list--link nav-link dropdown-toggle" href="#"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Más <i class="mdi
            mdi-chevron-down"></i></a>
            <div class="dropdown-menu" aria-labelledby="nav-collapse-trigger">
            <a class="nav__list--link " href="blog/eventos.html">Blog</a>
            <a class="nav__list--link " href="contacto.html">Contacto</a>
            </div>
        </li>
        </ul> <div class="nav--others"> 
            <a class="text-decoration-none lang--select" href="{{ route('change-language',['locale' => 'es']) }}">ES</a> 
            <a class="text-decoration-none lang--select" href="{{ route('change-language',['locale' => 'en']) }}">EN</a> 
            <a class="text-decoration-none lang--select" href="{{ route('change-language',['locale' => 'pt']) }}">PT</a>

    <!-- <p>Current Language: {{ app()->getLocale() }}</p> -->

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
    </div> </div> <div class="content">
    <div class="hero hero--home">
    <img src="../uploads/principal_banner/cbba7a4b30741aa41395fee3ce68163743e296ee.png"/>
    <div class="hero--home-overlay">
        <h1>{{ __($site->banner_title) }}</h1>
        <h3>{{ __($site->banner_subtitle) }}</h3>


        </div>
    </div>

    <section class="lead">
    <img class="lead__img" src="../img/map-color.png" alt="Logo oima">
    <div class="lead__content">
    <h3 class="title">{{ __($site->know_oima_title) }}</h3>

    <p class="txt--gray"> {!! __($site->know_oima_description) !!}</p>
    <br/>


    <h3 class="title">Nuestro Próposito</h3>

    <p class="txt--gray">{{ __($site->oima_purpose) }}</p>
</div>
</section>




<section class="card__container-home container">
    <div class="row js-equal-height-parent">
        <div class="col-md-5 order-2-mobile">
            <div class="card--stats js-equal-height-ref">
                <img class="card__icon mb-3 d-none d-md-block" src="../img/stats-icon.svg" alt="">
                <h3 class="title text-center">OIMA en Números</h3>
                <ul class="list--stats">
                    <li>
                        <span class="number">33</span>
                        <p>Pa&iacute;ses&nbsp;<small>miembros</small></p>
                    </li>
                    <li>
                        <span class="number">5</span>
                        <p>Regiones&nbsp;</p>
                    </li>
                    <li>
                        <span class="number">21</span>
                        <p style="margin-right:-35px">A&ntilde;os trabajando en apoyo a los SIMA</p>
                    </li>
                    <li>
                        <span class="number">39</span>
                        <p style="margin-right:-35px">Productos de la regi&oacute;n central, catalogados</p>
                    </li>
                    <li>
                        <span class="number">24</span>
                        <p style="margin-right:-35px">Mejores pr&aacute;cticas regionales identificadas</p>
                    </li>
                    <li>
                        <span class="number">6</span>
                        <p>Socios estrat&eacute;gicos regionales</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-7 order-1-mobile">
            <div class="card--md-only card--achievements js-equal-height card--expansible">
                <img class="card__icon mb-3 d-none d-md-block" src="../img/achievements-icon.svg" alt="">
                <h3 class="title">Nuestros Logros</h3>
                <ul class="list--achievements card__list list--circle bullets--blue">

                    @foreach ($achievements as $achievement)
                    <li class="list--expandable">
                        <p>{{ __($achievement->text) }}</p>
                    </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>
</section>




<!-- <section class="blog--home">

    <div class="blog__tabs">
        <h3 class="title">Blog</h3>
        <hr>
        <ul class="nav nav-tabs" id="carousel-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" href="#events" id="events-tab" data-toggle="tab" role="tab"
                    aria-controls="events" aria-selected="true">Eventos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#news" id="news-tab" data-toggle="tab" role="tab" aria-controls="news"
                    aria-selected="false">Noticias OIMA</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#media" id="media-tab" data-toggle="tab" role="tab" aria-controls="media"
                    aria-selected="false">SIMA en los medios</a>
            </li>
        </ul>
    </div>

    <div class="tab-content">
        <div class="tab-pane fade show active" id="events" role="tabpanel" aria-labelledby="events-tab">
            <ul class="blog--carousel js-equal-height-parent">
                @foreach ($events as $event)
                <li class="blog--carousel__card js-equal-height">
                    <div class="card--img">
                        <img src="{{ asset($event->image) }}">
                    </div>
                    <div class="card--content">
                        <p class="txt--blue">{{ __($event->name) }}</p>
                        <p>{{ \Carbon\Carbon::parse($event->start)->format('Y-m-d') }}</p>
                        <p class="txt--gray">
                            {{ __($event->name) }}
                        </p>
                        <a href="" class="btn btn--green">Ver evento</a>
                    </div>
                </li>
                @endforeach
            </ul>
            <div class="text-center">
                <a class="btn--green-mobile" href="">Ver todos</a>
            </div>
        </div>



        <div class="tab-pane fade" id="news" role="tabpanel" aria-labelledby="news-tab">
            <ul class="blog--carousel js-equal-height-parent">
                @foreach ($news as $new)
                <li class="blog--carousel__card js-equal-height">
                    <div class="card--img">
                        <img src="{{ asset($new->image) }}">
                    </div>
                    <div class="card--content">
                        <p class="txt--blue">{{ __($new->title) }}</p>
                        <p>{{ \Carbon\Carbon::parse($new->start)->format('Y-m-d') }}</p>
                        <p class="txt--gray">
                            {{ __($new->title) }}
                        </p>
                        <a href=" " class="btn btn--green">Ver noticia</a>
                    </div>
                </li>
                @endforeach
            </ul>
            <div class="text-center">
                <a class="btn--green-mobile" href=" ">Ver todos</a>
            </div>
        </div>


        <div class="tab-pane fade" id="media" role="tabpanel" aria-labelledby="media-tab">
            <ul class="blog--carousel js-equal-height-parent">
                @foreach ($simas as $sima)
                <li class="blog--carousel__card js-equal-height">
                    <div class="card--img">
                        <img src="{{ asset($sima->image) }}">
                    </div>
                    <div class="card--content">
                        <p class="txt--blue">{{ __($sima->title) }}</p>
                        <p>{{ \Carbon\Carbon::parse($sima->start)->format('Y-m-d') }}</p>
                        <p class="txt--gray">
                            {{ __($sima->title) }}
                        </p>
                        <a href="" class="btn btn--green">Ver artículo</a>
                    </div>
                </li>
                @endforeach
            </ul>
            <div class="text-center">
                <a class="btn--green-mobile" href="">Ver todos</a>
            </div>

        </div>
    </div>
    </div>

    </div>
</section> -->



<section class="home__resources">
    <div class="card__resources card-repository">
        <div class="card--content">
            <h4 class="title">Repositorio de Documentos</h4>
            <p class="txt--gray">{{ __($extras->document_repository) }}</p>
            <a class="btn btn--green" href="repositorio.html">Ver Repositorio</a>
        </div>
    </div>
    <div class="card__resources card-catalog">
        <div class="card--content">
            <h4 class="title">Catálogo de productos</h4>
            <p class="txt--gray">{{ __($extras->catalog) }}</p>
          <a class="btn btn--green" href="">Ver Catálogo</a>

        </div>
    </div>
    <div class="card__links">
        <h4 class="title">Herramientas adicionales</h4>
        <div class="card__links__container">
            <a class="link--resources d-none d-md-block" target="_blank"
                href="http://www.simmagro.sieca.int/">{{$tool->name}}</a>
            <div class="d-md-none pl-3">
                <p class="txt--blue txt--bold">SIMMAGRO:</p>
                <a class="txt--gray txt--small" target="_blank"
                    href="http://www.simmagro.sieca.int/">http://www.simmagro.sieca.int/</a>
            </div>
        </div>
    </div>
</section>
<section class="lead lead-small">

    <div class="lead__content">
        <h3 class="title">Secretaría Técnica</h3>
    </div>
    <img class="lead__img" src="../img/logo-iica.png" alt="Logo IICA">
</section>

</div>

<footer>
    <div>
        <a class="logo">OIMA/MIOA</a>
        <img class="d-none d-md-block" src="../img/map-white.png" width="100" />
    </div>
    <div class="d-none d-md-block">
        <p><strong>Explora</strong></p>
        <ul class="footer__list footer__links ">
            <li><a href="index.html">Inicio</a></li>
            <li><a href="repositorio.html">Repositorio</a></li>
            <li><a href="blog/eventos.html">Blog</a></li>
            <li><a href="oima.html">OIMA</a></li>
            <li><a href="catalogo/Frutas.html">Catálogo</a></li>
            <li><a href="contacto.html">Contacto</a></li>
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
<script type="text/javascript" src="../js/main.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-151598454-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());

    gtag('config', 'UA-151598454-1');
</script>
</body>

</html>