<!DOCTYPE html>
<html>

<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OIMA | Uso de tecnologías de información en los mercados agrícolas fortalecería comercio de alimentos y
        transparencia, afirman IICA y OIMA
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
        </div> <img class="w-100 d-md-none" src="../../../uploads/news/96b30d16117b2c6c8c7093c2bb2cdfb00a20076b.jpg"
            alt="Uso de tecnologías de información en los mercados agrícolas fortalecería comercio de alimentos y transparencia, afirman IICA y OIMA">

        <div class="hero hero-has-text hero--full" style="background-image:url('{{ asset($new->image) }}')">
            <div class="hero--txt">
                <h1 class="section--title txt--blue d-none d-md-block text-uppercase">{{ __($new->title) }}</h1>
                <p class="txt--gray"><small> {{\Carbon\Carbon::parse($new->start)->isoFormat('D [-] MMMM') }}, {{
                        __($new->year) }}</small></p>
                <div class="txt--gray">
                    <p>
                    <p>{!! $new->short_description !!}</p>
                    </p>
                </div>
            </div>
        </div>

        <section class="container">
            <div class="txt--gray">
        
                @if($new->oimaNewContent)
                @foreach ($new->oimaNewContent as $oimaNewContent)
                <p>{!! __($oimaNewContent->text) !!}</p>
                @endforeach
                @endif

            </div>
            @if($new->oimaNewContent)
            @foreach ($new->oimaNewContent as $oimaNewContent)
            <h3 class="txt--blue title--sideline">{{ __($oimaNewContent->subtitle) }}</h3>
            @endforeach
            @endif
            <div class="txt--gray">

            </div>

            @if($new->oimaNewContent)
            @foreach ($new->oimaNewContent as $oimaNewContent)
            <div class="video--container">

                <iframe src="{{$oimaNewContent->video}}" frameborder="0"></iframe>

            </div>
            @endforeach
            @endif


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
        window.datr || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'UA-151598454-1');
    </script>
</body>


</html>