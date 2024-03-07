<!DOCTYPE html>
<html>
<head>
    <title>Nuevo mensaje de contacto</title>
</head>
<body>
    <h1>Nuevo mensaje de contacto</h1>
    <p>Nombre: {{ $data['name'] }}</p>
    <p>Email: {{ $data['email'] }}</p>
    <p>País: {{ $data['country'] }}</p>
    <p>Mensaje: {{ $data['message'] }}</p>
</body>
</html>