<form method="POST" action="{{ $action }}">
    @csrf

    <button type="submit" {{ $attributes->merge($attrs) }}>
        {{ $slot->isEmpty() ? __('Log out') : $slot }}
    </button>
</form>
