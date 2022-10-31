<?php

declare(strict_types=1);

namespace Modules\Theme\Traits;

/*
 * https://github.com/kdion4891/laravel-livewire-forms/blob/master/src/Traits/FillsColumns.php

 */

use Illuminate\Support\Facades\Schema;

/**
 * Trait FillsColumns.
 */
trait FillsColumns
{
    /**
     * @return array
     */
    public function getFillable()
    {
        return Schema::getColumnListing($this->getTable());
    }
}
