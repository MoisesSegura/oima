@include('widgets.header')
@include('widgets.navbar')
<div class="content">
    <h1 class="section--title title--underline txt--blue text-center d-md-none">@lang('locale.catalogoProductos')</h1>
    <div class="hero hero-has-text">
        <div class="hero--txt">
            <h2 class="section--title txt--blue d-none d-md-block text-uppercase">@lang('locale.catalogoProductos')</h2>
            <h4 class="txt--blue d-none d-md-block pl-3"> {{ $extras->catalog_description}} </h4>
            <div class="txt--gray pl-3">

            </div>
        </div>
    </div>
    <h2 class="section--title text-center title--underline txt--blue d-none d-md-block">@lang('locale.buscarProd')</h2>

    <div class="search--container">


        <form id="f_1" name="f_1" action="{{ route('filtrar-productos') }}" method="GET"  style="display: flex;">

            <div class="selectors__container">
                <h3 class="txt--blue title--underline">@lang('locale.buscarProd')</h3>
                <div class="selectors">
                    <div class="select--wrapper">

                        <select class="select" name="region" id="region" data-lang="es">
                            <option value="">@lang('locale.region')</option>
                            @foreach ($regions as $region)
                            <option value="{{ $region->id }}">
                                {{ __($region->name) }}
                            </option>
                            @endforeach
                        </select>

                    </div>
                    <div class="select--wrapper">
                        <select class="select" name="country" id="country">
                            <option value="">@lang('locale.pais')</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn--green" type="submit">@lang('locale.filtro')</button>

            </div>
            
        
            <div class="input__wrap input__wrap--search" style="height: 50%;  margin-top:1.5rem;  margin-left:10rem;" >
                <input class="input input--search" placeholder="@lang('locale.buscarprod')" name="name" value="" id="searchInput" >
            </div>
         

        </form>
      
    
      
    </div>

    <div>
        <ul class="nav nav-tabs" id="carousel-tabs" role="tablist">
            <li class="nav-item"><a  class="nav-link active" href="#category-frutas" id="category-frutas-tab"  data-toggle="tab" role="tab" aria-controls="#category-frutas"
                    aria-selected="true">@lang('locale.frutas')</a></li>

            <li class="nav-item"><a  class="nav-link" href="#category-hortalizas" id="category-hortalizas-tab"  data-toggle="tab" role="tab" aria-controls="#category-hortalizas" 
                    aria-selected="true">@lang('locale.hortalizas')</a></li>

            <li class="nav-item"><a class="nav-link" href="#category-granos" id="granos-tab"  data-toggle="tab" role="tab" aria-controls="#category-granos"
                    aria-selected="true">@lang('locale.granos')</a></li>

            <li class="nav-item"><a class="nav-link" href="#category-legumbres" id="legumbres-tab"  data-toggle="tab" role="tab" aria-controls="#category-legumbres"
                    aria-selected="true">@lang('locale.legumbres')</a></li>

        </ul>
    </div>

    <div class="tab-content bg-white">

        <div class="tab-pane fade show active" id="category-frutas" role="tabpanel" aria-labelledby="category-frutas-tab">
            <div class="card__container js-equal-height-parent" id="fruitCard">

                @foreach ($fruits as $fruit)
                <a href="#" class="card card--flex card--link js-equal-height" data-bs-toggle="modal"
                    data-bs-target="#mensajeModal">
                    <img src="{{ asset(trim('/uploads/' . $fruit->product->image, '/')) }}"
                        alt="{{ $fruit->product->name }}" class="card--flex__img">
                    <div class="card--flex__content">
                        <h4 class="card--title">{{ __($fruit->product->name) }}</h4>
                        <p class="card--text">{{ $fruit->concatenated_known_names }}</p>
                        <p class="card--text">{{ $fruit->product->family_name }}</p>
                        <p class="txt--blue">@lang('locale.ver')</p>
                    </div>
                </a>
                @endforeach

            </div>
        </div>

        <div class="tab-pane fade" id="category-hortalizas" role="tabpanel" aria-labelledby="category-hortalizas-tab">
            <div class="card__container js-equal-height-parent"  id="vegetableCard" >

                @foreach ($vegetables as $vegetable)
                <a href="#" class="card card--flex card--link js-equal-height" data-bs-toggle="modal"
                    data-bs-target="#mensajeModal">
                    <img src="{{ asset(trim('/uploads/' . $vegetable->product->image, '/')) }}"
                        alt="{{ $vegetable->product->name }}" class="card--flex__img">
                    <div class="card--flex__content">
                        <h4 class="card--title">{{ __($vegetable->product->name) }}</h4>
                        <p class="card--text">{{ $vegetable->concatenated_known_names }}</p>
                        <p class="card--text">{{ $vegetable->product->family_name }}</p>
                        <p class="txt--blue">@lang('locale.ver')</p>
                    </div>
                </a>
                @endforeach

            </div>
        </div>

        <div class="tab-pane fade"  id="category-granos" role="tabpanel" aria-labelledby="granos-tab">
            <div class="card__container js-equal-height-parent"  id="grainCard" >

                @foreach ($grains as $grain)
                <a href="#" class="card card--flex card--link js-equal-height" data-bs-toggle="modal"
                    data-bs-target="#mensajeModal">
                    <img src="{{ asset(trim('/uploads/' . $grain->product->image, '/')) }}"
                        alt="{{ $grain->product->name }}" class="card--flex__img">
                    <div class="card--flex__content">
                        <h4 class="card--title">{{ __($grain->product->name) }}</h4>
                        <p class="card--text">{{ $grain->concatenated_known_names }}</p>
                        <p class="card--text">{{ $grain->product->family_name }}</p>
                        <p class="txt--blue">@lang('locale.ver')</p>
                    </div>
                </a>
                @endforeach

            </div>
        </div>

        <div class="tab-pane fade"  id="category-legumbres" role="tabpanel" aria-labelledby="legumbres-tab">
            <div class="card__container js-equal-height-parent"  id="pulseCard">

                @foreach ($legumes as $legume)
                <a href="#" class="card card--flex card--link js-equal-height" data-bs-toggle="modal"
                    data-bs-target="#mensajeModal">
                    <img src="{{ asset(trim('/uploads/' . $legume->product->image, '/')) }}"
                        alt="{{ $legume->product->name }}" class="card--flex__img">
                    <div class="card--flex__content">
                        <h4 class="card--title">{{ __($legume->product->name) }}</h4>
                        <p class="card--text">{{ $legume->concatenated_known_names }}</p>
                        <p class="card--text">{{ $legume->product->family_name }}</p>
                        <p class="txt--blue">@lang('locale.ver')</p>
                    </div>
                </a>
                @endforeach

            </div>
        </div>

    </div>

