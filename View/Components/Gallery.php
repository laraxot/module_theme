<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\Contracts\Support\Renderable;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Gallery.
 * nb: funziona in directorybs5 ma non in adminlte.
 */
class Gallery extends XotBaseComponent {
    public string $id;
    public string $title;
    public string $desc;
    public string $type = 'lightbox';
    public array $attrs = [];
    //public array $gallery = []; //ora che avrò qualcosa con cui provarlo lo aggiusto

    /**
     * Undocumented function.
     */
    public function __construct(string $id, ?string $title = '', ?string $desc = ''/*, array $gallery */) {
        $this->id = $id;
        if (! is_null($title)) {
            $this->title = $title;
        }
        if (! is_null($desc)) {
            $this->desc = $desc;
        }
        $this->attrs['class'] = 'col-lg-4 col-6 px-1 mb-2';
        //$this->gallery = $gallery;
    }

    /**
     * Undocumented function.
     */
    public function render(): Renderable {
        $view = 'theme::components.gallery.'.$this->type;
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
