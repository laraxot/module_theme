<form method="{{ $method }}" action="{{ $action }}">
    @csrf
    @method($method)
<<<<<<< HEAD
    {{ $slot }}
    <button type="submit" class="{{ $class }}" style="{{ $style }}">
        {{ $label }}
=======

    <button type="submit" {{ $attributes }}>
        {{ $slot }}
>>>>>>> 1692428a (up)
    </button>
</form>
