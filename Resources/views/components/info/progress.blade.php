<div class="cmp-info-progress d-flex {{ $class }} @if ($data_progress) d-none @endif"
    data-progress="{{ $data_progress }}">

    @foreach ($step_list as $step)
        <!-- Desktop -->
        <div
            class="info-progress-wrapper d-none d-lg-flex w-100 px-3 flex-column justify-content-end @if ($step->completed) completed @endif @if ($step->active) step-active @endif">
            <div class="info-progress-body d-flex justify-content-between align-self-end align-items-end  w-100 py-3">
                <span class="d-block h-100 title-medium text-uppercase">{{ $step->title }}</span>

                @if ($step->completed)
                    <svg class="d-block icon icon-primary icon-sm" aria-hidden="true">
                        <use href="../assets/bootstrap-italia/dist/svg/sprites.svg#it-check"></use>
                    </svg>
                @endif

            </div>
        </div>
    @endforeach

    <!-- Mobile -->
    <div class="iscrizioni-header d-lg-none w-100">
        <h4 class="step-title d-flex align-items-center justify-content-between drop-shadow">
            <span class="d-block d-lg-inline">
                {{ $step_title }}
            </span>
            <span class="step">{{ $step_num }}/{{ $step_tot }}</span>
        </h4>
        @if ($subtitle)
            <p class="title-xsmall {{ $classSubtitle }}">{{ $subtitle }}</p>
        @endif
    </div>
</div>
