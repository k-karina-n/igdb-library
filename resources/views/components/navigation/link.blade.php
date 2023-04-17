@php
    $classes = Request::routeIs($route) ? 'text-zinc-800 underline underline-offset-8' : 'text-gray-600';
@endphp

<a href="{{ route($route) }}" {{ $attributes->merge(['class' => "font-medium text-lg hover:text-zinc-800 {$classes}"]) }}>
    {{ $slot }}
</a>