<!DOCTYPE html>
<html class="scroll-smooth h-full bg-white" lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Campnova - Raih Kampus Idamanmu</title>
    <link rel="icon" href="{{ Vite::asset('resources/img/logo_campnova_blue_f.png') }}" type="image/png">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-white text-gray-900">
    <nav class="sticky top-0 z-[100] w-full border-b border-gray-100 bg-white/95 backdrop-blur-sm">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="flex shrink-0 items-center space-x-4">
                    <div class="flex items-center" href="/">
                        <img class="block h-8 w-auto cursor-pointer" decoding="async" height="35" loading="lazy"
                            src="{{ asset('img/logo_campnova_blue.svg') }}" width="35" />
                    </div>
                    <span class="text-3xl font-bold text-black select-none sm:font-semibold">
                        Campnova
                    </span>
                </div>
                <div class="flex items-center ml-auto mr-4 space-x-2 sm:space-x-1">
                    <a class="rounded-md border border-gray-300 px-3 py-1.5 text-xs font-medium text-gray-700 hover:bg-gray-100"
                        href="/login">
                        Masuk
                    </a>
                    <a class="rounded-md bg-[#5daac7] hover:bg-[#4b8fae] text-white px-3 py-1.5 text-xs font-medium focus:outline-none"
                        href="/register">
                        Daftar
                    </a>
                </div>
                <div class="flex items-center sm:hidden">
                    <button aria-expanded="false" aria-label="Open main menu"
                        class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 focus:outline-none"
                        id="mobile-menu-button" type="button">
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <main class="relative overflow-hidden bg-white px-4 py-6 sm:px-6 sm:py-20 lg:py-24">
        <div aria-hidden="true" class="absolute inset-0 overflow-hidden">
            <svg class="absolute left-0 top-0 h-full w-full opacity-5" height="100%" width="100%"
                xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern height="20" id="small-grid" patternUnits="userSpaceOnUse" width="20">
                        <path d="M 20 0 L 0 0 0 20" fill="none" stroke="currentColor" stroke-width="0.5"></path>
                    </pattern>
                    <pattern height="100" id="grid" patternUnits="userSpaceOnUse" width="100">
                        <rect fill="url(#small-grid)" height="100" width="100"></rect>
                        <path d="M 100 0 L 0 0 0 100" fill="none" stroke="currentColor" stroke-width="1"></path>
                    </pattern>
                </defs>
                <rect fill="url(#grid)" height="100%" width="100%"></rect>
            </svg>
            <div class="absolute -left-20 -top-20 h-64 w-64 rounded-full bg-[#F2FAFD]"></div>
            <div class="absolute bottom-0 right-0 hidden h-96 w-96 rounded-full bg-[#F2FAFD] md:block"></div>
        </div>

        <div class="container relative mx-auto max-w-screen-xl">
            <div
                class="flex min-h-[calc(100vh-64px)] flex-col items-center justify-center gap-8 md:min-h-0 md:flex-row md:items-center md:gap-8 lg:gap-16">
                <div class="w-full md:order-2 md:w-5/12 md:max-w-md lg:w-1/2">
                    <div class="relative mx-auto overflow-hidden rounded-2xl md:aspect-auto">
                        <div class="relative overflow-hidden">
                            <lottie-player src="{{ asset('animations/cat-playing.json') }}" background="transparent"
                                speed="1" style="width: 100%; height: auto;" loop autoplay>
                            </lottie-player>
                        </div>
                    </div>
                </div>

                <div class="w-full md:order-1 md:w-7/12 lg:w-1/2">
                    <div class="mx-auto max-w-lg md:mx-0">
                        <h1 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl md:text-5xl lg:text-6xl">
                            Raih Kampus Idamanmu <br class="block sm:hidden" />
                            <span class="whitespace-nowrap">
                                Bersama
                                <span class="relative text-[#5daac7]">
                                    Campnova
                                    <svg aria-hidden="true"
                                        class="absolute left-0 top-full mt-1 h-[0.4em] w-full fill-[#5daac7]"
                                        preserveAspectRatio="none" viewBox="0 0 418 42">
                                        <path
                                            d="M203.371.916c-26.013-2.078-76.686 1.963-124.73 9.946L67.3 12.749C35.421 18.062 18.2 21.766 6.004 25.934 1.244 27.561.828 27.778.874 28.61c.07 1.214.828 1.121 9.595-1.176 9.072-2.377 17.15-3.92 39.246-7.496C123.565 7.986 157.869 4.492 195.942 5.046c7.461.108 19.25 1.696 19.17 2.582-.107 1.183-7.874 4.31-25.75 10.366-21.992 7.45-35.43 12.534-36.701 13.884-2.173 2.308-.202 4.407 4.442 4.734 2.654.187 3.263.157 15.593-.78 35.401-2.686 57.944-3.488 88.365-3.143 46.327.526 75.721 2.23 130.788 7.584 19.787 1.924 20.814 1.98 24.557 1.332l.066-.011c1.201-.203 1.53-1.825.399-2.335-2.911-1.31-4.893-1.604-22.048-3.261-57.509-5.556-87.871-7.36-132.059-7.842-23.239-.254-33.617-.116-50.627.674-11.629.54-42.371 2.494-46.696 2.967-2.359.259 8.133-3.625 26.504-9.81 23.239-7.825 27.934-10.149 28.304-14.005.417-4.348-3.529-6-16.878-7.066Z">
                                        </path>
                                    </svg>
                                </span>
                            </span>
                        </h1>
                        <p class="mt-3 text-base text-gray-600 md:mt-6 md:text-lg">
                            Taklukan UTBK SNBT 2025 dengan persiapan terbaik bersama Campnova.
                        </p>
                        <div class="mt-6 flex flex-col gap-4 sm:flex-row md:mt-10 md:gap-6">
                            <a aria-label="Register for a new account"
                                class="flex w-full items-center justify-center rounded-xl bg-[#5daac7] hover:bg-[#4b8fae] px-5 py-3.5 text-base font-semibold text-white shadow-sm transition-all duration-300 hover:shadow-md focus:outline-none sm:w-auto md:px-8 md:py-5 md:text-lg"
                                href="/register" role="button">
                                Mulai Try Out
                            </a>
                            <a aria-label="Login to your account"
                                class="flex w-full items-center justify-center rounded-xl border-2 border-[#5daac7] bg-white px-5 py-3.5 text-base font-semibold text-[#5daac7] transition-all duration-300 hover:bg-[#F2FAFD] focus:outline-none sm:w-auto md:px-8 md:py-5 md:text-lg"
                                href="/login" role="button">
                                Sudah Punya Akun
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <x-footer></x-footer>
</body>

</html>
