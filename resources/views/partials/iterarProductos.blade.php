@foreach ($products as $productDetail)
<a href="#" class="card card--flex card--link js-equal-height" data-bs-toggle="modal" data-bs-target="#mensajeModal">
    <img src="{{ asset(trim('/uploads/' . $productDetail->product->image, '/')) }}"
        alt="{{ $productDetail->product->name }}" class="card--flex__img">
    <div class="card--flex__content">
        <h4 class="card--title">{{ __($productDetail->product->name) }}</h4>
        <p class="card--text">{{ $productDetail->concatenated_known_names }}</p>
        <p class="card--text">{{ $productDetail->product->family_name }}</p>
        <p class="txt--blue">@lang('locale.ver')</p>
    </div>
</a>
@endforeach