<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Library</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-dark">
    <header class="mx-2 my-2 px-6">
        <x-bar />
    </header>

    <main class="py-6">
        {{ $slot }}
    </main>

    <footer>
        <div class="flex justify-center items-center mx-auto px-4 py-6
            uppercase italic font-bold tracking-wide text-transparent 
            bg-clip-text bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l">
            Powered By IGDB API
        </div>
    </footer>
    @stack('scripts')
</body>

</html>
