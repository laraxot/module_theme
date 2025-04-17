<?php

declare(strict_types=1);

namespace Modules\Theme\Models\Panels\Actions;

// -------- models -----------
use Modules\Blog\Models\Event;
// -------- services --------
// -------- bases -----------
use Modules\Cms\Models\Panels\Actions\XotBasePanelAction;

/**
 * Class SyncInputs.
 */
class FilleventsAction extends XotBasePanelAction
{
    public bool $onContainer = true; // onlyContainer

    public string $icon = '<i class="fas fa-sync"></i>';

    public function handle()
    {
        $count = 0;

        if (class_exists('\Modules\Blog\Models\Event')) {
            $rows = Event::factory()->count(10)->create();

            $rows = Event::get();
            $count = $rows->count();
        }

        return $count;
    }
}
