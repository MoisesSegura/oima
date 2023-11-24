@include('widgets.header')
@include('widgets.navbar')
<div class="content">
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

            <p class="txt--black">{{ __($site->oima_purpose) }}</p>
        </div>
    </section>
    <section class="card__container-home container">
        <div class="row js-equal-height-parent">
            <div class="col-md-5 order-2-mobile">
                <div class="card--stats js-equal-height-ref">
                    <img class="card__icon mb-3 d-none d-md-block" src="../img/stats-icon.svg" alt="">
                    <h3 class="title text-center">OIMA en Números</h3>
                    <ul class="list--stats">
                        @foreach ($stats as $stat)
                        <li>
                            <span class="number"> {!! $stat->value !!}  </span>
                            <p>  {!! $stat->text !!} </p>
                        </li>
                        @endforeach
                      
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

@include('widgets.footer')

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