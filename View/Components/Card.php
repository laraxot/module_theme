<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class Card extends Component {
    //public string $bg;
    public ?string $title;
    public ?string $type;

    public ?Model $model;

    public ?string $avatar = null;
    public ?string $category = null;

    public bool $collapsed;
    public bool $removable;
    public bool $maximizable;
    public bool $disabled;
    public bool $outline;
    public bool $full;

    public array $attrs = [];

    public function __construct(
        string $bg = 'info',
        ?string $title = null,
        ?string $type = null,
        ?Model $model = null,
        ?string $avatar = null,
        ?string $category = null,
        bool $collapsed = false,
        bool $removable = false,
        bool $maximizable = false,
        bool $disabled = false,
        bool $outline = false,
        bool $full = false
    ) {
        //$this->bg = $bg;
        $this->model = $model;

        $this->title = $title;

        $this->type = $type;

        $this->collapsed = $collapsed;
        $this->removable = $removable;
        $this->maximizable = $maximizable;
        $this->disabled = $disabled;
        $this->outline = $outline;
        $this->full = $full;

        $this->attrs['class'] =
        'card card-'.$bg.
         ($outline ? ' card-outline' : '').
         ($collapsed ? ' collapsed-card' : '').
         ($full ? ' bg-'.$bg : '');
    }

    public function render(): Renderable {
        $view = 'theme::components.card';
        if (null !== $this->type) {
            $view .= '.'.$this->type;
        }
        $view_params = [];

        return view($view, $view_params);
    }
}