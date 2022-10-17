@foreach($scripts as $script)
<<<<<<< HEAD
<script src="{{ asset($script) }}?{{ rand(1,1000) }}" "></script>
@endforeach

=======
<script src="{{ asset($script) }}?{{ rand(1,1000) }}" {{-- type="text/javascript" --}}"></script>
@endforeach
{{--  
@php(debugStack())
--}}
>>>>>>> ede0df7 (first)

