<div class="card border-0 shadow mb-6 mb-lg-0">
    <div class="card-header bg-gray-100 py-4 border-0 text-center"><a class="d-inline-block" href="#"><img
                class="d-block avatar avatar-xxl p-2 mb-2" src="{{ $attrs['img'] }}"
                alt="{{ $attrs['imgalt'] }}" /></a>
        <h5>{{ $attrs['fullname'] }}</h5>
        <p class="text-muted text-sm mb-0">{{ $attrs['location'] }}</p>
    </div>
    <div class="card-body p-4">
        <div class="d-flex align-items-center mb-3">
            <div class="icon-rounded icon-rounded-sm bg-primary-light flex-shrink-0 me-2">
                <!--+svgIcon('diploma-1', 'text-primary svg-icon-md')-->
                <svg class="svg-icon text-primary svg-icon-md">
                    <use xlink:href="#diploma-1"> </use>
                </svg>
            </div>
            <div>
                <p class="mb-0">{{ $attrs['reviewsnumber'] }} reviews</p>
            </div>
        </div>
        <div class="d-flex align-items-center mb-3">
            <div class="icon-rounded icon-rounded-sm bg-primary-light flex-shrink-0 me-2">
                <!--+svgIcon('checkmark-1', 'text-primary svg-icon-md')-->
                <svg class="svg-icon text-primary svg-icon-md">
                    <use xlink:href="#checkmark-1"> </use>
                </svg>
            </div>
            <div>
                <p class="mb-0">{{ $attrs['verificationstatus'] }}</p>
            </div>
        </div>
        <hr />
        <h6>{{ $attrs['name'] }} provided</h6>
        <ul class="card-text text-muted">
            {{ $slot }}
        </ul>
    </div>
</div>
