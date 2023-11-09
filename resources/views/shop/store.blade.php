@extends('shop.layout')

@section('content')
    <div class="flex flex-wrap">
        @foreach ($products as $product)
            <div class="w-full sm:w-1/2 md:w-1/3 p-4">
                <div
                    class="group relative block overflow-hidden w-full max-w-sm bg-slate-200 border border-gray-200 rounded-lg shadow-lg">

                    <div class="bg-white">
                        <img src="{{ asset($product->image_url) }}" alt="{{ $product->name }}"
                            class="h-64 w-auto object-cover transition duration-500 group-hover:scale-105 sm:h-72 mx-auto" />
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

                        <p class="text-gray-900 mt-1.5 mb-4"> S/. {{ $product->sale_price }}</p>

                        <a href="{{ route('add_to_cart', $product->id) }}">
                            <button
                                class="block w-full rounded bg-slate-700 text-white p-4 text-sm font-medium transition hover:scale-105">
                                Añadir al carrito
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
