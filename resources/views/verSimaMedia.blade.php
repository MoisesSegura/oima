@include('widgets.header')
@include('widgets.navbar')
    <div class="content">
        <div class="backbot">
            <a href="javascript:history.back()" class="backbot--link"><i class="mdi mdi-chevron-left"></i> Volver</a>
        </div> <img class="w-100 d-md-none"
            src="../../../uploads/simaMedia/5951cd9f341c86a3abd8ea54f3d9b622fd843b04.jpg"
            alt="Reunión de Usuarios de Datos de USDA">
        <h1 class="section--title title--underline txt--blue text-center d-md-none">Reunión de Usuarios de Datos de USDA
        </h1>
        <div class="hero hero-has-text hero--full" style="background-image:url('{{ asset($simaMedia->image) }}')">
            <div class="hero--txt">
                
            <h1 class="section--title txt--blue d-none d-md-block text-uppercase">{{ __($simaMedia->title) }}</h1>
                <div class="txt--gray">
                
            
                    <p style="text-align:justify">{!! __($simaMedia->short_description) !!}</p>
              

                </div>
            </div>
        </div>

        <section class="container">
        </section>

    </div>



    @include('widgets.footer')


 
</body>



</html>