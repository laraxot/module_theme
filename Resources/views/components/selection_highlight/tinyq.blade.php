<div id="lipsum">
   {!! $txt !!}
</div>
@push('scripts')
    <script src="https://cdn.jsdelivr.net/gh/aruminant/tinyq@v1.0.1/dist/tinyquoter.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            window.TinyQ.init();
        });
    </script>
@endpush
