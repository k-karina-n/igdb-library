<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Library</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-gray-100">
    <header class="border-b border-gray-700">
        <x-navigation.bar>
            <x-navigation.link route="books">Books</x-navigation.link>
            <x-navigation.link route="summary">Summary</x-navigation.link>
            <x-navigation.link route="coming">Coming soon</x-navigation.link>
        </x-navigation.bar>
    </header>

    <main class="py-12">
        {{ $slot }}
    </main>

    <footer class="border-t border-gray-700">
        <div class="flex justify-center items-center mx-auto px-4 py-6">
            Powered By IGDB API
        </div>
    </footer>
</body>
</html>
