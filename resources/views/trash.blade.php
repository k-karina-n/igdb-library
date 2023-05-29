//removed navigation links
<div class="flex ml-0 lg:ml-16 space-x-8 mt-6 lg:mt-0">
    <x-navigation.link route="games">Games</x-navigation.link>
    <x-navigation.link route="reviews">Reviews</x-navigation.link>
    <x-navigation.link route="coming">Coming soon</x-navigation.link>
</div>

//logic for nav links
@php
    $classes = Request::routeIs($route) ? 'text-pink-500' : 'text-white';
@endphp

<a href="{{ route($route) }}" {{ $attributes->merge(['class' => "text-lg uppercase tracking-wide {$classes}"]) }}>
    {{ $slot }}
</a>

//button design
<button
    class="text-white bg-gradient-to-r from-purple-500 to-pink-500 
hover:bg-gradient-to-l 
focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 
font-medium rounded-lg text-sm 
px-5 py-2.5 text-center mr-2 mb-2"></button>
