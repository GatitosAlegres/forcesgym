@extends('shop.layout')

@section('content')
    <section>
        <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
            <div class="mx-auto max-w-3xl bg-slate-200 border border-gray-200 rounded-lg shadow-lg">
                <header class="text-center">
                    <h1 class="text-xl font-bold text-gray-900 sm:text-3xl">Tus pedidos</h1>
                </header>

                <div class="mt-8 mx-8">
                    <ul class="space-y-4">
                        @php
                            $count = 0;
                        @endphp
                        @if (session('cart'))
                            @foreach (session('cart')->getItems() as $item)
                                @php
                                    $count += 1;
                                @endphp
                                <li class="flex items-center gap-4" data-id="{{ $item->product->id }}">
                                    <img src="{{ $item->product->image_url }}" alt="{{ $item->product->name }}"
                                        class="h-auto w-48 rounded object-cover" data-th="Image" />

                                    <div>
                                        <h3 data-th="Product" class="text-sm text-gray-900">{{ $item->product->name }}</h3>

                                        <dl class="mt-0.5 space-y-px text-[10px] text-gray-600">
                                            <div data-th="Price">
                                                <dt class="inline">Precio:</dt>
                                                <dd class="inline">{{ $item->price }}</dd>
                                            </div>
                                        </dl>
                                    </div>

                                    <div class="flex flex-1 items-center justify-end gap-2">
                                        <div data-th="Quantity">
                                            <label for="Line1Qty" class="sr-only"> Quantity </label>

                                            <input type="number" min="1" value="{{ $item->quantity }}"
                                                id="Line1Qty"
                                                class="h-8 w-12 rounded border-gray-200 bg-gray-50 p-0 text-center text-xs text-gray-600 [-moz-appearance:_textfield] focus:outline-none [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none" />
                                        </div>

                                        <button class="text-gray-600 transition hover:text-red-600">
                                            <span class="sr-only">Remove item</span>

                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </button>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                    </ul>

                    <div class="my-8 flex justify-end border-t border-gray-100 pt-8">
                        <div class="w-screen max-w-lg space-y-4">
                            <dl class="space-y-0.5 text-sm text-gray-700">
                                <div data-th="Subtotal" class="flex justify-between">
                                    <dt>Subtotal</dt>
                                    @if (session('cart'))
                                        <dd>{{ session('cart')->calculateTotal() }}</dd>
                                    @endif
                                </div>

                                <div class="flex justify-between">
                                    <dt>Discount</dt>
                                    <dd>--</dd>
                                </div>

                                <div class="flex justify-between !text-base font-medium">
                                    <dt>Total</dt>
                                    @if (session('cart'))
                                        <dd>{{ session('cart')->calculateTotal() }}</dd>
                                    @endif
                                </div>
                            </dl>

                            <div class="flex justify-end">
                                <span
                                    class="inline-flex items-center justify-center rounded-full bg-indigo-100 px-2.5 py-0.5 text-indigo-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="-ms-1 me-1.5 h-4 w-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z" />
                                    </svg>

                                    <p class="whitespace-nowrap text-xs">0 Discounts Applied</p>
                                </span>
                            </div>

                            <form action="/session" method="POST" class="flex items-center ">
                                <a href="{{ url('/store') }}"
                                    class="flex items-center justify-center btn me-2 bg-gray-100 hover:bg-gray-200 text-dark font-bold py-2 px-4 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-arrow-return-left me-2" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z" />
                                    </svg>
                                    Seguir comprando...
                                </a>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button
                                    class="btn btn-success flex items-center justify-center bg-green-700 hover:bg-green-800 text-white font-bold py-2 px-4 rounded"
                                    type="submit" id="checkout-live-button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-currency-exchange me-2" viewBox="0 0 16 16">
                                        <path
                                            d="M0 5a5.002 5.002 0 0 0 4.027 4.905 6.46 6.46 0 0 1 .544-2.073C3.695 7.536 3.132 6.864 3 5.91h-.5v-.426h.466V5.05c0-.046 0-.093.004-.135H2.5v-.427h.511C3.236 3.24 4.213 2.5 5.681 2.5c.316 0 .59.031.819.085v.733a3.46 3.46 0 0 0-.815-.082c-.919 0-1.538.466-1.734 1.252h1.917v.427h-1.98c-.003.046-.003.097-.003.147v.422h1.983v.427H3.93c.118.602.468 1.03 1.005 1.229a6.5 6.5 0 0 1 4.97-3.113A5.002 5.002 0 0 0 0 5zm16 5.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0zm-7.75 1.322c.069.835.746 1.485 1.964 1.562V14h.54v-.62c1.259-.086 1.996-.74 1.996-1.69 0-.865-.563-1.31-1.57-1.54l-.426-.1V8.374c.54.06.884.347.966.745h.948c-.07-.804-.779-1.433-1.914-1.502V7h-.54v.629c-1.076.103-1.808.732-1.808 1.622 0 .787.544 1.288 1.45 1.493l.358.085v1.78c-.554-.08-.92-.376-1.003-.787H8.25zm1.96-1.895c-.532-.12-.82-.364-.82-.732 0-.41.311-.719.824-.809v1.54h-.005zm.622 1.044c.645.145.943.38.943.796 0 .474-.37.8-1.02.86v-1.674l.077.018z" />
                                    </svg>
                                    <p class="">¡Ir a la pasarela de pago!</p>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(".cart_update").change(function(e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: "{{ route('update_cart') }}",
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
                    url: "{{ route('remove_from_cart', 'id') }}",
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
