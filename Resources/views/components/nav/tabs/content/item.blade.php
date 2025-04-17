<div class="tab-pane fade active {{ $active ? 'show' : '' }}" id="{{ $item_id }}" role="tabpanel">
    <div class="container">
        <div class="row">
            {{ $slot }}
        </div>
    </div>
</div>
