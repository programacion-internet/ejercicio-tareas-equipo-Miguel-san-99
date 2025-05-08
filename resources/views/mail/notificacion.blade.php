<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notificacion</title>
</head>
<body>
    <h1>Hola {{ $user->name }}</h1>
    <p>Has sido asignado a la tarea: <strong>{{ $tarea->nombre }}</strong></p>
    <p>Descripción: {{ $tarea->descripcion }}</p>
    <p>Fecha límite: {{ $tarea->fecha_limite }}</p>
</body>
</html>
