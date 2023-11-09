<!doctype html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        body {
            font-family: 'JetBrains Mono', monospace;
            font-size: 12px;
        }

        .table {
            border-collapse: collapse;
            border: none;
        }

        .table td,
        .table th {
            border: none;
        }
    </style>
    <title>{{$title}}</title>
</head>

<body>
    <h4 class="text-center"><u>HOJA DE REGISTRO DE MOVIMIENTOS DE PRODUCTO</u></h4>

    <table class="table">

        <tbody>
            <tr>
                <th>
                    <strong>Código:</strong>
                    <span>{{ $prs->code_item }}</span>
                </th>
                <td>

                </td>
                <td>

                </td>
                <td>
                    <strong>Fecha de apertura:</strong>
                    <span>{{ $date }}</span>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <strong>Descripción:</strong>
                    <span>{{ $prs->description }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Producto:</strong>
                    <span>{{ $prs->product->name }}</span>
                </td>
                <td>
                    <strong>Proveedor:</strong>
                    <span>{{ $prs->product->supplier->name }}</span>
                </td>
                <td>
                    <strong>Categoría:</strong>
                    <span>{{ $prs->product->category->name }}</span>
                </td>
                <td>
                    <strong>Precio base:</strong>
                    <span>$/{{ $prs->product->base_price }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Código de barras:</strong>
                    <span>{{ $prs->product->barcode }}</span>
                </td>
                <td>
                    <strong>Stock mínimo de reposición:</strong>
                    <span>{{ $prs->minimum_replacement_stock }}</span>
                </td>
                <td>
                    <strong>Cantidad de reposición:</strong>
                    <span>{{ $prs->replacement_quantity }}</span>
                </td>
                <td>
                    <strong>Unidad de medida:</strong>
                    <span>{{ $prs->unit_of_measurement }}</span>
                </td>
            </tr>
        </tbody>
    </table>

    <h5 class="text-center"><u>KARDEX DE MOVIMIENTOS ASOCIADOS - 2023</u></h5>

    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Código</th>
                <th scope="col">Fecha</th>
                <th scope="col">Responsable</th>
                <th scope="col">Precio Total</th>
                <th scope="col">Stock Anterior</th>
                <th scope="col">Tipo de movimiento</th>
                <th scope="col">Cantidad Ingreso</th>
                <th scope="col">Cantidad Salida</th>
                <th scope="col">Stock Actual</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($kardexs as $kardex)
                <tr>
                    <th scope="row"> {{ $i++ }} </th>
                    <td> {{ $kardex->code_item }} </td>
                    <td> {{ date('d-m-Y', strtotime($kardex->created_at)) }} </td>
                    <td> {{ $kardex->responsible->name }} </td>
                    <td> $/ {{ $kardex->total_price }} </td>
                    <td> {{ $kardex->previous_stock }} </td>
                    <td> {{ $kardex->type_movement }} </td>
                    <td> {{ $kardex->input_quantity }} </td>
                    <td> {{ $kardex->output_quantity }} </td>
                    <td> {{ $kardex->current_stock }} </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
