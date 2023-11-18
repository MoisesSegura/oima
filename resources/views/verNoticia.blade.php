@include('widgets.header')
@include('widgets.navbar')
    <div class="content">
        <div class="backbot">
            <a href="javascript:history.back()" class="backbot--link"><i class="mdi mdi-chevron-left"></i> Volver</a>
        </div> <img class="w-100 d-md-none" src="../../../uploads/news/96b30d16117b2c6c8c7093c2bb2cdfb00a20076b.jpg"
            alt="Uso de tecnologías de información en los mercados agrícolas fortalecería comercio de alimentos y transparencia, afirman IICA y OIMA">

        <div class="hero hero-has-text hero--full" style="background-image:url('{{ asset($new->image) }}')">
            <div class="hero--txt">
                <h1 class="section--title txt--blue d-none d-md-block text-uppercase">{{ __($new->title) }}</h1>
                <p class="txt--gray"><small> {{\Carbon\Carbon::parse($new->start)->isoFormat('D [-] MMMM') }}, {{
                        __($new->year) }}</small></p>
                <div class="txt--gray">
                    <p>
                    <p>{!! $new->short_description !!}</p>
                    </p>
                </div>
            </div>
        </div>

        <section class="container">
            <div class="txt--gray">
        
                @if($new->oimaNewContent)
                @foreach ($new->oimaNewContent as $oimaNewContent)
                <p>{!! __($oimaNewContent->text) !!}</p>
                @endforeach
                @endif

            </div>
            @if($new->oimaNewContent)
            @foreach ($new->oimaNewContent as $oimaNewContent)
            <h3 class="txt--blue title--sideline">{{ __($oimaNewContent->subtitle) }}</h3>
            @endforeach
            @endif
            <div class="txt--gray">

            </div>

            @if($new->oimaNewContent)
            @foreach ($new->oimaNewContent as $oimaNewContent)
            <div class="video--container">

                <iframe src="{{$oimaNewContent->video}}" frameborder="0"></iframe>

            </div>
            @endforeach
            @endif


        </section>

    </div>


    <footer>
        <div>
            <a class="logo">OIMA/MIOA</a>
            <img class="d-none d-md-block" src="../../../img/map-white.png" width="100" />
        </div>
        <div class="d-none d-md-block">
            <p><strong>Explora</strong></p>
            <ul class="footer__list footer__links ">
                <li><a href="../../index.html">Inicio</a></li>
                <li><a href="../../repositorio.html">Repositorio</a></li>
                <li><a href="../eventos.html">Blog</a></li>
                <li><a href="../../oima.html">OIMA</a></li>
                <li><a href="../../catalogo/Frutas.html">Catálogo</a></li>
                <li><a href="../../contacto.html">Contacto</a></li>
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
    <script type="text/javascript" src="../../../js/main.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-151598454-1"></script>
    <script>
        window.datr || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'UA-151598454-1');
    </script>
</body>


</html>