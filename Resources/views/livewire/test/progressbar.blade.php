<div>
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <x-progress.bar value="{{ $perc }}" />
    <br/>
    <button wire:click="start()" class="btn btn-success">Start</button>
    @push('scripts')
    <script>
        Livewire.on('updateProgress', perc => {
            @this.start();
        });
    </script>
    @endpush
</div>