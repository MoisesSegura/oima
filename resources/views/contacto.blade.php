<!DOCTYPE html> <html> <!-- Mirrored from www.mioa.org/es/contacto by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05
    Oct 2023 23:23:56 GMT --> <!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8"
    /><!-- /Added by HTTrack --> <head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>OIMA | Contacto</title>

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
        <a class="logo" href="https://www.mioa.org/">OIMA / MIOA</a>
        <ul class="nav__list">
            <li><a class="nav__list--link " href="{{ route('home')}}">Inicio</a></li>
            <li><a class="nav__list--link " href="oima.html">OIMA</a></li>
            <li><a class="nav__list--link " href="repositorio/publicaciones.html">Repositorio</a></li>
            <li><a class="nav__list--link" href="{{ route('frutas')}}">Catálogo</a></li>
            <li class="d-none d-md-block"><a class="nav__list--link " href="{{ route('eventos')}}">Blog</a></li>
            <li class="d-none d-md-block"><a class="nav__list--link active" href="{{ route('contacto')}}">Contacto</a></li>

            <li class="nav-item dropdown d-md-none">
                <a id="nav-collapse-trigger" class="nav__list--link nav-link dropdown-toggle" href="#"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Más <i
                        class="mdi mdi-chevron-down"></i></a>
                <div class="dropdown-menu" aria-labelledby="nav-collapse-trigger">
                    <a class="nav__list--link " href="blog/eventos.html">Blog</a>
                    <a class="nav__list--link active" href="contacto.html">Contacto</a>
                </div>
            </li>
        </ul>
        <div class="nav--others">
            <a class="text-decoration-none lang--select" href="http://www.mioa.org/en/blog/eventos">EN</a>
            <a class="text-decoration-none lang--select" href="http://www.mioa.org/pt/contacto">PT</a>



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
    <script src="../../www.google.com/recaptcha/apicbae.js?render=6Ldwp8AZAAAAAIO4Botn2YIT7t-dIeOTz54B8Vul"></script>
    <script>
        grecaptcha.ready(function () {
            grecaptcha.execute('6Ldwp8AZAAAAAIO4Botn2YIT7t-dIeOTz54B8Vul', { action: 'contact' }).then(function (token) {
                var recaptchaResponse = document.getElementById('recaptchaResponse');
                recaptchaResponse.value = token;
            });
        });
    </script>

    <div class="content">
        <h1 class="section--title title--underline  txt--blue text-center d-md-none">Contacto</h1>
        <div class="hero hero-has-text hero-contact">
            <div class="hero--txt">
                <h1 class="section--title d-none d-md-block">Contacto</h1>
                <ul class="card__list list--circle bullets--gray">
                    <li>Presidente OIMA <br><strong>{{ $contact->contact_president }}</strong></li>
                    <li>Secretaria Técnica de OIMA <br><strong>{{ $contact->contact_secretary }}</strong></li>
                    <li>Teléfono <br><strong>{{ $contact->contact_phone }}</strong></li>
                    <li>Correo <br><strong>{{ $contact->contact_email }}</strong></li>
                </ul>
            </div>
        </div>


        <section class="contact__form ">
            <div class="card--form">
                <h3 class="title text-center">Enviar un mensaje</h3>
                <form action="https://www.mioa.org/es/contacto" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <div class="input__wrap input--green">
                            <input class="input" id="name" type="text" name="name" maxlength="255" required
                                placeholder="Nombre completo">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="country">País</label>
                        <div class="select--wrapper">
                            <select class="select" id="country" name="country" required>
                                <option value="">Seleccionar un país</option>

                                @foreach($countries as $country)
                                <option value="{{ $country->name }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <div class="input__wrap input--green">
                            <input class="input" id="email" type="email" name="email" maxlength="255" required
                                placeholder="Ingrese su correo">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message">Mensaje</label>
                        <div class="input__wrap input--green">
                            <textarea class="input" required id="message" name="message" rows="3"
                                placeholder="Ingrese el cuerpo del mensaje" maxlength="5000"></textarea>
                        </div>
                    </div>
                    <button class="btn btn--green" type="submit">ENVIAR</button>
                    <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
                </form>
            </div>
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
    <script type="text/javascript">
        $(window).on('load', function () {
            $('#modal-contact').modal('show');
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
</body>

</html>