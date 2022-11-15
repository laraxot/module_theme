<?php

declare(strict_types=1);

namespace Modules\Theme\Traits\Form\Builder;

trait WithSwitch {
    public function switch() {
        $this->props['switch'] = true;

        return $this;
    }
}
