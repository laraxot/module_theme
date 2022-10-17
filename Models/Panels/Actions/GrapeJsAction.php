<?php

declare(strict_types=1);

namespace Modules\Theme\Models\Panels\Actions;

<<<<<<< HEAD
// -------- services --------
=======
//-------- services --------
>>>>>>> ede0df7 (first)
use Modules\Xot\Models\Panels\Actions\XotBasePanelAction;

/**
 * Undocumented class.
 */
<<<<<<< HEAD
class GrapeJsAction extends XotBasePanelAction {
=======
class GrapeJsAction extends XotBasePanelAction
{
>>>>>>> ede0df7 (first)
    public bool $onItem = true;

    public string $icon = '<i class="fas fa-dice-d20"></i>';

    public array $html = [];

<<<<<<< HEAD
    public function handle() {
=======
    public function handle()
    {
>>>>>>> ede0df7 (first)
        return $this->panel->out();
    }
}
