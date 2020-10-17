@php
    //dddx(get_defined_vars());
    extract($params);
@endphp

<button 
    type="button" 
    class="btn btn-sm btn-danger" 
    data-toggle="popover" 
    {{-- data-trigger="click" --}}
    data-html="true"
    title="{{ $title }}"
    data-content="
        @foreach($actions as $action)
            {!! $action->btnHtml(
            [
                'guest_notice'=>false,
                'title' => true,
                'error_label' => false,
            ]) !!}
        @endforeach
        "
    >
    {{ $content_btn }}
</button>