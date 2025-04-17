<div class="row">
    <div class="col-4">
        name_attribute
        <x-input name="name_attribute" type="text" class="mb-3"></x-input>
        <div>
            <button wire:click="create">create</button>
        </div>


        <div style="{{ $display_create_input }}">
            @if (isset($form_data['name_attribute']))
                <div>Create Input for {{ $form_data['name_attribute'] }}</div>
                <div>
                    label
                    <x-input name="label" type="text" class="mb-3"></x-input>
                </div>
                <div>
                    type
                    <x-input name="type" type="select" :options="$input_types" class="mb-3"></x-input>
                </div>


                {{-- @if (isset($form_data['type']) && $form_data['type'] == 'select')
                    <div>
                        options qui
                        <div class="col-8">
                            value
                            <x-input name="value" type="text" class="mb-3"></x-input>
                        </div>
                        <div class="col-8">
                            value_label
                            <x-input name="value_label" type="text" class="mb-3"></x-input>
                        </div>
                        <button wire:click="addOption('{{ $form_data['name_attribute'] }}')">add option</button>
                    </div>
                @endif --}}

                <div>
                    class
                    <x-input name="class" type="text" class="mb-3"></x-input>
                </div>
                <div>
                    id
                    <x-input name="id" type="text" class="mb-3"></x-input>
                </div>
                <div>
                    style
                    <x-input name="style" type="text" class="mb-3" value=""></x-input>
                </div>
                <div>
                    <button wire:click="add">add</button>
                </div>
            @endif
        </div>
    </div>
    <div class="col-4">
        form_data
        <pre>{{ print_r($form_data) }}</pre>
        form
        <pre>{{ print_r($form) }}</pre>
    </div>
    <div class="col-4">
        @foreach ($form as $key => $values)
            <div>{{ $key }}</div>
            @foreach ($values as $value)
                @if (isset($value['type']))
                    <label for="{{ $value['label'] }}">{{ $value['label'] }}</label>
                    <x-input type="{{ $value['type'] }}" name="{{ $value['label'] }}" class="{{ $value['class'] }}"
                        id="{{ $value['id'] }}" style="{{ $value['style'] }}"></x-input>
                @endif
            @endforeach
        @endforeach
    </div>
</div>
