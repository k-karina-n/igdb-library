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

    <footer class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500">
        <div
            class="flex justify-center items-center mx-auto px-4 py-6
            text-white uppercase italic font-bold tracking-wide">
            Powered By IGDB API
        </div>
    </footer>
    @stack('scripts')
</body>

</html>
