<!DOCTYPE html>
<html>
    <head>
        <title>Nuevo pedido</title>
    </head>
    <body>
        <p>Se ha realizado un nuevo pedido</p>
        <p>Estos son los datos del cliente que realizo el pedido:</p>
            <ul>
                <li>
                    <strog>Nombre:</strog>
                    {{$user->name}}
                </li>
                <li>
                    <strog>E-mail:</strog>
                    {{$user->email}}
                </li>
                <li>
                    <strog>Fecha del pedido:</strog>
                    {{$cart->order_date}}
                </li>
            </ul>
        <hr>
        <p>Detalle del pedido</p>
        <ul>
            @foreach($cart->details as $detail)
            <li>{{$detail->product->name}} x {{$detail->quantity}}
                (${{$detail->quantity * $detail->product->price}})
            </li>
            @endforeach
        </ul>
        <p>
            <strong>TOtal a pagar : </strong> {{$cart->total}}
        </p>
        <hr>
        <p>
            <a href="{{url('/admin/orders/'.$cart->id)}}">haz click aqui</a>
            para ver mas informacion sobre el pedido.
        </p>
    </body>
</html>