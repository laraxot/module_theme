{{-- proprietà:
data-style:
selectpicker
primary
secondary
<<<<<<< HEAD
muted
=======
muted 
>>>>>>> ede0df7 (first)

options:
[value,
text] --}}

<div id="{{ $id }}">

    <div class="dropdown bootstrap-select mb-3 dropup"><select class="selectpicker mb-3" name="sort" id="form_sort"
            data-style="btn-{{ $datastyle }}" title="" tabindex="null">

            @foreach ($options as $prop)
                <option value="{{ $prop['value'] }}">{{ $prop['text'] }}</option>
            @endforeach

            {{-- <option value="sortBy_1">Recommended </option>
                <option value="sortBy_2">Newest </option>
                <option value="sortBy_3">Oldest </option>
                <option value="sortBy_4">Closest </option> --}}
        </select>
        @if (isset($option[0]))
            <button type="button" tabindex="-1" class="btn dropdown-toggle btn-selectpicker" data-bs-toggle="dropdown"
                role="combobox" aria-owns="bs-select-1" aria-haspopup="listbox" aria-expanded="false"
                title="Most popular" data-id="form_sort">
                <div class="filter-option">
                    <div class="filter-option-inner">
                        <div class="filter-option-inner-inner">{{ $options[0]['text'] }}</div>
                    </div>
                </div>
            </button>
        @endif
        <div class="dropdown-menu" style="max-height: 260.4px; overflow: hidden; min-height: 151px;">
            <div class="inner show" role="listbox" id="bs-select-1" tabindex="-1"
                style="max-height: 244.4px; overflow-y: auto; min-height: 135px;" aria-activedescendant="bs-select-1-0">
                <ul class="dropdown-menu inner show" role="presentation" style="margin-top: 0px; margin-bottom: 0px;">
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($options as $prop)
                        <li class="selected active"><a role="option" class="dropdown-item active selected"
                                id="bs-select-1-{{ $i }}" tabindex="0" aria-setsize="5"
                                aria-posinset="{{ $i }}" aria-selected="true"><span
                                    class="text">{{ $prop['text'] }}</span></a>
                        </li>
                        @php
                            $i++;
                        @endphp
                    @endforeach
                    {{-- <li><a role="option" class="dropdown-item" id="bs-select-1-1" tabindex="0" aria-setsize="5"
                                aria-posinset="2"><span class="text">Recommended </span></a></li>
                        <li><a role="option" class="dropdown-item" id="bs-select-1-2" tabindex="0" aria-setsize="5"
                                aria-posinset="3"><span class="text">Newest </span></a></li>
                        <li><a role="option" class="dropdown-item" id="bs-select-1-3" tabindex="0"><span
                                    class="text">Oldest </span></a></li>
                        <li><a role="option" class="dropdown-item" id="bs-select-1-4" tabindex="0"><span
                                    class="text">Closest </span></a></li> --}}
                </ul>
            </div>
        </div>
    </div>

</div>
