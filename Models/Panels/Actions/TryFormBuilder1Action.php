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
class TryFormBuilder1Action extends XotBasePanelAction
{
    public bool $onItem = true;

    public string $icon = '<i class="fas fa-campground"></i>1';

    /**
     * Undocumented function.
     *
     * @return mixed
     */
    public function handle()
    {
        return $this->panel->view();
    }
}
