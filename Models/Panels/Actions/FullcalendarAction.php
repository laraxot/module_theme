<?php

declare(strict_types=1);

namespace Modules\Theme\Models\Panels\Actions;

// -------- models -----------
// -------- services --------
// -------- bases -----------
use Modules\Xot\Models\Panels\Actions\XotBasePanelAction;

/**
 * Class FullcalendarAction.
 */
class FullcalendarAction extends XotBasePanelAction {
    public bool $onContainer = true; // onlyContainer

    public string $icon = '<i class="fas fa-sync"></i>';

    /**
     * @return mixed
     */
    public function handle() {
        return $this->panel->view();
    }
}
