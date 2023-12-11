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

<div class="icon d-flex align-items-center justify-content-center">
    <span class="fas fa-phone"></span>
</div>




            <div class="content">
    <h1 class="section--title title--underline  txt--blue text-center d-md-none">@lang('locale.contacto')</h1>
    <div class="hero hero-has-text hero-contact">
        <div class="hero--txt">
            <h1 class="section--title d-none d-md-block">@lang('locale.contacto')</h1>
            <ul class="card__list list--circle bullets--gray">
                <li>
                    <div class="contact-info">
                        <div class="contact-photo">
                            <img src="{{ asset(trim('/uploads/' . $contact->president_photo, '/')) }}">
                        </div>
                        <div class="contact-details">
                            @lang('locale.presidencia')<br><strong>{{ $contact->contact_president }}</strong>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="contact-info">
                        <div class="contact-photo">
                            <img src="{{ asset(trim('/uploads/' . $contact->secretary_photo, '/')) }}">
                        </div>
                        <div class="contact-details">
                            @lang('locale.secretariaTec')<br><strong>{{ $contact->contact_secretary }}</strong>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="contact-info">
                        <div class="contact-photo">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                        <path fill-rule="evenodd" d="M2 3.5A1.5 1.5 0 013.5 2h1.148a1.5 1.5 0 011.465 1.175l.716 3.223a1.5 1.5 0 01-1.052 1.767l-.933.267c-.41.117-.643.555-.48.95a11.542 11.542 0 006.254 6.254c.395.163.833-.07.95-.48l.267-.933a1.5 1.5 0 011.767-1.052l3.223.716A1.5 1.5 0 0118 15.352V16.5a1.5 1.5 0 01-1.5 1.5H15c-1.149 0-2.263-.15-3.326-.43A13.022 13.022 0 012.43 8.326 13.019 13.019 0 012 5V3.5z" clip-rule="evenodd" />
                        </svg>

                        </div>
                        <div class="contact-details">
                        @lang('locale.tel') <br><strong>{{ $contact->contact_phone }}</strong>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="contact-info">
                        <div class="contact-photo">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" className="w-5 h-5">
                        <path d="M3 4a2 2 0 00-2 2v1.161l8.441 4.221a1.25 1.25 0 001.118 0L19 7.162V6a2 2 0 00-2-2H3z" />
                        <path d="M19 8.839l-7.77 3.885a2.75 2.75 0 01-2.46 0L1 8.839V14a2 2 0 002 2h14a2 2 0 002-2V8.839z" />
                        </svg>
                        </div>
                        <div class="contact-details">
                        @lang('locale.correo') <br><strong>{{ $contact->contact_email }}</strong>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>


<style>
    

    /* Estilos para la sección de contacto */
.content {
   
    max-width: 600px;
    margin: 0 auto;
}

.hero-contact {
    display: flex;
}

.hero--txt {
    flex-grow: 1;
}

.card__list {
    list-style-type: none;
    padding: 0;
}

/* Estilos para la información del contacto */
.contact-info {
    display: flex;
    align-items: center;
    margin-bottom: 2rem; 
}

.contact-photo {
    width: 5rem; 
    height: 5rem;
    margin-right: 1rem; /* Espacio entre la foto y los detalles */
    border-radius: 50%; /* Para hacer la foto redonda, ajustar según sea necesario */
    overflow: hidden;
}

.contact-photo img {
    width: 100%;
    height: 100%;
    object-fit: cover; 
}

.contact-details {
    flex-grow: 1;
    font-size: 1rem;
}


.section--title {
   
}



</style>


    <div id="contactar"></div>


    <section class="contact__form ">
        <div class="card--form">
            <h3 class="title text-center">@lang('locale.enviar')</h3>
            <form action="https://www.mioa.org/es/contacto" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">@lang('locale.nombre')</label>
                    <div class="input__wrap input--green">
                        <input class="input" id="name" type="text" name="name" maxlength="255" required
                            placeholder="@lang('locale.nombreComp')">
                    </div>
                </div>
                <div class="form-group">
                    <label for="country">@lang('locale.pais')</label>
                    <div class="select--wrapper">
                        <select class="select" id="country" name="country" required>
                            <option value="">@lang('locale.seleccpais')</option>

                            @foreach($countries as $country)
                            <option value="{{ $country->name }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="form-group">
                    <label for="email">@lang('locale.EnviarCorreo')</label>
                    <div class="input__wrap input--green">
                        <input class="input" id="email" type="email" name="email" maxlength="255" required
                            placeholder="@lang('locale.ingresecorreo')">
                    </div>
                </div>
                <div class="form-group">
                    <label for="message">@lang('locale.mensaje')</label>
                    <div class="input__wrap input--green">
                        <textarea class="input" required id="message" name="message" rows="3"
                            placeholder="@lang('locale.ingreseMensaje')" maxlength="5000"></textarea>
                    </div>
                </div>
                <button class="btn btn--green" type="submit">@lang('locale.env')</button>
                <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
            </form>
        </div>
    </section>


</div>
@include('widgets.footer')