@include('widgets.header')
@include('widgets.navbar')
<div class="content">
    <!-- <div class="hero hero--home">
        <img src="../uploads/principal_banner/cbba7a4b30741aa41395fee3ce68163743e296ee.png" />
        <div class="hero--home-overlay">
            <h1>{{ __($site->banner_title) }}</h1>
            <h3>{{ __($site->banner_subtitle) }}</h3>


        </div>
    </div> -->

    <div class="hero hero--home">
        <div class="single-item">
        @foreach ($carousel as $carousel)
            <img src="{{ asset('/uploads/' . ltrim($carousel->image, '/')) }}">
        @endforeach
        </div>
        <div class="hero--home-overlay">
            <h1>{{ __($site->banner_title) }}</h1>
            <h3>{{ __($site->banner_subtitle) }}</h3>
        </div>
    </div>

    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('.single-item').slick({
                prevArrow: '<button type="button" class="slick-prev"><</button>',
                nextArrow: '<button type="button" class="slick-next">></button>'
            });
        });
    </script>

    <section class="lead">
        <img class="lead__img" src="../img/map-color.png" alt="Logo oima">
        <div class="lead__content">
            <h3 class="title">{{ __($site->know_oima_title) }}</h3>

            <p class="txt--gray"> {!! __($site->know_oima_description) !!}</p>
            <br />


            <h3 class="title">@lang('locale.proposito')</h3>

            <p class="txt--black">{{ __($site->oima_purpose) }}</p>
        </div>
    </section>
    <section class="card__container-home container">
        <div class="row js-equal-height-parent">
            <div class="col-md-5 order-2-mobile">
                <div class="card--stats js-equal-height-ref">
                    <img class="card__icon mb-3 d-none d-md-block" src="../img/stats-icon.svg" alt="">
                    <h3 class="title text-center">@lang('locale.metricas')</h3>

                    <ul class="list--stats">
                        <li>
                            <span class="number">{!! $stats[0]->value !!}</span>
                            {!! $stats[0]->text !!}
                        </li>
                        <li>
                            <a class="custom-tooltip" data-title="@lang('locale.regiones'):

                                    @foreach($regions as $region)
                                        {{ $region->name }}
                                    @endforeach">
                                <span class="number">{!! $stats[1]->value !!}</span>
                                {!! __($stats[1]->text) !!}
                            </a>
                        </li>

                        <li>
                            <a class="metric-link" href="{{ route('historia')}}">
                                <span class="number">{!! $stats[2]->value !!}</span>
                                {!! $stats[2]->text !!}
                            </a>
                        </li>
                        <li>
                            <a class="metric-link" href="{{ route('frutas')}}">
                                <span class="number">{!! $stats[3]->value !!}</span>
                                {!! $stats[3]->text !!}
                            </a>
                        </li>
                        <li>
                            <span class="number">{!! $stats[4]->value !!}</span>
                            {!! $stats[4]->text !!}
                        </li>
                        <li>
                            <span class="number">{!! $stats[5]->value !!}</span>
                            {!! $stats[5]->text !!}
                        </li>
                    </ul>

                    <style>
                        .custom-tooltip:hover::before {
                            content: attr(data-title);
                            background-color: #fff;
                            color: #000;
                            position: absolute;
                            left: 50%;
                            bottom: 100%;
                            transform: translateX(-50%);
                            padding: 2rem;
                            border: 1px solid #ccc;
                            border-radius: 0.5rem;
                            font-size: 1rem;
                            opacity: 0;
                            pointer-events: none;
                            transition: opacity 0.5s ease-in-out;
                            margin-bottom: 8px;

                        }

                        .custom-tooltip:hover::before {
                            opacity: 1;
                        }

                        .metric-link {
                            text-decoration: none;
                            /* Elimina el subrayado */
                            color: inherit;
                        }


                        .slick-next,
                        .slick-prev {
                            font-size: 1rem;
                            color: #ffffff;
                            background-color: rgba(55, 102, 151, 0.5);
                            border-radius: 50%;
                            width: 3rem;
                            height: 3rem;
                            position: absolute;
                            top: 50%;
                            transform: translateY(-50%);

                        }

                        .slick-next {
                            right: 100px;
                           
                        }

                        .slick-prev {
                            left: 100px;
                          
                        }
                    </style>

                    <!-- <ul class="list--stats">
                        @foreach ($stats as $stat)
                        <li>
                            <span class="number"> {!! $stat->value !!}  </span>
                            <p>  {!! $stat->text !!} </p>
                        </li>
                        @endforeach
                      
                    </ul> -->
                </div>
            </div>
            <div class="col-md-7 order-1-mobile">
                <div class="card--md-only card--achievements js-equal-height card--expansible">
                    <img class="card__icon mb-3 d-none d-md-block" src="../img/achievements-icon.svg" alt="">
                    <h3 class="title">@lang('locale.logros')</h3>
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
                <h4 class="title">@lang('locale.repositorio')</h4>
                <p class="txt--gray">{{ __($extras->document_repository) }}</p>
                <a class="btn btn--green" href="{{ route('publicaciones')}}">@lang('locale.verRepo')</a>
            </div>
        </div>
        <div class="card__resources card-catalog">
            <div class="card--content">
                <h4 class="title">@lang('locale.catalogo')</h4>
                <p class="txt--gray">{{ __($extras->catalog) }}</p>
                <a class="btn btn--green" href="{{ route('frutas')}}">@lang('locale.verCata')</a>

            </div>
        </div>
        <div class="card__links">
            <h4 class="title">@lang('locale.herramientas')</h4>
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
            <h3 class="title">@lang('locale.secretaria')</h3>
        </div>
        <img class="lead__img" src="../img/logo-iica.png" alt="Logo IICA">
    </section>

</div>

@include('widgets.footer')

<script type="text/javascript" src="../js/main.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-151598454-1"></script>
<script>
    window.datawindow.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());

    gtagg151598454 - 1');
</script>
</body>

</html>