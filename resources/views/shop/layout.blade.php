<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forces Gym Store</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
</head>

<body>
    {{-- NavBar Up --}}
    <nav class="bg-white border-b border-gray-300 shadow-md">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
            <a href="{{ route('inicio') }}" class="flex items-center">
                <span class="self-center text-2xl font-semibold whitespace-nowrap">Forces Gym</span>
            </a>
            <div class="flex items-center">
                <a href="tel:5541251234" class="mr-6 text-sm text-gray-500 hover:underline">+51 935 198 462</a>
                <a href="#" class="text-sm text-blue-600 hover:underline">Login</a>
            </div>
        </div>
    </nav>

    <nav class="bg-gray-50">
        <div class="max-w-screen-xl px-4 py-3 mx-auto">
            <div class="flex justify-between items-center gap-8 font-medium mt-0 mr-6 space-x-8 text-sm">
                <div class="flex">
                    <!-- DropDown filter category -->
                    <div class="relative mr-5">
                        <details class="group [&_summary::-webkit-details-marker]:hidden">
                            <summary
                                class="flex cursor-pointer items-center gap-2 border-b border-gray-400 pb-1 text-gray-900 transition hover:border-gray-600">
                                <span class="text-sm font-medium"> Categoría </span>

                                <span class="transition group-open:-rotate-180">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </span>
                            </summary>

                            <div
                                class="z-50 group-open:absolute group-open:start-0 group-open:top-auto group-open:mt-2">
                                <div class="w-96 rounded border border-gray-200 bg-white">
                                    <header class="flex items-center justify-between p-4">
                                        <span class="text-sm text-gray-700"> 0 Selected </span>

                                        <button type="button"
                                            class="text-sm text-gray-900 underline underline-offset-4">
                                            Reset
                                        </button>
                                    </header>

                                    <ul class="space-y-1 border-t border-gray-200 p-4">
                                        @foreach ($categories as $category)
                                            <li>
                                                <label for="FilterCategory{{ $category->id }}"
                                                    class="inline-flex items-center gap-2">
                                                    <input type="checkbox" id="FilterCategory{{ $category->id }}"
                                                        class="h-5 w-5 rounded border-gray-300" />

                                                    <span class="text-sm font-medium text-gray-700">
                                                        {{ $category->name }}
                                                    </span>
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </details>
                    </div>

                    <!-- DropDown filter price -->
                    <div class="relative">
                        <details class="group [&_summary::-webkit-details-marker]:hidden">
                            <summary
                                class="flex cursor-pointer items-center gap-2 border-b border-gray-400 pb-1 text-gray-900 transition hover:border-gray-600">
                                <span class="text-sm font-medium"> Price </span>

                                <span class="transition group-open:-rotate-180">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </span>
                            </summary>

                            <div
                                class="z-50 group-open:absolute group-open:start-0 group-open:top-auto group-open:mt-2">
                                <div class="w-96 rounded border border-gray-200 bg-white">
                                    <header class="flex items-center justify-between p-4">
                                        <span class="text-sm text-gray-700">
                                            The highest price is $600
                                        </span>

                                        <button type="button"
                                            class="text-sm text-gray-900 underline underline-offset-4">
                                            Reset
                                        </button>
                                    </header>

                                    <div class="border-t border-gray-200 p-4">
                                        <div class="flex justify-between gap-4">
                                            <label for="FilterPriceFrom" class="flex items-center gap-2">
                                                <span class="text-sm text-gray-600">$</span>

                                                <input type="number" id="FilterPriceFrom" placeholder="From"
                                                    class="w-full rounded-md border-gray-200 shadow-sm sm:text-sm" />
                                            </label>

                                            <label for="FilterPriceTo" class="flex items-center gap-2">
                                                <span class="text-sm text-gray-600">$</span>

                                                <input type="number" id="FilterPriceTo" placeholder="To"
                                                    class="w-full rounded-md border-gray-200 shadow-sm sm:text-sm" />
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </details>
                    </div>
                </div>

                <!-- DropDown car -->
                <div class="inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <div class="relative inline-block text-left">
                        <div>
                            <button type="button"
                                class="inline-flex w-full justify-center gap-x-1.5 rounded-md hover:bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
                                id="menu-button" aria-expanded="true" aria-haspopup="true">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="gray"
                                    class="w-6 h-6 text-white hover:text-black">
                                    <path fill-rule="evenodd"
                                        d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 004.25 22.5h15.5a1.875 1.875 0 001.865-2.071l-1.263-12a1.875 1.875 0 00-1.865-1.679H16.5V6a4.5 4.5 0 10-9 0zM12 3a3 3 0 00-3 3v.75h6V6a3 3 0 00-3-3zm-3 8.25a3 3 0 106 0v-.75a.75.75 0 011.5 0v.75a4.5 4.5 0 11-9 0v-.75a.75.75 0 011.5 0v.75z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span
                                    class="whitespace-nowrap rounded-full bg-green-400 px-2.5 py-0.5 text-sm text-green-950">
                                    {{ count((array) session('cart')->getItems()) }}
                                </span>
                            </button>
                        </div>

                        <!-- DropDown Menu -->
                        <div class="absolute right-40 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                            <div class="relative w-screen max-w-sm rounded-md border border-gray-600 bg-gray-100 px-4 py-8 sm:px-6 lg:px-8"
                                aria-modal="true" role="dialog" tabindex="-1">
                                <div class="space-y-6">
                                    <ul class="space-y-4">
                                        @if (session('cart'))
                                            @foreach (session('cart')->getItems() as $item)
                                                <li class="flex items-center gap-4">
                                                    <img src=" {{ $item->product->image_url }} " alt=""
                                                        class="h-16 w-16 rounded object-cover" />

                                                    <div>
                                                        <h3 class="text-sm text-gray-900"> {{ $item->product->name }}
                                                        </h3>

                                                        <dl class="mt-0.5 space-y-px text-[10px] text-gray-600">
                                                            <div>
                                                                <dt class="inline">Precio:</dt>
                                                                <dd class="inline"> {{ $item->price }} nuevos
                                                                    soles
                                                                </dd>
                                                            </div>
                                                        </dl>
                                                    </div>

                                                    <div class="flex flex-1 items-center justify-end gap-2">
                                                        <div>
                                                            <input type="number" min="1"
                                                                value="{{ $item->quantity }}"
                                                                class="h-8 w-12 rounded border-gray-200 bg-gray-50 p-0 text-center text-xs text-gray-600 [-moz-appearance:_textfield] focus:outline-none [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none" />
                                                        </div>

                                                        <form id="removeFromCartForm"
                                                            action="{{ route('remove_from_cart', $item->product->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit"
                                                                class="text-gray-600 transition hover:text-red-600"
                                                                id="submitButton">
                                                                <span class="sr-only">Remove item</span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor" class="h-4 w-4">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round"
                                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m-7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                                </svg>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>

                                    <div class="space-y-4 text-center">
                                        <a href="{{ route('cart') }}"
                                            class="block rounded border border-gray-600 px-5 py-3 text-sm text-gray-600 transition hover:ring-1 hover:ring-gray-400">
                                            Mirar mi carrito de compras
                                        </a>

                                        <a href="#"
                                            class="block rounded bg-gray-700 px-5 py-3 text-sm text-gray-100 transition hover:bg-gray-600">
                                            Verificar
                                        </a>

                                        <a href="#"
                                            class="inline-block text-sm text-gray-500 underline underline-offset-4 transition hover:text-gray-600">
                                            Continuar comprando...
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main class="">
        @if (session('success'))
            <div role="alert" class="rounded-xl border border-gray-100 bg-white p-4">
                <div class="flex items-start gap-4">
                    <span class="text-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </span>

                    <div class="flex-1">
                        <strong class="block font-medium text-gray-900"> Cambios guardados </strong>

                        <p class="mt-1 text-sm text-gray-700">
                            {{ session('success') }}
                        </p>
                    </div>

                    <button class="text-gray-500 transition hover:text-gray-600">
                        <span class="sr-only">Dismiss popup</span>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    <script>
        const button = document.getElementById('menu-button');
        const menu = document.querySelector('[role="menu"]');
        menu.classList.add('hidden');
        button.addEventListener('click', () => {
            menu.classList.toggle('hidden');
            menu.classList.toggle('block');
            button.setAttribute('aria-expanded', menu.classList.contains('hidden') ? 'false' : 'true');
        });
    </script>
    @yield('scripts')
</body>

</html>
