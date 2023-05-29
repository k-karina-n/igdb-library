<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Library</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
{{-- "text-white bg-gradient-to-r from-purple-500 to-pink-500 
hover:bg-gradient-to-l 
focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 
font-medium rounded-lg text-sm 
px-5 py-2.5 text-center mr-2 mb-2"

  bg-blue rounded-lg shadow-md --}}

<body class="bg-dark">
    <header class="mx-2 my-2 px-6 ">
        <x-navigation.bar>
            <x-navigation.link route="games">Games</x-navigation.link>
            <x-navigation.link route="reviews">Reviews</x-navigation.link>
            <x-navigation.link route="coming">Coming soon</x-navigation.link>
            <button
                class=" relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-white rounded-lg group bg-gradient-to-br from-purple-500 to-pink-500 group-hover:from-purple-500 group-hover:to-pink-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800">
                <span
                    class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-dark dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                    Purple to pink
                </span>
            </button>

            <a href="#" class="btn-outline">Check more</a>
        </x-navigation.bar>
    </header>

    <main class="py-6">
        {{ $slot }}
    </main>

    <footer class="bg-gradient-to-r from-purple-500 to-pink-500">
        <div class="flex justify-center items-center text-white mx-auto px-4 py-6">
            Powered By IGDB API
        </div>
    </footer>
    @stack('scripts')
</body>

</html>
