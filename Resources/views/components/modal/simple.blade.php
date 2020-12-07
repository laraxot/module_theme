<!-- Modal -->
<div wire:ignore.self class="modal fade" id="{{ $guid }}" tabindex="-1" role="dialog" aria-labelledby="{{ $guid }}Label"
    aria-hidden="true">

    <div class="modal-dialog {{ isset($class) ? $class : '' }}" role="document">
        <div class="modal-content" >
            <div class="modal-header">
                <h5 class="modal-title" id="{{ $guid }}Label">{!! $title !!}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                {{ $content }}
            </div>
            <div class="modal-footer justify-content-end">
                {{ $btns }}
            </div>
        </div>
    </div>
</div>



{{--
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">× </span></button>
          <h2 class="modal-title mb-3" id="exampleModalLabel">Modal title</h2>
          <p class="text-muted"><strong>Pellentesque habitant morbi tristique</strong> senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. <em>Aenean ultricies mi vitae est.</em> Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, <code>commodo vitae</code>, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. <a href="#">Donec non enim</a> in turpis pulvinar facilisis. Ut felis.</p>
        </div>
        <div class="modal-footer justify-content-end">
          <button class="btn btn-primary" type="button">Save changes</button>
          <button class="btn btn-outline-muted" type="button" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
--}}
