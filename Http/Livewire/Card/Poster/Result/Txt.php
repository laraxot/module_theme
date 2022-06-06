<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Card\Poster\Result;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Str;
use Livewire\Component;

/**
 * Class Txt.
 */
class Txt extends Component {
    public string $txt;
    public string $q;
    public int $pos = 0; // posizione della parola nella stringa
    public int $n = 0; // numero di ricorrenze totali della parola nella stringa
    public int $i = 1; // attuale posizione della ricorrenza su n della parola nella stringa
    public array $isDisabled = ['prev' => true, 'next' => false];

    public function mount(string $q, string $txt, string $url): void {
        $this->q = $q;
        $this->txt = $txt;
        $pos = stripos($this->txt, $this->q);
        if (false === $pos) {
            $pos = 0;
        }
        $this->pos = $pos;
        if ('' !== $q) {
            $this->n = Str::substrCount(strtolower($this->txt), strtolower($q));
        }

        $this->url = $url.'?q='.$this->q;
    }

    public function goNext(): void {
        $pos = stripos($this->txt, $this->q, $this->pos + 1);
        ++$this->i;
        if (false === $pos) {
            $pos = stripos($this->txt, $this->q);
            $this->i = 1;
        }
        $this->checkToggleButton();
        $this->pos = $pos;
        $this->setUrlQ();
    }

    public function goPrev(): void {
        $offset = -\strlen($this->txt) + $this->pos - 1;
        $this->pos = strripos($this->txt, $this->q, $offset);
        --$this->i;
        $this->checkToggleButton();
        $this->setUrlQ();
    }

    public function setUrlQ(): void {
        $this->url = Str::before($this->url, '?q=');
        $this->url = $this->url.'?q='.$this->q.'&n='.$this->i;
    }

    public function checkToggleButton(): void {
        switch ($this->i) {
            case 1 === $this->i:
                $this->isDisabled['prev'] = true;
                $this->isDisabled['next'] = false;
                break;
            case 1 < $this->i && $this->i < $this->n:
                $this->isDisabled['prev'] = false;
                $this->isDisabled['next'] = false;
                break;
            case $this->n === $this->i:
                $this->isDisabled['prev'] = false;
                $this->isDisabled['next'] = true;
                break;
        }
    }

    /**
     * Render the component.
     */
    public function render(): Renderable {
        /** 
        * @phpstan-var view-string
        */
        $view = 'theme::livewire.card.poster.result.txt';

        $this->setUrlQ();

        $txt = substr($this->txt, $this->pos - 50, 100);

        $tmp = '<a href="'.$this->url.'"><b>'.$this->q.'</b></a>';

        // $txt = str_ireplace($this->q, '<b>'.$this->q.'</b>', $txt);
        $txt = str_ireplace($this->q, $tmp, $txt);

        $html = '';
        if ($this->n > 0) {
            $html = 'n:['.$this->i.'/'.$this->n.'] ...'.$txt.'...';
        }
        $view_params = [
            'view' => $view,
            'html' => $html,
        ];

        return view()->make($view, $view_params);
    }
}
