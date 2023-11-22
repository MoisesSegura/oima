@include('widgets.header')
@include('widgets.navbar')
    <div class="content">
        <div class="backbot">
            <a href="javascript:history.back()" class="backbot--link"><i class="mdi mdi-chevron-left"></i> Volver</a>
        </div>



        <div class="hero hero-has-text hero--event" style="background-image:url('{{ asset($event->image) }}')">
            <!-- <img src="{{ asset($event->image) }}" alt="{{ $event->name }}"> -->

            <div class="hero--txt">
                <h2 class="section--title txt--blue d-none d-md-block">{{ __($event->name) }}</h2>
                <div class="txt--gray">
                    <ul class="event__list-icons">
                        <li><img src="../../../img/location-icon.svg" alt="">
                            <p> {{ __($event->address) }} </p>
                        </li>
                        <li><img src="../../../img/calendar-icon.svg" alt="">
                            <p>{{\Carbon\Carbon::parse($event->start)->isoFormat('D [-] MMMM') }}, {{ __($event->year)
                                }}</p>
                        </li>
                        <li><img src="../../../img/meeting-icon.svg" alt="">
                            @foreach ($event->assistanceTypes as $assistanceType)
                            <p>{{ __($assistanceType->name) }}</p>
                            @endforeach
                        </li>
                    </ul>
                </div>
                <a class="btn btn--green" href="../../contacto.html">CONTACTAR</a>
            </div>
        </div>

        <section class="event--content">
            <div class="container">
                <div class="row">

                    <div class="col-md-6">
                        <h2 class="title title--sideline">Descripción</h2>
                        <div class="txt--gray">
                            @if($event->description)
                            {!! $event->description !!}
                            @else
                            <p>No hay descripción disponible.</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card--md-only">
                            <h2 class="title title--sideline">Idiomas disponibles</h2>
                            <div class="txt--gray">
                                <ul>
                                    @foreach ($event->languages as $language)
                                    <li>{{ __($language->name) }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </div>


    @include('widgets.footer')

    
    <script type="text/javascript" src="../../../js/main.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-151598454-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'UA-151598454-1');
    </script>
</body>

<!-- Mirrored from www.mioa.org/es/blog/eventos/15 by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Oct 2023 23:35:47 GMT -->

</html>