
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nota Compras</title>

    <head>
        <style>
          <strong i="7">@page</strong> { margin: 100px 25px; }
            header{ 
                position: fixed; 
                top: 0px; 
                left: 0px; 
                right: 0px; 
                height: 50px; 
                display: block;
            }
            body {
                margin-top: 4cm;
                margin-bottom: 1cm;
            }
            footer{ 
                position: fixed; 
                bottom: 0px; 
                left: 0px; 
                right: 0px; 
                height: 30px; 
            }
            h1{
                font-size: 20px;
                text-align: center;
            }
            table, th, td {
                width: 100%;
                border: 1px solid black;
                border-collapse: collapse;
            }
        </style>
    </head>
    <body>
        <header>
            <table>
                <thead>
                    <tr>
                        <th rowspan="2"><img src="https://res.cloudinary.com/dnsbyxjbu/image/upload/v1658337158/login_brxt4r.jpg" style="width: 100px; height: 100px"></th>
                        <th><h1>PEDIDO</h1></th>
                        <th rowspan="2"><img src="https://res.cloudinary.com/dnsbyxjbu/image/upload/v1658337158/login_brxt4r.jpg" style="width: 100px; height: 100px"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><h1>MiCake</h1></td>
                    </tr>
                </tbody>
            </table>
        </header>
        <footer>
            <hr>
            <div style="text-align:center">
                <span>Pasteleria MiCake    Calle Samaipata Nº 137   Telefono 3-366814</span>
            </div>
        </footer>
        <main>
            <h2 style="text-align:center">PEDIDOS</h2>

            <h3>Este Reporte fue Descargado por: {{$auth}}</h3>
            <table style="text-align: center;">
                <thead>
                    <tr>
                        <th>ID PEDIDO</th>
                        <th>FECHA PEDIDO</th>
                        <th>FECHA ENTREGA</th>
                        <th>TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedidos as $detalle) 
                        <tr>
                            <td>{{$detalle->id}}</td>
                            <td>{{$detalle->fecha_pedido}}</td>
                            <td>{{$detalle->fecha_entrega}}</td>
                            <td>{{$detalle->total}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h2 style="text-align:center">DETALLE PEDIDO</h2>
            <table style="text-align: center;">
                <thead>
                    <tr>
                        <th>ID PEDIDO</th>
                        <th>PRODUCTO</th>
                        <th>CANTIDAD</th>
                        <th>SUBTOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detalles as $detalle) 
                        <tr>
                            <td>{{$detalle->pedido->id}}</td>
                            <td>{{$detalle->producto->descripcion}}</td>
                            <td>{{$detalle->cantidad}}</td>
                            <td>{{$detalle->importe}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </main>
    </body>
</html>