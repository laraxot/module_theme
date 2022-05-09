<?php
namespace Modules\Theme\Models\Panels\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\LU\Models\User as User;
use Modules\Theme\Models\Panels\Policies\MenuItemPanelPolicy as Panel;

use Modules\Xot\Models\Panels\Policies\XotBasePanelPolicy;

class MenuItemPanelPolicy extends XotBasePanelPolicy {
}
