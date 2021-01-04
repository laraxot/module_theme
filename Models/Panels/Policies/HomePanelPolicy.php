<?php

namespace Modules\Theme\Models\Panels\Policies;

use Modules\Xot\Models\Panels\Policies\XotBasePanelPolicy;

class HomePanelPolicy extends XotBasePanelPolicy {
    public function test($user, $panel) {
        return true;
    }
}
