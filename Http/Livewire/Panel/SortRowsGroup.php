<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Panel;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Collection;
use Livewire\Component;
use Modules\Xot\Contracts\ModelWithPosContract;
use Modules\Xot\Contracts\PanelContract;
use Modules\Xot\Services\PanelService;

/**
 * Class Create.
 *
 * @property PanelContract $panel
 * @property Collection    $groups
 */
class SortRowsGroup extends Component {
    public array $routeParams = [];
    public array $data = [];
    public Collection $rows;
    public array $group_by = [];

    /**
     * Undocumented function.
     */
    public function mount(string $groupBy): void {
        $this->routeParams = getRouteParameters();
        $this->data = request()->all();
        $this->rows = $this->panel->rows($this->data)
            ->orderBy('pos')
            ->get();

        $this->group_by = explode(',', $groupBy);
    }

    public function getPanelProperty(): PanelContract {
        $panel = PanelService::make()->getByParams($this->routeParams);

        return $panel;
    }

    /**
     * @return \Illuminate\Support\Collection|string
     */
    public function getGroupsProperty() {
        $groups = $this->rows
            ->sortBy('pos')
            ->groupBy(
                function ($item) {
                    $key = [];
                    foreach ($this->group_by as $k) {
                        $key[] = $item->{$k};
                    }

                    return implode('-', $key);
                }
            );
        // dddx($groups->sortBy('items.pos'));

        return $groups;
    }

    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::livewire.panel.sort-rows-group';

        $view_params = [
            'view' => $view,
            'groups' => $this->groups,
        ];

        return view()->make($view, $view_params);
    }

    public function updateGroupOrder(array $list): void {
        // dddx($list);
        /*
        2 => array:2 [▼
        "order" => 3
        "value" => "28902-"
        ]
        */
        $i = 1;
        foreach ($list as $v) {
            // Cannot call method sortBy() on mixed.
            /**
             * @var Collection<ModelWithPosContract>
             */
            $tmp=$this->groups->get($v['value']);
            /**
             * @var Collection<ModelWithPosContract>
             */
            $group = $tmp->sortBy('pos');
            foreach ($group as $row) {
                //$row->pos = $i++;
                //$row->save();
                $up=[
                    'pos'=>$i++,

                ];
                $row->update($up);
            }
        }
        session()->flash('message', 'updateGroupOrder successfully ');
        // $this->redirect('#');
    }

    public function updateTaskOrder(array $list): void {
        /*
          7 => array:2 [▼
        "order" => 8
        "value" => "4418"
        ]
        */
        // *
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
        session()->flash('message', 'updateTaskOrder successfully ');
        // */
    }
}