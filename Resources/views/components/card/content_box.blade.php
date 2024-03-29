@props([
	'bg_grey'=>false,
	'title',
	'header_m0',
	'h2_class',
	'subtitle',
	'select' => true,
	'margin_class',
	'required_icon' => false,
	])

<div {{ $attributes->class(["cmp-card"]) }} >
	<div
		class="card {{ $bg_grey ? 'has-bkg-grey shadow-sm' : '' }} {{ isset($bg_grey_primary) ? 'has-bkg-primary-grey' : '' }}  {{ isset($contacts) ? 'contacts has-bkg-grey' : '' }}  {{ $class??'' }}">
		@if (isset($title))
		<div {{ $header->attributes->class(['card-header border-0 p-0 mb-lg-30']) }}>
			<div class="d-flex">

				@if (isset($title))
					{{--
                    @if (isset($h3_title))
                        <h3 class="subtitle-large {{ $h3_class }} @if (isset($required_icon)) icon-required @endif "
                    @if (isset($id_title)) id="{{ $id_title }}" @endif>{{ $title }}
                        </h3>
                    @else
                        <h2 class="title-xxlarge {{ $h2_class ?? ''}}  @if (isset($required_icon)) icon-required @endif "
                        @if (isset($id_title)) id="{{ $id_title }}" @endif>{{ $title }}
                            </h2>
                    @endif
					--}}
					<h2 {{ $title->attributes->class([]) }} {{ $required_icon?'icon-required':''  }}>{{$title}}</h2>
				@endif
			</div>
			@if (isset($second_title))
			    {{-- <h3 class="subtitle-medium cmp-card__second-title {{ $secondTitle_class }}">{{ $second_title }}</h3> --}}
				<h3 {{ $subtitle->attributes->class(['subtitle-medium cmp-card__second-title']) }}>{{ $second_title }}</h3>
			@endif

			@if (isset($subtitle))
				<p {{ $subtitle->attributes->class(['subtitle-small mb-0']) }}>{{ $subtitle }}</p>
			@endif

			@if (isset($toggle))
                <x-toggle>
                    <x-slot name="label">C'è un coobbligato</x-slot>
                </x-toggle>
			@endif
			@if (isset($select))
                {{-- <x-select :options="$_theme->getSelectOptionList()"> --}}
				{{-- <x-input type="address.google" name="address">
                    <x-slot name="id">select-id</x-slot>
                    <x-slot name="no-bg">true</x-slot>
                    <x-slot name="class">classSelect</x-slot>
                    <x-slot name="label_text">labelSelect</x-slot>
                </x-input> --}}
				{{-- {{>partials/select/select id=select-id no-bg=true class=classSelect label-text=labelSelect}} --}}
			@endif
		</div>
		@endif
		<div class="card-body p-0">
			{!! $slot !!}
		</div>
	</div>
</div>