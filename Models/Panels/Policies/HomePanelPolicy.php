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

declare(strict_types=1);

namespace Modules\Theme\Models\Panels\Policies;

use Modules\Xot\Contracts\PanelContract;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Models\Panels\Policies\XotBasePanelPolicy;

/**
 * Class HomePanelPolicy.
 */
class HomePanelPolicy extends XotBasePanelPolicy {
    public function test(UserContract $user, PanelContract $panel): bool {
        return true;
    }
}
>>>>>>> 9f0111a33322bf5ce36bbb7187f5866a7193d90f
