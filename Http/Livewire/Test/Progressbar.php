<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Test;

use Illuminate\Contracts\Support\Renderable;
use Livewire\Component;

class Progressbar extends Component {
    public int $perc = 0;

    /**
     * Undocumented function.
     */
    public function render(): Renderable {
        $view = 'theme::livewire.test.progressbar';
        $view_params = [
            'view' => $view,
        ];

        return view($view, $view_params);
    }

    /**
     * --.
     */
    public function start(): void {
        if ($this->perc < 100) {
            $this->handle();
            $this->emit('updateProgress', $this->perc);
        } else {
            session()->flash('message', 'FINITO');
        }
    }

    public function handle(): void {
        ++$this->perc;
    }
}
