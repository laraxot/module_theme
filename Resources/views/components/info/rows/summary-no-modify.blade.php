@props(['header_class' => ''])
<div class="cmp-info-summary bg-white {{$attributes->class([])}}">
    <div class="card">

        @if (isset($title))
            <div
                class="card-header border-bottom border-light p-0 mb-0 {{ $header_class }} @if (isset($title)) d-flex justify-content-between @endif  @if (isset($rows)) @if (isset($rows)) d-flex justify-content-end @endif @endif ">
                <h3 class="title-large-semi-bold mb-3">{{ $title }}</h3>
            </div>
        @endif

        <div class="card-body p-0">
            @if (isset($rows))
                @foreach ($rows as $info)
                    <div class="single-line-info border-light @if (isset($info->border_unset)) border-unset @endif ">
                        @if (isset($info->name))
                            <div class="text-paragraph-small">{{ $info->name }}</div>
                        @endif
                        @if (isset($info->warning))
                            <p class="fw-semibold data-text description-alert d-flex align-items-center border-light">
                                <span class="d-flex align-items-center">
                                    <svg class="icon icon-sm icon-warning" aria-hidden="true">
                                        <use href="../assets/bootstrap-italia/dist/svg/sprites.svg#it-error"></use>
                                    </svg>
                                    {{ $info->warning_message }}
                                </span>
                            </p>
                        @else
                            <div
                                class="border-light @if (isset($summary_item_class)) border-0 @endif @if (isset($info->summary)) summary-inline @endif ">
                                @if (isset($info->description))
                                    <p class="data-text @if (isset($info->summary)) summary-inline @endif ">
                                        {{ $info->description }}
                                        @if (isset($info->summary))
                                            <strong>{{ $info->summary }}</strong>
                                        @endif
                                    </p>
                                @endif

                                @if (isset($description_image))
                                    <div class="d-lg-flex gap-2 mt-3">
                                        <div>
                                            <img src="../assets/images/image-disservizio.png" alt="Mappa"
                                                class="img-fluid w-100 mb-3 mb-lg-0">
                                        </div>
                                        <div>
                                            <img src="../assets/images/image-disservizio.png" alt="Mappa"
                                                class="img-fluid w-100 mb-3 mb-lg-0">
                                        </div>
                                        <div>
                                            <img src="../assets/images/image-disservizio.png" alt="Mappa"
                                                class="img-fluid w-100">
                                        </div>
                                    </div>
                                @endif


                                @if (isset($info->success))
                                    <p
                                        class="fw-semibold pb-2 pt-2 data-text description-success d-flex align-items-center">
                                        <span class="d-flex align-items-center">
                                            <svg class="icon icon-sm icon-success" aria-hidden="true">
                                                <use
                                                    href="../assets/bootstrap-italia/dist/svg/sprites.svg#it-check-circle">
                                                </use>
                                            </svg>
                                            {{ $info->success_message }}
                                        </span>
                                    </p>
                                @endif
                            </div>
                        @endif
                    </div>
                @endforeach
            @endif
        </div>
        <div class="card-footer p-0 @if (isset($disservizio_page)) d-none @endif  ">
            @if (isset($btn))
                <x-button>
                    <x-slot name="label">{{ $btn_label_text }}</x-slot>
                    <x-slot name="aria-label">{{ $btn_label_text }}</x-slot>
                    <x-slot name="iconBtn">it-pencil</x-slot>
                    <x-slot name="outline-primary">true</x-slot>
                    <x-slot name="class">w-100 mt-3</x-slot>
                    <x-slot name="sm">true</x-slot>
                </x-button>
            @endif
        </div>
    </div>
</div>
