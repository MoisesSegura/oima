<!DOCTYPE html>
<html>
    

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>OIMA | Inicio</title>

        <link rel="apple-touch-icon" sizes="180x180" href="../apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png">
        <link rel="manifest" href="../site.html">
        <link rel="mask-icon" href="../safari-pinned-tab.svg" color="#376697">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="theme-color" content="#ffffff">

        <link rel="stylesheet" type="text/css" href="../../cdn.jsdelivr.net/npm/%40mdi/font%403.5.95/css/materialdesignicons.min.css">

        <link rel="stylesheet" type="text/css" href="../css/index.css">

                    </head>
    <body>
            <div class="nav" role="navigation">
    <a class="logo" href="https://www.mioa.org/">OIMA / MIOA</a>
    <ul class="nav__list">
        <li><a class="nav__list--link  active " href="https://www.mioa.org/">Inicio</a></li>
        <li><a class="nav__list--link " href="oima.html">OIMA</a></li>
        <li><a class="nav__list--link " href="repositorio/publicaciones.html">Repositorio</a></li>
        <li><a class="nav__list--link
            "
               href="catalogo/Frutas.html">Catálogo</a></li>
        <li class="d-none d-md-block"><a class="nav__list--link " href="blog/eventos.html">Blog</a></li>
        <li class="d-none d-md-block"><a class="nav__list--link " href="contacto.html">Contacto</a></li>

        <li class="nav-item dropdown d-md-none">
            <a id="nav-collapse-trigger" class="nav__list--link nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Más <i class="mdi mdi-chevron-down"></i></a>
            <div class="dropdown-menu" aria-labelledby="nav-collapse-trigger">
                <a class="nav__list--link " href="blog/eventos.html">Blog</a>
                <a class="nav__list--link " href="contacto.html">Contacto</a>
            </div>
        </li>
    </ul>
    <div class="nav--others">
    
    <a class="text-decoration-none lang--select" href="{{ route('change-language', ['locale' => 'en']) }}">EN</a>
    <a class="text-decoration-none lang--select" href="{{ route('change-language', ['locale' => 'es']) }}">ES</a>
    <a class="text-decoration-none lang--select" href="{{ route('change-language', ['locale' => 'pt']) }}">PT</a>

    <p>Current Language: {{ app()->getLocale() }}</p>
        
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
</div>            <div class="content">
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
                
                <p class="txt--gray"> {{ __($site->know_oima_description) }}</p>
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
                            <li class="list--expandable">  <p>{{ __($achievement->text) }}</p></li>
                            @endforeach
                                                                                        
                        </ul>
                                            </div>
                </div>
            </div>
        </section>




        <section class="blog--home">

            <div class="blog__tabs">
                <h3 class="title">Blog</h3>
                <hr>
                <ul class="nav nav-tabs" id="carousel-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#events" id="events-tab" data-toggle="tab" role="tab" aria-controls="events" aria-selected="true">Eventos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#news" id="news-tab" data-toggle="tab" role="tab" aria-controls="news" aria-selected="false">Noticias OIMA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#media" id="media-tab" data-toggle="tab" role="tab" aria-controls="media" aria-selected="false">SIMA en los medios</a>
                    </li>
                </ul>
            </div>

            <div class="tab-content">
                                <div class="tab-pane fade show active" id="events" role="tabpanel" aria-labelledby="events-tab">
                    <ul class="blog--carousel js-equal-height-parent">
                                                    <li class="blog--carousel__card js-equal-height">
                                <div class="card--img">
                                    <img src="../uploads/events/6eb0ca4391d5127a9ffaea91e9e9ba91047a4822.png">
                                </div>
                                <div class="card--content">
                                    <p class="txt--blue">Observatorio Brasileño Agropecuario - La Agricultura de Brasil en un sólo lugar</p>
                                    <p>23 - 23 de Junio, 2022</p>
                                    <p class="txt--gray">
                                        Observatorio Brasile&ntilde;o Agropecuario - la agricultura de Brasil en un solo lugar

