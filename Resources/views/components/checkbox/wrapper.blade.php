{{--  
    https://github.com/ascsoftw/tall-crud-generator/blob/main/resources/views/components/checkbox-wrapper.blade.php
    non e' in formx perche' non e' l'input ma un div superiore
    --}}
<div {{$attributes->merge(['class' => 'flex items-center justify-start']) }}>
    {{$slot}}
</div>