<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Input\Group;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\View\Component;

// Arr because Array is reserved

class Model extends Component {
    public EloquentModel $model;
    public array $attrs = [];

    /**
     * Undocumented function.
     */
    public function __construct(EloquentModel $model) {
        $this->model = $model;

        $this->attrs = [
            'name' => $model->name,
            'type' => $model->type,
            // 'value' => $model->value,
        ];
        if (null != $model->value) {
            // dddx(['model' => $model, 'value' => $model->value]);
        }
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::components.input.group.model';
        $view_params = [
            'view' => $view,
        ];

        return view($view, $view_params);
    }
}
