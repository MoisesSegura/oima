@include('widgets.header')
@include('widgets.navbar')
<script src="../../www.google.com/recaptcha/apicbae.js?render=6Ldwp8AZAAAAAIO4Botn2YIT7t-dIeOTz54B8Vul"></script>
<script>
    grecaptcha.ready(function () {
        grecaptcha.execute('6Ldwp8AZAAAAAIO4Botn2YIT7t-dIeOTz54B8Vul', { action: 'contact' }).then(function (token) {
            var recaptchaResponse = document.getElementById('recaptchaResponse');
            recaptchaResponse.value = token;
        });
    });
</script>

<div class="content">
    <h1 class="section--title title--underline  txt--blue text-center d-md-none">Contacto</h1>
    <div class="hero hero-has-text hero-contact">
        <div class="hero--txt">
            <h1 class="section--title d-none d-md-block">Contacto</h1>
            <ul class="card__list list--circle bullets--gray">
                <li>Presidencia de OIMA <br><strong>{{ $contact->contact_president }}</strong></li>
                <li>Secretaría Técnica de OIMA <br><strong>{{ $contact->contact_secretary }}</strong></li>
                <li>Teléfono <br><strong>{{ $contact->contact_phone }}</strong></li>
                <li>Correo <br><strong>{{ $contact->contact_email }}</strong></li>
            </ul>
        </div>
    </div>


    <section class="contact__form ">
        <div class="card--form">
            <h3 class="title text-center">Enviar un mensaje</h3>
            <form action="https://www.mioa.org/es/contacto" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <div class="input__wrap input--green">
                        <input class="input" id="name" type="text" name="name" maxlength="255" required
                            placeholder="Nombre completo">
                    </div>
                </div>
                <div class="form-group">
                    <label for="country">País</label>
                    <div class="select--wrapper">
                        <select class="select" id="country" name="country" required>
                            <option value="">Seleccionar un país</option>

                            @foreach($countries as $country)
                            <option value="{{ $country->name }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="form-group">
                    <label for="email">Correo electrónico</label>
                    <div class="input__wrap input--green">
                        <input class="input" id="email" type="email" name="email" maxlength="255" required
                            placeholder="Ingrese su correo">
                    </div>
                </div>
                <div class="form-group">
                    <label for="message">Mensaje</label>
                    <div class="input__wrap input--green">
                        <textarea class="input" required id="message" name="message" rows="3"
                            placeholder="Ingrese el cuerpo del mensaje" maxlength="5000"></textarea>
                    </div>
                </div>
                <button class="btn btn--green" type="submit">ENVIAR</button>
                <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
            </form>
        </div>
    </section>


</div>
@include('widgets.footer')