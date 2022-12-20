<?php

declare(strict_types=1);

namespace Modules\Theme\Models\Panels\Actions;

// -------- models -----------
// -------- services --------
// -------- bases -----------
use Illuminate\Support\Collection;
use Modules\Theme\Services\CollectiveService;
use Modules\Theme\Services\ThemeService;
use Modules\Cms\Models\Panels\Actions\XotBasePanelAction;

/**
 * Class TryFormBuilderAction.
 */
class TryFormBuilder4Action extends XotBasePanelAction {
    public bool $onItem = true;

    public string $icon = '<i class="fas fa-campground"></i>4';

    public Collection $components;

    /**
     * Undocumented function.
     *
     * @return mixed
     */
    public function handle() {
        $this->components = $this->getComponents();
        // dddx($this->components->first());

        $view = ThemeService::getView();

        $view_params = [
            'components' => $this->components,
        ];

        return view()->make($view, $view_params);

        // return $this->panel->view();
    }

    public function getComponents() {
        $view_path = realpath(__DIR__.'/../../../Resources/views/collective/fields');
        $namespace = '';
        $prefix = 'theme::';

        $res = CollectiveService::getComponents($view_path, $namespace, $prefix);
        $res = collect($res)->map(function ($item) {
            $tmp = explode('.', $item->view);
            $name = collect($tmp)->slice(2, -1)->implode('.');
            $parent = null;
            if ('field' !== $tmp[3]) {
                $parent = $tmp[2];
            }

            return collect([
                'name' => $name,
                'parent' => $parent,
            ]);
        });
        // dddx($res);
        return $res;
    }
}
