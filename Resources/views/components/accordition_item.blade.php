<div class="card border-0 shadow mb-3">
    <div id="headingOne{{ $id }}" role="tab" class="card-header bg-primary-100 border-0 py-0">
        <a data-toggle="collapse" href="#collapseOne{{ $id }}" aria-expanded="true" aria-controls="collapseOne" class="accordion-link collapsed">
            {{ $title }}
        </a>
    </div>
    <div id="collapseOne{{ $id }}" role="tabpanel" aria-labelledby="headingOne{{ $id }}" data-parent="#accordion" class="collapse show">
        <div class="card-body py-5">
            <div class="row">
                {{ $content }}
            </div>
        </div>
    </div>
</div>


