<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Input;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;
use Modules\Blog\Models\Status as StatusModel;
use Modules\Xot\Services\ModelService;

class Status extends Component
{
    public string $type = 'radio';
    public $model;
    public array $statuses = [];

    /**
     * Undocumented function.
     *
     * @param mixed $model
     */
    public function __construct($model)
    {
        $this->model = $model;
        $model_type = ModelService::make()->setModel($model)->getPostType();
        $where = [
            'model_type' => $model_type,
        ];
        $where['name'] = 'private';
        $res = StatusModel::updateOrCreate($where);
        $where['name'] = 'public';
        $res = StatusModel::updateOrCreate($where);
        $where['name'] = 'draft';
        $res = StatusModel::updateOrCreate($where);
        $statuses = StatusModel::where('model_type', $model_type)->select('name')->distinct()->get();
        $status = $model->status;
        $statuses = collect($statuses->toArray())->map(function ($item) use ($status) {
            $item['label'] = $item['name'];
            $item['color'] = $this->getColor($item['name']);
            $item['active'] = ($status === $item['name']);

            return $item;
        })->all();
        $this->statuses = $statuses;
    }

    private function getColor(string $name): string
    {
        $color = 'blue';
        switch ($name) {
            case 'draft': return 'yellow';
            case 'private': return 'red';
            case 'public': return 'green';
        }

        return $color;
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): Renderable
    {
        $view = 'theme::components.input.status.'.$this->type.'.field';
        $view_params = [
            'view' => $view,
            'statuses' => $this->statuses,
        ];

        return view($view, $view_params);
    }
}
