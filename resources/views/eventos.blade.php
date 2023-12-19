@include('widgets.header')
@include('widgets.navbar')
<div class="content">

    <div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item"><a class="nav-link active" href="{{ route('eventos')}}">@lang('locale.eventos')</a>
            </li>
            <li class="nav-item"><a class="nav-link " href="{{ route('noticias')}}">@lang('locale.oimablog')</a></li>
            <li class="nav-item"><a class="nav-link " href="{{ route('sima-media')}}">@lang('locale.simamedia')</a>
            </li>
        </ul>
    </div>

    
        <div class="search--container">
            <form method="get" id="eventsFilterForm">
            <div class="selectors__container">
                <div class="selectors">
                    <div class="select--wrapper">
                        <select class="select" name="year" id="filterForm">
                            <option value="">@lang('locale.todosblog')</option>

                            @for ($year = date('Y'); $year >= 2019; $year--)
                            <option value="{{ $year }}">{{ $year }}</option>
                            @endfor
                        </select>
                    </div>

                </div>
            </div>
            </form>

            <form method="get" action="{{ route('filter.events.by.name') }}" id="eventSearch">
            <div class="input__wrap input__wrap--search">
                <input type="search" class="input input--search" placeholder="Buscar" name="name" id="eventName">
            </div>
            </form>

        </div>
   

    

    <div class="my-2">

        <div class="blog__list" id="eventsList">

        @include('partials.iterarEventos')

        </div>
        <!-- <div class="text-center mb-5">
            <button class="btn btn--green" id="more-results">@lang('locale.botonCargar')</button>
        </div> -->
    </div>


</div>


@include('widgets.footer')


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {
        // Script para el primer formulario (filtro por año)
        $('#eventsFilterForm select[name="year"]').on('input', function () {
            var selectedYear = $('#eventsFilterForm select[name="year"]').val();

            // Realiza la solicitud Ajax solo cuando cambia el año o el nombre y hay un año seleccionado
            if (selectedYear !== "") {
                $.ajax({
                    url: '/filter-events',
                    type: 'GET',
                    data: $('#eventsFilterForm').serialize(),
                    success: function (data) {
                        $('#eventsList').empty();

                        $.each(data, function (index, event) {
                            var eventHtml = '<div class="card--event card--blog mb-4">' +
                                '<div class="card--event__img">' +
                                '<img src="' + '{{ asset('/uploads/') }}/' + event.image + '" alt="' + event.name + '">' +
                                '</div>' +
                                '<div class="card--blog__text">' +
                                '<h4 class="card--title w-100 text-left">' + event.name + '</h4>' +
                                '<p class="card--subtitle w-100 text-left">' + event.start_formatted + '</p>' +
                                '<a class="btn btn--green" href="' + '{{ url('eventos') }}/' + event.id + '">' +
                                '@lang('locale.verEvento') </a>' +
                                '</div>' +
                                '</div>';

                            $('#eventsList').append(eventHtml);
                        });
                    }
                });
            } else {
                window.location.href = '{{ url('eventos') }}';
            }
        });
                
             
//         $('#eventSearch input[name="name"]').on('keypress', function (e) {
//     console.log('Tecla presionada:', e.which);  // Añade esta línea
//     if (e.which === 13) {
//         // Resto del código

//         var eventName = $(this).val();

//         if (eventName !== "") {
//             console.log('Evento de filtro por nombre ejecutado');
//             $.ajax({
//                 url: '{{ route('filter.events.by.name') }}',
//                 type: 'GET',
//                 data: { name: eventName }, // Solo envía el nombre del evento
//                 success: function (data) {
//                     console.log('Éxito en la solicitud Ajax', data); // Agrega esta línea
//                     $('#eventsList').empty();

//                     $.each(data, function (index, event) {
//                         var eventHtml = '<div class="card--event card--blog mb-4">' +
//                             '<div class="card--event__img">' +
//                             '<img src="' + '{{ asset('/uploads/') }}/' + event.image + '" alt="' + event.name + '">' +
//                             '</div>' +
//                             '<div class="card--blog__text">' +
//                             '<h4 class="card--title w-100 text-left">' + event.name + '</h4>' +
//                             '<p class="card--subtitle w-100 text-left">' + event.start_formatted + '</p>' +
//                             '<a class="btn btn--green" href="' + '{{ url('eventos') }}/' + event.id + '">' +
//                             '@lang('locale.verEvento') </a>' +
//                             '</div>' +
//                             '</div>';

//                         $('#eventsList').append(eventHtml);
//                     });
//                 },
//                 error: function (xhr, status, error) {
//                     console.error('Error en la solicitud Ajax', error); // Agrega esta línea
//                 },
//                 complete: function (data) {
//                     console.log('Éxito en la solicitud Ajax', data); // Agrega esta línea
//                 }
//             });
//         }
//     }
// });


    
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
</body>


</html>