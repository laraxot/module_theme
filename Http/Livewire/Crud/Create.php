<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Crud;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Livewire\Component;
use Modules\Cms\Services\PanelService;

/**
 * Class Create.
 */
class Create extends Component
{
    public Model $model;
    public Collection  $fields;
    public array $form_data = [];
    public array $rules = [];

    /**
     * Undocumented function.
     *
     * @return void
     */
    public function mount(string $modelName)
    {
        $this->model = xotModel($modelName);
        $panel = PanelService::make()->get($this->model);
        $this->fields = $panel->getFields(['act' => 'create']);
        $tmp = $panel->getRules(['act' => 'create']);
        $rules = [];
        foreach ($tmp as $k => $v) {
            $k1 = 'form_data.'.$k;
            $rules[$k1] = $v;
        }
        $this->rules = $rules;
    }

    /**
     * Undocumented function.
     */
    public function render(): Renderable
    {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::livewire.crud.create';

        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }

    /**
     * @return void
     */
    public function saveAndStay()
    {
        $this->submit();

        // $this->saveAndStayResponse();
    }

    /**
     * @return void
     */
    public function saveAndStayResponse()
    {
        // return redirect()->route('users.create');
    }

    /**
     * @return void
     */
    public function saveAndGoBack()
    {
        $this->submit();
        // $this->saveAndGoBackResponse();
    }

    /**
     * @return void
     */
    public function saveAndGoBackResponse()
    {
        // return redirect()->route('users.index');
    }

    /**
     * @return void
     */
    public function submit()
    {
        $validatedData = $this->validate($this->rules);
        // dddx($validatedData);
        /*
         "form_data" => array:3 [▼
        "body" => "dff"
        "slug" => "gg"
        "subject" => "hh"
        ]*/

        /*
        $field_names = [];
        foreach ($this->fields() as $field) {
            $field_names[] = $field->name;
        }
        $this->form_data = Arr::only($this->form_data, $field_names);
        */
        $panel = PanelService::make()->get($this->model);
        $method = 'store';

        $func = '\Modules\Xot\Jobs\PanelCrud\\'.Str::studly($method).'Job';
        $panel = $func::dispatchSync($this->form_data, $panel);
        session()->flash('message', 'Item was created');
        // $this->success();
    }

    // public function success()
    // {
    //    $this->form_data['password'] = bcrypt($this->form_data['password']);

    //    \App\User::create($this->form_data);
    // }
}
