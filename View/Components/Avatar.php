<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Exception;
use Illuminate\Support\Arr;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

/**
 * Class Avatar.
 */
class Avatar extends Component {
    public string $type;

    public string $img_src;

    public string $size;

    public function __construct(string $type = 'circle', string $img_src = '', string $size = '') {
        $this->type = $type;
        $this->img_src = $img_src;
        $this->size = $size;
    }

    public function render(): View {
        $view = 'theme::components.avatar.circle';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }

    public function message(): string {
        $res= Arr::first($this->messages());
        if(!is_string($res)){
            throw new Exception('['.__LINE__.']['.__FILE__.']');
        }
        return $res;
    }

    public function messages(): array {
        //return (array) session()->get($this->type);
        return []; //////------------ to fix ------------
    }

    public function exists(): bool {
        //return session()->has($this->type) && ! empty($this->messages());
        return false; //------------- to fix -----------
    }
}