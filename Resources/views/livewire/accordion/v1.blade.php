<div>
    <div class="accordion accordion-wrapper py-4" id="accordionIconExample">
        <div class="card accordion-item icon bg-soft-primary shadow-lg">
            <div class="card-header" id="headingIconOne">
                <button class="accordion-button" wire:click="toggle()">
                    <span>
                        <i class="uil uil-plus"></i>
                    </span>Ricerca Avanzata
                </button>
            </div>
            <!--/.card-header -->
            <div id="collapseIconOne" class="accordion-collapse collapse {{ $show }}"
                aria-labelledby="headingIconOne">
                <div class="card-body bg-soft-primary pt-4" style="border-radius: 8px">
                    <form action="/it/presses" method="GET">
                        <livewire:input.arr type="elastic.filter_v3" name="filter" :value="[]"
                            label="Criteri di ricerca" modelId="0" />
                        <livewire:input.arr type="elastic.footer_filter_v3" name="filter" :value="[]"
                            label="" modelId="0" />
                        <h3>Canali</h3>
                        <span class="badge bg-pale-primary text-grape badge-lg rounded-pill mb-3">
                            <i class="uil uil-toggle-on"></i>
                            Utilizza gli interruttori per selezionare tutti i canali del gruppo
                        </span>

                        <div class="col-12">
                        <span class="badge bg-pale-primary text-grape badge-lg rounded-pill mb-3">
                            <i class="uil uil-info-circle"></i>
                            Clicca sui bottoni per selezionare i singoli canali
                        </span>
                        </div>
                        
                        <livewire:channel.choose />
                        <div class="col-12 my-5">
                            <button class="btn btn-primary col-lg-12 col-12" style="height: 51px" type="submit">Ricerca Avanzata</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>