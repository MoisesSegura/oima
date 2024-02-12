@include('widgets.header')
@include('widgets.navbar')

<div class="content">
    @include('widgets.repositoryTab')



    <div class="container--repository open">
        <div class="back d-md-none">
            <a href="javascript:history.back()" class="title"><i class="mdi mdi-chevron-left"></i>
                @lang('locale.volver')</a>
        </div>
        <div class="header--repository">
            <div class="title--repository d-none d-md-flex ">
                <h4 class="title">

                    @lang('locale.publicaciones')

                </h4>
                <div class="repo-subtitle"><p class="txt--black"> {{$extras->publications}}</p></div>

            </div>
            <div class="search--container">

                <h4 class="title d-md-none repoTitleMovil">@lang('locale.publiMovil')</h4>

                <form method="get" action="{{ route('buscar.publicaciones.documentos') }}" id="searchPubliDocument">
                    <input type="hidden" class="input input--search" name="category" value="">
                    <div class="input__wrap input__wrap--search">
                        <input type="search" class="input input--search" placeholder="Buscar" name="name" value="">
                    </div>
                </form>


                <form method="get" action="{{ route('filtrar-publicaciones') }}" id="filtrarPublicaciones">
                    <div class="selectors__container">
                        <div class="selectors">
                            <div class="select--wrapper">
                                <select class="select" name="year" id="yearSelectPubli">
                                    <option value="">@lang('locale.todosblog')</option>
                                    @for ($year = date('Y'); $year >= 2019; $year--)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

        <div class="mt-1 mb-5">
            <div class="card__container js-equal-height-parent" id="blog-entries">



                @include('partials.publications&documents')

            </div>

            <div class="text-center mb-5">
                <button id="more-results" class="btn btn--green" data-page="2">@lang('locale.botonCargar')</button>
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


<!-- 
    <script type="text/javascript" src="/js/main.js"></script> -->

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let page = 2;

        document.getElementById('more-results').addEventListener('click', function () {

            axios.get('/get-more-documents', { params: { page: page } })
                .then(function (response) {

                    document.getElementById('blog-entries').insertAdjacentHTML('beforeend', response.data);
                    page++;

                    // Verifica si hay más elementos en la respuesta
                    if (response.data.trim() === "") {
                        // Si la respuesta está vacía, oculta el botón
                        document.getElementById('more-results').style.display = 'none';
                    } else {
                        // Si hay más elementos, muestra el botón
                        document.getElementById('more-results').style.display = 'block';
                    }

                })
                .catch(function (error) {
                    console.error('Error al cargar más documentos', error);
                });
        });
    });
</script>


<script>
        document.getElementById('yearSelectPubli').addEventListener('change', function () {
            document.getElementById('filtrarPublicaciones').submit();
        });

        document.addEventListener('DOMContentLoaded', function () {
            var yearSelectPubli = document.getElementById('yearSelectPubli');
            var storedYear = sessionStorage.getItem('selectedYear');

            if (storedYear) {
                yearSelectPubli.value = storedYear;
            }

            yearSelectPubli.addEventListener('change', function () {
                sessionStorage.setItem('selectedYear', yearSelectPubli.value);
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