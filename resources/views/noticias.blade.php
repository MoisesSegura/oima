<!DOCTYPE html>
<html>
    
<!-- Mirrored from www.mioa.org/es/blog/noticias by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Oct 2023 23:24:30 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>OIMA | Blog</title>

        <link rel="apple-touch-icon" sizes="180x180" href="../../apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../../favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../../favicon-16x16.png">
        <link rel="manifest" href="../../site.html">
        <link rel="mask-icon" href="../../safari-pinned-tab.svg" color="#376697">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="theme-color" content="#ffffff">

        <link rel="stylesheet" type="text/css" href="../../../cdn.jsdelivr.net/npm/%40mdi/font%403.5.95/css/materialdesignicons.min.css">

        <link rel="stylesheet" type="text/css" href="../../css/index.css">

                    </head>
    <body>
            <div class="nav" role="navigation">
    <a class="logo" href="https://www.mioa.org/">OIMA / MIOA</a>
    <ul class="nav__list">
        <li><a class="nav__list--link " href="https://www.mioa.org/">Inicio</a></li>
        <li><a class="nav__list--link " href="{{ route('home')}}">OIMA</a></li>
        <li><a class="nav__list--link " href="../repositorio/publicaciones.html">Repositorio</a></li>
        <li><a class="nav__list--link" href="{{ route('frutas')}}">Catálogo</a></li>
        <li class="d-none d-md-block"><a class="nav__list--link active" href="{{ route('eventos')}}">Blog</a></li>
        <li class="d-none d-md-block"><a class="nav__list--link " href="{{ route('contacto')}}">Contacto</a></li>

        <li class="nav-item dropdown d-md-none">
            <a id="nav-collapse-trigger" class="nav__list--link nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Más <i class="mdi mdi-chevron-down"></i></a>
            <div class="dropdown-menu" aria-labelledby="nav-collapse-trigger">
                <a class="nav__list--link active" href="{{ route('eventos')}}">Blog</a>
                <a class="nav__list--link " href="{{ route('contacto')}}">Contacto</a>
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
        
        <div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item"><a class="nav-link " href="{{ route('eventos')}}">Eventos</a></li>
                <li class="nav-item"><a class="nav-link active" href="{{ route('noticias')}}">Noticias OIMA</a></li>
                <li class="nav-item"><a class="nav-link " href="{{ route('sima-media')}}">SIMA en los medios</a></li>
            </ul>
        </div>

        <form method="get">
            <div class="search--container">
                <div class="selectors__container">
                    <div class="selectors">
                        <div class="select--wrapper">
                            <select class="select" name="year">
                                <option value="">Todos los años</option>

                                @for ($year = date('Y'); $year >= 2019; $year--)
                                <option value="{{ $year }}">{{ $year }}</option>
                                @endfor
                            </select>
                        </div>

                    </div>
                </div>
                <div class="input__wrap input__wrap--search">
                    <input type="search" class="input input--search" placeholder="Buscar" name="name" value="">
                </div>
            </div>
        </form>

        <div class="my-2">
                    <div class="blog__list" id="blog-entries">

                        @php
                        $currentYear = null;
                        @endphp

                        @foreach ($news as $new)
                        @php
                        $newYear = \Carbon\Carbon::parse($new->date)->year;
                        @endphp

                        @if ($newYear != $currentYear)
                        {{-- Cambio de año, muestra un nuevo encabezado --}}
                        <h3 class="blog__list-title">{{ $newYear }}</h3>
                        @php
                        $currentYear = $newYear;
                        @endphp
                        @endif

                        <div class="card--event card--blog mb-4">
                            <div class="card--event__img">
                                <img src="{{ asset($new->image) }}" alt="{{ $new->name }}">
                            </div>
                            <div class="card--blog__text">
                                <h4 class="card--title w-100 text-left">{{ __($new->title) }}</h4>
                                <p class="card--subtitle w-100 text-left">{{
                                    \Carbon\Carbon::parse($new->date)->isoFormat('D [-] MMMM YYYY') }}</p>
                            
                                <a class="btn btn--green" href="{{ url('new/' . $new->id . '.html') }}">Ver
                                    Noticia</a>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    <div class="text-center mb-5">
                        <button class="btn btn--green" id="more-results">Cargar más</button>
                    </div>
                </div>
        
      

    </div>


        <footer>
    <div>
        <a class="logo">OIMA/MIOA</a>
        <img class="d-none d-md-block" src="../../img/map-white.png" width="100"/> 
    </div>
    <div class="d-none d-md-block">
        <p><strong>Explora</strong></p>
        <ul class="footer__list footer__links ">
            <li><a href="../index.html">Inicio</a></li>
            <li><a href="../repositorio.html">Repositorio</a></li>
            <li><a href="eventos.html">Blog</a></li>
            <li><a href="../oima.html">OIMA</a></li>
            <li><a href="../catalogo/Frutas.html">Catálogo</a></li>
            <li><a href="../contacto.html">Contacto</a></li>
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
        <script type="text/javascript" src="../../js/main.js"></script>
            <script>
        var is_ajax = false;
        var page = 2;
        var query = "";
        query = query.replace(/&amp;/g,'&');

        var cantPages = 2;

        $("#more-results").on('click', function () {
            if (currentYear === undefined){
                currentYear = 0;
            }
            if (is_ajax === false) {
                is_ajax = true;
                $.ajax({
                    url: "/es/ajax/blog/noticias/"+currentYear+"/"+ page + "?"+query,
                    method: "GET"
                }).done(function (data) {
                    is_ajax = false;
                    page++;
                    $("#blog-entries").append(data);

                    if (cantPages < page) {
                        $("#more-results").css("display", "none");
                    }
                });
            }
        });

    </script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-151598454-1"></script>
            <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-151598454-1');
            </script>
    </body>

<!-- Mirrored from www.mioa.org/es/blog/noticias by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Oct 2023 23:24:30 GMT -->
</html>
