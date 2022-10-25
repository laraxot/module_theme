<?php
/**
 * https://github.com/cagilo/cagilo.
 */

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Exception;
use Illuminate\Contracts\Session\Session;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Illuminate\View\Component;

/**
 * Undocumented class.
 */
class Alert extends Component {
    public string $type;

    public ?string $title;
    public bool $dismissable;

    /**
     * @var \Illuminate\Contracts\Session\Session
     */
    protected $session;

    public function __construct(Session $session, string $type = 'info', bool $dismissable = true, ?string $title = null) {
        $this->session = $session;
        $this->type = $type;
        $this->title = $title;
        $this->dismissable = $dismissable;
    }

    public function render(): View {
        return view('theme::components.alert');
    }

    public function icon(): string {
        switch ($this->type) {
            case 'info':
                return 'info';
            case 'warning':
                return 'exclamation-triangle';
            case 'success':
                return 'check';
            case 'danger':
                return 'ban';
            default:
                return 'exclamation';
        }
    }

    public function message(): string {
        $res = Arr::first($this->messages());
        if (! \is_string($res)) {
            throw new Exception('['.__LINE__.']['.__FILE__.']');
        }

        return $res;
    }

    public function messages(): array {
        // Cannot call method get() on mixed.
        // return (array) session()->get($this->type);
        // return (array) Session::get($this->type);
        // return $this->session->get($this->type);
        // ------------- TO FIX --------------------
        return [];
    }

    /*
     * Determine if the component should be rendered.
     */
    /*
    public function shouldRender(): bool {
        return session()->has($this->type) && ! empty($this->messages());
    }
    */
}
