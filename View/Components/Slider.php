<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\View\Component;

/**
 * Class Slider.
 */
class Slider extends Component {
    public string $driver;
    public string $errorKey = '?'; //phpstan
    public string $name = '?'; //phpstan

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
    public function __construct(?string $driver=null) {
        if($driver===null){
            $driver='noui';
        }
        $this->driver = $driver;
        //$this->config = is_array($config) ? $config : [];
        $this->config = [];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): \Illuminate\Contracts\Support\Renderable {
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

        if (isset($this->size) && in_array($this->size, ['sm', 'lg'])) {
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

        $errors = session()->get('errors');

        // Check if exists any error related to the configured error key.

        return ! empty($errors) && ! empty($errors->first($this->errorKey));
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
        if (null == $errKey) {
            return $this->name;
        }

        return preg_replace('@\[([^]]+)\]@', '.$1', $errKey);
    }
}
