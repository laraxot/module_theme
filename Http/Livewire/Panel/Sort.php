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
 * Class Sort.
 *
 * @property PanelContract $panel
 * @property Collection    $rows
 */
<<<<<<< HEAD
class Sort extends Component {
    public array $routeParams = [];
    public array $data = [];

    public function mount(): void {
=======
class Sort extends Component
{
    public array $routeParams = [];
    public array $data = [];

    public function mount(): void
    {
>>>>>>> ede0df7 (first)
        $this->routeParams = getRouteParameters();
        $this->data = request()->all();
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

<<<<<<< HEAD
    public function getRowsProperty(): Collection {
=======
    public function getRowsProperty():Collection
    {
>>>>>>> ede0df7 (first)
        return $this->panel->rows($this->data)
            ->orderBy('pos')
            ->get();
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
        $view = 'theme::livewire.panel.sort';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }

<<<<<<< HEAD
    public function updateTaskOrder(array $list): void {
        // dddx([$a]);
=======
    public function updateTaskOrder(array $list):void
    {
        //dddx([$a]);
>>>>>>> ede0df7 (first)
        /*
          7 => array:2 [▼
        "order" => 8
        "value" => "4418"
        ]
        */
<<<<<<< HEAD

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
=======
        foreach ($list as $v) {
            $row = $this->rows->firstWhere('id', $v['value']);
            $row->pos = $v['order'];
            $row->save();
>>>>>>> ede0df7 (first)
        }
        session()->flash('message', 'Sort successfully ');
    }
}
