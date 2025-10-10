<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Campnova | Belajar & Tryout</title>
    <link rel="stylesheet" href="{{ asset('build/assets/app.css') }}">
    <img src="{{ asset('img/logo_campnova_blue.svg') }}" alt="logo">
    <lottie-player src="{{ asset('animations/cat-playing.json') }}"></lottie-player>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.lordicon.com/lordicon.js"></script>

</head>

<body class="overflow-hidden bg-white">
    <div class="min-h-screen font-[Inter,sans-serif] bg-white">
        {{ $slot }}
    </div>

    <script src="/js/script.js"></script>
    @stack('scripts')
</body>

</html>
