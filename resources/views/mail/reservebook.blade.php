<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Nuevo Usuario</title>
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

<h3>LIBRO RESERVADO: {{$reserve->book->title}}</h3>

<p>Usuario: {{$reserve->user->name}} {{$reserve->user->surname}}</p>
<p>Momento de la reserva: {{$reserve->date}} {{$reserve->time}}</p>

</body>

</html>
