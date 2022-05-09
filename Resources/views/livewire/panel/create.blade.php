<div>
    <div class="row">
        @foreach ($fields as $field)
            {!! Theme::inputHtml(['field' => $field]) !!}
        @endforeach
    </div>
    <button class="btn btn-primary" wire:click="create">Create</button>
</div>