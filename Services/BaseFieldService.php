<?php

declare(strict_types=1);

namespace Modules\Theme\Services;

/*
* https://github.com/kdion4891/laravel-livewire-forms/blob/master/src/BaseField.php
* https://github.com/bastinald/laravel-livewire-forms/tree/master/src/Components
*/

use Illuminate\Support\Arr;

/**
 * Class BaseFieldService.
 */
<<<<<<< HEAD
class BaseFieldService {
=======
class BaseFieldService
{
>>>>>>> ede0df7 (first)
    protected string $name;

    protected string $type;

    protected string $input_type;

    protected int $textarea_rows = 5;

    protected array $options;

    /**
     * Undocumented variable.
     *
     * @var mixed
     */
    protected $default;

    /**
     * @var mixed
     */
    protected $autocomplete;

    protected string $placeholder = '';

    protected string $help = '';

    protected array $rules = [];

<<<<<<< HEAD
    /**
     * @phpstan-var view-string
     */
    protected string $view;
=======
    protected string $view = '';
>>>>>>> ede0df7 (first)

    /**
     * @param mixed $property
     *
     * @return mixed
     */
<<<<<<< HEAD
    public function __get($property) {
=======
    public function __get($property)
    {
>>>>>>> ede0df7 (first)
        return $this->$property;
    }

    /**
     * @param string $type
     *
     * @return $this
     */
<<<<<<< HEAD
    public function input($type = 'text') {
=======
    public function input($type = 'text')
    {
>>>>>>> ede0df7 (first)
        $this->type = 'input';
        $this->input_type = $type;

        return $this;
    }

    /**
     * @param int $rows
     *
     * @return $this
     */
<<<<<<< HEAD
    public function textarea($rows = 2) {
=======
    public function textarea($rows = 2)
    {
>>>>>>> ede0df7 (first)
        $this->type = 'textarea';
        $this->textarea_rows = $rows;

        return $this;
    }

    /**
     * @param array $options
     *
     * @return $this
     */
<<<<<<< HEAD
    public function select($options = []) {
=======
    public function select($options = [])
    {
>>>>>>> ede0df7 (first)
        $this->type = 'select';
        $this->options($options);

        return $this;
    }

    /**
     * @return $this
     */
<<<<<<< HEAD
    public function checkbox() {
=======
    public function checkbox()
    {
>>>>>>> ede0df7 (first)
        $this->type = 'checkbox';

        return $this;
    }

    /**
     * @param array $options
     *
     * @return $this
     */
<<<<<<< HEAD
    public function checkboxes($options = []) {
=======
    public function checkboxes($options = [])
    {
>>>>>>> ede0df7 (first)
        $this->type = 'checkboxes';
        $this->options($options);

        return $this;
    }

    /**
     * @param array $options
     *
     * @return $this
     */
<<<<<<< HEAD
    public function radio($options = []) {
=======
    public function radio($options = [])
    {
>>>>>>> ede0df7 (first)
        $this->type = 'radio';
        $this->options($options);

        return $this;
    }

    /**
     * @param array $options
     */
<<<<<<< HEAD
    protected function options($options): void {
=======
    protected function options($options): void
    {
>>>>>>> ede0df7 (first)
        $this->options = Arr::isAssoc($options) ? array_flip($options) : array_combine($options, $options);
    }

    /**
     * Undocumented function.
     *
     * @param mixed $default
     */
<<<<<<< HEAD
    public function default($default): self {
=======
    public function default($default): self
    {
>>>>>>> ede0df7 (first)
        $this->default = $default;

        return $this;
    }

    /**
     * @param mixed $autocomplete
     *
     * @return $this
     */
<<<<<<< HEAD
    public function autocomplete($autocomplete) {
=======
    public function autocomplete($autocomplete)
    {
>>>>>>> ede0df7 (first)
        $this->autocomplete = $autocomplete;

        return $this;
    }

    /**
     * @param string $placeholder
     *
     * @return $this
     */
<<<<<<< HEAD
    public function placeholder($placeholder) {
=======
    public function placeholder($placeholder)
    {
>>>>>>> ede0df7 (first)
        $this->placeholder = $placeholder;

        return $this;
    }

    /**
     * @param string $help
     *
     * @return $this
     */
<<<<<<< HEAD
    public function help($help) {
=======
    public function help($help)
    {
>>>>>>> ede0df7 (first)
        $this->help = $help;

        return $this;
    }

    /**
     * @param array $rules
     *
     * @return $this
     */
<<<<<<< HEAD
    public function rules($rules) {
=======
    public function rules($rules)
    {
>>>>>>> ede0df7 (first)
        $this->rules = $rules;

        return $this;
    }

    /**
<<<<<<< HEAD
     * @phpstan-param view-string $view
     *
=======
>>>>>>> ede0df7 (first)
     * @param string $view
     *
     * @return $this
     */
<<<<<<< HEAD
    public function view($view) {
=======
    public function view($view)
    {
>>>>>>> ede0df7 (first)
        $this->view = $view;

        return $this;
    }
}
