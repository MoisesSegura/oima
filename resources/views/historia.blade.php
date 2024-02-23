
@include('widgets.header')
@include('widgets.navbar')

    <div class="content">
        <div class="backbot">
            <a href="javascript:history.back()" class="backbot--link"><i class="mdi mdi-chevron-left"></i> @lang('locale.volver')</a>
        </div>
        <h1 class="title title--underline  txt--blue text-center d-md-none">@lang('locale.historiaOIMA')</h1>
        <div class="hero hero-has-text hero-history" style="background-image: url('{{ asset('/uploads/' . ltrim($history->image_history, '/')) }}');">
    <div class="hero--txt p-3 d-none d-md-block">
        <h1 class="title">{{ __($history->title) }}</h1>
    </div>
</div>


        <div class="section--history">
            <div class="block--history">
                <figure>
                    <img src="/img/history-1.svg">
                </figure>
                <div class="card--history">
                    <h4 class="title title--sideline">@lang('locale.definicion')</h4>
                    <p class="txt--gray">

                    {!! __($history->definition) !!}
    
                    </p>
                </div>
            </div>
            <div class="block--history">
                <figure>
                    <img src="/img/history-2.svg">
                </figure>
                <div class="card--history">
                    <h4 class="title title--sideline">@lang('locale.origen')</h4>
                    <p class="txt--gray">

                    {!! __($history->origin) !!}

                    </p>
                </div>
            </div>
            <div class="block--history">
                <figure>
                    <img src="/img/history-3.svg">
                </figure>
                <div class="card--history">
                    <h4 class="title title--sideline">@lang('locale.estrategia')</h4>
                    <p class="txt--gray">

                    {!! __($history->strategy) !!}

                    </p>
                </div>
            </div>
            <div class="block--history">
                <figure>
                    <img src="/img/history-4.svg">
                </figure>
                <div class="card--history">
                    <h4 class="title title--sideline">@lang('locale.nacimiento')</h4>
                    <p class="txt--gray">

                    {!! __($history->birth) !!}

                    </p>
                </div>
            </div>
        </div>
        <div class="text-center">
            <a href="{{ route('oima') }}" class="btn btn--green">@lang('locale.volver')</a>
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
  

</body>

</html>