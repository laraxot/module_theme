<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Panel;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Collection;
use Livewire\Component;
use Modules\Xot\Contracts\PanelContract;
use Modules\Xot\Services\PanelService;

/**
 * Class Sort.
 *
 * @property PanelContract $panel
 * @property Collection    $rows
 */
class Sort extends Component {
    public array $routeParams = [];
    public array $data = [];

    public function mount(): void {
        $this->routeParams = getRouteParameters();
        $this->data = request()->all();
    }

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
        foreach ($list as $v) {
            $row = $this->rows->firstWhere('id', $v['value']);
            $row->pos = $v['order'];
            $row->save();
        }
        session()->flash('message', 'Sort successfully ');
    }
}
