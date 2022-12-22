<?php

declare(strict_types=1);

namespace Modules\Theme\Models\Panels\Policies;

<<<<<<< HEAD
use Modules\Cms\Contracts\PanelContract;
use Modules\Cms\Models\Panels\Policies\XotBasePanelPolicy;
=======
use Modules\Cms\Models\Panels\Policies\XotBasePanelPolicy;
<<<<<<< HEAD
use Modules\Xot\Contracts\PanelContract;
>>>>>>> a909dfc0 (up)
=======
use Modules\Cms\Contracts\PanelContract;
>>>>>>> fc07af93 (.)
use Modules\Xot\Contracts\UserContract;

/**
 * Class HomePanelPolicy.
 */
class HomePanelPolicy extends XotBasePanelPolicy {
    public function test(UserContract $user, PanelContract $panel): bool {
        return true;
    }

    public function ConvertSmartyToBlade(UserContract $user, PanelContract $panel): bool {
        return true;
    }
}
