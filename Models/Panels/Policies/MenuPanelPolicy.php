<?php
namespace Modules\Theme\Models\Panels\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\LU\Models\User as User;
use Modules\Theme\Models\Panels\Policies\MenuPanelPolicy as Panel;

use Modules\Xot\Models\Panels\Policies\XotBasePanelPolicy;

class MenuPanelPolicy extends XotBasePanelPolicy {
}
