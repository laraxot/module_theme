<div
    style="grid-area: {{ $gridArea }};{{ $show ? '' : 'display:none' }}"
    class="overflow-hidden rounded relative bg-tile col-md-3"
    {{ $refreshIntervalInSeconds ? "wire:poll.{$refreshIntervalInSeconds}s" : ''  }}
>
    <div
        class="absolute inset-0 overflow-hidden p-4"
        @if($fade)
            style="-webkit-mask-image: linear-gradient(black, black calc(100% - 1rem), transparent)"
        @endif
    >
        {{ $slot }}
    </div>
</div>
