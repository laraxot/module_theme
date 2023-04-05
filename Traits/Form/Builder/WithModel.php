<?php

declare(strict_types=1);

namespace Modules\Theme\Traits\Form\Builder;

trait WithModel
{
    public function instant()
    {
        $this->props['model'] = null;

        return $this;
    }

    public function defer()
    {
        $this->props['model'] = '.defer';

        return $this;
    }

    public function lazy()
    {
        $this->props['model'] = '.lazy';

        return $this;
    }

    public function debounce($ms = 500)
    {
        $this->props['model'] = '.debounce.'.$ms.'ms';

        return $this;
    }
}
