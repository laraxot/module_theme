<?php

namespace Modules\Theme\Models\Panels\Actions;

use Modules\Xot\Models\Panels\Actions\XotBasePanelAction;

class TestAction extends XotBasePanelAction {
    public $onContainer = true;
    public $icon = '<i class="fa fa-edit"></i>';

    public function handle() {
        return $this->panel->view();
    }
}
