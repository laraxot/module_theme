<?php

declare(strict_types=1);

namespace Modules\Theme\Models\Panels\Policies;

use Modules\Xot\Contracts\PanelContract;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Models\Panels\Policies\XotBasePanelPolicy;

/**
 * Class ThemePanelPolicy.
 */
<<<<<<< HEAD
class ThemePanelPolicy extends XotBasePanelPolicy {
    public function demoImageGallery(?UserContract $user, PanelContract $panel): bool {
        return true;
    }
=======
class ThemePanelPolicy extends XotBasePanelPolicy
{

    public function demoImageGallery(?UserContract $user, PanelContract $panel): bool
    {
        return true;
    }

>>>>>>> ede0df7 (first)
}
