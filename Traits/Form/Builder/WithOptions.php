<?php

declare(strict_types=1);

namespace Modules\Theme\Traits\Form\Builder;

use Illuminate\Support\Arr;

trait WithOptions {
    public function options($options) {
        if (Arr::isAssoc($options)) {
            $this->props['options'] = $options;
        } else {
            $this->props['options'] = array_combine($options, $options);
        }

        return $this;
    }
}
