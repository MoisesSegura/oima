@include('widgets.header')
@include('widgets.navbar')

    <div class="content">
        <div class="backbot">
            <a href="javascript:history.back()" class="backbot--link"><i class="mdi mdi-chevron-left"></i> @lang('locale.volver')</a>
        </div>
        <h1 class="section--title title--underline txt--blue text-center d-md-none">{{ __($organization->country->name) }}</h1>
        <div class="hero hero--flag" style="background-image:url(/img/flags/{{ strtolower($organization->country->flag->iso) }}.svg)">
            <div class="hero--txt d-none d-md-block">
                <h1 class="section--title txt--blue text-uppercase">{{ __($organization->country->name) }}</h1>
            </div>
        </div>



        <div class="container">
            <div class="row">
                <div class="col-md-7 mx-auto mb-5">
                    <div class="card-organization">
                        <h3 class="title title--sideline">Organización</h3>
                        <p class="title mx-3"> {{ __($organization->name) }} </p>
                        <h3 class="title title--sideline">Delegados</h3>
                        <ul class="card__list list--circle bullets--gray">
                        @foreach ($delegates as $delegate)
                            <li class="text--blue"> {{ $delegate->name }} <br>
                            <span class="txt--gray"> {{ $delegate->title }} </span></li>
                        @endforeach

                        </ul>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="card-organization">


                        <h3 class="title title--sideline">Consulta de Precios</h3>
                        <ul class="card__list list--circle bullets-gray">
                            @foreach ($prices as $price)
                            <li><a class="text--green"
                                    href="{{ $price->url }}"
                                    target="_blank">{{ $price->url }}</a>
                            </li>
                            @endforeach
                        </ul>

                        <h3 class="title title--sideline">Enlaces Externos</h3>
                        <ul class="card__list list--circle bullets-gray">

                        @foreach ($links as $link)
                            <li><a a class="text--green" href="{{ $link->url }}"
                            target="_blank">{{ $link->url }}</a>
                            </li>
                        @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>


    @include('widgets.footer')

    
    <script type="text/javascript" src="/js/main.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!--    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-151598454-1"></script>
            <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-151598454-1');
            </script>
	-->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-17L57FSXE7"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'G-17L57FSXE7');
    </script>

</body>

</html>