@foreach($scripts as $script)
<script src="{{ asset($script) }}?{{ rand(1,1000)}}" type="text/javascript"></script>
@endforeach