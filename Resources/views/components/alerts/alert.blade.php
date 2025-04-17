<div role="alert" class="alert alert-{{ $type }}">
        @if ($slot->isEmpty())
         {{ $message() }}
        @else
         {{ $slot }}
        @endif
</div>

