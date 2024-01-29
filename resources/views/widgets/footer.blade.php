<footer>
    <div>
        <a class="logo">OIMA/MIOA</a>
        <img class="d-none d-md-block" src="../img/map-white.png" width="100" />
    </div>

    <hr class="d-md-none">
    <div>
        <p><strong>@lang('locale.contactoNav')</strong></p>
        <ul class="footer__list">
            <!-- <li><a href="tel:+50622160232"><i class="mdi mdi-phone"></i> +(506) 2216 0232</a></li> -->
            <li><a href="mailto:oima@iica.int"><i class="mdi mdi-email"></i> oima@iica.int</a></li>

        </ul>


        <div class="social-media-container">
            <ul class="social-media-list">
                @foreach ($socialmedia as $media)
                <li>
                    <a class="share--link" target="_blank" href="{{ $media->url }}">
                        <img src="{{ asset(trim('/uploads/' . $media->icon, '/')) }}" alt="{{ $media->icon }}">
                    </a>
                </li>
                @endforeach
            </ul>
        </div>


    </div>
</footer>