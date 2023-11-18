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
@include('widgets.footer')