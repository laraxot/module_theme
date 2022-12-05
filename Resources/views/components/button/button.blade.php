@props([
    'label',
    'aria_label'
    ])
<button type="button" class="btn btn-primary">
    @if(isset($label))
        {{$label}}
    @endif
    <i class="{{ $attrs['icon'] ?? 'fa-solid fa-question' }}"></i>
</button>
{{--
https://github.com/italia/design-comuni-pagine-statiche/blob/main/src/components/button/button.hbs
--}}
