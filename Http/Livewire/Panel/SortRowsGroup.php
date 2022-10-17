<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Panel;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Collection;
use Livewire\Component;
<<<<<<< HEAD
use Modules\Xot\Contracts\ModelWithPosContract;
=======
>>>>>>> ede0df7 (first)
use Modules\Xot\Contracts\PanelContract;
use Modules\Xot\Services\PanelService;

/**
 * Class Create.
 *
 * @property PanelContract $panel
 * @property Collection    $groups
 */
<<<<<<< HEAD
class SortRowsGroup extends Component {
=======
class SortRowsGroup extends Component
{
>>>>>>> ede0df7 (first)
    public array $routeParams = [];
    public array $data = [];
    public Collection $rows;
    public array $group_by = [];

    /**
     * Undocumented function.
     */
<<<<<<< HEAD
    public function mount(string $groupBy): void {
=======
    public function mount(string $groupBy): void
    {
>>>>>>> ede0df7 (first)
        $this->routeParams = getRouteParameters();
        $this->data = request()->all();
        $this->rows = $this->panel->rows($this->data)
            ->orderBy('pos')
            ->get();

        $this->group_by = explode(',', $groupBy);
    }

<<<<<<< HEAD
    public function getPanelProperty(): PanelContract {
=======
    public function getPanelProperty():PanelContract
    {
>>>>>>> ede0df7 (first)
        $panel = PanelService::make()->getByParams($this->routeParams);

        return $panel;
    }

    /**
     * @return \Illuminate\Support\Collection|string
     */
<<<<<<< HEAD
    public function getGroupsProperty() {
=======
    public function getGroupsProperty()
    {
>>>>>>> ede0df7 (first)
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
<<<<<<< HEAD
        // dddx($groups->sortBy('items.pos'));
=======
        //dddx($groups->sortBy('items.pos'));
>>>>>>> ede0df7 (first)

        return $groups;
    }

<<<<<<< HEAD
    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
=======
    public function render():Renderable
    {
>>>>>>> ede0df7 (first)
        $view = 'theme::livewire.panel.sort-rows-group';

        $view_params = [
            'view' => $view,
            'groups' => $this->groups,
        ];

        return view()->make($view, $view_params);
    }

<<<<<<< HEAD
    public function updateGroupOrder(array $list): void {
        // dddx($list);
=======
    public function updateGroupOrder(array $list):void
    {
        //dddx($list);
>>>>>>> ede0df7 (first)
        /*
        2 => array:2 [▼
        "order" => 3
        "value" => "28902-"
        ]
        */
        $i = 1;
        foreach ($list as $v) {
<<<<<<< HEAD
            // Cannot call method sortBy() on mixed.
            /**
             * @var Collection<ModelWithPosContract>
             */
            $tmp = $this->groups->get($v['value']);
            /**
             * @var Collection<ModelWithPosContract>
             */
            $group = $tmp->sortBy('pos');
            foreach ($group as $row) {
                // $row->pos = $i++;
                // $row->save();
                $up = [
                    'pos' => $i++,
                ];
                $row->update($up);
            }
        }
        session()->flash('message', 'updateGroupOrder successfully ');
        // $this->redirect('#');
    }

    public function updateTaskOrder(array $list): void {
=======
            $group = $this->groups->get($v['value'])->sortBy('pos');
            foreach ($group as $row) {
                $row->pos = $i++;
                $row->save();
            }
        }
        session()->flash('message', 'updateGroupOrder successfully ');
        //$this->redirect('#');
    }

    public function updateTaskOrder(array $list):void
    {
>>>>>>> ede0df7 (first)
        /*
          7 => array:2 [▼
        "order" => 8
        "value" => "4418"
        ]
        */
<<<<<<< HEAD
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
=======
        //*
        foreach ($list as $v) {
            $row = $this->rows->firstWhere('id', $v['value']);
            $row->pos = $v['order'];
            $row->save();
        }
        session()->flash('message', 'updateTaskOrder successfully ');
        //*/
>>>>>>> ede0df7 (first)
    }
}
