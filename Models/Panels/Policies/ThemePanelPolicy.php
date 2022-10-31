<?php

declare(strict_types=1);

namespace Modules\Theme\Models\Panels\Policies;

use Modules\Xot\Contracts\PanelContract;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Models\Panels\Policies\XotBasePanelPolicy;

/**
 * Class ThemePanelPolicy.
 */
class ThemePanelPolicy extends XotBasePanelPolicy
{
    public function demoImageGallery(?UserContract $user, PanelContract $panel): bool
    {
        return true;
    }
}
