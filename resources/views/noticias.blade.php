@include('widgets.header')
@include('widgets.navbar')
<div class="content">

    <div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item"><a class="nav-link " href="{{ route('eventos')}}">@lang('locale.eventos')</a></li>
            <li class="nav-item"><a class="nav-link active" href="{{ route('noticias')}}">@lang('locale.oimablog')</a></li>
            <li class="nav-item"><a class="nav-link " href="{{ route('sima-media')}}">@lang('locale.simamedia')</a>
        </ul>
    </div>

    <div class="search--container">
        <form method="get" id="newsFilterForm">
            <div class="selectors__container">
                <div class="selectors">
                    <div class="select--wrapper">
                        <select class="select" name="year" id="filterFormNew">
                            <option value="">@lang('locale.todosblog')</option>

                            @for ($year = date('Y'); $year >= 2019; $year--)
                            <option value="{{ $year }}">{{ $year }}</option>
                            @endfor
                        </select>
                    </div>

                </div>
            </div>
        </form>
        

            <form method="get" action="{{ route('filter.news.by.name') }}" id="newsSearch">
            <div class="input__wrap input__wrap--search">
                <input type="search" class="input input--search" placeholder="Buscar" name="name" id="newName">
            </div>
            </form>

            <div class="">
            <a class="btn btn--green" href="#" data-bs-toggle="modal" data-bs-target="#suscripcionModal">Suscribirse</a>
            </div>

       
    </div>


    <div class="modal fade" id="suscripcionModal" tabindex="-1" aria-labelledby="suscripcionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="suscripcionModalLabel">@lang('locale.sus')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
        
                <form>
         
                    <div class="mb-3">
    <label for="nombre" class="form-label">@lang('locale.nombre')</label>
    <input type="text" class="form-control" id="nombre" name="nombre">
</div>

<div class="mb-3">
    <label for="pais" class="form-label">@lang('locale.pais')</label>
    <input type="text" class="form-control" id="pais" name="pais">
</div>

<div class="mb-3">
    <label for="cargo" class="form-label">@lang('locale.cargo')</label>
    <input type="text" class="form-control" id="cargo" name="cargo">
</div>

<div class="mb-3">
    <label for="correo" class="form-label">@lang('locale.correo')</label>
    <input type="text" class="form-control" id="correo" name="correo">
</div>

                  

                    <button type="submit" class="btn btn-primary">@lang('locale.env')</button>
                </form>
            </div>
        </div>
    </div>
</div>



    <div class="my-2">
        <div class="blog__list" id="newsList">

        @include('partials.iterarNoticias')

        </div>
        <!-- <div class="text-center mb-5">
            <button class="btn btn--green" id="more-results">Cargar más</button>
        </div> -->
    </div>



</div>


@include('widgets.footer')


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>


$(document).ready(function () {
    $('#newsFilterForm select[name="year"]').change(function () {
        var selectedYear = $(this).val();

        if (selectedYear !== "") {
            $.ajax({
                url: '/filter-news',
                type: 'GET',
                data: $('#newsFilterForm').serialize(),
                success: function (data) {
                  
                    $('#newsList').empty();

                    $.each(data, function (index, event) {
                       
                        var eventHtml =  '<div class="card--event card--blog mb-4">' +
                        '<div class="card--event__img">' +
                        '<img src="' + '{{ asset('/uploads/') }}/' + event.image + '" alt="' + event.title + '">' +
                        '</div>' +
                        '<div class="card--blog__text">' +
                        '<h4 class="card--title w-100 text-left">' + event.title + '</h4>' +
                        '<p class="card--subtitle w-100 text-left">' + event.start_formatted + '</p>' +
                        '<a class="btn btn--green" href="' + '{{ url('noticias') }}/' + event.id + '">' +
                        '@lang('locale.verEvento') </a>' +
                        '</div>' +
                        '</div>';

                        $('#newsList').append(eventHtml);
                    });
                }
            });
        } else {
            window.location.href = '{{ url('noticias') }}';
        }
    });
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

<!-- Mirrored from www.mioa.org/es/blog/noticias by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Oct 2023 23:24:30 GMT -->

</html>