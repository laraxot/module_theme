<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Panel;

<<<<<<< HEAD
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Collection;
use Livewire\Component;
use Modules\LU\Models\User;
=======
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Collection;
use Livewire\Component;
>>>>>>> ede0df7 (first)
use Modules\Xot\Contracts\PanelContract;

/**
 * Class Crud.
 */
class Crud extends Component {
    public Collection $fields;
    public Collection $rows;
    public array $rules;
    public array $form_data;
    public string $model_name;
<<<<<<< HEAD
    public bool $updateMode = false;
    public int $user_id;
    public string $name;
    public string $email;
=======
>>>>>>> ede0df7 (first)

    /**
     * Undocumented function.
     */
    public function mount(PanelContract $panel): void {
        $this->rules = $panel->rules();
        $this->fields = $panel->getFields();
        $this->rows = $panel->rows()->get();
    }

    /**
     * Undocumented function.
     */
    protected function rules(): array {
        return $this->rules;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    /**
     * Render the component.
     */
    public function render(): Renderable {
<<<<<<< HEAD
        /**
         * @phpstan-var view-string
         */
=======
>>>>>>> ede0df7 (first)
        $view = 'theme::livewire.panel.crud';

        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }

    /**
     * Undocumented function.
     *
     * @return void
     */
    private function resetInputFields() {
        $this->name = '';
        $this->email = '';
    }

    /**
     * Undocumented function.
     *
     * @return void
     */
    public function store() {
        $validatedDate = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        User::create($validatedDate);

        session()->flash('message', 'Users Created Successfully.');

        $this->resetInputFields();

        $this->emit('userStore'); // Close model to using to jquery
    }

    /**
     * Undocumented function.
     *
<<<<<<< HEAD
     * @return void
     */
    public function edit(int $id) {
        $this->updateMode = true;
        $user = User::where('id', $id)->first();
        if (null == $user) {
            throw new Exception('['.__LINE__.']['.__FILE__.']');
        }
        $this->user_id = $id;
        $this->name = $user->first_name ?? '';
        $this->email = $user->email ?? '';
=======
     * @param [type] $id
     *
     * @return void
     */
    public function edit($id) {
        $this->updateMode = true;
        $user = User::where('id', $id)->first();
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
>>>>>>> ede0df7 (first)
    }

    /**
     * Undocumented function.
     *
     * @return void
     */
    public function cancel() {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    /**
     * Undocumented function.
     *
     * @return void
     */
    public function update() {
        $validatedDate = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        if ($this->user_id) {
            $user = User::find($this->user_id);
<<<<<<< HEAD
            if (null != $user) {
                $user->update([
                    'name' => $this->name,
                    'email' => $this->email,
                ]);
            }
=======
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
            ]);
>>>>>>> ede0df7 (first)
            $this->updateMode = false;
            session()->flash('message', 'Users Updated Successfully.');
            $this->resetInputFields();
        }
    }

<<<<<<< HEAD
    /**
     * Undocumented function.
     *
     * @param string $id
     *
     * @return void
     */
=======
>>>>>>> ede0df7 (first)
    public function delete($id) {
        if ($id) {
            User::where('id', $id)->delete();
            session()->flash('message', 'Users Deleted Successfully.');
        }
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> ede0df7 (first)
