<?php

declare(strict_types=1);

namespace Modules\Theme\Models\Panels\Actions;

// -------- models -----------
// -------- services --------
// -------- bases -----------
use Modules\Cms\Models\Panels\Actions\XotBasePanelAction;

/**
 * Class SyncInputs.
 */
class SyncInputs extends XotBasePanelAction {
    public bool $onContainer = true; // onlyContainer

    public string $icon = '<i class="fas fa-sync"></i>';
    /**
     * @var string
     */
    public ?string $name = 'sync_inputs';

    public function handle() {
        return 'preso';
    }
}
