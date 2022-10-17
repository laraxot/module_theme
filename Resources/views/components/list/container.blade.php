<ul class="{{ $ul_class ?? ''}}">
    {{--
        richiamare dentro un foreach
        @component('theme::components.lists.item')
    --}}
	{{ $slot }}
</ul>