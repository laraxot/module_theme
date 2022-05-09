<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

class Button extends Component
{
    /**
     * The button type.
     */
    public string $type = 'primary';

    public array $attrs = [];

    /**
     * Create the component instance.
     *
     * @return void
     */
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
        return view()->make($view, $view_params);
    }
}
