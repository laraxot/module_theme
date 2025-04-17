<div>
    <p>{!! $items[$i]['txt'] ?? '' !!}</p>
    <button class="btn btn-circle btn-soft-primary btn-sm mx-2 mx-md-0"
        onClick="loadFrame({{ $press_id }},{{ $items[$i]['start'] }})" wire:click="prev()"
        {{ $i <= 0 ? 'disabled' : '' }}><i class="uil uil-angle-left-b"></i></button>
    <span class="badge badge-lg bg-primary rounded-pill">
        Citazioni
        <span class="badge badge-lg bg-pale-grape text-grape rounded-pill">{{ $i + 1 }}/{{ count($items) }}</span>
    </span>
    <button class="btn btn-circle btn-soft-primary btn-sm mx-2 mx-md-0"
        onClick="loadFrame({{ $press_id }},{{ $items[$i]['start'] }})" wire:click="next()"
        {{ $i >= count($items) - 1 ? 'disabled' : '' }}><i class="uil uil-angle-right-b"></i></button>
        
        @pushOnce('scripts')
            <script>
                function loadFrame(press_id, start) {
                    console.log(press_id, start);

                    let csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;

                    let url = '/api/get-press-at-time';

                    $.ajax({
                        url: url,
                        type: 'GET',
                        data: {
                            _token: csrfToken,
                            press_id: press_id,
                            start: start

                        },
                        success: function(response) {
                            console.log('#press_' + response.press_id, '/' + response.base64);
                            $('#press_' + response.press_id).attr('src', 'data:image/png;base64, ' + response.base64);
                        }
                    });
                }
            </script>
        @endPushOnce

        @push('scripts')
            <script>
                $(function() {
                    loadFrame({{ $press_id }}, {{ $items[0]['start'] }});
                });
            </script>
        @endpush
</div>
