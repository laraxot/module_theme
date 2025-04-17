<?php

declare(strict_types=1);

namespace Modules\Theme\Traits\Form\Builder;

trait WithPlaceholder
{
    public function placeholder($placeholder)
    {
        $this->attrs['placeholder'] = $placeholder;

        return $this;
    }
}
