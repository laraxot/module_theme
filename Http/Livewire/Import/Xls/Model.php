<?php
/**
 * @see https://sweetcode.io/import-and-export-excel-files-data-using-in-laravel/
 */

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Import\Xls;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Xot\Services\XLSService;
use SplFileInfo;

/**
 * Class Field.
 */
class Model extends Component {
    use WithFileUploads;

    /**
     * @var SplFileInfo
     */
    public $myfile;

    public array $fillable;
    public array $fields = [];
    public array $form_data = [];
    public string $modelClass;

    public bool $is_first_row_head = false;

    /**
     * Undocumented function.
     *
     * @return void
     */
    public function mount(string $modelClass, ?array $fields, ?array $trans) {
        $this->modelClass = $modelClass;
        $this->fillable = app($modelClass)->getFillable();
        $this->fillable = array_combine($this->fillable, $this->fillable);

        if (\is_array($fields)) {
            $this->fields = $fields;
        }
        if (\is_array($trans)) {
            $this->trans = $trans;
            $this->fillable = array_merge($this->fillable, $this->trans);
            // dddx($this->fillable);
        }
    }

    /**
     * Undocumented function.
     */
    public function getDataProperty(): Collection {
        $path = $this->myfile->getRealPath();

        if (false !== $path) {
            return XLSService::make()
            ->fromFilePath($path)
            ->getData()
            ;
        } else {
            return collect([]);
        }
    }

    /**
     * Undocumented function.
     */
    public function render(): Renderable {
        $view = 'theme::livewire.import.xls.model';
        $view_params = [];

        return view()->make($view, $view_params);
    }

    /**
     * Undocumented function.
     *
     * @return void
     */
    public function import() {
        $model = app($this->modelClass);
        $rows = $this->data;

        // controllo che non vengano erroneamente importati contatti con tutti campi null
        $rows = $rows->filter(function ($item) {
            foreach ($item->toArray() as $key => $value) {
                if (null !== $value) {
                    return $item;
                }
            }
        });

        if ($this->is_first_row_head) {
            $rows = $rows->slice(1);
        }

        foreach ($rows as $v) {
            $keys = array_values($this->form_data);
            $values = $v->values()->all();
            $data = array_combine($keys, $values);

            if (false !== $data && false !== $this->fields) {
                $data = array_merge($data, $this->fields);
            }
            // dddx(['data' => $data, 'v' => $v, 'form_data' => $this->form_data]);
            $model->create($data);
        }
        session()->flash('message', 'Import successfully ');
    }
}
