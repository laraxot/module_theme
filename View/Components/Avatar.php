<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

<<<<<<< HEAD
use Exception;
=======
>>>>>>> ede0df7 (first)
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Illuminate\View\Component;

/**
 * Class Avatar.
 */
<<<<<<< HEAD
class Avatar extends Component {
=======
class Avatar extends Component
{
>>>>>>> ede0df7 (first)
    public string $type;

    public string $img_src;

    public string $size;

<<<<<<< HEAD
    public function __construct(string $type = 'circle', string $img_src = '', string $size = '') {
=======
    public function __construct(string $type = 'circle', string $img_src = '', string $size = '')
    {
>>>>>>> ede0df7 (first)
        $this->type = $type;
        $this->img_src = $img_src;
        $this->size = $size;
    }

<<<<<<< HEAD
    public function render(): View {
        /**
         * @phpstan-var view-string
         */
=======
    public function render(): View
    {
>>>>>>> ede0df7 (first)
        $view = 'theme::components.avatar.circle';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }

<<<<<<< HEAD
    public function message(): string {
        $res = Arr::first($this->messages());
        if (! is_string($res)) {
            throw new Exception('['.__LINE__.']['.__FILE__.']');
        }

        return $res;
    }

    public function messages(): array {
        // return (array) session()->get($this->type);
        return []; // ////------------ to fix ------------
    }

    public function exists(): bool {
        // return session()->has($this->type) && ! empty($this->messages());
        return false; // ------------- to fix -----------
=======
    public function message(): string
    {
        return (string) Arr::first($this->messages());
    }

    public function messages(): array
    {
        return (array) session()->get($this->type);
    }

    public function exists(): bool
    {
        return session()->has($this->type) && ! empty($this->messages());
>>>>>>> ede0df7 (first)
    }
}
