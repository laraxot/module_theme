<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use stdClass;
use ReflectionMethod;
use Illuminate\Support\Str;
use Illuminate\View\Component;
use Modules\Xot\Services\PanelService;
use Modules\Theme\Services\ThemeService;
use Illuminate\Contracts\Support\Renderable;

/**
 * Undocumented class.
 */
class Link extends Component {
    public array $attrs = [];

    /**
     * Undocumented function
     */
    public function __construct(?string $rel=null,?string $type=null,?string $href=null){
        //$this->attrs['rel']=$rel;
        //$this->attrs['type']=$type;
        //$this->attrs['href']=$href;
        if($href!=null){
            ThemeService::add($href);
        }

    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): Renderable {
        $view='theme::components.empty';
        $view_params=[
            'view'=>$view,
        ];
        return view()->make($view,$view_params);
    }
}