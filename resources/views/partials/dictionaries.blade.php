@foreach ($products as $product)
<a href="{{ route('verDiccionario', ['id' => $product->max_id]) }}" class="card card--flex card--link">
<img src="{{ asset(trim('/uploads/' . $product->product->image, '/')) }}" alt="{{ $product->product->name }}" class="card--flex__img">
    <div class="card--flex__content">
        <h4 class="card--title">{{ __($product->product->name) }}</h4>
        <hr>
        <p class="card--text">{{ $product->concatenated_known_names }}</p>
        <p class="card--text">{{ $product->product->family_name }}</p>
        <p class="txt--blue">@lang('locale.ver')</p>
    </div>
</a>
@endforeach