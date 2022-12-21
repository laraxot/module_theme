<?php

declare(strict_types=1);

namespace Modules\Theme\Traits\Form\Builder;

trait WithDisabled {
    public function disabled($disabled = true) {
        $this->attrs['disabled'] = $disabled;

        return $this;
    }
}
