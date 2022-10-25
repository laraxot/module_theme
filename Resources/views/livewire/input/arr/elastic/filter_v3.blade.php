<div>

    <h3>Criteri di ricerca <a href="#" wire:click="addArr()" class="btn btn-circle btn-primary btn-sm"><i
                class="uil uil-plus"></i></a>
    </h3>

    @foreach ($form_data[$name] ?? [] as $k => $v)
        @php
            $input_name = '' . $name . '[' . $k . ']';
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
            <x-input type="date.time.range" label="test" name="rows.{{ $model_id }}.date"></x-input>
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
    <p><i class="uil uil-info-circle"></i> Clicca sui bottoni per selezionare i singoli
        canali</p>
    <div class="row">
        <div class="form-select-wrapper mb-4 col-md-3 col-sm-6">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                <a href="#" class="btn btn-outline-primary btn-sm rounded-pill" data-bs-toggle="modal"
                    data-bs-target="#modal-02">TV Nazionali</a>
                <div class="modal" id="modal-02" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content text-center">
                            <div class="modal-body">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                                <h4>Clicca sui singoli canali per disabilitarli o abilitarli
                                </h4>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-4 py-8">
                                            <a href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Rai1"><img
                                                    src="{{ Theme::asset('pub_theme::img/canali/Rai1Logo.svg.png') }}"
                                                    height="50" width="65"></a>
                                        </div>
                                        <div class="col-4 py-8">
                                            <a href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Rai2"><img
                                                    src="{{ Theme::asset('pub_theme::img/canali/Rai2Logo.svg.png') }}"
                                                    height="50" width="65"></a>
                                        </div>
                                        <div class="col-4 py-8">
                                            <img src="{{ Theme::asset('pub_theme::img/canali/Rai3Logo.svg.png') }}"
                                                height="50" width="65">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 py-8">
                                            <img src="{{ Theme::asset('pub_theme::img/canali/Rete4Logo.svg.png') }}"
                                                height="50" width="50">
                                        </div>
                                        <div class="col-4 py-8">
                                            <img src="{{ Theme::asset('pub_theme::img/canali/Canale5Logo.svg.png') }}"
                                                height="50" width="50">
                                        </div>
                                        <div class="col-4 py-8">
                                            <img src="{{ Theme::asset('pub_theme::img/canali/Italia1Logo.svg.png') }}"
                                                height="50" width="50">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 py-8">
                                            <img src="{{ Theme::asset('pub_theme::img/canali/LA7Logo.png') }}"
                                                height="50" width="60">
                                        </div>
                                        <div class="col-4 py-8">
                                            <img src="{{ Theme::asset('pub_theme::img/canali/TV8Logo.svg.png') }}"
                                                height="50" width="40">
                                        </div>
                                        <div class="col-4 py-8">
                                            <img src="{{ Theme::asset('pub_theme::img/canali/NoveLogo.svg.png') }}"
                                                height="50" width="50">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/.modal-content -->
                        </div>
                        <!--/.modal-body -->
                    </div>
                    <!--/.modal-dialog -->
                </div>
                <!--/.modal -->
            </div>
        </div>
        <div class="form-select-wrapper mb-4 col-md-3 col-sm-6">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked2" checked>
                <a href="#" class="btn btn-outline-primary btn-sm  rounded-pill">TV
                    Regionali</a>
            </div>
        </div>
        <div class="form-select-wrapper mb-4 col-md-3 col-sm-6">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked3" checked>
                <a href="#" class="btn btn-outline-primary btn-sm  rounded-pill">Radio
                    Nazionali</a>
            </div>
        </div>
        <div class="form-select-wrapper mb-4 col-md-3 col-sm-6">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked4" checked>
                <a href="#" class="btn btn-outline-primary btn-sm  rounded-pill">Internazionali</a>
            </div>
        </div>
    </div>
    <div class="col-12 my-5">
        <button class="btn btn-primary align-content-center col-lg-12 col-12">Cerca</button>
    </div>
</div>
