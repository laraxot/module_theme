{{ Theme::add("theme/bc/bootstrap-language/languages.css") }} {{-- css con bandierine --}}
@php

	//$row=last($params); //da qualche parte lo perdo
@endphp
<li class="nav-item dropdown">
	<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" title="lang {{ App::getLocale() }}">
		<span class="lang-sm lang-lbl" lang="{{ App::getLocale() }}"></span>
	</a>
	<div class="dropdown-menu">
		@foreach (array_keys(config('laravellocalization.supportedLocales')) as $lang)
			@if ($lang != App::getLocale())
				{{--
				<a class="dropdown-item" href="{{ Theme::url(['locale'=>$lang]) }}">
				--}}
				@if(isset($row) && is_object($row))
					@php
						$urlLang=$row->urlLang($lang);
					@endphp
					@if($urlLang!=null)
						<a class="dropdown-item" href="{{ $urlLang }}" title="lang {{ $lang }}">
						   <span class="lang-sm lang-lbl" lang="{{ $lang }}"></span>
						</a>
					@endif
				@else
				<a class="dropdown-item" href="{{ asset($lang) }}" title="lang {{ $lang }}">
					<span class="lang-sm lang-lbl" lang="{{ $lang }}"></span>
				</a>
				@endif
			@endif
		@endforeach
	</div>
</li>
