@include('widgets.header')
@include('widgets.navbar')

    <div class="content">
    @include('widgets.repositoryTab')

        <div class="container--repository open">
            <div class="back d-md-none">
                <a href="/es/repositorio" class="title"><i class="mdi mdi-chevron-left"></i> @lang('locale.volver')</a>
            </div>
            <div class="header--repository">
                <div class="title--repository d-none d-md-flex ">
                    <h4 class="title">

                    @lang('locale.normas')
                    </h4>
                    <div class="repo-subtitle">
                    <p class="txt--black"> {{$extras->procedure_norms}}</p>
                    </div>
                </div>
                <form method="get"  action="{{ route('buscar.normas') }}" id="searchNorms">
                    <div>
                    </div>
                    <div class="search--container">

                        <h4 class="title d-md-none repoTitleMovil">@lang('locale.normas')</h4>

                        <input type="hidden" class="input input--search" name="category" value="">
                        <div class="input__wrap input__wrap--search">
                            <input type="search" class="input input--search" placeholder="Buscar" name="name" value="">
                        </div>
                    </div>
                </form>
            </div>

            <div class="mt-1 mb-5">
                <div class="card__container js-equal-height-parent" id="blog-entries">


                @include('partials.iterarNormas')


                </div>

                <div class="text-center mb-5">
                </div>
            </div>

        </div>

        <section class="about__mission xs-blue-line">
            <div class="card__links card-xs">
                <h4 class="title">@lang('locale.herramientas')</h4>
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


    @include('widgets.footer')
   

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