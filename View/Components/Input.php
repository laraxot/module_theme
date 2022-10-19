<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

/**
 * Undocumented class.
 */
class Input extends Component {
    public array $attrs = [];
    public string $type;

    /**
     * ---.
     *
     * @param mixed|null $value
     */
    public function __construct(string $type) {
        $this->type = Str::snake($type);

        $this->attrs['class'] = 'form-control';

        switch ($this->type) {
            case 'checkbox':
                $this->attrs['class'] = 'form-check-input';
                break;
            case 'select.multiple':
                $this->attrs['class'] = 'selectpicker form-control';
                $this->attrs['multiple'] = 'multiple';
                $this->attrs['data-style'] = 'btn-selectpicker';

                $this->attrs['data-selected-text-format'] = 'count &gt; 1';
                $this->attrs['data-none-selected-text'] = '';
                break;
        }
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::components.input.'.$this->type.'.field';

        $view_params = [
            'view' => $view,
        ];

        return view($view, $view_params);
    }
}
