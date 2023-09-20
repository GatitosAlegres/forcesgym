@extends('layout')

@section('content')
    <table class="table table-dark table-hover" id="cart">
        <thead>
            <tr>
                <th class="text-center" scope="col">#</th>
                <th class="text-center" scope="col">Imagen</th>
                <th class="text-center" scope="col">Producto</th>
                <th class="text-center" scope="col">Precio unitario</th>
                <th class="text-center" scope="col">Cantidad</th>
                <th class="text-center" scope="col">SubTotal</th>
                <th class="text-center" scope="col">Acción</th>
            </tr>
        </thead>
        <tbody>
            @php
                $total = 0;
                $count = 0;
            @endphp
            @if (session('cart'))
                @foreach (session('cart') as $id => $details)
                    @php
                        $total += $details['price'] * $details['quantity'];
                        $count += 1;
                    @endphp
                    <tr data-id="{{ $id }}" class="text-center">
                        <th scope="row" class="">{{ $count }}</th>
                        <td data-th="Image" class="w-25">
                            <div class="container-fluid">
                                <img class="img-fluid w-50 h-50" src="{{ $details['image'] }}" alt="{{ $details['name'] }}">
                            </div>
                        </td>
                        <td data-th="Product">
                            <h6>{{ $details['name'] }}</h6>
                        </td>
                        <td data-th="Price">
                            <h6>$/. {{ $details['price'] }}</h6>
                        </td>
                        <td data-th="Quantity" style="width: 50px">
                            <input type="number" value="{{ $details['quantity'] }}"
                                class="form-control quantity cart_update" min="1" />
                        </td>
                        <td data-th="Subtotal">
                            $/. {{ $details['price'] * $details['quantity'] }}
                        </td>
                        <td class="actions" data-th="">
                            <button class="btn btn-outline-danger rounded-circle cart_remove w-auto h-75">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-cart-dash-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM6.5 7h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1 0-1z" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr>
                <td colspan="7" style="text-align:right;">
                    <h3>
                        <strong class="me-3">
                            Total: $/. {{ $total }}
                        </strong>
                    </h3>
                </td>
            </tr>
            <tr>
                <td colspan="7" style="text-align:right;">
                    <form action="/session" method="POST">
                        <a href="{{ url('/store') }}" class="btn btn-danger me-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-arrow-return-left me-2" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z" />
                            </svg>
                            Seguir comprando...
                        </a>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button class="btn btn-success" type="submit" id="checkout-live-button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-currency-exchange me-2" viewBox="0 0 16 16">
                                <path
                                    d="M0 5a5.002 5.002 0 0 0 4.027 4.905 6.46 6.46 0 0 1 .544-2.073C3.695 7.536 3.132 6.864 3 5.91h-.5v-.426h.466V5.05c0-.046 0-.093.004-.135H2.5v-.427h.511C3.236 3.24 4.213 2.5 5.681 2.5c.316 0 .59.031.819.085v.733a3.46 3.46 0 0 0-.815-.082c-.919 0-1.538.466-1.734 1.252h1.917v.427h-1.98c-.003.046-.003.097-.003.147v.422h1.983v.427H3.93c.118.602.468 1.03 1.005 1.229a6.5 6.5 0 0 1 4.97-3.113A5.002 5.002 0 0 0 0 5zm16 5.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0zm-7.75 1.322c.069.835.746 1.485 1.964 1.562V14h.54v-.62c1.259-.086 1.996-.74 1.996-1.69 0-.865-.563-1.31-1.57-1.54l-.426-.1V8.374c.54.06.884.347.966.745h.948c-.07-.804-.779-1.433-1.914-1.502V7h-.54v.629c-1.076.103-1.808.732-1.808 1.622 0 .787.544 1.288 1.45 1.493l.358.085v1.78c-.554-.08-.92-.376-1.003-.787H8.25zm1.96-1.895c-.532-.12-.82-.364-.82-.732 0-.41.311-.719.824-.809v1.54h-.005zm.622 1.044c.645.145.943.38.943.796 0 .474-.37.8-1.02.86v-1.674l.077.018z" />
                            </svg>
                            ¡Ir a la pasarela de pago!
                        </button>
                    </form>
                </td>
            </tr>
        </tfoot>
    </table>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(".cart_update").change(function(e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ route('update_cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });

        $(".cart_remove").click(function(e) {
            e.preventDefault();

            var ele = $(this);

            if (confirm("Do you really want to remove?")) {
                $.ajax({
                    url: '{{ route('remove_from_cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
@endsection
