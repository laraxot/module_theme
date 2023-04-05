<?php

declare(strict_types=1);

namespace Modules\Theme\Models\Panels\Actions;

// -------- services --------
use Modules\Cms\Models\Panels\Actions\XotBasePanelAction;

/**
 * Undocumented class.
 */
class GrapeJsAction extends XotBasePanelAction
{
    public bool $onItem = true;

    public string $icon = '<i class="fas fa-dice-d20"></i>';

    public array $html = [];

    public function handle()
    {
        return $this->panel->out();
    }
}
