@include('widgets.header')
@include('widgets.navbar')
    <div class="content">
        <h1 class="section--title title--underline txt--blue text-center d-md-none">@lang('locale.catalogoProductos')</h1>
        <div class="hero hero-has-text">
            <div class="hero--txt">
                <h2 class="section--title txt--blue d-none d-md-block text-uppercase">@lang('locale.catalogoProductos')</h2>
                <h4 class="txt--blue d-none d-md-block pl-3">@lang('locale.conozca')</h4>
                <div class="txt--gray pl-3">

                </div>
            </div>
        </div>
        <h2 class="section--title text-center title--underline txt--blue d-none d-md-block">@lang('locale.buscarProd')</h2>
        <div class="search--container">    
            <form id="f_1" name="f_1" action="{{ route('filterGrains') }}" method="GET">
            
                <div class="selectors__container">
                    <h3 class="txt--blue title--underline">@lang('locale.buscarProd')</h3>
                    <div class="selectors">
                        <div class="select--wrapper">
                            <select class="select" name="region" id="region" data-lang="es">
                                <option value="">@lang('locale.region')</option>
                                @foreach ($regions as $region)
                                <option value="{{ $region->id }}">{{ __($region->name) }}</option>
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
                          
            </form>

            <form method="get" action="{{ route('buscarGranos') }}" id="grainSearch">
                <div class="input__wrap input__wrap--search">
                    <input class="input input--search" placeholder="@lang('locale.buscarprod')" name="name"
                        value="">
                </div>
                </form>

        </div>

        <div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item"><a href="{{ route('frutas')}}" class="nav-link " id="cat3-tab" aria-controls="cat3"
                        aria-selected="false">@lang('locale.frutas')</a></li>

                <li class="nav-item"><a href="{{ route('hortalizas')}}" class="nav-link " id="cat4-tab"
                        aria-controls="cat4" aria-selected="false">@lang('locale.hortalizas')</a></li>

                <li class="nav-item"><a href="{{ route('granos')}}" class="nav-link active" id="cat5-tab"
                        aria-controls="cat5" aria-selected="true">@lang('locale.granos')</a></li>

                <li class="nav-item"><a href="{{ route('legumbres')}}" class="nav-link " id="cat6-tab"
                        aria-controls="cat6" aria-selected="false">@lang('locale.legumbres')</a></li>

            </ul>
        </div>
        <div class="tab-content bg-white">
            <div class="tab-pane fade show active">
                <div class="card__container js-equal-height-parent" id="products">
                    @foreach ($grains as $grainDetail)
                    <a href="#" class="card card--flex card--link js-equal-height"  data-bs-toggle="modal" data-bs-target="#mensajeModal">
                        <img src="{{ asset(trim('/uploads/' . $grainDetail->product->image, '/')) }}"
                            alt="{{ $grainDetail->product->name }}" class="card--flex__img">
                        <div class="card--flex__content">
                            <h4 class="card--title">{{ __($grainDetail->product->name) }}</h4>
                            <p class="card--text">{{ $grainDetail->concatenated_known_names }}</p>
                            <p class="card--text">{{ $grainDetail->product->family_name }}</p>
                            <p class="txt--blue">@lang('locale.ver')</p>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            <!-- <div class="text-center mb-5">
                <button class="btn btn--green" id="more-results">Cargar más</button>
            </div> -->
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
                // Limpia la lista de países y agregamos los nuevos
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
            url: '/filter-grains',
            type: 'GET',
            data: $('#f_1').serialize(), // Serializamos los datos del formulario
            success: function (data) {

                // Limpia la lista de productos
                $('#products').empty();

                // Iteramos sobre los datos recibidos y mostramos los productos
                $.each(data, function (index, fruit) {
    var cardHtml = '<a href="' + '{{ url('producto') }}/' + fruit.id + '" class="card card--flex card--link js-equal-height">' +
        '<img src="' + '{{ asset('/uploads/') }}/' + fruit.product.image + '" alt="' + fruit.product.name + '" class="card--flex__img">' +
        '<div class="card--flex__content">' +
        '<h4 class="card--title">' + fruit.product.name + '</h4>' +
        '<p class="card--text">' + fruit.known_name + '</p>' +
        '<p class="card--text">' + fruit.product.family_name + '</p>' +
        '<p class="txt--blue">@lang('locale.ver')</p>' +
        '</div>' +
        '</a>';
    
    $('#products').append(cardHtml);
});


            },
            error: function () {
                console.log('Error al filtrar granos');
            }
        });
    });
});
        
    </script>

</body>



</html>