<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Panel;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Collection;
use Livewire\Component;
use Modules\Xot\Contracts\ModelWithPosContract;
use Modules\Cms\Contracts\PanelContract;
use Modules\Cms\Services\PanelService;

/**
 * Class Sort.
 *
 * @property PanelContract $panel
 * @property Collection    $rows
 */
class Sort extends Component {
    public array $routeParams = [];
    public array $data = [];

    /**
     * Undocumented function.
     */
    public function mount(): void {
        $this->routeParams = getRouteParameters();
        $this->data = request()->all();
    }

    /**
     * Undocumented function.
     */
    public function getPanelProperty(): PanelContract {
        $panel = PanelService::make()->getByParams($this->routeParams);

        return $panel;
    }

    public function getRowsProperty(): Collection {
        return $this->panel->rows($this->data)
            ->orderBy('pos')
            ->get();
    }

    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::livewire.panel.sort';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }

    public function updateTaskOrder(array $list): void {
        // dddx([$a]);
        /*
          7 => array:2 [▼
        "order" => 8
        "value" => "4418"
        ]
        */

        // https://github.com/spatie/eloquent-sortable
        foreach ($list as $v) {
            /**
             * @var ModelWithPosContract
             */
            $row = $this->rows->firstWhere('id', $v['value']);
            /*
            $row->pos = $v['order'];
            $row->save();
            */
            $up = [
                'pos' => $v['order'],
            ];
            $row->update($up);
        }
        session()->flash('message', 'Sort successfully ');
    }
}
