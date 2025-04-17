<div>
    <div class="modal fade {{ $show ? 'show' : '' }}" id="myExampleModal"
        style="display:{{ $show ? 'block' : 'none' }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
                    <button class="close" type="button" aria-label="Close" wire:click.prevent="doClose()">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    @include($body_view)
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" wire:click.prevent="doClose()">Cancel</button>
                    <button class="btn btn-primary" type="button" wire:click.prevent="doSave()">Save</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Let's also add the backdrop / overlay here -->
    <div class="modal-backdrop fade show" id="backdrop" style="display:{{ $show ? 'block' : 'none' }}"></div>
</div>
