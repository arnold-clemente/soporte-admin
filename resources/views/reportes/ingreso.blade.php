<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Nota de Ingreso</title>
    <style>
        @page {
            margin-top: 4.5cm;
            margin-left: 3.5cm;
            margin-right: 3cm;
            margin-bottom: 5cm;
        }

        .contenedor_reportes {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
        }

        .cite {
            width: 100%;
            text-align: right;
            line-height: 0.2;
            margin-bottom: 3rem;
            font-size: 12px;
        }

        .encabezado {
            width: 100%;
            text-align: left;
            line-height: 1.5;
            font-size: 12px;
        }

        .encabezado .parrafo {
            margin-bottom: 1.5rem;
            line-height: 0.2;
        }

        .parrafo span {
            font-weight: 600;
        }

        .referencia {
            width: 100%;
            text-align: right;
        }

        .referencia span {
            font-weight: 500;
        }

        .table {
            width: 100%;
        }

        .tabla_detalle {
            width: 100%;
            font-size: 12px;
        }
        .title {
            font-size: 12px;
            font-weight: 500;
        }
        .parrafo {
            font-size: 12px;
        }
        .numero{
            width: 10px;
        }
        .center{
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="contenedor_reportes">
        <div class="cite">
            <p>La Paz, {{ $fecha }}</p>
            <p>
                <span>{{ $ingreso->documento }}</span>
                <span>{{ $ingreso->codigo }}</span>
            </p>
        </div>

        <div class="encabezado">
            <div class="parrafo">
                <p>Señor:</p>
            </div>
            <div class="parrafo">
                <p>{{ $funcionario->nombres . ' ' . $funcionario->apellidos }}</p>
                <p><span>{{ $funcionario->unidad->nombre }}</span></p>
                <p><span>GOBIERNO AÚTNOMO DEPARTAMENTAL DE LA PAZ</span></p>
            </div>
            <div class="parrafo">
                <p>Presente,</p>
            </div>
        </div>
        <div class="referencia">
            <p><span>Ref.: </span> <span>INGRESO</span></p>
        </div>
        <div class="table">
            <table border="2" class="tabla_detalle">
                <thead>
                    <tr>
                        <th class="title">N°</th>
                        <th class="title">Código</th>
                        <th class="title">Descripción del equipo</th>
                        <th class="title">Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ingreso->ingresoArticulos as $articulo)
                        <tr>
                            <td class="parrafo numero">{{ $numero++ }}</td>
                            <td class="parrafo center">{{ $articulo->articulo->codigo }}</td>
                            <td class="parrafo">
                                <span>{{ $articulo->articulo->nombre }}</span>
                                <span>{{ $articulo->articulo->tamano }}</span>
                                <span>{{ $articulo->articulo->marca }}</span>
                                <span>{{ $articulo->articulo->modelo }}</span>
                            </td>
                            
                            <td class="parrafo center">{{ $articulo->cantidad }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="tecnico">
            <p>Recibido por: <span>{{$ingreso->tecnico->nombres . " " . $ingreso->tecnico->apellidos}}</span></p>
        </div>
    </div>
</body>

</html>
