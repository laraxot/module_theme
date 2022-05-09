<form class="{{ $attrs['class'] }}" action="{{ $action }}">

    {{-- <div class="mb-4">
        <label class="form-label" for="{{ $id }}">Keyword</label>
        <div class="input-label-absolute input-label-absolute-right">
            <div class="label-absolute"><i class="fa fa-search"></i></div>
            <input class="form-control pe-4" type="{{ $type }}" name="{{ $name }}"
                placeholder="{{ $placeholder }}" id="{{ $id }}" />
        </div>
    </div> --}}


    <x-input.group type="text" name="search" icon="fa fa-search" />

    @php
        //dddx($_panel->optionsSelect());
        $opts = $_panel->optionsSelect();
    @endphp


    <x-input.group type="select.multiple" :options="$opts" name="category">
    </x-input.group>

    {{-- non mi sembra che i video abbiano la categoria, almeno quelli di youtube... --}}
    {{-- <x-input.group name="category1" type="select" :options="$opts" colSize="4">
    </x-input.group> --}}



</form>
