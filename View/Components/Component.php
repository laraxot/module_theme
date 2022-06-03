<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\View;
<<<<<<< HEAD
=======
use Illuminate\View\Component as ViewComponent;
>>>>>>> 1a1cdb1c3d54898e7ab5a900efc7d76cfd2aef9b
use Modules\Xot\Services\FileService;
use Illuminate\View\Component as ViewComponent;

/**
 * Class Component.
 * controlla l'esistenza dei componenti formx richiamati tramite i field dei pannelli
 * se esiste quello del tema, nel caso utilizza quello di default.
 */
class Component extends ViewComponent {
    public string $type;

    public string $table_class = 'table table-striped table-hover table-bordered table-condensed';

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $type) {
        $this->type = $type;
        $table_class = FileService::config('adm_theme::styles.table.class');
        if (! \is_string($table_class)) {
            $table_class = 'table';
        }
        if (null !== $table_class) {
            $this->table_class = $table_class;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): \Illuminate\Contracts\Support\Renderable {
        $views = [
            'adm_theme::components.'.$this->type,
            'theme::components.'.$this->type,
        ];

        $view = Arr::first(
            $views, function ($item) {
                return view()->exists($item);
            }
        );
        if (null === $view) {
            throw new Exception('not exists '.$views[0].' or '.$views[1]);
        }
<<<<<<< HEAD
        $view_params=[];
        if(!is_string($view)){
            throw new Exception('['.__LINE__.']['.__FILE__.']');
        }
        //return view()->make($view);
        return View::make($view,$view_params);
=======
        $view_params = [];
        // return view()->make($view);
        return View::make($view, $view_params);
>>>>>>> 1a1cdb1c3d54898e7ab5a900efc7d76cfd2aef9b
    }
}
