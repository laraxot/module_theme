<?php

declare(strict_types=1);

namespace Modules\Theme\Models\Panels\Actions;

use Modules\Xot\Models\Panels\Actions\XotBasePanelAction;
use Modules\Xot\Services\SmartyService;

/**
 * Class TestAction.
 */
class TestAction extends XotBasePanelAction {
    public bool $onContainer = true;

    public string $icon = '<i class="fa fa-edit"></i>';

    /**
     * @return mixed
     */
    public function handle() {
        //return $this->panel->view();
        $smarty = new SmartyService();
        $smarty->convert(storage_path('test3.tpl'));
    }
}
