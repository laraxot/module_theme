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
                        <p>
                            <i class="uil uil-info-circle"></i>
                            Clicca sui bottoni per selezionare i singoli canali
                        </p>
                        <livewire:channel.choose />
                        <div class="col-12 my-5">
                            <button class="btn btn-primary col-lg-12 col-12" type="submit">Applica criteri</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>