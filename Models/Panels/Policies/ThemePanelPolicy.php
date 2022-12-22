<?php

declare(strict_types=1);

namespace Modules\Theme\Models\Panels\Policies;

use Modules\Cms\Contracts\PanelContract;
use Modules\Cms\Models\Panels\Policies\XotBasePanelPolicy;
use Modules\Xot\Contracts\UserContract;

/**
 * Class ThemePanelPolicy.
 */
class ThemePanelPolicy extends XotBasePanelPolicy {
    public function demoImageGallery(?UserContract $user, PanelContract $panel): bool {
        return true;
    }
}