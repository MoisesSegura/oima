@include('widgets.header')
@include('widgets.navbar')

<div class="content">
    <div class="d-flex justify-content-between">
        <div class="backbot">
            <a href="/en/catalogo" class="backbot--link"><i class="mdi mdi-chevron-left"></i> Back</a>
        </div>
        <div class="sharebot ">
            <p class="sharebot--link"><i class="mdi mdi-share-variant"></i> Compartir</p>
            <ul class="share--links">
                <li><a class="share--link" target="_blank"
                        href="https://www.facebook.com/sharer/sharer.php?u=https://www.mioa.org/en"><img
                            src="/img/fb-icon.svg"></a></li>
                <li><a class="share--link" target="_blank"
                        href="https://wa.me/?text=https://www.mioa.org/en/"><img
                            src="/img/wa-icon.svg"></a></li>
                <li><a class="share--link" target="_blank"
                        href="https://twitter.com/home?status=https://www.mioa.org/en/"><img
                            src="/img/tw-icon.svg"></a></li>
                <li><a class="share--link" target="_blank"
                        href="https://www.linkedin.com/shareArticle?mini=true&url=https://www.mioa.org/en/"><img
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

    <!-- <div class="d-md-flex justify-content-md-around align-items-md-end m-1 mt-5 m-md-4">
        <div class="search--container">
            <div class="selectors__container">
                <div class="selectors">
                    <div class="select--wrapper">
                        <select class="select" name="region" id="region-validate">
                            <option value="">Region</option>
                            <option selected value="2">Northern Region</option>
                            <option value="5">Southern Cone Region</option>
                        </select>
                    </div>
                    <div class="select--wrapper">
                        <select class="select selected-country" name="country" id="country">
                            <option value="">Country</option>
                            <option selected value="canadaa">Canada</option>
                            <option value="estados-unidos">United States</option>
                            <option value="maaxico">Mexico</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div> -->


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
                            <!-- <p><img alt=""
                                    src="/uploads/products/galleries/6d788890b631fbd7cd200a829151391e9b36e1c5.png"
                                    style="height:585px; width:750px" /></p> -->

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
                            href="https://www.facebook.com/sharer/sharer.php?u=https://www.mioa.org/en/"><img
                                src="/img/fb-icon.svg"></a></li>
                    <li><a class="share--link" target="_blank"
                            href="https://wa.me/?text=https://www.mioa.org/en/"><img
                                src="/img/wa-icon.svg"></a></li>
                    <li><a class="share--link" target="_blank"
                            href="https://twitter.com/home?status=https://www.mioa.org/en/"><img
                                src="/img/tw-icon.svg"></a></li>
                    <li><a class="share--link" target="_blank"
                            href="https://www.linkedin.com/shareArticle?mini=true&url=https://www.mioa.org/en/"><img
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