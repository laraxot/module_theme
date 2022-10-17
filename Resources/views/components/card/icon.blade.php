@props(['shadow_card' => false, 'header_m0' => false, 'title', 'no_h_title' => true])
<div class="cmp-icon-card mb-3">
    <div
        class="card {{ $card_class ?? '' }} @if(isset($shadow_card)) drop-shadow @endif @if(isset($notice_card)) notice-border px-3 py-1 @endif ">
        <div class="cmp-card-title d-flex">
            <svg class="icon icon-sm me-2 {{ $icon_color??'' }}" aria-hidden="true">
                <use href="../assets/bootstrap-italia/dist/svg/sprites.svg#{{ $icon ?? '' }}"></use>
            </svg>
            @if (isset($title))
                @if ($no_h_title)
                    <div class="{{ $title->attributes->class([]) }}">
                        <a href="#">{{ $title }}</a>
                    </div>
                @else
                    <h3 class="{{ $title->attributes->class([]) }}">
                        <a href="#">{{ $title }}</a>
                    </h3>
                @endif
            @endif
        </div>
        <div class="cmp-icon-card__description">
            @if (isset($txt))
                <p class="subtitle-small">{{ $txt }}</p>
            @endif
            @if (isset($date))
                <date class="date-xsmall ml-30">{{ $date }}</date>
            @endif
        </div>
    </div>
</div>
