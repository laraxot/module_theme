<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Support\Renderable;

class Card extends Component {
    // public string $bg;
    public ?string $title;
    public ?string $type;

    public ?Model $model;

    public ?string $avatar = null;
    public ?string $category = null;
    public ?string $src = null;

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
        bool $full = false,
        ?string $src = '',
    ) {
        // $this->bg = $bg;
        $this->model = $model;

        $this->title = $title;

        $this->type = $type;
        $this->avatar=$avatar;
        $this->category=$category;

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

        $this->src = $src;
    }

    public function render(): Renderable {
        /**
         * var view-string|null
         */
        $view = 'theme::components.card';
        if (null !== $this->type) {
            $view .= '.'.$this->type;
        }
        $view_params = [];

        return View::make($view, $view_params);
    }
}