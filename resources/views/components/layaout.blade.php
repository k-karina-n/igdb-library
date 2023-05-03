<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Library</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-dark">
    <header class="mx-2 my-2 px-6 bg-blue rounded-lg shadow-md">
        <x-navigation.bar>
            <x-navigation.link route="games">Games</x-navigation.link>
            <x-navigation.link route="reviews">Reviews</x-navigation.link>
            <x-navigation.link route="coming">Coming soon</x-navigation.link>
        </x-navigation.bar>
    </header>

    <main class="py-6">
        {{ $slot }}
    </main>

    <footer class="bg-blue">
        <div class="flex justify-center items-center text-white mx-auto px-4 py-6">
            Powered By IGDB API
        </div>
    </footer>
    @stack('scripts')
</body>

</html>
