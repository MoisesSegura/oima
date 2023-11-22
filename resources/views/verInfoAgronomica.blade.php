@include('widgets.header')
@include('widgets.navbar')
    <div class="content">
        <div class="container">
            <div class="d-flex justify-content-between">
                <div class="backbot">
                    <a href="/es/producto/banano/costa-rica" class="backbot--link"><i class="mdi mdi-chevron-left"></i>
                        Volver</a>
                </div>
                <div class="sharebot ">
                    <p class="sharebot--link"><i class="mdi mdi-share-variant"></i> Compartir</p>
                    <ul class="share--links">
                        <li><a class="share--link" target="_blank"
                                href="https://www.facebook.com/sharer/sharer.php?u=https://www.mioa.org/es/infoAgronomica/banano/costa-rica"><img
                                    src="/img/fb-icon.svg"></a></li>
                        <li><a class="share--link" target="_blank"
                                href="https://wa.me/?text=https://www.mioa.org/es/infoAgronomica/banano/costa-rica"><img
                                    src="/img/wa-icon.svg"></a></li>
                        <li><a class="share--link" target="_blank"
                                href="https://twitter.com/home?status=https://www.mioa.org/es/infoAgronomica/banano/costa-rica "><img
                                    src="/img/tw-icon.svg"></a></li>
                        <li><a class="share--link" target="_blank"
                                href="https://www.linkedin.com/shareArticle?mini=true&url=https://www.mioa.org/es/infoAgronomica/banano/costa-rica&title=&summary=&source="><img
                                    src="/img/li-icon.svg"></a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 d-none d-md-block text-center">
                    <p class="card--text">Conocido como</p>
                    <h3 class="card--title">{{$productDetail->known_name}}</h3>
                    <img src="/uploads/products/images/551b766e0fde817b10a7451cfb4d03af7d76e67e.jpeg" alt="Banano"
                        class="img-responsive">
                </div>
                <div class="col-md-8">
                    <div class="section__header">
                        <h5 class="title text-center text-md-left">
                            Información Agronómica
                        </h5>
                        <div class="selectors__container">
                            <div class="selectors">
                                <div class="select--wrapper">
                                    <select class="select" name="region" id="region-validate">
                                        <option selected value="1">Región Central</option>
                                        <option value="2">Región Norte</option>
                                    </select>
                                </div>
                                <div class="select--wrapper">
                                    <select class="select selected-country" name="country" id="country">
                                        <option value="">País</option>
                                        <option selected value="costa-rica">Costa Rica</option>
                                        <option value="el-salvador">El Salvador</option>
                                        <option value="guatemala">Guatemala</option>
                                        <option value="honduras">Honduras</option>
                                        <option value="nicaragua">Nicaragua</option>
                                        <option value="panamaa">Panamá</option>
                                        <option value="repaablica-dominicana">República Dominicana</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container content__container collapse__container">
    <div class="collapse__info" id="accordionExample">

        @foreach ($agronomicInformations as $agronomicInformation)
            <div class="card">
                <div class="card-header" id="heading{{ $agronomicInformation->id }}">
                    <h5 class="mb-0">
                        <a href="javascript:void()" class="collapse__button collapsed"
                            data-toggle="collapse" data-target="#collapse{{ $agronomicInformation->id }}"
                            aria-expanded="false" aria-controls="collapse{{ $agronomicInformation->id }}">
                            {{ __($agronomicInformation->title) }}
                        </a>
                    </h5>
                </div>

                <div id="collapse{{ $agronomicInformation->id }}" class="collapse"
                    aria-labelledby="heading{{ $agronomicInformation->id }}"
                    data-parent="#accordionExample">
                    <div class="card-body txt--gray">
                        <p style="text-align:justify">{!! $agronomicInformation->text !!}</p>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>
                </div>
            </div>
        </div>

        <div class="text-center mb-5">
            <a href="/es/producto/banano/costa-rica" class="btn btn--green">Volver</a>
        </div>
    </div>

    @include('widgets.footer')


    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function() {
        $('.collapse__button').click(function() {
            // Obtén el ID del elemento actual
            var targetId = $(this).data('target');

            // Cierra todas las secciones excepto la que se hace clic
            $('.collapse__info .collapse').not(targetId).collapse('hide');
        });
    });
</script>



    <script type="text/javascript" src="/js/main.js"></script>
    <script>
        function fillCountries() {
            var data = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : false;
            var slug = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;
            var lang = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : "es";
            $("#country").empty();
            if (lang === "es") {
                var html = '<option value="">País</option>';
            } else {
                var html = '<option value="">Country</option>';
            }
            if (data !== false) {
                for (var i = 0; i < data.countries.length; i++) {
                    if (slug === false) {
                        html += "<option value='" + data.countries[i].id + "'>" + data.countries[i].trans_name + "</option>";
                    } else {
                        html += "<option value='" + data.countries[i].slug + "'>" + data.countries[i].trans_name + "</option>";
                    }
                }
            }
            $("#country").append(html);
        }

        $("#region-validate").on("change", function () {
            var val = $(this).val();
            if (val !== "") {
                $.ajax({
                    url: "/es/ajax/getCountriesDetailed/" + val + "/banano",
                }).done(function (data) {
                    fillCountries(data, true, "es");
                });

            } else {
                fillCountries();
            }
        })

        $(".selected-country").on("change", function () {
            var val = $(this).val();
            if (val !== "") {
                var url = "/es/infoAgronomica/banano/temp";
                url = url.replace("temp", val);
                window.location.href = url;
            }
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