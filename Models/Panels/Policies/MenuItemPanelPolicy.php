<?php
<<<<<<< HEAD

declare(strict_types=1);

namespace Modules\Theme\Models\Panels\Policies;

=======
namespace Modules\Theme\Models\Panels\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\LU\Models\User as User;
use Modules\Theme\Models\Panels\Policies\MenuItemPanelPolicy as Panel;

>>>>>>> ede0df7 (first)
use Modules\Xot\Models\Panels\Policies\XotBasePanelPolicy;

class MenuItemPanelPolicy extends XotBasePanelPolicy {
}
