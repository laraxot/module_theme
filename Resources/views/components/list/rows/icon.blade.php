@props([
  'titleClass' => '', 
  'title', 
  'id_title', 
  'class' => 'shadow mb-4'
])

<div class="cmp-icon-list">
	@if (isset($title))
	<h2 class="title-xxlarge mt-40 mb-2 mb-lg-4 {{ $titleClass }}"
	@isset($id_title) id="{{ $id_title }}"@endif>{{ $title }}</h2>
	@endif
	<div class="link-list-wrapper @if (isset($default)) default @endif">
		<ul class="link-list {{ $classMenu ?? '' }}">
			@if (isset($rows))
        @foreach ($rows as $item)
          <li class="{{ $class }}">
            <a class="list-item icon-left t-primary title-small-semi-bold" href="#" @if (isset($aria_label)) aria-label="{{ $item->aria_label }} {{ $item->link }}"@endif @if (isset($inly_ariaLabel)) aria-label="{{ $item->only_ariaLabel }}"@endif>
            <span class="list-item-title-icon-wrapper">
              <svg class="icon icon-sm align-self-start {{ $item->class }} icon-color" aria-hidden="true">
                {{-- <use href="../assets/bootstrap-italia/dist/svg/sprites.svg#{{ $item->icon }}"></use> --}}
                <use href="{{Theme::asset('pub_theme::assets/bootstrap-italia/dist/svg/sprites.svg#'.$item->icon)}}"></use>
              </svg>
              <span class="list-item-title title-small-semi-bold {{ $item->link }}">{{ $item->link }}</span>
            </span>
            @if (isset($item->txt))
              <p class="ml-40 text-paragraph-regular-medium text-black">{{ $item->txt }}</p>
            @endif
            </a>
          </li>
        @endforeach
			@endif
		</ul>
	</div>
</div>