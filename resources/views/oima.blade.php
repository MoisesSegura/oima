@include('widgets.header')
@include('widgets.navbar')



<div class="content">
    <section class="section--about">
        <div class="container">
            <div class="row">
                <div class="col-md-6 about">
                    <h1 class="title title--underline">OIMA/MIOA</h1>
                    <p class="txt--black">


                        @foreach ($oima as $oima)
                        {!! __($oima->description) !!}
                        @endforeach

                    </p>
                    <img class="w-100 d-none d-md-block" src="{{ asset('/uploads/' . ltrim($oima->image, '/')) }}">
                </div>

                <div class="col-md-6 about__values values--desktop d-none d-md-block">
                    <h3 class="title">@lang('locale.principios')</h3>
                    <ul class="list--icons">
                        @foreach ($workprinciples as $workprinciple)


                        <li>
                            <img class="icon" src="{{ asset('/uploads/' . ltrim($workprinciple->image, '/')) }}">
                            <p class="txt--black">{!! strip_tags($workprinciple->text) !!}</p>
                        </li>

                        @endforeach
                    </ul>
                </div>


            </div>
        </div>

    </section>

    <section class="container">
    <div class="col-md-12 about__values values--mobile d-block d-md-none">
        <h3 class="title">@lang('locale.principios')</h3>
        <ul class="list--icons">
            @foreach ($workprinciples as $work)
                <li>
                    <img class="icon" src="{{ asset('/uploads/' . ltrim($work->image, '/')) }}">
                    <p class="txt--black">{!! strip_tags($work->text) !!}</p>
                </li>
            @endforeach
        </ul>
    </div>
</section


    <section class="about__mission">
        <div class="card--mission">
            <div class="d-none d-md-block">
                <img src="../img/target.png" alt="">
            </div>
            <div class="card--mission_text">
                <h3 class="title txt-underline my-3">@lang('locale.mision')</h3>
                <p class="txt--black text-justify my-1">

                    {!! $oima->mision !!}

                </p>
            </div>
            <div class="card--mission_text">
                <h3 class="title txt-underline my-3">@lang('locale.vision')</h3>
                <p class="txt--black text-justify my-1">
                    {!! $oima->vision !!}
                </p>
            </div>
        </div>
        <div id="Comite-Ejecutivo"></div>
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