@extends('shop.layout')

@section('content')

    <div class="mx-16">
        <header class="text-start">
            <h1 class="my-6 font-bold text-4xl leading-none tracking-tight">
                Tu Carrito de compras
            </h1>
        </header>
        <section class="grid grid-cols-3">
            <div class="col-span-2 border-t border-slate-300 p-5">
                <ul class="divide-y divide-slate-300">
                    @php
                        $count = 0;
                    @endphp
                    @if (session('cart'))
                        @foreach (session('cart')->getItems() as $item)
                            @php
                                $count += 1;
                            @endphp
                            <li class="grid grid-cols-3 my-2" data-id="{{ $item->product->id }}">
                                <div class="col-span-1 flex items-center justify-center h-full">
                                    <img src="{{ $item->product->image_url }}" alt="{{ $item->product->name }}"
                                        class="h-36 w-auto object-cover" data-th="Image" />
                                </div>
                                <div class="col-span-1">
                                    <p data-th="Product" class="text-base font-semibold text-gray-900 mb-1">
                                        {{ $item->product->name }}</p>
                                    <span
                                        class="text-xs font-medium me-2 px-2.5 py-0.5 my-2 rounded bg-green-900 text-green-300">{{ $item->product->category->name }}</span>
                                    <p data-th="Price" class="text-sm font-semibold text-gray-700 mt-1">{{ $item->price }} PEN
                                    </p>
                                </div>
                                <div class="col-span-1">
                                    <div class="grid grid-cols-2">
                                        <div class="col-span-1 flex items-center" data-th="Quantity">
                                            <button class="bg-gray-200 text-gray-600 rounded-l px-2"
                                                onclick="decrement('{{ $item->product->id }}')">-</button>
                                            <input disabled type="number" min="1" value="{{ $item->quantity }}"
                                                data-original-quantity="{{ $item->quantity }}"
                                                id="Line1Qty{{ $item->product->id }}"
                                                class="h-8 w-12 text-end rounded border-gray-200 bg-gray-50 p-0 text-xs text-gray-600 focus:outline-none" />
                                            <button class="bg-gray-200 text-gray-600 rounded-r px-2"
                                                onclick="increment('{{ $item->product->id }}')">+</button>
                                        </div>
                                        <div class="col-span-1">
                                            <button class="text-gray-600 transition hover:text-red-600"
                                                onclick="removeProduct('{{ $item->product->id }}')">
                                                <span class="sr-only">Remove item</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="h-4 w-4 mt-2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>

            <div class="col-span-1 mx-5">
                <div class="bg-slate-50 rounded-md">
                    <h2 class="text-lg leading-6 font-medium text-stone-900 p-5">
                        Resumen de la compra
                    </h2>
                    <div class="divide-y divide-slate-200 mx-5">
                        <div class="grid grid-cols-2 p-3">
                            <div class="col-span-1 text-start text-sm font-normal text-stone-700">
                                Subtotal
                            </div>
                            <div class="col-span-1 text-end text-sm font-medium text-stone-800" data-th="Subtotal">
                                @if (session('cart'))
                                    {{ session('cart')->calculateTotal() }} PEN
                                @endif
                            </div>
                        </div>
                        <div class="grid grid-cols-2 p-3" data-th="Discount">
                            <div class="col-span-1 text-start text-sm font-normal text-stone-700">
                                Descuento
                            </div>
                            <div class="col-span-1 text-end">
                                <span
                                    class="bg-blue-100 text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded border border-blue-400">
                                    <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z" />
                                    </svg>
                                    No acredita
                                </span>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 p-3">
                            <div class="col-span-1 text-start text-sm font-normal text-stone-700">
                                Total
                            </div>
                            <div class="col-span-1 text-end text-sm font-medium text-stone-800" data-th="Total">
                                @if (session('cart'))
                                    {{ session('cart')->calculateTotal() }} PEN
                                @endif
                            </div>
                        </div>
                        <form action="/session" method="POST" class="p-3">
                            <a href="{{ url('/store') }}"
                                class="flex items-center justify-center btn mb-3 bg-stone-950 text-white hover:bg-gray-800 text-sm font-semibold py-2 px-4 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-arrow-return-left me-2" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z" />
                                </svg>
                                Seguir comprando...
                            </a>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button
                                class="btn btn-success w-full flex items-center justify-center bg-green-600 hover:bg-green-700 text-white text-sm font-semibold py-2 px-4 rounded"
                                type="submit" id="checkout-live-button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-currency-exchange me-2" viewBox="0 0 16 16">
                                    <path
                                        d="M0 5a5.002 5.002 0 0 0 4.027 4.905 6.46 6.46 0 0 1 .544-2.073C3.695 7.536 3.132 6.864 3 5.91h-.5v-.426h.466V5.05c0-.046 0-.093.004-.135H2.5v-.427h.511C3.236 3.24 4.213 2.5 5.681 2.5c.316 0 .59.031.819.085v.733a3.46 3.46 0 0 0-.815-.082c-.919 0-1.538.466-1.734 1.252h1.917v.427h-1.98c-.003.046-.003.097-.003.147v.422h1.983v.427H3.93c.118.602.468 1.03 1.005 1.229a6.5 6.5 0 0 1 4.97-3.113A5.002 5.002 0 0 0 0 5zm16 5.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0zm-7.75 1.322c.069.835.746 1.485 1.964 1.562V14h.54v-.62c1.259-.086 1.996-.74 1.996-1.69 0-.865-.563-1.31-1.57-1.54l-.426-.1V8.374c.54.06.884.347.966.745h.948c-.07-.804-.779-1.433-1.914-1.502V7h-.54v.629c-1.076.103-1.808.732-1.808 1.622 0 .787.544 1.288 1.45 1.493l.358.085v1.78c-.554-.08-.92-.376-1.003-.787H8.25zm1.96-1.895c-.532-.12-.82-.364-.82-.732 0-.41.311-.719.824-.809v1.54h-.005zm.622 1.044c.645.145.943.38.943.796 0 .474-.37.8-1.02.86v-1.674l.077.018z" />
                                </svg>
                                Ir a la pasarela de pago...
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        var csrfToken = '{{ csrf_token() }}';

        function increment(productId) {
            var input = document.getElementById("Line1Qty" + productId);
            if (input !== null) {
                var originalQuantity = parseInt(input.getAttribute("data-original-quantity"));
                var newQuantity = originalQuantity + 1;
                updateCartQuantity(newQuantity, productId);
                input.value = newQuantity;
            }
        }

        function decrement(productId) {
            var input = document.getElementById("Line1Qty" + productId);
            if (input !== null) {
                var originalQuantity = parseInt(input.getAttribute("data-original-quantity"));
                var newQuantity = originalQuantity - 1;
                if (newQuantity > 0) {
                    updateCartQuantity(newQuantity, productId);
                    input.value = newQuantity;
                }
            }
        }

        function updateCartQuantity(newQuantity, cartItemId) {
            $.ajax({
                url: "update-cart",
                method: "patch",
                data: {
                    _token: csrfToken,
                    id: cartItemId,
                    quantity: newQuantity
                },
                success: function(response) {
                    location.reload();
                }
            });
        }

        function removeProduct(productId) {
            if (confirm("¿Estás seguro de que quieres eliminar este producto?")) {
                $.ajax({
                    url: "remove-from-cart/" + productId,
                    method: "DELETE",
                    data: {
                        _token: csrfToken,
                    },
                    success: function(response) {
                        location.reload();
                    }
                });
            }
        }
    </script>
@endsection
