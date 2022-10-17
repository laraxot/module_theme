@php
    //dddx(get_defined_vars());
    extract($params);
@endphp

<<<<<<< HEAD
<button
    type="button"
    class="btn"
    data-toggle="popover"
=======
<button 
    type="button" 
    class="btn" 
    data-toggle="popover" 
>>>>>>> ede0df7 (first)
    {{-- data-trigger="click" --}}
    data-html="true"
    title="{{ $title }}"
    data-content="
<<<<<<< HEAD

=======
        
>>>>>>> ede0df7 (first)
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
<<<<<<< HEAD

=======
        
>>>>>>> ede0df7 (first)
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