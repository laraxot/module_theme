<?php
/**
 * https://github.com/cagilo/cagilo.
 */

declare(strict_types=1);

namespace Modules\Theme\View\Components;

<<<<<<< HEAD
use Exception;
=======
>>>>>>> ede0df7 (first)
use Illuminate\Contracts\Session\Session;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Illuminate\View\Component;

/**
 * Undocumented class.
 */
<<<<<<< HEAD
class Alert extends Component {
=======
class Alert extends Component
{
>>>>>>> ede0df7 (first)
    public string $type;

    public ?string $title;
    public bool $dismissable;

    /**
     * @var \Illuminate\Contracts\Session\Session
     */
    protected $session;

<<<<<<< HEAD
    public function __construct(Session $session, string $type = 'info', bool $dismissable = true, ?string $title = null) {
=======
    public function __construct(Session $session, string $type = 'info', bool $dismissable = true, ?string $title = null)
    {
>>>>>>> ede0df7 (first)
        $this->session = $session;
        $this->type = $type;
        $this->title = $title;
        $this->dismissable = $dismissable;
    }

<<<<<<< HEAD
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
        if (! is_string($res)) {
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
=======
    public function render(): View
    {
        return view('theme::components.alert');
    }

    public function icon():string
    {
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

    public function message(): string
    {
        return (string) Arr::first($this->messages());
    }

    public function messages(): array
    {
        return (array) session()->get($this->type);
>>>>>>> ede0df7 (first)
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
