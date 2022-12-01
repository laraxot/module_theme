<div class="row">
    <div class="col-6">
        name_attribute
        <x-input name="name_attribute" type="text" class="mb-3"></x-input>
        <div>
            <button wire:click="create">create</button>
        </div>


        <div style="{{ $display_create_input }}">
            @if (isset($form_data['name_attribute']))
                <div>Create Input for {{ $form_data['name_attribute'] }}</div>
                label
                <x-input name="label" type="text" class="mb-3"></x-input>
                type
                <x-input name="type" type="select" :options="$input_types" class="mb-3"></x-input>
                class
                <x-input name="class" type="text" class="mb-3"></x-input>
                id
                <x-input name="id" type="text" class="mb-3"></x-input>
                style
                <x-input name="style" type="text" class="mb-3" value=""></x-input>

                <div>
                    <button wire:click="add">add</button>
                </div>
            @endif
        </div>
    </div>
    <div class="col-6">
        form_data
        <pre>{{ print_r($form_data) }}</pre>
        form
        <pre>{{ print_r($form) }}</pre>
    </div>
</div>
