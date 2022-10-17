<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire;

/*
 * https://github.com/kdion4891/laravel-livewire-forms/blob/master/src/FormComponent.php.
 */

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Livewire\Component;
use Modules\Theme\Services\FieldService;
use Modules\Theme\Traits\FollowsRules;
use Modules\Theme\Traits\HandlesArrays;
use Modules\Theme\Traits\UploadsFiles;

<<<<<<< HEAD
// use Kdion4891\LaravelLivewireTables\Traits\ThanksYajra;
=======
//use Kdion4891\LaravelLivewireTables\Traits\ThanksYajra;
>>>>>>> ede0df7 (first)

/**
 * Class XotBaseFormComponent.
 */
<<<<<<< HEAD
abstract class XotBaseFormComponent extends Component {
    use FollowsRules;
    use HandlesArrays;
    use UploadsFiles;
=======
abstract class XotBaseFormComponent extends Component
{
    use FollowsRules;
    use UploadsFiles;
    use HandlesArrays;
>>>>>>> ede0df7 (first)

    /**
     * Undocumented variable.
     */
    public ?Model $model = null;

    public array $form_data = [];

    public array $daynames = [];

    private static string $storage_disk;

    private static string $storage_path;

    /**
     * Listener di eventi di Livewire.
     *
     * @var array
     */
    protected $listeners = ['fileUpdate'];

<<<<<<< HEAD
    /** @param mixed $model */

    // *
=======
    // @param mixed $model

    //*
>>>>>>> ede0df7 (first)

    /**
     * Undocumented function.
     */
<<<<<<< HEAD
    public function mount(?Model $model = null): void {
=======
    public function mount(?Model $model = null): void
    {
>>>>>>> ede0df7 (first)
        $this->setFormProperties($model);
        $this->setDaynames();
    }

<<<<<<< HEAD
    // */

    public function setDaynames(): void {
=======
    //*/

    public function setDaynames(): void
    {
>>>>>>> ede0df7 (first)
        $this->daynames = [
            trans('theme::txt.day_names.sun'),
            trans('theme::txt.day_names.mon'),
            trans('theme::txt.day_names.tue'),
            trans('theme::txt.day_names.wed'),
            trans('theme::txt.day_names.thu'),
            trans('theme::txt.day_names.fri'),
            trans('theme::txt.day_names.sat'),
        ];
    }

<<<<<<< HEAD
    public function setFormProperties(?Model $model = null): void {
=======
    public function setFormProperties(?Model $model = null): void
    {
>>>>>>> ede0df7 (first)
        $this->model = $model;
        if ($model) {
            $this->form_data = $model->toArray();
        }

        foreach ($this->fields() as $field) {
            if (! isset($this->form_data[$field->name])) {
<<<<<<< HEAD
                $array = \in_array($field->type, ['checkbox', 'file'], true);
=======
                $array = in_array($field->type, ['checkbox', 'file']);
>>>>>>> ede0df7 (first)
                $this->form_data[$field->name] = $field->default ?? ($array ? [] : null);
                if (Str::contains($field->name, '.')) {
                    [$rel,$rel_field] = explode('.', $field->name);

                    $rel_val = '';
<<<<<<< HEAD
                    // 92     Dead catch - Exception is never thrown in the try block.
                    // try {
                    $rel_val = $this->model->$rel->$rel_field;
                    // } catch (\Exception $e) {
                    // }
=======
                    //92     Dead catch - Exception is never thrown in the try block.
                    //try {
                    $rel_val = $this->model->$rel->$rel_field;
                    //} catch (\Exception $e) {
                    //}
>>>>>>> ede0df7 (first)
                    $this->form_data[$field->name] = $rel_val;
                }
            }
        }
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\Contracts\View\View
     */
<<<<<<< HEAD
    public function render(): \Illuminate\Contracts\Support\Renderable {
=======
    public function render():\Illuminate\Contracts\Support\Renderable
    {
>>>>>>> ede0df7 (first)
        return $this->formView();
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
<<<<<<< HEAD
    public function formView() {
        /**
         * @phpstan-var view-string
         */
=======
    public function formView()
    {
>>>>>>> ede0df7 (first)
        $view = 'theme::livewire.form';
        $view_params = [
            'view' => $view,
            'fields' => $this->fields(),
        ];

        return view()->make($view, $view_params);
    }

<<<<<<< HEAD
    public function fields(): array {
=======
    public function fields(): array
    {
>>>>>>> ede0df7 (first)
        return [
            /*
            FieldService::make('Name')->input()->rules(['required', 'string', 'max:255']),
            FieldService::make('Email')->input('email')->rules(['required', 'string', 'email', 'max:255', 'unique:users,email']),
            FieldService::make('Password')->input('password')->rules(['required', 'string', 'min:8', 'confirmed']),
            FieldService::make('Confirm Password', 'password_confirmation')->input('password'),
            */
        ];
    }

    /**
     * @param string $field
     *
     * @return void
     */
<<<<<<< HEAD
    public function updated($field) {
        // $this->validateOnly($field, $this->rules(true));
    }

    public function submit(): void {
        // $this->validate($this->rules());
=======
    public function updated($field)
    {
        //$this->validateOnly($field, $this->rules(true));
    }

    public function submit(): void
    {
        //$this->validate($this->rules());
>>>>>>> ede0df7 (first)
        dddx(['form_data' => $this->form_data]);
        $field_names = [];
        foreach ($this->fields() as $field) {
            $field_names[] = $field->name;
        }
        $this->form_data = Arr::only($this->form_data, $field_names);

        $this->success();
    }

    /**
     * @param string $message
     *
     * @return string|string[]
     */
<<<<<<< HEAD
    public function errorMessage($message) {
        return str_replace('form data.', '', $message);
    }

    public function success(): void {
        // $this->form_data['password'] = bcrypt($this->form_data['password']);
        // \App\User::create($this->form_data);
        dddx($this->form_data);
    }

    public function saveAndStay(): void {
=======
    public function errorMessage($message)
    {
        return str_replace('form data.', '', $message);
    }

    public function success(): void
    {
        //$this->form_data['password'] = bcrypt($this->form_data['password']);
        //\App\User::create($this->form_data);
        dddx($this->form_data);
    }

    public function saveAndStay(): void
    {
>>>>>>> ede0df7 (first)
        $this->submit();
        $this->saveAndStayResponse();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
<<<<<<< HEAD
    public function saveAndStayResponse() {
        return redirect()->route('users.create');
    }

    public function saveAndGoBack(): void {
=======
    public function saveAndStayResponse()
    {
        return redirect()->route('users.create');
    }

    public function saveAndGoBack(): void
    {
>>>>>>> ede0df7 (first)
        $this->submit();
        $this->saveAndGoBackResponse();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
<<<<<<< HEAD
    public function saveAndGoBackResponse() {
=======
    public function saveAndGoBackResponse()
    {
>>>>>>> ede0df7 (first)
        return redirect()->route('users.index');
    }
}
