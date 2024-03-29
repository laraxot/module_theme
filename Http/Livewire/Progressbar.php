<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire;

use Illuminate\Contracts\Support\Renderable;
use Livewire\Component;

class Progressbar extends Component
{
    public int $perc = 0;
    public string $autostart = 'false';
    public int $loop_index = 0;
    public int $loop_max = 100;
    public array $errors = [];
    public string $title = '';
    public string $message = '';
    public string $url = '?';
    public string $onComplete = '';

    /**
     * Undocumented function.
     */
    public function render(): Renderable
    {
        $view = 'theme::livewire.progressbar.v1';
        $view_params = [
            'view' => $view,
        ];

        return view($view, $view_params);
    }

    /**
     * --.
     */
    public function start(): void
    {
        if ($this->loop_index < $this->loop_max) {
            $this->perc = (int) ($this->loop_index * 100 / $this->loop_max);
            $this->handle();
            $this->emit('updateProgress', $this->perc);
        } else {
            $this->perc = 100;
            session()->flash('message', 'FINITO');
        }
    }

    public function handle(): void
    {
        ++$this->loop_index;
    }
}
