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

                    @lang('locale.documentos')

                    </h4>
                    <div class="repo-subtitle">
                    <p class="txt--black"> {{$extras->laboral_documents}}</p>
                    </div>
                </div>
                <form method="get">
                    <div>
                        <select class="select" name="region" id="region-select" data-lang="es">
                            <option value="">Región</option>
                            <option value="1">Región Central</option>
                            <option value="2">Región Norte</option>
                            <option value="5">Región Cono Sur</option>
                            <option value="6">Región Caribe</option>
                            <option value="7">Región Andina</option>
                        </select>
                    </div>
                    <div class="search--container">
                        <h4 class="title d-md-none">

                            Documentos laborales

                        </h4>
                        <input type="hidden" class="input input--search" name="category" value="">
                        <div class="input__wrap input__wrap--search">
                            <input type="search" class="input input--search" placeholder="Buscar" name="name" value="">
                        </div>
                    </div>
                </form>
            </div>

            <div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">

                    <li class="nav-item"><a class="nav-link document-category {{ request()->routeIs('documentos-tecnicos') ? 'active' : '' }}"
                            href="{{ route('documentos-tecnicos')}}" id="document-cat-1">@lang('locale.documentos')</a></li>
                    <li class="nav-item"><a class="nav-link document-category {{ request()->routeIs('informes-regionales') ? 'active' : '' }}"
                            href="{{ route('informes-regionales')}}" id="document-cat-2">@lang('locale.informes')</a></li>
                </ul>
            </div>
            <div class="mt-1 mb-5">
                <div class="card__container js-equal-height-parent" id="blog-entries">

                @include('partials.documents')


                </div>

                <div class="text-center mb-5">
                    <button id="more-results" class="btn btn--green"  data-page="2">@lang('locale.botonCargar')</button>
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


    @include('widgets.footer')


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





    <script type="text/javascript" src="/js/main.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let page = 2; 

            document.getElementById('more-results').addEventListener('click', function () {
             
                axios.get('/get-more-documents', { params: { page: page } })
                    .then(function (response) {
                      
                        document.getElementById('blog-entries').insertAdjacentHTML('beforeend', response.data);
                        page++; 
                    })
                    .catch(function (error) {
                        console.error('Error al cargar más documentos', error);
                    });
            });
        });
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