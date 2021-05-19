<div class="col-sm-12 col-lg-12 mb-12 hover-animate">
    <div class="card h-60 border-0 shadow">
        <div class="card-body">
            <h5 class="card-title">{{ $title }}</h5>
            @if(isset($subtitle))
                <p class="text-sm text-muted mb-3"> 
                    {{ $subtitle }}
                </p>
            @endif
            <p class="flex-shrink-1 mb-0 card-stars text-xs text-right">
                


                {{ $content }}

                

            </p>
        </div>
    </div>
</div>
