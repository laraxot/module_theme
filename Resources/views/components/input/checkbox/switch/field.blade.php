@php
Theme::add('theme::plugins/switchery/switchery.min.css');
Theme::add('theme::plugins/switchery/switchery.min.js');
@endphp
<input type="checkbox" {{ $attributes->merge($attrs)->merge(['class' => 'switchery']) }} />

@once
    @push('scripts')
        <script>
            var elems = Array.prototype.slice.call(document.querySelectorAll('.switchery'));

            elems.forEach(function(html) {
                var switchery = new Switchery(html);
            });
        </script>
    @endpush
@endonce
