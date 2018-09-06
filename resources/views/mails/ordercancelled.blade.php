<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Nuevo pedido</title>
</head>
<body>
    <p>Se ha cancelado un pedido!</p>
    <p>Estos son los datos del cliente: </p>
    <ul>
      <li>
        <strong>Nombre:</strong>
        {{$user->name}}
      </li>
      <li>
        <strong>E-mail:</strong>
        {{$user->email}}
      </li>
      <li>
        <strong>Fecha de cuando se habia hecho el pedido:</strong>
        {{$cart->order_date}}
      </li>
    </ul>
    <hr>
    <p>
      <a href="{{url('/admin/orders/'.$cart->id)}}">
        Haz clic aquí
      </a>para ver más información sobre este pedido.
    </p>
</html>