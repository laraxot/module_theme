<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Card\Result;

<<<<<<< HEAD
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Str;
use Livewire\Component;
use Modules\Theme\Models\BaseModelLang;
=======
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Str;
use Livewire\Component;
>>>>>>> ede0df7 (first)
use Modules\Xot\Contracts\PanelContract;

/**
 * Class Panel.
 */
class Panel extends Component {
    //   public PanelContract $panel;
    public string $q;
    public int $pos = 0;
    public int $n = 0;
    public int $i = 1;

    public string $txt;

<<<<<<< HEAD
    // public string $txt_field='txt';

    public function mount(PanelContract $panel, string $q): void {
        // $this->panel = $panel;
        $this->q = $q;
        // Access to an undefined property Illuminate\Database\Eloquent\Model::$txt
        // $this->txt = $panel->row->txt;
        /**
         * @var BaseModelLang
         */
        $row = $panel->row;
        if (null == $row) {
            throw new Exception('['.__LINE__.']['.__FILE__.']');
        }
        $this->txt = $row->txt ?? '';
        $this->pos = (int) stripos($this->txt, $this->q);
        $this->n = Str::substrCount(strtolower($this->txt), strtolower($q));
    }

    /**
     * Undocumented function.
     *
     * @return void
     */
=======
    //public string $txt_field='txt';

    public function mount(PanelContract $panel, string $q): void {
        //$this->panel = $panel;
        $this->q = $q;
        $this->txt = $panel->row->txt;
        $this->pos = stripos($this->txt, $this->q);
        $this->n = Str::substrCount(strtolower($this->txt), strtolower($q));
    }

>>>>>>> ede0df7 (first)
    public function goNext() {
        $pos = stripos($this->txt, $this->q, $this->pos + 1);
        ++$this->i;
        if (false === $pos) {
            $pos = stripos($this->txt, $this->q);
            $this->i = 1;
        }
<<<<<<< HEAD
        $this->pos = (int) $pos;
    }

    /**
     * Undocumented function.
     *
     * @return void
     */
    public function goPrev() {
        // $offset=-$this->pos;
        $offset = -\strlen($this->txt) + $this->pos - 1;
        $this->pos = (int) strripos($this->txt, $this->q, $offset);
=======
        $this->pos = $pos;
    }

    public function goPrev() {
        //$offset=-$this->pos;
        $offset = -strlen($this->txt) + $this->pos - 1;
        $this->pos = strripos($this->txt, $this->q, $offset);
>>>>>>> ede0df7 (first)
        --$this->i;
    }

    /**
     * Render the component.
<<<<<<< HEAD
     */
    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
=======
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function render(): Renderable {
>>>>>>> ede0df7 (first)
        $view = 'theme::livewire.card.result.panel';
        $txt = substr($this->txt, $this->pos - 50, 100);
        $txt = str_ireplace($this->q, '<b>'.$this->q.'</b>', $txt);
        $view_params = [
            'view' => $view,
            'html' => 'n:['.$this->i.'/'.$this->n.'] '.$txt,
        ];

        return view()->make($view, $view_params);
    }
}
