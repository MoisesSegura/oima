@include('widgets.header')
@include('widgets.navbar')
<div class="content">

    <div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item"><a class="nav-link " href="{{ route('eventos')}}">@lang('locale.eventos')</a></li>
            <li class="nav-item"><a class="nav-link " href="{{ route('noticias')}}">@lang('locale.oimablog')</a></li>
            <li class="nav-item"><a class="nav-link active" href="{{ route('sima-media')}}">@lang('locale.simamedia')</a>
        </ul>
    </div>

   
    <div class="search--container">
        <form method="get" id="mediaFilterForm">
            <div class="selectors__container">
                <div class="selectors">
                    <div class="select--wrapper">
                        <select class="select" name="year">
                            <option value="">@lang('locale.todosblog')</option>

                            @for ($year = date('Y'); $year >= 2019; $year--)
                            <option value="{{ $year }}">{{ $year }}</option>
                            @endfor
                        </select>
                    </div>

                </div>
            </div>
           
        </form>

        <form method="get" action="{{ route('filter.courses.by.name') }}" id="coursesSearch">
            <div class="input__wrap input__wrap--search">
                <input type="search" class="input input--search" placeholder="Buscar" name="name" value="">
            </div>
        </form>
    </div>


    <div class="my-2">
        <div class="blog__list" id="mediaList">
          
        @include('partials.iterarCursos')

        </div>
        <div class="text-center mb-5">
        </div>
    </div>


</div>


@include('widgets.footer')


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>


$(document).ready(function () {
    $('#mediaFilterForm select[name="year"]').change(function () {
        var selectedYear = $(this).val();

        if (selectedYear !== "") {
            $.ajax({
                url: '/filter-media',
                type: 'GET',
                data: $('#mediaFilterForm').serialize(),
                success: function (data) {
                  
                    $('#mediaList').empty();

                    $.each(data, function (index, event) {
                       
                        var eventHtml =  '<div class="card--blog-alt card---blog mb-4">' +
                        '<div class="card--blog-alt__img">' +
                        '<img src="' + '{{ asset('/uploads/') }}/' + event.image + '" alt="' + event.title + '">' +
                        '</div>' +
                        '<div class="card--blog-alt__text card--blog__text">' +
                        '<h4 class="card--title w-100 text-left">' + event.title + '</h4>' +
                        '<a class="txt--blue" href="' + '{{ url('sima-media') }}/' + event.id + '">' +
                        '@lang('locale.verNoticiaComp') </a>' +
                        '</div>' +
                        '</div>';

                        $('#mediaList').append(eventHtml);
                    });
                }
            });
        } else {
            window.location.href = '{{ url('sima-media') }}';
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

<!-- Mirrored from www.mioa.org/es/blog/sima-media by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Oct 2023 23:24:30 GMT -->

</html>