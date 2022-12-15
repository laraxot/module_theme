<form method="POST" action="{{ $action }}">
    @csrf
    @method($method)

    <button type="submit" {{ $class }}>
        {{ $slot }}
    </button>
</form>
