<div class="flex items-center space-x-2">
    <div id="{{ $id }}" class="w-14 h-14 rounded-full relative text-md">
        @push('scripts')
            @include('rating', [
                'id' => "#{$id}",
                'rating' => $rating,
            ])
        @endpush
    </div>
    <div class="text-xs text-white">{{ $score }}<br> Score</div>
</div>
