@php
    $classes = Request::routeIs($route) ? 'text-dark' : 'text-white';
@endphp

<a href="{{ route($route) }}" {{ $attributes->merge(['class' => "font-medium text-lg hover:text-dark {$classes}"]) }}>
    {{ $slot }}
</a>