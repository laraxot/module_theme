{{-- https://getbootstrap.com/docs/4.5/components/buttons/

<button type="button" class="btn btn-primary">Primary</button>
<button type="button" class="btn btn-secondary">Secondary</button>
<button type="button" class="btn btn-success">Success</button>
<button type="button" class="btn btn-danger">Danger</button>
<button type="button" class="btn btn-warning">Warning</button>
<button type="button" class="btn btn-info">Info</button>
<button type="button" class="btn btn-light">Light</button>
<button type="button" class="btn btn-dark">Dark</button>
<button type="button" class="btn btn-link">Link</button>
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-dark text-uppercase']) }}>
    {{ $slot }}
</button> --}}
@php
/*
dddx([
    'get_class' => get_class($attributes),
    'attributes_methods' => get_class_methods($attributes),
    't' => $attributes->get('class'),
]);
*/

//dddx($attrs);
@endphp


<a {{ $attributes->merge($attrs) }} data-toggle="tooltip" title="{{ $attrs['title'] }}"
    href="{{ $attrs['url'] }}">
    {!! $attrs['icon_html'] ?? '' !!}
    {{-- $attrs['title']??$slot --}}
</a>

@push('scripts')
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endpush
