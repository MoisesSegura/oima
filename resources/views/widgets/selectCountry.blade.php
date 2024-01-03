<div class="selectors">
    <div class="select--wrapper">
        <select class="select" name="region" id="region-validate">
            <option value="">Región</option>
            @foreach($regions as $region)
            <option value="{{ $region->id }}">{{ $region->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="select--wrapper">
        <select class="select selected-country" name="country" id="country">
            <option value="">País</option>
        </select>
    </div>
</div>

<!-- Más contenido aquí -->

<script>
    const regionSelect = document.getElementById('region-validate');
    const countrySelect = document.getElementById('country');

    // Manejar el evento de cambio en el select de regiones
    regionSelect.addEventListener('change', function () {
        // Obtener el valor seleccionado en el select de regiones
        const selectedRegionId = regionSelect.value;

        // Realizar una solicitud AJAX para obtener los países de la región seleccionada
        fetch(`/get-countries-products/${selectedRegionId}`)
            .then(response => response.json())
            .then(countries => {
                // Limpiar las opciones actuales en el select de países
                countrySelect.innerHTML = '<option value="">País</option>';

                // Agregar las nuevas opciones basadas en los datos recibidos
                countries.forEach(country => {
                    const option = document.createElement('option');
                    option.value = country.slug;
                    option.textContent = country.name;
                    countrySelect.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching countries:', error));
    });
</script>