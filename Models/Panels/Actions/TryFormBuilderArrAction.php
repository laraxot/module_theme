<?php

declare(strict_types=1);

namespace Modules\Theme\Models\Panels\Actions;

// -------- models -----------
// -------- services --------
// -------- bases -----------
use Modules\Theme\Http\Livewire\Form\Builder\Button;
use Modules\Theme\Http\Livewire\Form\Builder\Input;
use Modules\Cms\Models\Panels\Actions\XotBasePanelAction;

/**
 * Class TryFormBuilderAction.
 */
class TryFormBuilderArrAction extends XotBasePanelAction {
    public bool $onItem = true;

    public string $icon = '<i class="fas fa-campground"></i>';

    /**
     * Undocumented function.
     *
     * @return mixed
     */
    public function handle() {
        $view = 'theme::admin.home.acts.try_form_builder_arr';
        $view_params = [
            'view' => $view,
            // 'input' => Input::class,
            'button' => Button::class,
        ];

        return view()->make($view, $view_params);
    }
}
