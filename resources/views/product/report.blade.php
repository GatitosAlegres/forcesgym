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
    </style>
    <title>{{$title}}</title>
</head>

<body>
    <h4 class="text-center"><u>LISTADO DE PRODUCTOS</u></h4>

    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                {{-- <th scope="col">Imagen</th> --}}
                <th scope="col">Código</th>
                <th scope="col">Nombre</th>
                <th scope="col">Marca</th>
                <th scope="col">Categoría</th>
                <th scope="col">Precio compra</th>
                <th scope="col">Precio venta</th>
                <th scope="col">Stock</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($products as $product)
                <tr>
                    <th scope="row"> {{ $i++ }} </th>
                    {{-- <td> <img src="{{ $product->image }}" alt="-" width="20" height="20"/> </td> --}}
                    <td> {{ $product->barcode }} </td>
                    <td> {{ $product->name }} </td>
                    <td> {{ $product->supplier->name }} </td>
                    <td> {{ $product->category->name }} </td>
                    <td> {{ $product->purchase_price }} </td>
                    <td> {{ $product->sale_price }} </td>
                    <td> {{ $product->stock }} </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
