<form method="{{ $method }}" action="{{ $action }}">
    @csrf
    @method($method)
    {{ $slot }}
    <button type="submit" class="{{ $class }}" style="{{ $style }}">
        {{ $label }}
    </button>
</form>
