@php
    //dddx(get_defined_vars());
    extract($params);
@endphp

<button 
    type="button" 
    class="btn" 
    data-toggle="popover" 
    {{-- data-trigger="click" --}}
    data-html="true"
    title="{{ $title }}"
    data-content="
        
        @foreach($actions as $action)
            @php
                //dddx($action);
            @endphp
            {!! $action->btnHtml(
            [
                'guest_notice'=>false,
                'title' => true,
                'error_label' => false,
            ]) !!}
        @endforeach
        
        {{-- Call to a member function getParents() on null
        @foreach($panel->actions() as $action)
            {!! $action->btnHtml(
            [
                'guest_notice'=>false,
                'title' => true,
                'error_label' => false,
            ]) !!}
        @endforeach
        --}}
        "
    >
    {{ $title_btn }}
</button>