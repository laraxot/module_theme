<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

class Modal extends Component
{
    public ?string $type;
    public array $attrs = [];

    public function __construct(
        ?string $type = 'v1'
    ) {
        $this->type = $type;
        // $this->attrs['class'] = 'modal fade';
        // $this->attrs['style'] = 'z-index: '.$this->zindex();
    }

    // public function modalsize(): string {
    //    return null !== $this->size ? 'modal-'.$this->size : '';
    // }
    /*
    public function zindex(): int {
        return $this->index * 1050;
    }
    */

    public function render(): Renderable
    {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::components.modal.'.$this->type;
        $view_params = [
            'view' => $view,
        ];

        return view($view, $view_params);
    }
}
