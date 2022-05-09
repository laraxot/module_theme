<?php

declare(strict_types=1);

namespace Modules\Theme\Models\Panels\Actions;

//-------- services --------
use Modules\Xot\Models\Panels\Actions\XotBasePanelAction;

/**
 * MenuBuilderAction.
 *
 * utilizza il pacchetto harimayco/laravel-menu (abbandonato)
 * https://github.com/harimayco/wmenu-builder
 * per ora salva su tabella in db,
 * in futuro salverà su un file in config/array
 */
class MenuBuilderAction extends XotBasePanelAction {
    public bool $onItem = true;

    public string $icon = '<i class="fas fa-plus-circle"></i>';

    public array $html = [];

    public function handle() {
        return $this->panel->out();
    }
}
