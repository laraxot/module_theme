<div>
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <h1>{{$title}}</h1>
    <div>
    {{$loop_index}}/{{$loop_max}}
    </div>
    <x-progress.bar value="{{ $perc }}" />
    <br/>
    <div class="row mb-3">
        <button wire:click="start()" class="btn btn-success">Start</button>
    </div>
    <div class="row">
        <a class="btn btn-primary" href="{{ url()->previous() }}" role="button">Torna Indietro</a>
    </div>


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