<?php

declare(strict_types=1);

namespace Modules\Theme\Traits\Form\Builder;

trait WithReadonly
{
    public function readonly($readonly = true)
    {
        $this->attrs['readonly'] = $readonly;

        return $this;
    }
}
