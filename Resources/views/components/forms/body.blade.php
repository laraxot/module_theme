<div class="card-body">
    @foreach ($fields as $field)
        <x-input.group :field=$field>
        </x-input.group>
    @endforeach
</div>
