@include('widgets.header')
@include('widgets.navbar')

<!-- <div class="sharebot ">
    <p class="sharebot--link"><i class="mdi mdi-share-variant"></i> Compartir</p>
    <ul class="share--links">
    @foreach ($socialmedia as $media)
    <li><a class="share--link" target="_blank" href="{{ $media->url }}"><img src="{{ $media->icon }}"></a></li>
    {{ $media->icon }}
    @endforeach
    </ul>
</div>  -->

<div id="mision-vision"></div>

<div class="content">





    <section class="about__mission">
        <div class="card--mission">
            <div class="d-none d-md-block">
                <img src="../img/target.png" alt="">
            </div>
            <div class="card--mission_text">
                <h3 class="title txt-underline my-3">@lang('locale.mision')</h3>
                <p class="txt--black text-justify my-1">

                    {!! __($oima->mision) !!}

                </p>
            </div>
            <div class="card--mission_text">
                <h3 class="title txt-underline my-3">@lang('locale.vision')</h3>
                <p class="txt--black text-justify my-1">
                    {!! __($oima->vision) !!}
                </p>
            </div>
        </div>
        <div id="Comite-Ejecutivo"></div>
    </section>


 



    <section class="about__more">
        <div class="info--img d-none d-md-block">
            <img src="../img/info-icon.svg">
        </div>
        <div class="more--info">
            <h4 class="title">@lang('locale.masInfo')</h4>
            <p class="txt--black"></p>
            <a class="btn btn--green" href="{{ route('contacto') }}">@lang('locale.contactar')</a>
        </div>
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