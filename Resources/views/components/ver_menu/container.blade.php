{{-- 
	forse sostituirlo con 
	theme.components.lists.container 
	che dovrebbe essere più generico?
	--}}
<ul class="{{ $ul_class ?? ''}}">
	{{ $content }}
</ul>