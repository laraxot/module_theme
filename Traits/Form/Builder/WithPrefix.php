<?php

declare(strict_types=1);

namespace Modules\Theme\Traits\Form\Builder;

trait WithPrefix
{
    public function prefix($prefix)
    {
        $this->props['prefix'] = $prefix.'.';

        return $this;
    }
}
