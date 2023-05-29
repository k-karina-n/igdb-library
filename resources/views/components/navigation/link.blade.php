@php
    $classes = Request::routeIs($route) ? 'bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded text-sm px-5 py-2.5 text-center mr-2 mb-2' : 'text-white';
@endphp

<a href="{{ route($route) }}" {{ $attributes->merge(['class' => "font-medium text-lg text-white {$classes}"]) }}>
    {{ $slot }}
</a>