<?php

declare(strict_types=1);

namespace Modules\Theme\Models\Panels\Policies;

use Modules\Xot\Contracts\PanelContract;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Models\Panels\Policies\XotBasePanelPolicy;

/**
 * Class HomePanelPolicy.
 */
<<<<<<< HEAD
class HomePanelPolicy extends XotBasePanelPolicy {
    public function test(UserContract $user, PanelContract $panel): bool {
        return true;
    }

    public function ConvertSmartyToBlade(UserContract $user, PanelContract $panel): bool {
=======
class HomePanelPolicy extends XotBasePanelPolicy
{
    public function test(UserContract $user, PanelContract $panel): bool
    {
        return true;
    }

    public function ConvertSmartyToBlade(UserContract $user, PanelContract $panel): bool
    {
>>>>>>> ede0df7 (first)
        return true;
    }
}
