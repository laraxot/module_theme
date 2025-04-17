<?php
/**
 * --.
 */
declare(strict_types=1);

namespace Modules\Theme\Models\Panels\Actions;

// -------- services --------

use Modules\Cms\Models\Panels\Actions\XotBasePanelAction;

// -------- bases -----------

/**
 * Class TryProgressbarAction.
 */
class TryProgressbarAction extends XotBasePanelAction
{
    public bool $onItem = true;
    public string $icon = '<i class="fas fa-vial"></i>';

    public function handle()
    {
        return $this->panel->view();
    }
}
