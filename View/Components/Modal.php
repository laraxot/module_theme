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
    public array $attrs = [];

    public function __construct(
        string $title,
        ?string $size,
        string $id,
        bool $centered = true,
        int $index = 1
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->centered = $centered;
        $this->size = $size;
        $this->index = $index;
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
        return view('theme::components.modal');
    }
}
