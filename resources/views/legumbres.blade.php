<!DOCTYPE html>
<html>

<!-- Mirrored from www.mioa.org/es/catalogo/legumbres by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Oct 2023 23:26:45 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OIMA | Catálogo</title>

    <link rel="apple-touch-icon" sizes="180x180" href="../../apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../favicon-16x16.png">
    <link rel="manifest" href="../../site.html">
    <link rel="mask-icon" href="../../safari-pinned-tab.svg" color="#376697">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" type="text/css"
        href="../../../cdn.jsdelivr.net/npm/%40mdi/font%403.5.95/css/materialdesignicons.min.css">

    <link rel="stylesheet" type="text/css" href="../../css/index.css">

</head>

<body>
    <div class="nav" role="navigation">
        <a class="logo" href="https://www.mioa.org/">OIMA / MIOA</a>
        <ul class="nav__list">
            <li><a class="nav__list--link " href="https://www.mioa.org/">Inicio</a></li>
            <li><a class="nav__list--link " href="../oima.html">OIMA</a></li>
            <li><a class="nav__list--link " href="../repositorio/publicaciones.html">Repositorio</a></li>
            <li><a class="nav__list--link
                        active
            " href="Frutas.html">Catálogo</a></li>
            <li class="d-none d-md-block"><a class="nav__list--link " href="../blog/eventos.html">Blog</a></li>
            <li class="d-none d-md-block"><a class="nav__list--link " href="../contacto.html">Contacto</a></li>

            <li class="nav-item dropdown d-md-none">
                <a id="nav-collapse-trigger" class="nav__list--link nav-link dropdown-toggle" href="#"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Más <i
                        class="mdi mdi-chevron-down"></i></a>
                <div class="dropdown-menu" aria-labelledby="nav-collapse-trigger">
                    <a class="nav__list--link " href="../blog/eventos.html">Blog</a>
                    <a class="nav__list--link " href="../contacto.html">Contacto</a>
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
        <h1 class="section--title title--underline txt--blue text-center d-md-none">Catálogo</h1>
        <div class="hero hero-has-text">
            <div class="hero--txt">
                <h2 class="section--title txt--blue d-none d-md-block text-uppercase">Catálogo</h2>
                <h4 class="txt--blue d-none d-md-block pl-3">Conozca el producto que busca</h4>
                <div class="txt--gray pl-3">

                </div>
            </div>
        </div>
        <h2 class="section--title text-center title--underline txt--blue d-none d-md-block">Buscar producto</h2>
        <form id="f_1" name="f_1">
            <div class="search--container">
                <div class="selectors__container">
                    <h3 class="txt--blue title--underline">Buscar producto</h3>
                    <div class="selectors">
                        <div class="select--wrapper">
                        <select class="select" name="region" id="region" data-lang="es">
                                    <option value="">Región</option>
                                    @foreach ($regions as $region)
                                    <option value="{{ $region->id }}">{{ __($region->name) }}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="select--wrapper">
                            <select class="select" name="country" id="country">
                                <option value="">País</option>
                            </select>
                        </div>
                    </div>
                    <button class="btn btn--green" type="submit">Filtrar</button>

                </div>
                <div class="input__wrap input__wrap--search">
                    <input class="input input--search" placeholder="Nombre de producto común o científico" name="name"
                        value="">
                </div>
            </div>
        </form>
        <div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item"><a href="{{ route('frutas')}}" class="nav-link " id="cat3-tab" aria-controls="cat3"
                        aria-selected="false">Frutas</a></li>

                <li class="nav-item"><a href="{{ route('hortalizas')}}" class="nav-link " id="cat4-tab" aria-controls="cat4"
                        aria-selected="false">Hortalizas</a></li>

                <li class="nav-item"><a href="{{ route('granos')}}" class="nav-link " id="cat5-tab" aria-controls="cat5"
                        aria-selected="false">Granos</a></li>

                <li class="nav-item"><a href="{{ route('legumbres')}}" class="nav-link active" id="cat6-tab" aria-controls="cat6"
                        aria-selected="true">Legumbres</a></li>

            </ul>
        </div>
        <div class="tab-content bg-white">
            <div class="tab-pane fade show active">
                <div class="card__container js-equal-height-parent" id="products">

                @foreach ($legumes as $legumeDetail)
                    <a href="" class="card card--flex card--link js-equal-height">
                        <img src="{{ asset($legumeDetail->product->image) }}"
                            alt="{{ $legumeDetail->product->name }}" class="card--flex__img">
                        <div class="card--flex__content">
                            <h4 class="card--title">{{ __($legumeDetail->product->name) }}</h4>
                            <p class="card--text">{{ $legumeDetail->concatenated_known_names }}</p>
                            <p class="card--text">{{ $legumeDetail->product->family_name }}</p>
                            <p class="txt--blue">Ver</p>
                        </div>
                    </a>
                    @endforeach

                </div>
            </div>
            <div class="text-center mb-5">
            </div>
        </div>
    </div>

    <footer>
        <div>
            <a class="logo">OIMA/MIOA</a>
            <img class="d-none d-md-block" src="../../img/map-white.png" width="100" />
        </div>
        <div class="d-none d-md-block">
            <p><strong>Explora</strong></p>
            <ul class="footer__list footer__links ">
                <li><a href="../index.html">Inicio</a></li>
                <li><a href="../repositorio.html">Repositorio</a></li>
                <li><a href="../blog/eventos.html">Blog</a></li>
                <li><a href="../oima.html">OIMA</a></li>
                <li><a href="Frutas.html">Catálogo</a></li>
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
        query = query.replace(/&amp;/g, '&');

        var cantPages = 1;

        $("#more-results").on('click', function () {
            if (is_ajax === false) {
                is_ajax = true;
                $.ajax({
                    url: "/es/ajax/getProducts/6/" + page + "?" + query,
                    method: "GET"
                }).done(function (data) {
                    is_ajax = false;
                    page++;
                    $("#products").append(data);

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
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'UA-151598454-1');
    </script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        $(document).ready(function () {
            // Cuando cambia la selección de la región
            $('#region').change(function () {
                var regionId = $(this).val();

                // Si no se selecciona ninguna región, no hacemos nada
                if (!regionId) {
                    $('#country').empty(); // Limpiamos la lista de países
                    return;
                }

                // Realizamos una solicitud AJAX para obtener los países de la región
                $.ajax({
                    url: '/get-countries/' + regionId, // Reemplaza con la ruta correcta en tu aplicación
                    type: 'GET',
                    success: function (data) {
                        // Limpiamos la lista de países y agregamos los nuevos
                        $('#country').empty();
                        $.each(data, function (key, value) {
                            $('#country').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                    error: function () {
                        console.log('Error al cargar países');
                    }
                });
            });
        });
    </script>
</body>

</html>