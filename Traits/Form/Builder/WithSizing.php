<?php

declare(strict_types=1);

namespace Modules\Theme\Traits\Form\Builder;

trait WithSizing
{
    public function small()
    {
        $this->props['small'] = true;

        return $this;
    }

    public function large()
    {
        $this->props['large'] = true;

        return $this;
    }
}
