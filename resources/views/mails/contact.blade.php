<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Nuevo pedido</title>
</head>
<body>
    <p>Estos son los datos del cliente: </p>
    <ul>
      <li>
        <strong>Nombre:</strong>
        {{$user->name}}
      </li>
      <li>
        <strong>Apellidos:</strong>
        {{$user->surname}}
      </li>
      <li>
        <strong>E-mail:</strong>
        {{$user->email}}
      </li>
    </ul>
    <strong>Mensaje:</strong>
    <div>
      {{$msg}}
    </div>
</html>