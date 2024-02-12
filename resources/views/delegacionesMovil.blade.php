@include('widgets.header')
@include('widgets.navbar')

<div class="content">
    <div>
        <div class="backbot">
            <a href="{{ route('quienes')}}" class="backbot--link"><i class="mdi mdi-chevron-left"></i> @lang('locale.volver')</a>
        </div>
    </div>
    <section>
        <div class="countries">
            <div class="country--filters">
                <h5><span class="number">{{ $countries->count() }}</span><span
                        class="title__text">@lang('locale.paisesMiembros')<small
                            style="color: black;">@lang('locale.enAmerica')</small></span>
                </h5>
                <div class="country--filters__nav-container">
                    <ul class="country--filters__nav">
                        <li><a class="active" href="#" data-filter="none">@lang('locale.todos')</a></li>
                        @foreach($regions as $region)
                        <li><a href="#" data-filter="region-{{$region->id}}">{{ $region->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
               
            </div>
            <div class="countries--container">
                <ul>
                    @foreach($countries as $country)
                    @if($country->organizations->isNotEmpty())
                    @foreach($country->organizations as $organization)
                    <li class="region-{{ $country->region->id }}">
                        <a class="country--link text-center"
                            href="{{ route('verOrganizacion', ['id' => $organization->id]) }}">
                            <span class="flag flag--{{ strtolower($country->flag->iso) }}"></span>
                            <span>{{ $country->flag->name }}</span>
                        </a>
                    </li>
                    @endforeach
                    @else
                    <li class="region-{{ $country->region->id }}">
                        <span class="flag flag--{{ strtolower($country->flag->iso) }}"></span>
                        <span>{{ $country->flag->name }}</span>

                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </section>


</div>

@include('widgets.footer')


<script>
    $(document).ready(function () {
        // Función para manejar el clic en los enlaces de filtro
        $('.country--filters__nav a').on('click', function (e) {
            e.preventDefault();

            // Obtener el valor del filtro desde el atributo data-filter
            var filterValue = $(this).data('filter');

            // Agregar/Quitar la clase 'active' en los enlaces de filtro
            $('.country--filters__nav a').removeClass('active');
            $(this).addClass('active');

            // Mostrar/Ocultar elementos según el filtro seleccionado
            if (filterValue === 'none') {
                $('.countries--container li').show();
            } else {
                $('.countries--container li').hide();
                $('.countries--container li.' + filterValue).show();
            }
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


</body>

</html>