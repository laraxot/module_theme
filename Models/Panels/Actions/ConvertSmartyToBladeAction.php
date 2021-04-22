<?php

declare(strict_types=1);

namespace Modules\Theme\Models\Panels\Actions;

use Modules\Xot\Models\Panels\Actions\XotBasePanelAction;

/**
 * Class TestAction.
 */
class ConvertSmartyToBladeAction extends XotBasePanelAction {
    public bool $onContainer = true;

    //public string $icon = '<i class="fa fa-edit"></i>';

    /**
     * @return mixed
     */
    public function handle() {
    }
}
