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
<<<<<<< HEAD
 *
 * @property Collection $data
=======
>>>>>>> ede0df7 (first)
 */
class Model extends Component {
    use WithFileUploads;

    /**
     * @var SplFileInfo
     */
    public $myfile;

    public array $fillable;
    public array $fields = [];
<<<<<<< HEAD
    public array $trans = [];
=======
>>>>>>> ede0df7 (first)
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
<<<<<<< HEAD
        $this->fillable = array_combine($this->fillable, $this->fillable);

        if (\is_array($fields)) {
            $this->fields = $fields;
        }
        if (\is_array($trans)) {
            $this->trans = $trans;
            $this->fillable = collect($this->fillable)->merge($this->trans)->all();
            
        }
        
=======
        $this->fillable=array_combine($this->fillable,$this->fillable);

        if (is_array($fields)) {
            $this->fields = $fields;
        }
        if (is_array($trans)) {
            $this->trans = $trans;
            $this->fillable=array_merge($this->fillable,$this->trans);
            //dddx($this->fillable);
        }
>>>>>>> ede0df7 (first)
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
<<<<<<< HEAD
        /**
         * @phpstan-var view-string
         */
=======
>>>>>>> ede0df7 (first)
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
<<<<<<< HEAD

        $rows = $this->data;

        /**
         * controllo che non vengano erroneamente importati contatti con tutti campi null.
         *
         * @var Collection<Collection>
         */
        $rows = $rows->filter(
            /**
             * @param Model $item
             */
            function ($item) {
                // Cannot call method toArray() on mixed.
                foreach ($item->toArray() as $key => $value) {
                    if (null !== $value) {
                        return $item;
                    }
                }
            }
        );
=======
        $rows = $this->data;

        //controllo che non vengano erroneamente importati contatti con tutti campi null
        $rows = $rows->filter(function ($item) {
            foreach ($item->toArray() as $key => $value) {
                if (! is_null($value)) {
                    return $item;
                }
            }
        });
>>>>>>> ede0df7 (first)

        if ($this->is_first_row_head) {
            $rows = $rows->slice(1);
        }

        foreach ($rows as $v) {
            $keys = array_values($this->form_data);
<<<<<<< HEAD
            // Cannot call method values() on mixed.
            $values = $v->values()->all();
            $data = array_combine($keys, $values);
            // dddx([$keys, $data, $values]);
            // Result of && is always true.
            // if (false !== $data && false !== $this->fields) {
            if (false != $data && false != $this->fields) {
                $data = array_merge($data, $this->fields);
            }
            // dddx(['data' => $data, 'v' => $v, 'form_data' => $this->form_data, 'keys' => $keys]);
=======
            $values = $v->values()->all();
            $data = array_combine($keys, $values);

            if (false !== $data && false !== $this->fields) {
                $data = array_merge($data, $this->fields);
            }
            //dddx(['data' => $data, 'v' => $v, 'form_data' => $this->form_data]);
>>>>>>> ede0df7 (first)
            $model->create($data);
        }
        session()->flash('message', 'Import successfully ');
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> ede0df7 (first)
