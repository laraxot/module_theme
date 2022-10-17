<div class="modal fade search-modal" id="search-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content perfect-scrollbar">
            <div class="modal-body">
                <form>
                    <div class="container">
                        <div class="row variable-gutters">
                            <div class="col">
                                <div class="modal-title">
                                    <button class="search-link d-md-none" type="button" data-bs-toggle="modal"
                                        data-bs-target="#search-modal"
                                        aria-label="Chiudi e torna alla pagina precedente">
                                        <svg class="icon icon-md">
                                            <use href="../assets/bootstrap-italia/dist/svg/sprites.svg#it-arrow-left">
                                            </use>
                                        </svg>
                                    </button>
                                    <h2>Cerca</h2>
                                    <button class="search-link d-none d-md-block" type="button" data-bs-toggle="modal"
                                        data-bs-target="#search-modal"
                                        aria-label="Chiudi e torna alla pagina precedente">
                                        <svg class="icon icon-md">
                                            <use href="../assets/bootstrap-italia/dist/svg/sprites.svg#it-close-big">
                                            </use>
                                        </svg>
                                    </button>
                                </div>
                                <div class="form-group autocomplete-wrapper">
                                    <label for="autocomplete-two" class="visually-hidden">Cerca nel sito</label>
                                    <input type="search" class="autocomplete ps-5" placeholder="Cerca nel sito"
                                        id="autocomplete-two" name="autocomplete-two" data-bs-autocomplete="[]">
                                    <span class="autocomplete-icon" aria-hidden="true">
                                        <svg class="icon">
                                            <use href="../assets/bootstrap-italia/dist/svg/sprites.svg#it-search"></use>
                                        </svg>
                                    </span>
                                    <x-button>
                                        <x-slot name="label">Cerca</x-slot>
                                        <x-slot name="primary">true</x-slot>
                                    </x-button>
                                </div>
                            </div>
                        </div>
                        <div class="row variable-gutters">
                            <div class="col-lg-5">
                                <div class="searches-list-wrapper">
                                    <div class="other-link-title">FORSE STAVI CERCANDO</div>
                                    <ul class="searches-list" role="list">
                                        <li role="listitem">
                                            <a href="#">Rilascio Carta Identità Elettronica (CIE)</a>
                                        </li>
                                        <li role="listitem">
                                            <a href="#">Cambio di residenza</a>
                                        </li>
                                        <li role="listitem">
                                            <a href="#">Tributi online</a>
                                        </li>
                                        <li role="listitem">
                                            <a href="#">Prenotazione appuntamenti</a>
                                        </li>
                                        <li role="listitem">
                                            <a href="#">Rilascio tessera elettorale</a>
                                        </li>
                                        <li role="listitem">
                                            <a href="#">Voucher connettività</a>
                                        </li>
                                    </ul><!-- /searches-list -->
                                </div><!-- /searches-list-wrapper -->
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
