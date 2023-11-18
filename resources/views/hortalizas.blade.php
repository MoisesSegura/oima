@include('widgets.header')
@include('widgets.navbar')
    <div class="content">
        <h1 class="section--title title--underline txt--blue text-center d-md-none">Catálogo</h1>
        <div class="hero hero-has-text">
            <div class="hero--txt">
                <h2 class="section--title txt--blue d-none d-md-block text-uppercase">Catálogo</h2>
                <h4 class="txt--blue d-none d-md-block pl-3">Conozca el producto que busca</h4>
                <div class="txt--gray pl-3">

                </div>
            </div>
        </div>
        <h2 class="section--title text-center title--underline txt--blue d-none d-md-block">Buscar producto</h2>
        <form id="f_1" name="f_1">
            <div class="search--container">
                <div class="selectors__container">
                    <h3 class="txt--blue title--underline">Buscar producto</h3>
                    <div class="selectors">
                        <div class="select--wrapper">
                        <select class="select" name="region" id="region" data-lang="es">
                                    <option value="">Región</option>
                                    @foreach ($regions as $region)
                                    <option value="{{ $region->id }}">{{ __($region->name) }}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="select--wrapper">
                            <select class="select" name="country" id="country">
                                <option value="">País</option>
                            </select>
                        </div>
                    </div>
                    <button class="btn btn--green" type="submit">Filtrar</button>

                </div>
                <div class="input__wrap input__wrap--search">
                    <input class="input input--search" placeholder="Nombre de producto común o científico" name="name"
                        value="">
                </div>
            </div>
        </form>
        <div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item"><a href="{{ route('frutas')}}" class="nav-link " id="cat3-tab" aria-controls="cat3"
                        aria-selected="false">Frutas</a></li>

                <li class="nav-item"><a href="{{ route('hortalizas')}}" class="nav-link active" id="cat4-tab"
                        aria-controls="cat4" aria-selected="true">Hortalizas</a></li>

                <li class="nav-item"><a href="{{ route('granos')}}" class="nav-link " id="cat5-tab" aria-controls="cat5"
                        aria-selected="false">Granos</a></li>

                <li class="nav-item"><a href="{{ route('legumbres')}}" class="nav-link " id="cat6-tab" aria-controls="cat6"
                        aria-selected="false">Legumbres</a></li>

            </ul>
        </div>
   
        <div class="tab-content bg-white">
    <div class="tab-pane fade show active">
        <div class="card__container js-equal-height-parent" id="products">
        @foreach ($vegetables as $vegetableDetail)
                <a href="" class="card card--flex card--link js-equal-height">
                    <img src="{{ asset($vegetableDetail->product->image) }}" alt="{{ $vegetableDetail->product->name }}"
                        class="card--flex__img">
                    <div class="card--flex__content">
                        <h4 class="card--title">{{ __($vegetableDetail->product->name) }}</h4>
                        <p class="card--text">{{ $vegetableDetail->concatenated_known_names }}</p>
                        <p class="card--text">{{ $vegetableDetail->product->family_name }}</p>
                        <p class="txt--blue">Ver</p>
                    </div>
                </a>
                @endforeach
        </div>
    </div>
    <div class="text-center mb-5">
        <button class="btn btn--green" id="more-results">Cargar más</button>
    </div>
</div>

    </div>

    <footer>
        <div>
            <a class="logo">OIMA/MIOA</a>
            <img class="d-none d-md-block" src="../../img/map-white.png" width="100" />
        </div>
        <div class="d-none d-md-block">
            <p><strong>Explora</strong></p>
            <ul class="footer__list footer__links ">
                <li><a href="{{ route('home')}}">Inicio</a></li>
                <li><a href="../repositorio.html">Repositorio</a></li>
                <li><a href="../blog/eventos.html">Blog</a></li>
                <li><a href="../oima.html">OIMA</a></li>
                <li><a href="Frutas.html">Catálogo</a></li>
                <li><a href="../contacto.html">Contacto</a></li>
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
    <script type="text/javascript" src="../../js/main.js"></script>
    <script>
        var is_ajax = false;
        var page = 2;
        var query = "";
        query = query.replace(/&amp;/g, '&');

        var cantPages = 3;

        $("#more-results").on('click', function () {
            if (is_ajax === false) {
                is_ajax = true;
                $.ajax({
                    url: "/es/ajax/getProducts/4/" + page + "?" + query,
                    method: "GET"
                }).done(function (data) {
                    is_ajax = false;
                    page++;
                    $("#products").append(data);

                    if (cantPages < page) {
                        $("#more-results").css("display", "none");
                    }
                });
            }
        });


    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-151598454-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'UA-151598454-1');
    </script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
$(document).ready(function () {
// Cuando cambia la selección de la región
$('#region').change(function () {
    var regionId = $(this).val();

    // Si no se selecciona ninguna región, no hacemos nada
    if (!regionId) {
        $('#country').empty(); // Limpiamos la lista de países
        return;
    }

    // Realizamos una solicitud AJAX para obtener los países de la región
    $.ajax({
        url: '/get-countries/' + regionId, // Reemplaza con la ruta correcta en tu aplicación
        type: 'GET',
        success: function (data) {
            // Limpiamos la lista de países y agregamos los nuevos
            $('#country').empty();
            $.each(data, function (key, value) {
                $('#country').append('<option value="' + key + '">' + value + '</option>');
            });
        },
        error: function () {
            console.log('Error al cargar países');
        }
    });
});
});
</script>
</body>

<!-- Mirrored from www.mioa.org/es/catalogo/Hortalizas by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Oct 2023 23:36:40 GMT -->

</html>