@include('widgets.header')
@include('widgets.navbar')

<div class="content">
    <div class="d-flex justify-content-between">
        <div class="backbot">
            <a href="javascript:history.back()" class="backbot--link"><i class="mdi mdi-chevron-left"></i>
                @lang('locale.volver')</a>
        </div>
        <div class="sharebot ">
            <p class="sharebot--link"><i class="mdi mdi-share-variant"></i> Compartir</p>
            <ul class="share--links">
                <li><a class="share--link" target="_blank"
                        href="https://www.facebook.com/sharer/sharer.php?u=https://www.mioa.org/es/producto/lim%C3%B3n/argentina"><img
                            src="/img/fb-icon.svg"></a></li>
                <li><a class="share--link" target="_blank"
                        href="https://wa.me/?text=https://www.mioa.org/es/producto/lim%C3%B3n/argentina"><img
                            src="/img/wa-icon.svg"></a></li>
                <li><a class="share--link" target="_blank"
                        href="https://twitter.com/home?status=https://www.mioa.org/es/producto/lim%C3%B3n/argentina "><img
                            src="/img/tw-icon.svg"></a></li>
                <li><a class="share--link" target="_blank"
                        href="https://www.linkedin.com/shareArticle?mini=true&url=https://www.mioa.org/es/producto/lim%C3%B3n/argentina&title=&summary=&source="><img
                            src="/img/li-icon.svg"></a></li>
            </ul>
        </div>
    </div>
    <div class="container">

        <div class="row">
            <div class="card--md-only col-md-6"
                style="border-right:1px solid #878484!important;border-bottom:1px solid #878484!important">
                <div style="border-top:3px solid #4aa090!important;border-bottom:6px solid #4aa090!important">
                    <h1 style="text-align:center;color:#376697;font-weight:bold">{{$product->product->name}}</h1>
                </div>
                <img src="{{ asset(trim('/uploads/' . $product->product->image, '/')) }}"
                    alt="{{ $product->product->name }}" style="width:80%">
            </div>
            <div class="card--md-only col-md-6"
                style="background-color:#F3F3F3!important;border-top:1px solid #878484!important">

                <p class="card--title"
                    style="border-bottom:2px solid #4aa090!important;background-color:#F3F3F3!important">
                    @lang('locale.otrosNom')</p>

                <p class="card no-border-md card--full" style="background-color:#F3F3F3!important"> @foreach($knownNames
                    as $knownName)
                    {{ $knownName }}
                    @endforeach </p>

                <p class="card--title"
                    style="border-bottom:2px solid #4aa090!important;background-color:#F3F3F3!important">
                    @lang('locale.nombrecien')</p>

                <p class="card no-border-md card--full" style="background-color:#F3F3F3!important">
                    {{$product->product->scientific_name}} </p>

                <p class="card--title"
                    style="border-bottom:2px solid #4aa090!important;background-color:#F3F3F3!important">
                    @lang('locale.familia')</p>
                <p class="card no-border-md card--full" style="background-color:#F3F3F3!important">
                    {{$product->product->family_name}}</p>

                <a href="{{ route('verDiccionario', ['id' => $product->id]) }}"
                    style="background-color:#F3F3F3!important"
                    class="card no-border-md card--full txt--green">@lang('locale.verdiccionario') </a>

            </div>
        </div>
        <div class="card--md-only col-md-12">
            <div class="selectors__container" style="text-align:-webkit-center">
                <div class="selectors">
                    <div class="select--wrapper">
                        <select class="select" name="region" id="region-validate">
                            <option value="">Región</option>
                            <option value="1">Región Central</option>
                            <option selected value="5">Región Cono Sur</option>
                        </select>
                    </div>
                    <div class="select--wrapper">
                        <select class="select selected-country" name="country" id="country">
                            <option value="">País</option>
                            <option selected value="argentina">Argentina</option>
                            <option value="chile">Chile</option>
                            <option value="paraguay">Paraguay</option>
                            <option value="uruguay">Uruguay</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="product__content">
        <div class="container">
            <div class="card--md-only">
                <div class="col-12">
                    <h3 class="title title--sideline title--underline-md"> @lang('locale.infoGeneral') {{$product->country->name }}</h3>
                </div>
            </div>
            <div class="card--md-only" style="background-color:#076495!important;">
                <div class="row">
                    <div class="col-md-12"
                        style="background-color:#076495!important;padding:20px;border-bottom:3px solid #4aa090!important">
                        <div class="col-md-12" style="border-bottom:6px solid #4aa090!important">
                            <h4 style="color:white" class="title"> @lang('locale.caract')</h4>
                        </div>
                        <div class="card no-border-md card--full"
                            style="color:white;background-color:#076495!important;">
                            <p style="text-align:justify">

                                {{$product->characteristics}}

                        </div>
                    </div>
                </div>
            </div>
            <div class="card--md-only">
                <div class="row">
                    <div class="col-md-12" style="padding:20px">
                        <div class="col-md-12" style="border-bottom:6px solid #878484!important">
                            <h4 class="title"> @lang('locale.comerc')</h4>
                        </div>
                        <div class="card no-border-md card--full">
                            <p><span style="color:#000000">

                                    {{$product->commercialization}}


                                </span></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card--md-only col-md-6" style="background-color:#076495!important;">
                    <div class="row">
                        <div class="col-md-12"
                            style="background-color:#076495!important;padding:20px;border-bottom:3px solid #4aa090!important">
                            <div class="col-md-12" style="border-bottom:6px solid #4aa090!important">
                                <h4 style="color:white" class="title"> @lang('locale.variedad') </h4>
                            </div>
                            <div class="card no-border-md mb-5 card--full-md"
                                style="color:white;background-color:#076495!important;">
                                <p style="text-align:justify">

                                    {{$product->varieties}}

                                </p>
                            </div>
                            <div class="col-md-12" style="border-bottom:6px solid #4aa090!important">
                                <h4 style="color:white" class="title"> @lang('locale.procedencia') </h4>
                            </div>
                            <div class="card no-border-md card--full-md"
                                style="color:white; background-color:#076495!important;">
                                <p> {{$product->national_production}} </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card--md-only col-md-6" style="background-color:#F3F3F3!important;">
                    <div class="row">
                        <div class="col-md-12"
                            style="background-color:#F3F3F3;padding:20px;border-bottom:3px solid #878484!important">
                            <div class="col-md-12" style="border-bottom:6px solid #878484!important">
                                <h4 class="title"> @lang('locale.unidad') </h4>
                            </div>
                            <div class="card no-border-md card--full-md" style="background-color:#F3F3F3">
                                <p> {{$product->salesunit}} </p>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card--md-only col-md-6" style="background-color:#F3F3F3!important;">
                    <div class="col-md-12"
                        style="background-color:#F3F3F3;padding:20px;border-bottom:3px solid #878484!important">
                        <div class="col-md-12" style="border-bottom:6px solid #878484!important">
                            <h4 class="title"> @lang('locale.impPF') </h4>
                        </div>
                        <div class="card no-border-md card--full-md" style="background-color:#F3F3F3">

                            {{$product->imports}}

                        </div>
                    </div>
                </div>
                <div class="card--md-only col-md-6" style="background-color:#076495!important;">
                    <div class="col-md-12"
                        style="background-color:#076495!important;padding:20px;border-bottom:3px solid #4aa090!important">
                        <div class="col-md-12" style="border-bottom:6px solid #4aa090!important">
                            <h4 style="color:white" class="title"> @lang('locale.expPF')</h4>
                        </div>
                        <div class="card no-border-md card--full-md" style="background-color:#076495!important;">

                            {{$product->exports}}

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card--md-only">
                        <h3 class="title title--sideline title--underline-md">@lang('locale.estacionalidad')</h3>
                        @if(!empty($graphic))
                        <div class="x-scroll__container">
                            <div class="chart--container">
                                <div id="graphicConti"></div>
                            </div>
                        </div>
                        <p>Fuente: {{$graphic->font}}</p>
                        <p>Años: {{$graphic->font_years}}</p>
                        @else
                        <p>@lang('locale.noDatos')</p>
                        @endif
                    </div>
                </div>
            </div>




            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous"></script>


            <script src="https://code.highcharts.com/highcharts.js"></script>
            <script src="https://code.highcharts.com/modules/series-label.js"></script>
            <script src="https://code.highcharts.com/modules/exporting.js"></script>
            <script src="https://code.highcharts.com/modules/export-data.js"></script>
            <script src="https://code.highcharts.com/modules/accessibility.js"></script>


            <script>


                Highcharts.chart('graphicConti', {
                    chart: {
                        type: 'line'
                    },
                    title: {
                        text: ''
                    },
                    subtitle: {
                        text: ''
                    },
                    xAxis: {
                        categories: ['@lang('locale.enero')', '@lang('locale.febrero')', '@lang('locale.marzo')', '@lang('locale.abril')', '@lang('locale.mayo')',
                            '@lang('locale.junio')', '@lang('locale.julio')', '@lang('locale.agosto')', '@lang('locale.septiembre')', '@lang('locale.octubre')',
                            '@lang('locale.noviembre')', '@lang('locale.diciembre')']
                    },
                    yAxis: {
                        title: {
                            text: ''
                        }
                    },
                    plotOptions: {
                        line: {
                            dataLabels: {
                                enabled: false
                            },
                            enableMouseTracking: true
                        }

                    },

                    series: [{
                        name: '',

                        data: <?= $data ?>
  }]
                });
            </script>



            <div class="row">
            </div>

            <div class="row">
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card--md-only">
                        <h3 class="title title--sideline title--underline-md"> @lang('locale.galeriade') {{$product->country->name }} </h3>

                        <div class="gallery__carousel">
                        </div>

                        <a href="/es/galeria/lim%C3%B3n/argentina" class="btn btn--green">@lang('locale.vergaleria')</a>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div class="text-center">
        <div class="my-4">
            <div class="sharebot centered">
                <p class="sharebot--link"><i class="mdi mdi-share-variant"></i> Compartir</p>
                <ul class="share--links">
                    <li><a class="share--link" target="_blank"
                            href="https://www.facebook.com/sharer/sharer.php?u=https://www.mioa.org/es/producto/lim%C3%B3n/argentina"><img
                                src="/img/fb-icon.svg"></a></li>
                    <li><a class="share--link" target="_blank"
                            href="https://wa.me/?text=https://www.mioa.org/es/producto/lim%C3%B3n/argentina"><img
                                src="/img/wa-icon.svg"></a></li>
                    <li><a class="share--link" target="_blank"
                            href="https://twitter.com/home?status=https://www.mioa.org/es/producto/lim%C3%B3n/argentina "><img
                                src="/img/tw-icon.svg"></a></li>
                    <li><a class="share--link" target="_blank"
                            href="https://www.linkedin.com/shareArticle?mini=true&url=https://www.mioa.org/es/producto/lim%C3%B3n/argentina&title=&summary=&source="><img
                                src="/img/li-icon.svg"></a></li>
                </ul>
            </div>
        </div>
        <a href="javascript:history.back()" class="btn btn--green">@lang('locale.volver')</a>
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