</div>
@include('widgets.catalogMessage')
@include('widgets.footer')


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

        $('#region').change(function () {
            var regionId = $(this).val();

            if (!regionId) {
                $('#country').empty();
                return;
            }

            $.ajax({
                url: '/get-countries/' + regionId,
                type: 'GET',
                success: function (data) {

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


        $('#f_1').submit(function (e) {
    e.preventDefault();

    $.ajax({
        url: '/filtrar-productos',
        type: 'GET',
        data: $('#f_1').serialize(),
        success: function (data) {
            // Vaciar el contenedor
            $('#fruitCard').empty();
            $('#vegetableCard').empty();
            $('#grainCard').empty();
            $('#pulseCard').empty();

            // Iterar y mostrar frutas
            $.each(data.fruits, function (index, fruit) {
                var cardHtml = '<a href="' + '{{ url('producto') }}/' + fruit.id + '" class="card card--flex card--link js-equal-height">' +
                    '<img src="' + '{{ asset('/uploads/') }}/' + fruit.product.image + '" alt="' + fruit.product.name + '" class="card--flex__img">' +
                    '<div class="card--flex__content">' +
                    '<h4 class="card--title">' + fruit.product.name + '</h4>' +
                    '<p class="card--text">' + fruit.known_name + '</p>' +
                    '<p class="card--text">' + fruit.product.family_name + '</p>' +
                    '<p class="txt--blue">@lang('locale.ver')</p>' +
                    '</div>' +
                    '</a>';

                $('#fruitCard').append(cardHtml);
            });

            $.each(data.vegetables, function (index, vegetable) {
                var cardHtml = '<a href="' + '{{ url('producto') }}/' + vegetable.id + '" class="card card--flex card--link js-equal-height">' +
                    '<img src="' + '{{ asset('/uploads/') }}/' + vegetable.product.image + '" alt="' + vegetable.product.name + '" class="card--flex__img">' +
                    '<div class="card--flex__content">' +
                    '<h4 class="card--title">' + vegetable.product.name + '</h4>' +
                    '<p class="card--text">' + vegetable.known_name + '</p>' +
                    '<p class="card--text">' + vegetable.product.family_name + '</p>' +
                    '<p class="txt--blue">@lang('locale.ver')</p>' +
                    '</div>' +
                    '</a>';

                $('#vegetableCard').append(cardHtml);
            });

            $.each(data.grains, function (index, grain) {
                var cardHtml = '<a href="' + '{{ url('producto') }}/' + grain.id + '" class="card card--flex card--link js-equal-height">' +
                    '<img src="' + '{{ asset('/uploads/') }}/' + grain.product.image + '" alt="' + grain.product.name + '" class="card--flex__img">' +
                    '<div class="card--flex__content">' +
                    '<h4 class="card--title">' + grain.product.name + '</h4>' +
                    '<p class="card--text">' + grain.known_name + '</p>' +
                    '<p class="card--text">' + grain.product.family_name + '</p>' +
                    '<p class="txt--blue">@lang('locale.ver')</p>' +
                    '</div>' +
                    '</a>';

                $('#grainCard').append(cardHtml);
            });

            $.each(data.legumes, function (index, legume) {
                var cardHtml = '<a href="' + '{{ url('producto') }}/' + legume.id + '" class="card card--flex card--link js-equal-height">' +
                    '<img src="' + '{{ asset('/uploads/') }}/' + legume.product.image + '" alt="' + legume.product.name + '" class="card--flex__img">' +
                    '<div class="card--flex__content">' +
                    '<h4 class="card--title">' + legume.product.name + '</h4>' +
                    '<p class="card--text">' + legume.known_name + '</p>' +
                    '<p class="card--text">' + legume.product.family_name + '</p>' +
                    '<p class="txt--blue">@lang('locale.ver')</p>' +
                    '</div>' +
                    '</a>';

                $('#grainCard').append(cardHtml);
            });


            // Puedes hacer lo mismo para las demás categorías (vegetales, granos, legumbres)
        },
        error: function () {
            console.log('Error al filtrar productos');
        }
    });
});



    });



</script>


<script>
    $(document).ready(function () {
        $('#searchInput').keypress(function (e) {
            if (e.which === 13) {
                // Tecla Enter presionada, enviar el formulario
                $('#f_1').submit();
            }
        });
    });
</script>

<script>
    $(document).ready(function () {
        $('.nav-link').on('click', function (e) {
            e.preventDefault();

            $('.nav-link').removeClass('active');
            $('.tab-pane').removeClass('show active');

            $(this).addClass('active');

            var targetPanelId = $(this).attr('href');

            $(targetPanelId).addClass('show active');
        });
    });
</script>


</body>

</html>