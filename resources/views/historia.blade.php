
@include('widgets.header')
@include('widgets.navbar')

    <div class="content">
        <div class="backbot">
            <a href="javascript:history.back()" class="backbot--link"><i class="mdi mdi-chevron-left"></i> Volver</a>
        </div>
        <h1 class="title title--underline  txt--blue text-center d-md-none">Historia de OIMA</h1>
        <div class="hero hero-has-text hero-history">
            <div class="hero--txt p-3 d-none d-md-block">
                <h1 class="title">Historia de OIMA</h1>
            </div>
        </div>

        <div class="section--history">
            <div class="block--history">
                <figure>
                    <img src="/img/history-1.svg">
                </figure>
                <div class="card--history">
                    <h4 class="title title--sideline">Definición</h4>
                    <p class="txt--gray">

                    {!! __($history->definition) !!}
    
                    </p>
                </div>
            </div>
            <div class="block--history">
                <figure>
                    <img src="/img/history-2.svg">
                </figure>
                <div class="card--history">
                    <h4 class="title title--sideline">Origen</h4>
                    <p class="txt--gray">

                    {!! __($history->origin) !!}

                    </p>
                </div>
            </div>
            <div class="block--history">
                <figure>
                    <img src="/img/history-3.svg">
                </figure>
                <div class="card--history">
                    <h4 class="title title--sideline">Estrategia</h4>
                    <p class="txt--gray">

                    {!! __($history->strategy) !!}

                    </p>
                </div>
            </div>
            <div class="block--history">
                <figure>
                    <img src="/img/history-4.svg">
                </figure>
                <div class="card--history">
                    <h4 class="title title--sideline">Nacimiento</h4>
                    <p class="txt--gray">

                    {!! __($history->birth) !!}

                    </p>
                </div>
            </div>
        </div>
        <div class="text-center">
            <a href="/es/oima" class="btn btn--green">Volver</a>
        </div>
    </div>



    <footer>
        <div>
            <a class="logo">OIMA/MIOA</a>
            <img class="d-none d-md-block" src="/img/map-white.png" width="100" />
        </div>
        <div class="d-none d-md-block">
            <p><strong>Explora</strong></p>
            <ul class="footer__list footer__links ">
                <li><a href="/es/">Inicio</a></li>
                <li><a href="/es/repositorio">Repositorio</a></li>
                <li><a href="/es/blog">Blog</a></li>
                <li><a href="/es/oima">OIMA</a></li>
                <li><a href="/es/catalogo">Catálogo</a></li>
                <li><a href="/es/contacto">Contacto</a></li>
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
  

</body>

</html>