<div>
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    {{$loop_index}}/{{$loop_max}}
    <x-progress.bar value="{{ $perc }}" />
    <br/>
    <button wire:click="start()" class="btn btn-success">Start</button>


    @foreach($errors as $error)
        {!! $error !!}
    @endforeach



    @push('scripts')
    <script>
        Livewire.on('updateProgress', perc => {
            @this.start();
        });
    </script>
    @endpush
</div>