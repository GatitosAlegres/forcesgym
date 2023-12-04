@extends('shop.layout')

@section('content')
    <div class="flex items-center justify-center my-5">
        <div class="grid grid-cols-3 gap-4">
            @foreach ($products as $product)
                <div class="col-span-1">
                    <div
                        class="group relative block overflow-hidden w-full max-w-sm bg-gradient-to-r from-stone-50 to-stone-200 border border-gray-200 rounded-lg shadow-lg">

                        <div class="bg-white">
                            <img src="{{ asset($product->image_url) }}" alt="{{ $product->name }}"
                                class="h-auto w-auto object-cover transition duration-500 group-hover:scale-105 sm:h-72 mx-auto" />
                        </div>

                        <div class="relative p-6">
                            <div class="mt-3 flex justify-between text-sm">
                                <div>
                                    <h5 class="text-xl font-semibold tracking-tight text-gray-900">
                                        {{ $product->name }}
                                    </h5>

                                    <p class="mt-1.5 max-w-[45ch] text-xs text-gray-500">
                                        {{ $product->description }}
                                    </p>
                                </div>
                            </div>

                            <p class="text-gray-900 mt-1.5 mb-4">{{ $product->sale_price }} PEN</p>

                            <a href="{{ route('add_to_cart', $product->id) }}">
                                <button
                                    class="block w-full rounded bg-gradient-to-r from-neutral-800 to-neutral-950 text-white p-4 text-sm font-medium transition hover:scale-105">
                                    Añadir al carrito
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
