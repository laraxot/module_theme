<div id="{{ $attrs['id'] }}" class="list-group-item list-group-item-action p-4">
    <div class="row">
        <div class="col-2 col-lg-1 align-self-lg-center py-3 d-flex align-items-lg-center z-index-10">
            <div class="form-check">
                <input class="form-check-input" id="select_message_0" type="checkbox">
                <label class="form-check-label" for="select_message_0"> </label>
            </div>
            <div class="form-star d-none d-sm-inline-block mt-n1">
                <input id="star_message_0" type="checkbox" name="star" checked="">
                <label class="star-label" for="star_message_0"><span class="sr-only">Important
                        Message</span></label>
            </div>
        </div>
        <div class="col-9 col-lg-4 align-self-center mb-3 mb-lg-0">
            <div class="d-flex align-items-center mb-1 mb-lg-3">
                <h2 class="h5 mb-0">{{ $attrs['sender'] }}</h2><img
                    class="avatar avatar-sm avatar-border-white ms-3" src="{{ $attrs['avatarpath'] }}"
                    alt="{{ $attrs['avataralt'] }}">
            </div>
            <p class="text-sm text-muted">{{ $attrs['roomsnumber'] }}</p><span
                class="badge badge-pill p-2 badge-secondary-light">{{ $attrs['receiptdate'] }}</span><a
                class="stretched-link" href="user-messages-detail.html"></a>
        </div>
        <div class="col-10 ms-auto col-lg-7">
            <div class="row">
                <div class="col-md-8 py-3">
                    <p class="text-sm mb-0">{{ $slot }}</p>
                </div>
                <div class="col-md-4 text-end py-3">
                    <p class="text-sm">{{ $attrs['receiptdate'] }}</p>
                </div><a class="stretched-link" href="user-messages-detail.html"></a>
            </div>
        </div>
    </div>
</div>
