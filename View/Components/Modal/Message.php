<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Modal;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;
use Modules\Theme\Services\ThemeService;

/**
 * Class Message.
 */
class Message extends Component
{
    public ?string $type;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(?string $type = 'message')
    {
        $this->type = $type;
        // ThemeService::make()->add('theme::View/Components/Accordion/rows.scss');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): Renderable
    {
        $view = 'theme::components.modal.'.$this->type;
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
