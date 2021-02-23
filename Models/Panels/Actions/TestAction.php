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

declare(strict_types=1);

namespace Modules\Theme\Models\Panels\Actions;

use Modules\Xot\Models\Panels\Actions\XotBasePanelAction;

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
        return $this->panel->view();
    }
}
>>>>>>> 9f0111a33322bf5ce36bbb7187f5866a7193d90f
