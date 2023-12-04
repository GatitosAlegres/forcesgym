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
    <nav class="bg-gradient-to-r from-neutral-950 to-neutral-900 border-b border-gray-300 shadow-md">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
            <a href="{{ route('store') }}" class="flex items-center">
                <h1 class="leading-none tracking-tight text-white text-2xl font-semibold whitespace-nowrap">
                    Forces
                    <mark class="px-2 text-white bg-green-600 rounded">Store</mark>
                </h1>
            </a>
            <div class="flex items-center">
                <!-- DropDown car -->
                <div class="inset-y-0 mt-2 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <div class="relative inline-block text-left">
                        <button type="button" id="menu-button" aria-expanded="true" aria-haspopup="true"
                            class="relative inline-flex items-center p-3 text-sm font-medium text-center text-white bg-transparent rounded-full hover:bg-green-800 focus:ring-1 focus:outline-none focus:ring-white">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white"
                                class="w-6 h-6 text-white">
                                <path fill-rule="evenodd"
                                    d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 004.25 22.5h15.5a1.875 1.875 0 001.865-2.071l-1.263-12a1.875 1.875 0 00-1.865-1.679H16.5V6a4.5 4.5 0 10-9 0zM12 3a3 3 0 00-3 3v.75h6V6a3 3 0 00-3-3zm-3 8.25a3 3 0 106 0v-.75a.75.75 0 011.5 0v.75a4.5 4.5 0 11-9 0v-.75a.75.75 0 011.5 0v.75z"
                                    clip-rule="evenodd" />
                            </svg>
                            <div
                                class="animate-bounce absolute inline-flex items-center justify-center w-6 h-6 text-xs font-extrabold text-white bg-green-400 border-2 border-stone-950 rounded-full -top-2 -end-2">
                                @if (session('cart'))
                                    {{ count((array) session('cart')->getItems()) }}
                                @else
                                    0
                                @endif
                            </div>
                        </button>

                        <!-- DropDown Menu -->
                        <div class="absolute right-40 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                            <div class="relative w-screen max-w-sm rounded-md border border-white bg-white px-4 py-8 sm:px-6 lg:px-8"
                                aria-modal="true" role="dialog" tabindex="-1">
                                <div class="my-2 text-center">
                                    <span
                                        class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded">
                                        Tus pedidos
                                    </span>
                                </div>
                                <div class="space-y-6 border-t-2 border-gray-300">
                                    <ul class="space-y-4 mt-4 divide-y divide-slate-300">
                                        @if (session('cart'))
                                            @foreach (session('cart')->getItems() as $item)
                                                <li class="flex items-center gap-4">
                                                    <img src=" {{ $item->product->image_url }} " alt=""
                                                        class="w-16 h-auto rounded object-cover" />
                                                    <div>
                                                        <h3 class="text-stone-950 text-sm font-medium">
                                                            {{ $item->product->name }}
                                                        </h3>
                                                        <dl class="text-yellow-800 text-xs font-medium py-0.5">
                                                            <div>
                                                                <dd class="inline">{{ $item->price }} PEN
                                                                </dd>
                                                            </div>
                                                        </dl>
                                                    </div>
                                                    <div class="flex flex-1 items-center justify-end gap-2">
                                                        <h3 class="text-stone-950 text-sm font-medium mx-3">
                                                            {{ $item->quantity }}
                                                        </h3>
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
                                                                    stroke="currentColor" class="h-4 w-4 mt-1">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
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
                                            class="block w-full rounded bg-gradient-to-r from-neutral-800 to-neutral-950 text-white p-4 text-sm font-medium transition hover:scale-105">
                                            Mirar mi carrito de compras
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

    <main>
        @if (session('success'))
            <div role="alert" id="alertBox" class="rounded-xl border border-gray-100 bg-white p-4 mb-[-4]">
                <div class="flex items-center p-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50"
                    role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">{{ session('success') }}</span>
                    </div>
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

        $(document).ready(function() {
            setTimeout(function() {
                $("#alertBox").fadeOut("slow", function() {
                    $(this).remove();
                });
            }, 3000);
        });
    </script>
    @yield('scripts')
</body>

</html>