&nbsp;

...
                                    </p>
                                    <a href="blog/eventos/22.html" class="btn btn--green">Ver evento</a>
                                </div>
                            </li>
                                                    <li class="blog--carousel__card js-equal-height">
                                <div class="card--img">
                                    <img src="../uploads/events/2e2aea96a2d52cb9b37ed9c23691fabbb85dbc55.png">
                                </div>
                                <div class="card--content">
                                    <p class="txt--blue">FEWS NET y las herramientas de información sobre comercio y mercados</p>
                                    <p>31 - 31 de Mayo, 2022</p>
                                    <p class="txt--gray">
                                        FEWS NET y las herramientas de informaci&oacute;n sobre comercio y mercados

31 de mayo, 2022

&...
                                    </p>
                                    <a href="blog/eventos/20.html" class="btn btn--green">Ver evento</a>
                                </div>
                            </li>
                                                    <li class="blog--carousel__card js-equal-height">
                                <div class="card--img">
                                    <img src="../uploads/events/a28343fdb412209ef49b93bceb32c57a889c069b.png">
                                </div>
                                <div class="card--content">
                                    <p class="txt--blue">La Comisión Interamericana de Agricultura Orgánica (CIAO) y la necesidad de contar con relevamiento de precios orgánicos</p>
                                    <p>26 - 26 de Abril, 2022</p>
                                    <p class="txt--gray">
                                        La Comisi&oacute;n Interamericana de Agricultura Org&aacute;nica (CIAO) y la necesidad de contar con...
                                    </p>
                                    <a href="blog/eventos/19.html" class="btn btn--green">Ver evento</a>
                                </div>
                            </li>
                                                    <li class="blog--carousel__card js-equal-height">
                                <div class="card--img">
                                    <img src="../uploads/events/4e83879ba28e1a3a00a676dd4454ca7f3feb0895.png">
                                </div>
                                <div class="card--content">
                                    <p class="txt--blue">Uso de las herramientas en línea del Sistema Nacional de Información e Integración de Mercados - SNIIM, México</p>
                                    <p>29 - 29 de Marzo, 2022</p>
                                    <p class="txt--gray">
                                        Uso de las herramientas en l&iacute;nea del Sistema Nacional de Informaci&oacute;n e Integraci&oacut...
                                    </p>
                                    <a href="blog/eventos/21.html" class="btn btn--green">Ver evento</a>
                                </div>
                            </li>
                                                    <li class="blog--carousel__card js-equal-height">
                                <div class="card--img">
                                    <img src="../uploads/events/ae882060a7711cb082498427e4ddef17a07cba12.png">
                                </div>
                                <div class="card--content">
                                    <p class="txt--blue">Uso de las herramientas en línea de USDA Market News</p>
                                    <p>27 - 27 de Enero, 2022</p>
                                    <p class="txt--gray">
                                        Uso de las herramientas en l&iacute;nea de USDA Market News

&nbsp;

Presendato por:&nbsp;

