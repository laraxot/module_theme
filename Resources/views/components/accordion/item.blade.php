<div class="card border-0 shadow mb-3">
    <div class="card-header bg-primary-100 border-0 py-0" id="headingOne" role="tab"><a class="accordion-link collapsed"
            data-bs-toggle="collapse" href="#{{ $attrs['id'] }}_{{ $attrs['i'] }}" aria-expanded="false"
            aria-controls="{{ $attrs['id'] }}_{{ $attrs['i'] }}">{{ $attrs['title'] }}</a></div>

    <div class="collapse" id="{{ $attrs['id'] }}_{{ $attrs['i'] }}" role="tabpanel"
        aria-labelledby="headingOne" data-bs-parent="#accordion" style="">
        <div class="card-body py-5">
            <p class="text-muted">{{ $slot }}</p>
        </div>
    </div>
</div>
