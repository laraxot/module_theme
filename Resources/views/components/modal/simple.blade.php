<!-- Modal -->
<div wire:ignore.self class="modal fade" id="{{ $guid }}" tabindex="-1" role="dialog" aria-labelledby="{{ $guid }}Label" aria-hidden="true">
    <div class="modal-dialog @if(isset($class)){{ $class }}@endif" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="{{ $guid }}Label">{{ $title }}</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click.prevent="cancel()">
                   <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                {{ $content }}
            </div>
            <div class="modal-footer">
                {{ $btns }}
            </div>
        </div>
    </div>
</div>
