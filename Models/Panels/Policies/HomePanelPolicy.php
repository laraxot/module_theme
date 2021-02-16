<<<<<<< HEAD
<?php

namespace Modules\Theme\Models\Panels\Policies;

use Modules\Xot\Contracts\PanelContract;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Models\Panels\Policies\XotBasePanelPolicy;

/**
 * Class HomePanelPolicy.
 */
class HomePanelPolicy extends XotBasePanelPolicy {
    /**
     * @return bool
     */
    public function test(UserContract $user, PanelContract $panel): bool {
        return true;
    }
}
=======
<?php

namespace Modules\Theme\Models\Panels\Policies;

use Modules\Xot\Contracts\PanelContract;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Models\Panels\Policies\XotBasePanelPolicy;

/**
 * Class HomePanelPolicy.
 */
class HomePanelPolicy extends XotBasePanelPolicy {
    /**
     * @return bool
     */
    public function test(UserContract $user, PanelContract $panel): bool {
        return true;
    }
}
>>>>>>> a83164a (first)
