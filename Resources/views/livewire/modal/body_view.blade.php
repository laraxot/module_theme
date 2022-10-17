<div>
    <div class="modal fade {{ $show ? 'show' : '' }}" id="myExampleModal"
        style="display:{{ $show ? 'block' : 'none' }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title">{{ $title }}
                        @if (isset($subtitle))
                            <br>
                            <small>{{ $subtitle }}</small>
                        @endif
                    </h4>
                    {{-- <button class="close" type="button" aria-label="Close" wire:click.prevent="doClose()">
                        <span aria-hidden="true">×</span>
                    </button> --}}
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click.prevent="doClose()"></button>
                </div>
                <div class="modal-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    
                    
                    @include($body_view)
                    
                </div>

            </div>
        </div>
    </div>
    <!-- Let's also add the backdrop / overlay here -->
    <div class="modal-backdrop fade show" id="backdrop" style="display:{{ $show ? 'block' : 'none' }}"></div>
</div>
