<form id="f_1" name="f_1" action="{{ route('filterFruits') }}" method="GET">
    <div class="selectors__container">
        <h3 class="txt--blue title--underline">@lang('locale.buscarProd')</h3>
        <div class="selectors">
            <div class="select--wrapper">

                <select class="select" name="region" id="region" data-lang="es">
                    <option value="">@lang('locale.region')</option>
                    @foreach ($regions as $region)
                    <option value="{{ $region->id }}">{{ __($region->name) }}</option>
                    @endforeach
                </select>

            </div>
            <div class="select--wrapper">
            <select class="select" name="country" id="country" onchange="storeCountry()">
                    <option value="">@lang('locale.pais')</option>
                </select>
            </div>
        </div>
        <button class="btn btn--green" type="submit">@lang('locale.filtro')</button>

    </div>
</form>