De...
                                    </p>
                                    <a href="blog/eventos/23.html" class="btn btn--green">Ver evento</a>
                                </div>
                            </li>
                                                    <li class="blog--carousel__card js-equal-height">
                                <div class="card--img">
                                    <img src="../uploads/events/fe646bd404c6a163e5b48ec53ce375869784b079.jpg">
                                </div>
                                <div class="card--content">
                                    <p class="txt--blue">Desarrollo de Capacidades de Inteligencia de Mercado de USAID/USDA para América Latina y el Caribe</p>
                                    <p>30 - 30 de Noviembre, 2021</p>
                                    <p class="txt--gray">
                                        DESARROLLO DE CAPACIDADES DE INTELIGENCIA DE MERCADOS DE USAID/USDA PARA AM&Eacute;RICA LATINA Y EL ...
                                    </p>
                                    <a href="blog/eventos/18.html" class="btn btn--green">Ver evento</a>
                                </div>
                            </li>
                                                    <li class="blog--carousel__card js-equal-height">
                                <div class="card--img">
                                    <img src="../uploads/events/eeb3c9f6b815fdddc1a58909c358da8abc8059bb.jpg">
                                </div>
                                <div class="card--content">
                                    <p class="txt--blue">Fortalecimiento del Sistema de Información Pública del Ministerio de Agricultura y Ganadería, Quito, Ecuador</p>
                                    <p>18 - 20 de Octubre, 2021</p>
                                    <p class="txt--gray">
                                        
	
		
			
			
				
					
						
						&nbsp;

						&nbsp;Presentaci&oacute;n T&eacute;cni...
                                    </p>
                                    <a href="blog/eventos/17.html" class="btn btn--green">Ver evento</a>
                                </div>
                            </li>
                                                    <li class="blog--carousel__card js-equal-height">
                                <div class="card--img">
                                    <img src="../uploads/events/299746a200733d6e76e923458e2c9f96ede1e9aa.jpg">
                                </div>
                                <div class="card--content">
                                    <p class="txt--blue">Relevamiento de Precios de Productos Agrícolas en Mendoza, Argentina</p>
                                    <p>10 - 10 de Agosto, 2021</p>
                                    <p class="txt--gray">
                                        
PRESENTACI&Oacute;N T&Eacute;CNICA DE OIMA

&nbsp;

Relevamiento de Precios de Productos Agr&i...
                                    </p>
                                    <a href="blog/eventos/16.html" class="btn btn--green">Ver evento</a>
                                </div>
                            </li>
                                                    <li class="blog--carousel__card js-equal-height">
                                <div class="card--img">
                                    <img src="../uploads/events/bdd5cef043ece0eaf768b8600b7c19606d671fbf.jpg">
                                </div>
                                <div class="card--content">
                                    <p class="txt--blue">Sistema de Información de Mercados Agrícolas de Uruguay</p>
                                    <p>10 - 10 de Junio, 2021</p>
                                    <p class="txt--gray">
                                        Sistema de Informaci&oacute;n de Mercados Agr&iacute;colas de Uruguay

&nbsp;

&nbsp;

Present...
                                    </p>
                                    <a href="blog/eventos/15.html" class="btn btn--green">Ver evento</a>
                                </div>
                            </li>
                                            </ul>
                    <div class="text-center">
                        <a class="btn--green-mobile" href="blog/eventos.html">Ver todos</a>
                    </div>
                </div>
                                <div class="tab-pane fade" id="news" role="tabpanel" aria-labelledby="news-tab">
                    <ul class="blog--carousel js-equal-height-parent">
                                                    <li class="blog--carousel__card js-equal-height">
                                <div class="card--img">
                                    <img src="../uploads/news/dce4b095448d8b174259e2e63cecdb93160dc4f2.jpg">
                                </div>
                                <div class="card--content">
                                    <p>Cursos Virtuales de OIMA</p>
                                    <p>25 de Febrero 2022</p>
                                    <p class="txt--gray">
                                        Ya se encuentra disponible la matr&iacute;cula para los cursos virtuales de OIMA&nbsp;en la p&aacute...
                                    </p>
                                    <a href="blog/noticias/21.html" class="btn btn--green">Ver noticia</a>
                                </div>
                            </li>
                                                    <li class="blog--carousel__card js-equal-height">
                                <div class="card--img">
                                    <img src="../uploads/news/924cc080d71426d069962636fc5978dfd356f4a6.jpg">
                                </div>
                                <div class="card--content">
                                    <p>Presentación Técnica OIMA: Servicio de Marketing Agrícola del USDA AMS- Mas Allá de las Noticias del Mercado</p>
                                    <p>27 de Abril 2021</p>
                                    <p class="txt--gray">
                                        &nbsp;

