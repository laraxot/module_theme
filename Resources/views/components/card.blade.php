<div {{ $attributes->merge($attrs) }}>
    <div class="card-header" data-card-widget="collapse">
        <h3 class="card-title">{{ $title }}</h3>
        <div class="card-tools">
            @if ($collapsed)
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                </button>
                @if ($removable)
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                    </button>
                @endif
                @if ($maximizable)
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                            class="fas fa-expand"></i>
                    </button>
                @endif
            @else
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
                @if ($removable)
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                            class="fas fa-times"></i>
                    </button>
                @endif
                @if ($maximizable)
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                            class="fas fa-expand"></i>
                    </button>
                @endif
            @endif
        </div>
    </div>

    <div class="card-body">
        {{ $slot }}
    </div>

    @if ($disabled)
        <div class="overlay dark">
            <i class="fas fa-2x fa-ban"></i>
        </div>
    @endif
</div>
