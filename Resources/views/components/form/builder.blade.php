{{-- {{dddx($form)}} --}}

@foreach($form as $input)
    @if($input->type != 'header')
        @if($input->type == 'text' || $input->type == 'textarea')
        <x-input.group type="{{$input->type}}"
             class="mb-0"
             name="{{$input->name}}"
             id="{{$input->name}}"
             label="{{$input->label}}">
        </x-input.group>
        @endif
        @if($input->type == 'number')
            <x-input.group type="integer"
                class="mb-0"
                name="{{$input->name}}"
                id="{{$input->name}}"
                label="{{$input->label}}">
            </x-input.group>
        @endif

        @if($input->type == 'select')

            {{-- @php

            $mapped = Arr::map($input->values, function ($value, $key) {
                //dddx([$value, $key, $value->label]);
                return [$value->label => $value->value];
            });

            dddx($mapped);

            @endphp --}}


            {{-- @php
                $opts = [];
                foreach($input->values as $value){
                    //dddx([$value, data_get($value, 'label'), data_get($value, 'value')]);
                    $opts[data_get($value, 'label')] = data_get($value, 'value');
                }
                //dddx($opts);
            @endphp

            <x-input.group type="select"
                class="mb-0"
                name="{{$input->name}}"
                id="{{$input->name}}"
                label="{{$input->label}}"
                options="['aaa' => 'aaa', 'bbb' => 'bbb']">
            </x-input.group> --}}
        @endif
    @endif
@endforeach