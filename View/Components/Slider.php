<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

<<<<<<< HEAD
use Illuminate\Support\Facades\Session;
=======
>>>>>>> ede0df7 (first)
use Illuminate\View\Component;

/**
 * Class Slider.
 */
class Slider extends Component {
    public string $driver;
<<<<<<< HEAD
    public string $errorKey = '?'; // phpstan
    public string $name = '?'; // phpstan
=======
    public string $errorKey = '?'; //phpstan
    public string $name = '?'; //phpstan
>>>>>>> ede0df7 (first)

    /**
     * The bootstrap-slider plugin configuration parameters. Array with
     * key => value pairs, where the key should be an existing configuration
     * property of the plugin.
     *
     * @var array
     */
    public $config;

    /**
     * Create a new component instance.
     *
     * @return void
     */
<<<<<<< HEAD
    public function __construct(?string $driver = null) {
        if (null === $driver) {
            $driver = 'noui';
        }
        $this->driver = $driver;
        // $this->config = is_array($config) ? $config : [];
=======
    public function __construct(?string $driver=null) {
        if($driver===null){
            $driver='noui';
        }
        $this->driver = $driver;
        //$this->config = is_array($config) ? $config : [];
>>>>>>> ede0df7 (first)
        $this->config = [];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): \Illuminate\Contracts\Support\Renderable {
<<<<<<< HEAD
        /**
         * @phpstan-var view-string
         */
=======
>>>>>>> ede0df7 (first)
        $view = 'theme::components.slider.'.$this->driver;
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }

    /**
     * Make the class attribute for the input group item.
     *
     * @return string
     */
    public function makeItemClass() {
        $classes = ['form-control'];

        if ($this->isInvalid() && ! isset($this->disableFeedback)) {
            $classes[] = 'is-invalid';
        }

        // The next workaround setups the plugin when using sm/lg sizes.
        // Note: this may change with newer plugin versions.

<<<<<<< HEAD
        if (isset($this->size) && \in_array($this->size, ['sm', 'lg'], true)) {
=======
        if (isset($this->size) && in_array($this->size, ['sm', 'lg'])) {
>>>>>>> ede0df7 (first)
            $classes[] = "form-control-{$this->size}";
            $classes[] = 'p-0';
        }

        return implode(' ', $classes);
    }

    /**
     * Check if there exists validation errors on the session related to the
     * configured error key.
     *
     * @return bool
     */
    public function isInvalid() {
        // Get the errors bag from session. The errors bag will be an instance
        // of the Illuminate\Support\MessageBag class.
<<<<<<< HEAD
        // Cannot call method get() on mixed.
        // $errors = session()->get('errors');
        $errors = Session::get('errors');
        // Check if exists any error related to the configured error key.
        return ! empty($errors);
        // Cannot call method first() on mixed.
        // return ! empty($errors) && ! empty($errors->first($this->errorKey));
=======

        $errors = session()->get('errors');

        // Check if exists any error related to the configured error key.

        return ! empty($errors) && ! empty($errors->first($this->errorKey));
>>>>>>> ede0df7 (first)
    }

    /**
     * Make the error key that will be used to search for validation errors.
     * The error key is generated from the 'name' property.
     * Examples:
     * $name = 'files[]'         => $errorKey = 'files'.
     * $name = 'person[2][name]' => $errorKey = 'person.2.name'.
     *
     * @return array|string|null
     */
    protected function makeErrorKey() {
        $errKey = preg_replace('@\[\]$@', '', $this->name);
<<<<<<< HEAD
        if (null === $errKey) {
=======
        if (null == $errKey) {
>>>>>>> ede0df7 (first)
            return $this->name;
        }

        return preg_replace('@\[([^]]+)\]@', '.$1', $errKey);
    }
}
