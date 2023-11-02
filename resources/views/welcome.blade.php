<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ env('APP_NAME') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Styles and Javascript-->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .vignette::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(ellipse at center, rgba(0, 0, 0, 0.1) 0%, rgba(0, 0, 0, 0.9) 100%);
        }
    </style>
</head>

<body>
    <div class="h-full w-full relative overflow-hidden">
        <nav
            class="flex items-center justify-between bg-white bg-opacity-20 backdrop-filter backdrop-blur-lg py-4 px-8 top-0 left-0 w-full z-10 bg-gray-100 dark:bg-black">
            <div class="flex items-center">
                <span class="flex text-2xl font-bold text-white">ForcesGym</span>
            </div>
            <div class="flex items-center space-x-4">
                <a href="/store" target="_blank" class="text-white hover:text-gray-300">Tienda</a>
                <a href="/admin" class="text-white hover:text-gray-300">Iniciar Sesión</a>
            </div>
        </nav>

        <main>
            <!-- Hero -->
            <div class="relative pt-16 pb-32 flex content-center items-center justify-center" style="min-height: 95vh">
                <div class="absolute top-0 w-full h-full bg-top bg-cover"
                    style="background-image: url('https://media.discordapp.net/attachments/1095407582031663124/1132450471206977597/gym.jpg?width=894&height=671')">
                    <span id="blackOverlay" class="w-full h-full absolute opacity-75 bg-black"></span>
                </div>
                <div class="container relative mx-auto" data-aos="fade-in">
                    <div class="items-center flex flex-wrap">
                        <div class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
                            <div>
                                <h1 class="text-white font-semibold text-5xl">
                                    Siente el <span class="text-orange-500">PODER</span>
                                </h1>
                                <p class="mt-4 text-lg text-gray-300">
                                    Bienvenido/a a ForcesGym. Somos el mejor centro de fitness y entrenamiento ubicado
                                    en
                                    Pacasmayo
                                    que se enfoca en llevarte al límite absoluto
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden"
                    style="height: 70px; transform: translateZ(0px)">
                    <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg"
                        preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                        <polygon points="2560 0 2560 100 0 100"></polygon>
                    </svg>
                </div>
            </div>

            <!-- About Section -->
            <section id="about" class="relative py-20 bg-black text-white">
                <div class="container mx-auto px-4">
                    <div class="items-center flex flex-wrap">
                        <div class="w-full md:w-4/12 ml-auto mr-auto px-4" data-aos="fade-right">
                            <img alt="..." class="max-w-full rounded-lg shadow-lg"
                                src="https://images.unsplash.com/photo-1550345332-09e3ac987658?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80" />
                        </div>
                        <div class="w-full md:w-5/12 ml-auto mr-auto px-4" data-aos="fade-left">
                            <div class="md:pr-12">
                                <small class="text-orange-500">Sobre nuestro gym</small>
                                <h3 class="text-4xl uppercase font-bold">Construye tu cuerpo</h3>
                                <p class="mt-4 text-lg leading-relaxed">
                                    Nuestra mentalidad está enfocado en el crecimiento personal y el desarrollo de la
                                    fuerza física.
                                    Contamos con el mejor equipo y el mejor staff de entrenadores de todo el país.
                                </p>
                                <ul class="list-none mt-6">
                                    <li class="py-2">
                                        <div class="flex items-center">
                                            <div>
                                                <span class="font-semibold inline-block py-3 mr-3 text-orange-500"><i
                                                        class="fas fa-dumbbell fa-2x"></i></span>
                                            </div>
                                            <div>
                                                <h4 class="text-xl">
                                                    El mejor equipo de entrenamiento de Pacasmayo
                                                </h4>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="py-2">
                                        <div class="flex items-center">
                                            <div>
                                                <span class="font-semibold inline-block py-3 mr-3 text-orange-500"><i
                                                        class="fas fa-hard-hat fa-2x"></i></span>
                                            </div>
                                            <div>
                                                <h4 class="text-xl">
                                                    5-pulgadas, Piso acolchado para mejor agarre
                                                </h4>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="py-2">
                                        <div class="flex items-center">
                                            <div>
                                                <span class="font-semibold inline-block py-3 mr-3 text-orange-500"><i
                                                        class="fas fa-users fa-2x"></i></span>
                                            </div>
                                            <div>
                                                <h4 class="text-xl">Entrenadores profesionales</h4>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Trainers Section -->
            <section class="pt-20 pb-48">
                <div class="container mx-auto px-4">
                    <div class="flex flex-wrap justify-center text-center mb-24">
                        <div class="w-full lg:w-6/12 px-4">
                            <h2 class="text-4xl font-semibold uppercase">
                                Conoce nuestros entrenadores
                            </h2>
                            <p class="text-lg leading-relaxed m-4">
                                Nuestros entrenadores están aquí para dedicar el tiempo y el esfuerzo que
                                necesitas ponerte en la mejor
                            </p>
                        </div>
                    </div>
                    <!-- Trainer Card Wrapper -->
                    <div class="flex flex-wrap">
                        <!-- Card 1 -->
                        <div class="w-full md:w-4/12 lg:mb-0 mb-12 px-4" data-aos="flip-right">
                            <div class="px-6">
                                <img alt="..."
                                    src="https://images.unsplash.com/photo-1597347343908-2937e7dcc560?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80"
                                    class="shadow-lg rounded max-w-full mx-auto" style="max-width: 250px" />
                                <div class="pt-6 text-center">
                                    <h5 class="text-xl font-bold">George Namoc</h5>
                                    <p class="mt-1 text-sm text-gray-500 uppercase font-semibold">
                                        Entrenador profesional
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Card 2 -->
                        <div class="w-full md:w-4/12 lg:mb-0 mb-12 px-4" data-aos="flip-right">
                            <div class="px-6">
                                <img alt="..."
                                    src="https://images.unsplash.com/photo-1594381898411-846e7d193883?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                                    class="shadow-lg rounded max-w-full mx-auto" style="max-width: 250px" />
                                <div class="pt-6 text-center">
                                    <h5 class="text-xl font-bold">Fiorella Sotoquispe</h5>
                                    <p class="mt-1 text-sm text-gray-500 uppercase font-semibold">
                                        Culturista de Pacasmayo
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Card 3 -->
                        <div class="w-full md:w-4/12 lg:mb-0 mb-12 px-4" data-aos="flip-right">
                            <div class="px-6">
                                <img alt="..."
                                    src="https://images.unsplash.com/photo-1567013127542-490d757e51fc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80"
                                    class="shadow-lg rounded max-w-full mx-auto" style="max-width: 250px" />
                                <div class="pt-6 text-center">
                                    <h5 class="text-xl font-bold">Jhon Cerna</h5>
                                    <p class="mt-1 text-sm text-gray-500 uppercase font-semibold">
                                        Entrenador de calistenia
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <footer
            class="bg-gray-100 dark:bg-black bg-white bg-opacity-20 backdrop-filter backdrop-blur-lg py-8 px-4 bottom-0 left-0 w-full z-10">
            <div class="container mx-auto">
                <div class="flex items-center justify-between">
                    <span class="text-white">© ForcesGym &copy; {{ date('Y') }}. Todos los derechos
                        reservados.</span>
                    <div class="flex space-x-4">
                        <a href="#" class="text-white hover:text-gray-300">Acerca de</a>
                        <a href="#" class="text-white hover:text-gray-300">Contacto</a>
                        <a href="#" class="text-white hover:text-gray-300">Términos de uso</a>
                    </div>
                </div>
            </div>
        </footer>


    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"
    integrity="sha512-A7AYk1fGKX6S2SsHywmPkrnzTZHrgiVT7GcQkLGDe2ev0aWb8zejytzS8wjo7PGEXKqJOrjQ4oORtnimIRZBtw=="
    crossorigin="anonymous"></script>
<script>
    function toggleNavbar(collapseID) {
        document.getElementById(collapseID).classList.toggle("hidden");
        document.getElementById(collapseID).classList.toggle("block");
    }
    AOS.init({
        delay: 200,
        duration: 1200,
        once: false,
    });
</script>

</html>
