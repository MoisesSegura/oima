@include('widgets.header')
@include('widgets.navbar')

<div class="content">
    <div class="d-flex justify-content-between">
        <div class="backbot">
            <a href="javascript:history.back()" class="backbot--link"><i class="mdi mdi-chevron-left"></i> @lang('locale.volver') </a>
        </div>
        <div class="sharebot ">
            <p class="sharebot--link"><i class="mdi mdi-share-variant"></i> Compartir</p>
            <ul class="share--links">
                <li><a class="share--link" target="_blank"
                        href="https://www.facebook.com/sharer/sharer.php?u=https://www.mioa.org/es"><img
                            src="/img/fb-icon.svg"></a></li>
                <li><a class="share--link" target="_blank"
                        href="https://wa.me/?text=https://www.mioa.org/es/"><img
                            src="/img/wa-icon.svg"></a></li>
                <li><a class="share--link" target="_blank"
                        href="https://twitter.com/home?status=https://www.mioa.org/es/"><img
                            src="/img/tw-icon.svg"></a></li>
                <li><a class="share--link" target="_blank"
                        href="https://www.linkedin.com/shareArticle?mini=true&url=https://www.mioa.org/es/"><img
                            src="/img/li-icon.svg"></a></li>
            </ul>
        </div>
    </div>
    <div class="card card--product">
        <div class="card--product__title d-md-none">

            <p class="card--text">@lang('locale.conocido')</p>
            <h3 class="card--title">{{$product->known_name}}</h3>

        </div>
        <img src="{{ asset(trim('/uploads/' . $product->product->image, '/')) }}" alt="{{ $product->product->name }}"
            class="card--product__img">
        <div class="card--product__content">
            <div class="px-3 card--product__title d-none d-md-block">

                <p class="card--text">@lang('locale.conocido')</p>
                <h3 class="card--title">{{$product->known_name}}</h3>

            </div>
            <ul class="card__list bullets--gray list--circle">
                <li>
                    <p class="card--title">@lang('locale.otrosNom')</p>

                    <p class="card--text">
                        @foreach($knownNames as $knownName)
                        {{ $knownName }}
                        @endforeach
                    </p>


                    <a href="{{ route('verDiccionario', ['id' => $product->id]) }}"
                        class="txt--green">@lang('locale.verdiccionario')<i class="mdi mdi-arrow-right"></i></a>
                </li>
                <li>
                    <p class="card--title">@lang('locale.nombrecien')</p>
                    <p class="card--text">{{$product->product->scientific_name}}</p>
                </li>
                <li>
                    <p class="card--title">@lang('locale.familia')</p>
                    <p class="card--text">{{$product->product->family_name}}</p>
                </li>
            </ul>
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
                            <h4 style="color:white" class="title">@lang('locale.caract')</h4>
                        </div>
                        <div class="card no-border-md card--full"
                            style="color:white;background-color:#076495!important;">
                            <p style="text-align:justify">
                            
                            {!! $product->characteristics !!}
                        
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="card--md-only col-md-6" style="background-color:#076495!important;">

                    <div class="col-md-12"
                        style="background-color:#076495!important;padding:20px;border-bottom:3px solid #4aa090!important">
                        <div class="col-md-12" style="border-bottom:6px solid #4aa090!important">
                            <h4 style="color:white" class="title">@lang('locale.variedad') </h4>
                        </div>
                        <div class="card no-border-md mb-5 card--full-md"
                            style="color:white;background-color:#076495!important;">
                            <p>  {!! $product->varieties !!} </p>
                        </div>
                    </div>

                </div>
                <div class="card--md-only col-md-6">
                    <div class="col-md-12"
                        style="background-color:#F3F3F3;padding:20px;border-bottom:3px solid #878484!important">
                        <div class="col-md-12" style="border-bottom:6px solid #878484!important">
                            <h4 class="title">@lang('locale.unidad')</h4>
                        </div>
                        <div class="card no-border-md card--full-md" style="background-color:#F3F3F3">
                            <p>{!! $product->salesunit !!} </p>
                        </div>
                    </div>


                </div>
            </div>

            <div class="card--md-only" style="background-color:#F3F3F3!important;">
                <div class="row">
                    <div class="col-md-12" style="padding:20px">
                        <div class="col-md-12" style="border-bottom:6px solid #878484!important">
                            <h4 class="title">@lang('locale.unidad') <i class="fa fa-map-marker"> </i> </h4>
                        </div>
                        <div class="card no-border-md card--full" style="background-color:#F3F3F3">
                            <!-- <p><img src="{{ asset(trim('/uploads/' . $product->national_production, '/')) }}" alt=""
                                    style="height:585px; width:750px" /></p> -->

                                    <!-- <img src="{{ asset(trim('/uploads/' . $product->national_production, '/')) }}" alt=""
                                    class="card--product__img">   -->
                            <p> {!! $product->national_production !!}  </p>
                           
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="card--md-only col-md-6" style="background-color:#F3F3F3!important;">
                    <div class="col-md-12"
                        style="background-color:#F3F3F3;padding:20px;border-bottom:3px solid #878484!important">
                        <div class="col-md-12" style="border-bottom:6px solid #878484!important">
                            <h4 class="title">@lang('locale.impPF')</h4>
                        </div>
                        <div class="card no-border-md card--full-md" style="background-color:#F3F3F3">
                            <p>{!! $product->imports !!}</p>
                        </div>
                    </div>
                </div>
                <div class="card--md-only col-md-6" style="background-color:#076495!important;">
                    <div class="col-md-12"
                        style="background-color:#076495!important;padding:20px;border-bottom:3px solid #4aa090!important">
                        <div class="col-md-12" style="border-bottom:6px solid #4aa090!important">
                            <h4 style="color:white" class="title">@lang('locale.expPF')</h4>
                        </div>
                        <div class="card no-border-md card--full-md"
                            style="background-color:#076495!important;color:white">
                            <p>   {!! $product->exports !!} </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

            @if(!empty($graphic))
            <div class="col-12">
                    <div class="card--md-only">
                        <h3 class="title title--sideline title--underline-md">@lang('locale.estacionalidad')</h3>
                      
                        <div class="x-scroll__container">
                            <div class="chart--container">
                                <div id="graphicConti"></div>
                            </div>
                        </div>
                        <p>Fuente: {{$graphic->font}}</p>
                        <p>Años: {{$graphic->font_years}}</p>
                       
                      
                    </div>
                </div>
            </div>
            @endif

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
                        type: 'column'
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
            </div>

            

            <div class="row">
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card--md-only">
                        <h3 class="title title--sideline title--underline-md"> @lang('locale.galeriade') {{$product->country->name }}</h3>

                        <div class="gallery__carousel">
                        </div>

                        <a href="{{ route('verGaleria', ['id' => $product->id]) }}" class="btn btn--green">@lang('locale.vergaleria')</a>
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
                            href="https://www.facebook.com/sharer/sharer.php?u=https://www.mioa.org/es/"><img
                                src="/img/fb-icon.svg"></a></li>
                    <li><a class="share--link" target="_blank"
                            href="https://wa.me/?text=https://www.mioa.org/es/"><img
                                src="/img/wa-icon.svg"></a></li>
                    <li><a class="share--link" target="_blank"
                            href="https://twitter.com/home?status=https://www.mioa.org/es/"><img
                                src="/img/tw-icon.svg"></a></li>
                    <li><a class="share--link" target="_blank"
                            href="https://www.linkedin.com/shareArticle?mini=true&url=https://www.mioa.org/es/"><img
                                src="/img/li-icon.svg"></a></li>
                </ul>
            </div>
        </div>
        <a href="javascript:history.back()" class="btn btn--green"> @lang('locale.volver')</a>
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