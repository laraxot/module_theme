<div>
    form builder v1
    <div class="row">
        <div class="col-2">
           
            @include($view.'.left')
        </div>
        <div class="col-5">
            @include($view.'.center')
        </div>
        <div class="col-5">
            @include($view.'.right')
        </div>
    </div>
</div>
@push('scripts')
<script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
@endpush