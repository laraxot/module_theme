<?php
/**
https://github.com/dgvai/laravel-adminlte-components#datatable
 */

declare(strict_types=1);

namespace Modules\Theme\View\Components\Table;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * ---
 */
class Datatable extends Component {
    public bool $beautify;
    public bool $buttons;
    public int $id;
    public bool $bordered;
    public bool $hoverable;
    public bool $condensed;
    public array $heads;
    public bool $footer;

    public function __construct(
        bool $beautify,
        int $id,
        bool $bordered,
        bool $hoverable,
        bool $condensed,
        array $heads,
        bool $footer = false,
        bool $buttons = false
    ) {
        $this->id = $id;
        $this->beautify = $beautify;
        $this->bordered = $bordered;
        $this->hoverable = $hoverable;
        $this->condensed = $condensed;
        $tmp = json_decode((string) json_encode($heads));
        if (\is_array($tmp)) {
            $this->heads = $tmp;
        }
        $this->footer = $footer;
        $this->buttons = $buttons;
    }

    public function border(): ?string {
        return ($this->bordered) ? 'table-bordered' : null;
    }

    public function hover(): ?string {
        return ($this->hoverable) ? 'table-hover' : null;
    }

    public function condense(): ?string {
        return ($this->condensed) ? 'table-condensed' : null;
    }

    public function render(): Renderable {
        return view('theme::components.table.datatable');
    }
}
