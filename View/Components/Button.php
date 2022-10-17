<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

<<<<<<< HEAD
class Button extends Component {
    public string $type;

    public array $attrs;
=======
class Button extends Component
{
    /**
     * The button type.
     */
    public string $type = 'primary';

    public array $attrs = [];
>>>>>>> ede0df7 (first)

    /**
     * Create the component instance.
     *
     * @return void
     */
<<<<<<< HEAD
    public function __construct(?string $type = 'button', ?array $attrs = []) {
        $this->type = $type;
        $this->attrs = $attrs;
    }

    /**
     * Undocumented function.
     */
    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::components.button.'.$this->type;
        
        $view_params = ['view' => $view];

=======
    public function __construct(?array $attrs = null)
    {
        if (isset($attrs)) {
            $this->attrs = array_merge($this->attrs, $attrs);
        }

        $this->attrs['class'] = 'btn btn-primary';
        $this->attrs['icon_html'] = '';
        if (isset($this->attrs['icon'])) {
            $this->attrs['icon_html'] = '<i class="'.$this->attrs['icon'].'"></i>';
        }
    }

   
    public function render():Renderable
    {
        $view='theme::components.button';
        $view_params=['view'=>$view];
>>>>>>> ede0df7 (first)
        return view()->make($view, $view_params);
    }
}
