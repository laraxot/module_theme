<?php

declare(strict_types=1);

namespace Modules\Theme\Models\Panels\Actions;

<<<<<<< HEAD
// -------- models -----------
// -------- services --------
// -------- bases -----------
=======
//-------- models -----------
//-------- services --------
//-------- bases -----------
>>>>>>> ede0df7 (first)
use Modules\Xot\Models\Panels\Actions\XotBasePanelAction;

/**
 * Class SyncInputs.
 */
<<<<<<< HEAD
class SyncInputs extends XotBasePanelAction {
    public bool $onContainer = true; // onlyContainer
=======
class SyncInputs extends XotBasePanelAction
{
    public bool $onContainer = true; //onlyContainer
>>>>>>> ede0df7 (first)

    public string $icon = '<i class="fas fa-sync"></i>';
    /**
     * @var string
     */
    public ?string $name = 'sync_inputs';

<<<<<<< HEAD
    public function handle() {
=======
    public function handle()
    {
>>>>>>> ede0df7 (first)
        return 'preso';
    }
}
