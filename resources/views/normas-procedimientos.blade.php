@include('widgets.header')
@include('widgets.navbar')

    <div class="content">
    @include('widgets.repositoryTab')

        <div class="container--repository open">
            <div class="back d-md-none">
                <a href="/es/repositorio" class="title"><i class="mdi mdi-chevron-left"></i> Volver</a>
            </div>
            <div class="header--repository">
                <div class="title--repository d-none d-md-flex ">
                    <h4 class="title">

                        Normas de Procedimiento
                    </h4>
                    <p class="txt--gray"></p>
                </div>
                <form method="get">
                    <div>
                    </div>
                    <div class="search--container">
                        <h4 class="title d-md-none">

                            Normas de procedimientos
                        </h4>
                        <input type="hidden" class="input input--search" name="category" value="">
                        <div class="input__wrap input__wrap--search">
                            <input type="search" class="input input--search" placeholder="Buscar" name="name" value="">
                        </div>
                    </div>
                </form>
            </div>

            <div class="mt-1 mb-5">
                <div class="card__container js-equal-height-parent" id="blog-entries">


                    @foreach ($norms as $norm)
                    <div class="card--repository">
                        <div class="card--content">
                            <h4 class="card--title">{{ __($norm->name) }}</h4>
                            <hr>
                            <a class="btn btn--small btn--green"
                                href="{{ __($norm->file_real) }}"
                                target="_blank">Ver</a>
                            <a class="btn btn--small btn--white-blue"
                                href="{{ __($norm->file_real) }}"
                                download="{{ __($norm->file_real_name) }}" target="_blank"><i
                                    class="mdi mdi-download"></i></a>
                        </div>
                    </div>
                    @endforeach

                </div>

                <div class="text-center mb-5">
                </div>
            </div>

        </div>

        <section class="about__mission xs-blue-line">
            <div class="card__links card-xs">
                <h4 class="title">Herramientas adicionales</h4>
                <div class="card__links__container">
                    <a class="link--resources d-none d-md-block" target="_blank"
                        href="http://www.simmagro.sieca.int/">SIMMAGRO:</a>
                    <div class="d-md-none pl-3">
                        <p class="txt--blue txt--bold">SIMMAGRO:</p>
                        <a class="txt--gray txt--small" target="_blank"
                            href="http://www.simmagro.sieca.int/">http://www.simmagro.sieca.int/</a>
                    </div>
                </div>
            </div>
        </section>
    </div>





    <!-- Modal -->
    <div class="modal fade modal-video" id="videoModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <iframe id="ytplayer" type="text/html" width="640" height="360" src="" frameborder="0"></iframe>
                </div>
            </div>
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
    <script>
        var is_ajax = false;
        var page = 2;
        var query = "";
        query = query.replace(/&amp;/g, '&');

        var cantPages = 1;

        $("#more-results").on('click', function () {
            if (is_ajax === false) {
                var url = "/es/ajax/repositorio/normas-procedimientos/" + page + "?" + query
                is_ajax = true;
                $.ajax({
                    url: url,
                    method: "GET"
                }).done(function (data) {
                    is_ajax = false;
                    page++;
                    $("#blog-entries").append(data);

                    setEqualHeight()



                    if (cantPages < page) {
                        $("#more-results").css("display", "none");
                    }
                });
            }
        });

        function setEqualHeight() {
            $('.js-equal-height-parent').each(function () {
                var refHeight = 0;
                var $items = $(this).find('.js-equal-height');

                if ($(this).find('.js-equal-height-ref').length > 0) {
                    refHeight = $(this).find('.js-equal-height-ref').outerHeight();
                } else {
                    $($items, this).each(function () {
                        // If this box is higher than the cached highest then store it
                        if ($(this).height() > refHeight) {
                            refHeight = $(this).height();
                        }
                    });
                }
                $items.each(function () {
                    $(this).css('height', refHeight);
                })
            })
        }

    </script>
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