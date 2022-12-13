<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Card;

use Illuminate\Contracts\Support\Renderable;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Modules\Media\Actions\GetVideoFrameContentAction;

/**
 * Undocumented class
 */
class TryCard extends Component {
    public int $i = 1;
    public int $n = 10;

    public function mount(?string $type = 'v1'): void {
        $this->type = $type;
    }

    /**
     * Undocumented function.
     *
     * @return void
     */
    public function goNext() {
        if ($this->i < $this->n) {
            ++$this->i;
        }
    }

    /**
     * Undocumented function.
     *
     * @return void
     */
    public function goPrev() {
        if ($this->i > 1) {
            --$this->i;
        }
    }

    public function getImgSrcProperty() {
        $sec = $this->i * 10 + 2;

        $res = app(GetVideoFrameContentAction::class)->execute('cache', 'test.mp4', $sec);
        $res = 'data:image/png;base64, '.base64_encode($res);

        return $res;
        // $img = Image::make($res);

        // return $img->response();
        //
        // return $res;
    }

    /**
     * Render the component.
     */
    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::livewire.card.try.'.$this->type;
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
