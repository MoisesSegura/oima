<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>

@foreach ($organizations as $organization)
    <p>{{ $organization->name }}</p>
@endforeach

----------------------------------------------------------------

@foreach ($achievements as $achievement)
<p>{{ $achievement->translate('es')->text }}</p>
@endforeach

<button id="change-language">Cambiar Idioma</button>

--------------------------------------------------------------

@foreach ($products as $product)
<img src="{{ asset($product->image) }}">
@endforeach

<script>
    // Obtener el botón
    const button = document.querySelector("#change-language");

    // Crear un evento de clic para el botón
    button.addEventListener("click", () => {
        // Obtener el idioma seleccionado del select
        const select = document.querySelector("#language-select");
        const language = select.value;

        // Guardar el idioma en el almacenamiento local
        localStorage.setItem("language", language);

        // Actualizar la página con el nuevo idioma
        window.location.reload();
    });

    // Agregar opciones de idioma al botón
    button.innerHTML = `
        <select id="language-select">
            <option value="es">Español</option>
            <option value="en">Inglés</option>
            <option value="pt">Portugués</option>
        </select>
        <button>Cambiar Idioma</button>
    `;

    // Establecer el valor seleccionado del select según el idioma almacenado en localStorage
    const currentLanguage = localStorage.getItem("language");
    if (currentLanguage) {
        const select = document.querySelector("#language-select");
        select.value = currentLanguage;
    }
</script>

</body>
</html>

