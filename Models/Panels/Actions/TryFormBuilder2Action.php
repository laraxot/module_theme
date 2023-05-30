<?php

declare(strict_types=1);

namespace Modules\Theme\Models\Panels\Actions;

// -------- models -----------
// -------- services --------
// -------- bases -----------
use Modules\Cms\Models\Panels\Actions\XotBasePanelAction;

/**
 * Class TryFormBuilderAction.
 */
class TryFormBuilder2Action extends XotBasePanelAction
{
    public bool $onItem = true;

    public string $icon = '<i class="fas fa-campground"></i>2';

    /**
     * Undocumented function.
     */
    public function handle()
    {
        return $this->panel->view();
    }
}
