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
    <div class="btn-group" role="group" aria-label="Basic example">
        <a class="btn btn-primary" href="{{ url()->previous() }}" role="button">
            <i class="fas fa-backward"></i>
        </a>
        <button wire:click="start()" class="btn btn-success">Start</button>
    </div>
<<<<<<< HEAD
=======
    <div class="row">
        <a class="btn btn-primary" href="{{ $url }}" role="button">Torna Indietro</a>
    </div>


>>>>>>> 7e2bc92 (up)
    @foreach($errors as $error)
        {!! $error !!}
    @endforeach
    <div>{!! $message !!}</div>



    @push('scripts')
    <script>
        Livewire.on('updateProgress', perc => {
            @this.start();
        });
    </script>
    @endpush
</div>