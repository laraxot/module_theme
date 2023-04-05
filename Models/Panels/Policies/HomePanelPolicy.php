<?php

declare(strict_types=1);

namespace Modules\Theme\Models\Panels\Policies;

use Modules\Cms\Contracts\PanelContract;
use Modules\Cms\Models\Panels\Policies\XotBasePanelPolicy;
use Modules\Xot\Contracts\UserContract;

/**
 * Class HomePanelPolicy.
 */
class HomePanelPolicy extends XotBasePanelPolicy
{
    public function test(UserContract $user, PanelContract $panel): bool
    {
        return true;
    }

    public function ConvertSmartyToBlade(UserContract $user, PanelContract $panel): bool
    {
        return true;
    }
}
