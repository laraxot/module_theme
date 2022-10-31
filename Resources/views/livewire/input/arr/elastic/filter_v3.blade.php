<div>

    <h3>Criteri di ricerca <a href="#" wire:click="addArr()" class="btn btn-circle btn-primary btn-sm"><i
                class="uil uil-plus"></i></a>
    </h3>

    @foreach ($form_data[$name] ?? [] as $k => $v)
        @php
            $input_name = $name . '[' . $k . ']';
            $wire_name = 'form_data.' . $name . '.' . $k;
        @endphp

        <div class="form-select-wrapper mb-4">
            <select class="form-select" name="{{ $input_name }}[criteria]"
                wire:model.lazy="{{ $wire_name }}.criteria">
                <option value="query_string_query" selected>Query diretta:</option>
                <option value="must">Deve contenere:</option>
                <option value="mustNot">Non deve contenere:</option>
                <option value="should">Potrebbe conterere (or):</option>
                <option value="regexp">Inizia con:</option>
            </select>
        </div>
        <div class="form-floating mb-4">
            <input type="text" class="form-control" name="{{ $input_name }}[q]"
                wire:model.lazy="{{ $wire_name }}.q" />
            @if (isset($form_data[$name][$k]['criteria']) && $form_data[$name][$k]['criteria'] != 'query_string_query')
                <div class="input-group-text">
                    <input class="form-check-input mt-0" type="checkbox" name="{{ $input_name }}[fuzzy]"
                        wire:model.lazy="{{ $wire_name }}.fuzzy"
                        aria-label="Checkbox for following text input" />&nbsp;Parola Simile
                </div>
            @endif
        </div>
    @endforeach

    <div class="row">
        <div class="form-select-wrapper mb-4 col-md-4">
            <h3>Ordine di ricerca</h3>
            <select class="form-control" name="sort" wire:model.lazy="form_data.rows.{{ $model_id }}.sort">
                <option value="desc">Discendente</option>
                <option value="asc">Ascendente</option>
            </select>
        </div>
        <div class="form-select-wrapper mb-4 col-md-4">
            <h3>Calendario</h3>
            <x-input class="quellochevuoi" type="date.datetime.range" label="test" name="rows.{{ $model_id }}.date"></x-input>
        </div>
        <div class="form-select-wrapper mb-4 col-md-4">
            <h3>Genere di fonti</h3>
            <select class="form-select" aria-label="Default select example">
                <option selected>Audio e video</option>
                <option value="1">Video</option>
                <option value="2">Audio</option>
            </select>
        </div>
    </div>
    <h3>Canali</h3>
    <p>
        <i class="uil uil-info-circle"></i>
        Clicca sui bottoni per selezionare i singoli canali
    </p>
        <livewire:channel.choose />

        {{--
    <div class="col-12 my-5">
        <button class="btn btn-primary align-content-center col-lg-12 col-12">Cerca</button>
    </div>
    --}}
</div>

{{-- dddx($profile->channels()->take(1)->get()) --}}

@push('scripts')
    <script>
        function addTilde(element) {
            const el = $('[name="' + element + '"]').not('#search_search')
            $(el).val($(el).val() + '~')
        }
    </script>
@endpush
