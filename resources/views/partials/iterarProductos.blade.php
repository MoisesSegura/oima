@foreach ($fruits as $fruitDetail)
<a href="#" class="card card--flex card--link js-equal-height" data-bs-toggle="modal" data-bs-target="#mensajeModal">
    <img src="{{ asset(trim('/uploads/' . $fruitDetail->product->image, '/')) }}"
        alt="{{ $fruitDetail->product->name }}" class="card--flex__img">
    <div class="card--flex__content">
        <h4 class="card--title">{{ __($fruitDetail->product->name) }}</h4>
        <p class="card--text">{{ $fruitDetail->concatenated_known_names }}</p>
        <p class="card--text">{{ $fruitDetail->product->family_name }}</p>
        <p class="txt--blue">@lang('locale.ver')</p>
    </div>
</a>
@endforeach