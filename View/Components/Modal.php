<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

class Modal extends Component {
    public string $id;
    public string $title;
    public ?string $size;
    public bool $centered;
    public int $index;
    public ?string $type;
    public array $attrs = [];

    public function __construct(
        string $title,
        ?string $size,
        string $id,
        bool $centered = true,
        int $index = 1,
        ?string $type
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->centered = $centered;
        $this->size = $size;
        $this->index = $index;
        $this->type = $type;
        $this->attrs['class'] = 'modal fade';
        // $this->attrs['id'] =$id ;
        $this->attrs['style'] = 'z-index: '.$this->zindex();
    }

    public function modalsize(): string {
        return null !== $this->size ? 'modal-'.$this->size : '';
    }

    public function zindex(): int {
        return $this->index * 1050;
    }

    public function render(): Renderable {
        $view = 'theme::components.modal';
        if (! empty($this->type)) {
            $view .= '.'.$this->type;
        }

        return view()->make($view);
    }
}
