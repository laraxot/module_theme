<div>
@php
    //Theme::add('https://previews.customer.envatousercontent.com/files/188465190/presentation-style.css');
    Theme::add('https://previews.customer.envatousercontent.com/files/188465190/jquery.sortable-1.0.0.css');

    Theme::add('https://previews.customer.envatousercontent.com/files/188465190/jquery.sortable-1.0.0.min.js');



    //Theme::add('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css');
    //Theme::add('https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.2.0/styles/github.min.css');

@endphp

    @if (session()->has('message'))
        <div class="alert alert-success" style="margin-top:30px;">x
          {{ session('message') }}
        </div>
    @endif
    <div class="dd" id="sortable-0" wire:ignore>
    <button class="dd-new-item" wire:click='test'>+</button>
    <li class="dd-item-blueprint">
        <button class="collapse" data-action="collapse" type="button" style="display: none;">–</button>
        <button class="expand" data-action="expand" type="button" style="display: none;">+</button>
        <div class="dd-handle dd3-handle">Drag</div>
        <div class="dd3-content">
        <span class="item-name">[item_name]</span>
        <div class="dd-button-container">
            <button class="item-add">+</button>
            <button class="item-remove" data-confirm-class="item-remove-confirm">&times;</button>
        </div>
        <div class="dd-edit-box" style="display: none;">
            <input type="text" name="title" autocomplete="off" placeholder="Item"
                data-placeholder="Any nice idea for the title?"
                data-default-value="Sortable List Item. {?numeric.increment}">
            <i class="end-edit">save</i>
        </div>
        </div>
    </li>
    <ol class="dd-list"></ol>
    </div>





</div>

@push('scripts')
<script>
   $(document).ready(function() {

  $('#sortable-0').sortable({
    data: '[{"title":"Hi, drag me!","customSelect":"select something...","select2ScrollPosition":{"x":0,"y":0}},{"title":"No! Wait, drag me instead!","customSelect":"http://test.com","select2ScrollPosition":{"x":0,"y":0}}]'
  }).parseJson()

    });
</script>
@endpush