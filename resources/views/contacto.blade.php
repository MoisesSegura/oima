@include('widgets.header')
@include('widgets.navbar')




<div class="content">
    
    <h1 class="section--title title--underline  txt--blue text-center d-md-none">@lang('locale.contacto')</h1>
    <div class="hero hero-has-text hero-contact" style="background-image: url('{{ asset(trim('/uploads/' . $extras->image, '/')) }}');">
        <div class="hero--txt">
            <h1 class="section--title d-none d-md-block">@lang('locale.contacto')</h1>
            <ul class="card__list list--circle bullets--gray">
                <li>
                    <div class="contact-info">
                        <!-- <div class="contact-photo">
                            @if($contact->contact_president)
                            <img src="{{ asset(trim('/uploads/' . $contact->president_photo, '/')) }}">
                            @endif
                        </div> -->
                        <div class="contact-details">
                            @lang('locale.presidencia')<br><strong>{{ $contact->contact_president }}</strong>
                        </div>
                    </div>
                </li>
                <li>
                    <!-- <div class="contact-info">
                        <div class="contact-photo">
                            @if($contact->contact_secretary)
                            <img src="{{ asset(trim('/uploads/' . $contact->secretary_photo, '/')) }}">
                            @endif
                        </div>
                        <div class="contact-details">
                            @lang('locale.secretariaTec')<br><strong>{{ $contact->contact_secretary }}</strong>
                        </div>
                    </div> -->
                </li>
                <li>
                    <div class="contact-info">
                        <!-- <div class="contact-photo2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                class="w-4 h-4">
                                <path fill-rule="evenodd"
                                    d="m3.855 7.286 1.067-.534a1 1 0 0 0 .542-1.046l-.44-2.858A1 1 0 0 0 4.036 2H3a1 1 0 0 0-1 1v2c0 .709.082 1.4.238 2.062a9.012 9.012 0 0 0 6.7 6.7A9.024 9.024 0 0 0 11 14h2a1 1 0 0 0 1-1v-1.036a1 1 0 0 0-.848-.988l-2.858-.44a1 1 0 0 0-1.046.542l-.534 1.067a7.52 7.52 0 0 1-4.86-4.859Z"
                                    clip-rule="evenodd" />
                            </svg>


                        </div> -->
                        <div class="contact-details">
                            @lang('locale.tel') <br><strong>{{ $contact->contact_phone }}</strong>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="contact-info">
                        <!-- <div class="contact-photo2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                class="w-4 h-4">
                                <path
                                    d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z" />
                                <path
                                    d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z" />
                            </svg>

                        </div> -->
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

        max-width: auto;
        margin: 0 auto;
    }

    .hero-contact {
        display: flex;
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
        width: 2rem;
        height: 2rem;
        margin-right: 1rem;
        border-radius: 50%;
        overflow: hidden;
    }

    .contact-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }


    .contact-photo2 {
        width: 2rem;
        height: 2rem;
        margin-right: 1rem;
        border-radius: 50%;
        overflow: hidden;
    }

    .contact-photo2 img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .contact-details {
        flex-grow: 1;
        font-size: 1rem;
    }


    .section--title {}
</style>


<div id="contactar"></div>



<section class="contact__form">
    <div class="card--form">
        <h3 class="title text-center">@lang('locale.enviar')</h3>
        <form action="{{ route('contact.send') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">@lang('locale.nombre')</label>
                <div class="input__wrap input--green">
                    <input class="input" id="name" type="text" name="name" maxlength="255" required placeholder="@lang('locale.nombreComp')">
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
                    <input class="input" id="email" type="email" name="email" maxlength="255" required placeholder="@lang('locale.ingresecorreo')">
                </div>
            </div>
            <div class="form-group">
                <label for="message">@lang('locale.mensaje')</label>
                <div class="input__wrap input--green">
                    <textarea class="input" required id="message" name="message" rows="3" placeholder="@lang('locale.ingreseMensaje')" maxlength="5000"></textarea>
                </div>
            </div>
         
            <button class="btn btn--green" type="submit">@lang('locale.env')</button>
        </form>
    </div>
</section>



<script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_SITE_KEY') }}"></script>

<script>
    document.addEventListener('submit', function(e){
        e.preventDefault();
        grecaptcha.ready(function() {
          grecaptcha.execute('{{ env('RECAPTCHA_SITE_KEY') }}', {action: 'submit'}).then(function(token) {

            let form = e.target;

            let input = document.createElement('input');
            input.type = "hidden";
            input.name = 'g-recaptcha-response';
            input.value = token;

            form.appendChild(input);

            form.submit();
              
          });
        });

    })
</script>



@include('widgets.footer')