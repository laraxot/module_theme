<<<<<<< HEAD
<?php

namespace Modules\Theme\Models\Panels\Actions;

use Modules\Xot\Models\Panels\Actions\XotBasePanelAction;

/**
 * Class TestAction
 * @package Modules\Theme\Models\Panels\Actions
 */
class TestAction extends XotBasePanelAction {
    /**
     * @var bool
     */
    public bool $onContainer = true;
    /**
     * @var string
     */
    public string $icon = '<i class="fa fa-edit"></i>';

    /**
     * @return mixed
     */
    public function handle() {
        return $this->panel->view();
    }
}
=======
<?php

namespace Modules\Theme\Models\Panels\Actions;

use Modules\Xot\Models\Panels\Actions\XotBasePanelAction;

/**
 * Class TestAction
 * @package Modules\Theme\Models\Panels\Actions
 */
class TestAction extends XotBasePanelAction {
    /**
     * @var bool
     */
    public bool $onContainer = true;
    /**
     * @var string
     */
    public string $icon = '<i class="fa fa-edit"></i>';

    /**
     * @return mixed
     */
    public function handle() {
        return $this->panel->view();
    }
}
>>>>>>> a83164a (first)
