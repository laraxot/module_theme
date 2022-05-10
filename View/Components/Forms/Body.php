<?php
/**
https://github.com/kdion4891/laravel-livewire-forms/blob/master/resources/views/form.blade.php
 */

declare(strict_types=1);

namespace Modules\Theme\View\Components\Forms;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;
use Modules\Xot\Services\PanelService;

/**
 * Class Body.
 */
class Body extends Component {
    public string $modelClass;
    public Model $model;
    public string $action;

    public function __construct(string $action, string $modelClass) {
        $this->action = $action;
        $this->modelClass = $modelClass;
        // $this->model = new $this->modelClass();
        $this->model = app($modelClass);
    }

    public function render(): Renderable {
        $view = 'theme::components.forms.body';

        $panel = PanelService::make()->get($this->model);
        $fields = $panel->getFields(['act' => $this->action]);
        $view_params = [
            'view' => $view,
            'fields' => $fields,
        ];

        return view()->make($view, $view_params);
    }
}
