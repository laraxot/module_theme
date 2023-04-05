<?php

declare(strict_types=1);

namespace Modules\Theme\Traits\Form\Builder;

trait WithHelp
{
    public function help($help)
    {
        $this->props['help'] = $help;

        return $this;
    }
}
