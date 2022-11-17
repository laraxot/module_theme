<div>
    <div class="accordion accordion-wrapper py-4" id="accordionIconExample">
        <div class="card accordion-item icon">
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
                <div class="card-body">
                    <form action="/it/presses" method="GET">
                        <livewire:input.arr type="elastic.filter_v3" name="filter" :value="[]"
                            label="Ricerca Avanzata" modelId="0" />
                        <livewire:input.arr type="elastic.footer_filter_v3" name="filter" :value="[]"
                            label="" modelId="0" />
                        <h3>Canali</h3>
                        <span class="badge bg-soft-primary text-grape badge-lg rounded-pill mb-3">
                            <i class="uil uil-toggle-on"></i>
                            Utilizza i toggle per selezionare i gruppi dei canali
                        </span>

                        <div class="col-12">
                        <span class="badge bg-soft-primary text-grape badge-lg rounded-pill mb-3">
                            <i class="uil uil-info-circle"></i>
                            Clicca sui bottoni per selezionare i singoli canali
                        </span>
                        </div>
                        
                        <livewire:channel.choose />
                        <div class="col-12 my-5">
                            <button class="btn btn-primary col-lg-12 col-12" type="submit">Ricerca Avanzata</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>