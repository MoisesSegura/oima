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
                            href="https://www.facebook.com/sharer/sharer.php?u=https://www.mioa.org/es/infoNutricional/banano/costa-rica"><img
                                src="/img/fb-icon.svg"></a></li>
                    <li><a class="share--link" target="_blank"
                            href="https://wa.me/?text=https://www.mioa.org/es/infoNutricional/banano/costa-rica"><img
                                src="/img/wa-icon.svg"></a></li>
                    <li><a class="share--link" target="_blank"
                            href="https://twitter.com/home?status=https://www.mioa.org/es/infoNutricional/banano/costa-rica "><img
                                src="/img/tw-icon.svg"></a></li>
                    <li><a class="share--link" target="_blank"
                            href="https://www.linkedin.com/shareArticle?mini=true&url=https://www.mioa.org/es/infoNutricional/banano/costa-rica&title=&summary=&source="><img
                                src="/img/li-icon.svg"></a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 d-none d-md-block text-center">
                <p class="card--text">Conocido como</p>
                <h3 class="card--title">{{ $productDetail->known_name }}</h3>
                <img src="{{ asset($productDetail->product->image) }}" alt="{{ $productDetail->product->name }}" class="img-responsive">
             
            </div>
            <div class="col-md-8">
                <div class="section__header">
                    <h5 class="title text-center text-md-left">
                        Información Nutricional
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

                <div class="content__container container">
                    <div class="row">
                        <div class="col-md-6">
                        @foreach ($nutritionalContents as $nutritionalContent)
                        <h5 class="title title--sideline">{{ __($nutritionalContent->title) }}</h5>
                            <div class="txt--black content--list">
                                <p style="text-align:justify">

                                {!! __($nutritionalContent->text) !!}

                                </p>

                            </div>
                        @endforeach

                        </div>

                        <!-- <div class="col-md-6">
                            
                            <h5 class="title title--sideline">Composición del banano en 100 g de porción comestible</h5>
                            <div class="x-scroll__container">
                                <table class="table--minimal">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Maduro</th>
                                            <th>Verde</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Calorías kcal</td>
                                            <td>
                                                89
                                            </td>
                                            <td>
                                                110
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Carbohidratos g</td>
                                            <td>
                                                22.84
                                            </td>
                                            <td>
                                                28.7
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Fibra dietética g</td>
                                            <td>
                                                2.6
                                            </td>
                                            <td>
                                                0.5
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Vitamin A mcg</td>
                                            <td>
                                                3
                                            </td>
                                            <td>
                                                130
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Vitamina C mg</td>
                                            <td>
                                                9
                                            </td>
                                            <td>
                                                31
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Potasio mg</td>
                                            <td>
                                                358
                                            </td>
                                            <td>
                                                -
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Folatos mcg</td>
                                            <td>
                                                20
                                            </td>
                                            <td>
                                                -
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Hierro mg</td>
                                            <td>
                                                0.26
                                            </td>
                                            <td>
                                                -
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> -->
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="text-center mb-5 d-md-none">
        <a href="/es/producto/banano/costa-rica" class="btn btn--green">Volver</a>
    </div>
</div>

<footer>
    <div>
        <a class="logo">OIMA/MIOA</a>
        <img class="d-none d-md-block" src="/img/map-white.png" width="100" />
    </div>
    <div class="d-none d-md-block">
        <p><strong>Explora</strong></p>
        <ul class="footer__list footer__links ">
            <li><a href="/es/">Inicio</a></li>
            <li><a href="/es/repositorio">Repositorio</a></li>
            <li><a href="/es/blog">Blog</a></li>
            <li><a href="/es/oima">OIMA</a></li>
            <li><a href="/es/catalogo">Catálogo</a></li>
            <li><a href="/es/contacto">Contacto</a></li>
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
            var url = "/es/infoNutricional/banano/temp";
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