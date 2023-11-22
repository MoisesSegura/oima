@include('widgets.header')
@include('widgets.navbar')

    <div class="content">
        <div class="backbot">
            <a href="javascript:history.back()" class="backbot--link"><i class="mdi mdi-chevron-left"></i> Volver</a>
        </div>
        <div class="header--publication">
            <div class="card--repository card--publication">
                <img src="{{ asset($publication->image) }}" class="card__img">
                <div class="card--content">
                    <h3 class="title">

                    {{ __($publication->title) }}

                    </h3>
                    <hr class="hr--green">
                    <div class="txt--gray">
                        <p></p>
                        <p></p>
                        <p> {{ $publication->isbn }} </p>
                        <p> {{ $publication->topographic_signature }} </p>
                    </div>
                    <a class="btn btn--green"
                        href="/uploads/publications/files/e27501d4b9f6eb77cb292a1b717931a0b8718e5d.pdf" download="3.pdf"
                        target="_blank">Descargar</a>
                </div>
            </div>
        </div>


        <div class="container mb-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="card--publication">
                        <h3 class="title title--sideline">Detalles de la publicación</h3>
                        <ul>
                            <li><strong>Signatura topográfica:</strong> {{ $publication->topographic_signature }} </li>
                            <li><strong>Fecha de vencimiento:</strong>
                            @if ($publication->expiration_date)
                                {{ $publication->expiration_date }}
                            @else
                                No disponible
                            @endif
                        </li>

                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <h3 class="title title--sideline">Resumen</h3>
                    <div class="txt--gray">
                        <p>

                        {!! __($publication->description) !!}

                        </p>
                    </div>
                </div>

            </div>
        </div>

    </div>

    @include('widgets.footer')

    
    <script type="text/javascript" src="/js/main.js"></script>
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