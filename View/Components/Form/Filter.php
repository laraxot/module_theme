<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Form;

use Illuminate\View\Component;

/**
 * Undocumented class.
 */
<<<<<<< HEAD
class Filter extends Component {
=======
class Filter extends Component
{
>>>>>>> ede0df7 (first)
    public array $attrs = [];
    public string $action;
    public ?string $type;
    public string $name;
    public string $id;
    public string $placeholder;

    /**
     * Undocumented function.
     */
<<<<<<< HEAD
    public function __construct(string $action, ?string $class, ?string $type, string $name, string $placeholder = 'Keywords') {
=======
    public function __construct(string $action, ?string $class, ?string $type, string $name, string $placeholder = 'Keywords')
    {
>>>>>>> ede0df7 (first)
        $this->action = $action;
        $this->attrs['class'] = $class;
        $this->type = $type;
        $this->name = $name;
        $this->id = 'form_'.$name;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represents the component.
     */
<<<<<<< HEAD
    public function render(): \Illuminate\Contracts\Support\Renderable {
        /**
         * @phpstan-var view-string
         */
=======
    public function render(): \Illuminate\Contracts\Support\Renderable
    {
>>>>>>> ede0df7 (first)
        $view = 'theme::components.form.filter';

        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