La presentaci&oacute;n t&eacute;cnica de OIMA correspondiente al mes de abril se celebr&oa...
                                    </p>
                                    <a href="blog/noticias/19.html" class="btn btn--green">Ver noticia</a>
                                </div>
                            </li>
                                                    <li class="blog--carousel__card js-equal-height">
                                <div class="card--img">
                                    <img src="../uploads/news/ee6500de6b489f9061777e06bec03b21ddf8c5ed.jpg">
                                </div>
                                <div class="card--content">
                                    <p>Reunión del Caribe</p>
                                    <p>22 de Abril 2021</p>
                                    <p class="txt--gray">
                                        La Regi&oacute;n del Caribe celebr&oacute; su primera reuni&oacute;n despu&eacute;s de algunos meses...
                                    </p>
                                    <a href="blog/noticias/20.html" class="btn btn--green">Ver noticia</a>
                                </div>
                            </li>
                                                    <li class="blog--carousel__card js-equal-height">
                                <div class="card--img">
                                    <img src="../uploads/news/c13d43dc24b30aee4df556a5c4e9da0f2534cfd2.jpg">
                                </div>
                                <div class="card--content">
                                    <p>Mediante encuentros regionales, se da a conocer el impacto del COVID19 en los países</p>
                                    <p>17 de Julio 2020</p>
                                    <p class="txt--gray">
                                        Las reuniones regionales se programaron bajo la direcci&oacute;n de la Presidencia y fueron organiza...
                                    </p>
                                    <a href="blog/noticias/16.html" class="btn btn--green">Ver noticia</a>
                                </div>
                            </li>
                                                    <li class="blog--carousel__card js-equal-height">
                                <div class="card--img">
                                    <img src="../uploads/news/6f5a87b3574323480ca46e413d06bd8a1922d146.jpg">
                                </div>
                                <div class="card--content">
                                    <p>Comité Ejecutivo se reúne</p>
                                    <p>17 de Julio 2020</p>
                                    <p class="txt--gray">
                                        El Comité Ejecutivo (CE) de MIOA se ha estado reuniendo regularmente, aunque en tiempos normales la ...
                                    </p>
                                    <a href="blog/noticias/17.html" class="btn btn--green">Ver noticia</a>
                                </div>
                            </li>
                                                    <li class="blog--carousel__card js-equal-height">
                                <div class="card--img">
                                    <img src="../uploads/news/562dd76db7a0ed8f8efa802fcd86707d1c3f370e.png">
                                </div>
                                <div class="card--content">
                                    <p>Foro Técnico: Modelo Predictivo de Precios para Uruguay</p>
                                    <p>17 de Julio 2020</p>
                                    <p class="txt--gray">
                                        El 30 de junio el equipo del Mercado Modelo en Uruguay, present&oacute; a los delegados de OIMA el p...
                                    </p>
                                    <a href="blog/noticias/18.html" class="btn btn--green">Ver noticia</a>
                                </div>
                            </li>
                                                    <li class="blog--carousel__card js-equal-height">
                                <div class="card--img">
                                    <img src="../uploads/news/c5eab49aae60e29a4f28c7c49d99ade78c3c500e.jpg">
                                </div>
                                <div class="card--content">
                                    <p>Participación de OIMA en el Agricultural Outlook Forum de USDA</p>
                                    <p>27 de Febrero 2020</p>
                                    <p class="txt--gray">
                                        La Organizaci&oacute;n de Informaci&oacute;n de Mercados de las Am&eacute;ricas (OIMA) tuvo la oport...
                                    </p>
                                    <a href="blog/noticias/15.html" class="btn btn--green">Ver noticia</a>
                                </div>
                            </li>
                                                    <li class="blog--carousel__card js-equal-height">
                                <div class="card--img">
                                    <img src="../uploads/news/03b851aedd59d17763bcffbe9588e8592c024b53.png">
                                </div>
                                <div class="card--content">
                                    <p>Apertura del curso &quot;Técnicas para el Análisis de Precios en la Agricultura&quot;</p>
                                    <p>20 de Febrero 2020</p>
                                    <p class="txt--gray">
                                        La matr&iacute;cula para el curso ya se encuentra habilitada, el mismo inicia el 1 de marzo y finali...
                                    </p>
                                    <a href="blog/noticias/14.html" class="btn btn--green">Ver noticia</a>
                                </div>
                            </li>
                                                    <li class="blog--carousel__card js-equal-height">
                                <div class="card--img">
                                    <img src="../uploads/news/96b30d16117b2c6c8c7093c2bb2cdfb00a20076b.jpg">
                                </div>
                                <div class="card--content">
                                    <p>Uso de tecnologías de información en los mercados agrícolas fortalecería comercio de alimentos y transparencia, afirman IICA y OIMA</p>
                                    <p>7 de Febrero 2020</p>
                                    <p class="txt--gray">
                                        Organizaciones impulsan la aplicaci&oacute;n de herramientas como big data, inteligencia artificial,...
                                    </p>
                                    <a href="blog/noticias/12.html" class="btn btn--green">Ver noticia</a>
                                </div>
                            </li>
                                            </ul>
                    <div class="text-center">
                         <a class="btn--green-mobile" href="blog/noticias.html">Ver todos</a>
                    </div>
                </div>
                                <div class="tab-pane fade" id="media" role="tabpanel" aria-labelledby="media-tab">
                    <ul class="blog--carousel js-equal-height-parent">
                                                    <li  class="blog--carousel__card js-equal-height">
                                <div class="card--img">
                                    <img src="../uploads/simaMedia/5951cd9f341c86a3abd8ea54f3d9b622fd843b04.jpg">
                                </div>
                                <div class="card--content">
                                    <p>Reunión de Usuarios de Datos de USDA</p>
                                    <p>14 de Abril 2021</p>
                                    <p class="txt--gray">
                                        El Departamento de Agricultura de Estados Unidos (USDA)&nbsp;fue anfitri&oacute;n de la&nbsp;Reuni&o...
                                    </p>
                                    <a href="blog/sima-media/9.html" class="btn btn--green">Ver artículo</a>
                                </div>
                            </li>
                                                    <li  class="blog--carousel__card js-equal-height">
                                <div class="card--img">
                                    <img src="../uploads/simaMedia/c39adf77fdffa4ef96120995e6e452d5305d155f.jpg">
                                </div>
                                <div class="card--content">
                                    <p>Odepa: cómo y por qué “se toma el pulso” a las transacciones en mercados y ferias</p>
                                    <p>8 de Junio 2020</p>
                                    <p class="txt--gray">
                                        Nota publicada en el periodico chileno La Cuarta, el lunes 8 de junio de 2020. El texto original se ...
                                    </p>
                                    <a href="blog/sima-media/8.html" class="btn btn--green">Ver artículo</a>
                                </div>
                            </li>
                                                    <li  class="blog--carousel__card js-equal-height">
                                <div class="card--img">
                                    <img src="../uploads/simaMedia/406e8c95a5fbfef8f2997d6de05d35aee67a27c7.jpg">
                                </div>
                                <div class="card--content">
                                    <p>Minagri presenta nuevas herramientas de información agraria</p>
                                    <p>21 de Agosto 2019</p>
                                    <p class="txt--gray">
                                        &rdquo;AgroChatea&rdquo;, es el nuevo aplicativo que permite realizar consultas de precios de produc...
                                    </p>
                                    <a href="blog/sima-media/7.html" class="btn btn--green">Ver artículo</a>
                                </div>
                            </li>
                                                    <li  class="blog--carousel__card js-equal-height">
                                <div class="card--img">
                                    <img src="../uploads/simaMedia/a386b850125242e342a8a3865e081eae10428d18.jpg">
                                </div>
                                <div class="card--content">
                                    <p>“¿A cuánto?” la nueva aplicación que lanza Odepa del Ministerio de Agricultura para monitorear los precios de frutas y verduras del país</p>
                                    <p>21 de Junio 2019</p>
                                    <p class="txt--gray">
                                        La aplicaci&oacute;n desarrollada por la Oficina de Estudios y Pol&iacute;ticas Agrarias (Odepa), de...
                                    </p>
                                    <a href="blog/sima-media/6.html" class="btn btn--green">Ver artículo</a>
                                </div>
                            </li>
                                                    <li  class="blog--carousel__card js-equal-height">
                                <div class="card--img">
                                    <img src="../uploads/simaMedia/6b953ec685adab80af81c28eee14506a33627f86.jpg">
                                </div>
                                <div class="card--content">
                                    <p>What is the Belize Agriculture Information Management System (BAIMS)</p>
                                    <p>17 de Junio 2019</p>
                                    <p class="txt--gray">
                                        The Belize Agriculture Information Management System (BAIMS) is a web-based application that serves ...
                                    </p>
                                    <a href="blog/sima-media/4.html" class="btn btn--green">Ver artículo</a>
                                </div>
                            </li>
                                                    <li  class="blog--carousel__card js-equal-height">
                                <div class="card--img">
                                    <img src="../uploads/simaMedia/fccb4903c5da0a1e1b8d6fc96a378a53f94e4327.jpg">
                                </div>
                                <div class="card--content">
                                    <p>Costa Rica: Nueva plataforma digital ofrecerá precios de productos pesqueros y acuícolas</p>
                                    <p>7 de Mayo 2019</p>
                                    <p class="txt--gray">
                                        Herramienta permitir&aacute; conocer los precios que se manejan desde las costas, Cenada, mercados m...
                                    </p>
                                    <a href="blog/sima-media/5.html" class="btn btn--green">Ver artículo</a>
                                </div>
                            </li>
                                            </ul>
                     <div class="text-center">
                         <a class="btn--green-mobile" href="blog/sima-media.html">Ver todos</a>
                    </div>
                </div>
               
            </div>
        </section>


        <section class="home__resources">
            <div class="card__resources card-repository">
                <div class="card--content">
                    <h4 class="title">Repositorio de Documentos</h4>
                    <p class="txt--gray">Encuentre en este enlace nuestras publicaciones, presentaciones, documentos laborales, reuniones, normas de procedimiento, diccionario y videos.</p>
                    <a class="btn btn--green" href="repositorio.html">Ver Repositorio</a>
                </div>
            </div>
            <div class="card__resources card-catalog">
                <div class="card--content">
                    <h4 class="title">Catálogo de productos</h4>
                    <p class="txt--gray">Consulte la información actualizada de los 39 productos agrícolas de mayor importancia en la región Central.</p>
                    <a class="btn btn--green" href="catalogo/Frutas.html">Ver Catálogo</a>
                </div>
            </div>
                        <div class="card__links">
                <h4 class="title">Herramientas adicionales</h4>
                <div class="card__links__container">
                                            <a class="link--resources d-none d-md-block" target="_blank" href="http://www.simmagro.sieca.int/">SIMMAGRO:</a>
                        <div class="d-md-none pl-3">
                            <p class="txt--blue txt--bold">SIMMAGRO:</p>
                            <a class="txt--gray txt--small" target="_blank" href="http://www.simmagro.sieca.int/">http://www.simmagro.sieca.int/</a>
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
        <img class="d-none d-md-block" src="../img/map-white.png" width="100"/> 
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
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-151598454-1');
            </script>
    </body>

<!-- Mirrored from www.mioa.org/es/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Oct 2023 23:21:35 GMT -->
</html>