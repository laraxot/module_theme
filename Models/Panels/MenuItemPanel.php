<?php

<<<<<<< HEAD
declare(strict_types=1);

namespace Modules\Theme\Models\Panels;

use Illuminate\Http\Request;
use Modules\Theme\Models\MenuItem;
// --- Services --
=======
namespace Modules\Theme\Models\Panels;

use Illuminate\Http\Request;
use Modules\Xot\Contracts\RowsContract;
//--- Services --
>>>>>>> ede0df7 (first)

use Modules\Xot\Models\Panels\XotBasePanel;

class MenuItemPanel extends XotBasePanel {
    /**
     * The model the resource corresponds to.
<<<<<<< HEAD
     */
    public static string $model = MenuItem::class;
    public MenuItem $row;

    /**
     * The single value that should be used to represent the resource when being displayed.
=======
     *
     * @var string
     */
    public static string $model = 'Modules\Theme\Models\MenuItem';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
>>>>>>> ede0df7 (first)
     */
    public static string $title = 'title';

    /**
<<<<<<< HEAD
     * Get the fields displayed by the resource.
        'value'=>'..',
     */
    public function fields(): array {
        return [
            0 => (object) [
                'type' => 'String',
                'name' => 'label',
                'rules' => 'required',
                'comment' => null,
            ],
            1 => (object) [
                'type' => 'String',
                'name' => 'link',
                'rules' => 'required',
                'comment' => null,
            ],
            2 => (object) [
                'type' => 'Bigint',
                'name' => 'parent',
                'rules' => 'required',
                'comment' => null,
            ],
            3 => (object) [
                'type' => 'Integer',
                'name' => 'sort',
                'rules' => 'required',
                'comment' => null,
            ],
            4 => (object) [
                'type' => 'String',
                'name' => 'class',
                'comment' => null,
            ],
            5 => (object) [
                'type' => 'Bigint',
                'name' => 'menu',
                'rules' => 'required',
                'comment' => null,
            ],
            6 => (object) [
                'type' => 'Integer',
                'name' => 'depth',
                'rules' => 'required',
                'comment' => null,
            ],
            7 => (object) [
                'type' => 'Integer',
                'name' => 'role_id',
                'rules' => 'required',
                'comment' => null,
            ],
        ];
=======
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = array (
);

    /**
     * The relationships that should be eager loaded on index queries.
     *
     */
    public function with():array {
        return [];
    }

    public function search() :array {

        return [];
    }

    /**
     * on select the option id
     *
     * quando aggiungi un campo select, è il numero della chiave
     * che viene messo come valore su value="id"
     *
     * @param Modules\Theme\Models\MenuItem $row
     *
     * @return int|string|null
     */
    public function optionId($row) {
        return $row->getKey();
    }

    /**
     * on select the option label.
     */
    public function optionLabel($row):string {
        return (string)$row->area_define_name;
    }

    /**
     * index navigation.
     */
    public function indexNav(): ?\Illuminate\Contracts\Support\Renderable {
        return null;
    }

    /**
     * Build an "index" query for the given resource.
     *
     * @param RowsContract $query
     *
     * @return RowsContract
     */
    public static function indexQuery(array $data, $query)
    {
        //return $query->where('user_id', $request->user()->id);
        return $query;
    }



    /**
     * Get the fields displayed by the resource.
     *
     * @return array
        'col_size' => 6,
        'sortable' => 1,
        'rules' => 'required',
        'rules_messages' => ['it'=>['required'=>'Nome Obbligatorio']],
        'value'=>'..',
     */
    public function fields(): array {
        return array (
  0 => 
  (object) array(
     'type' => 'String',
     'name' => 'label',
     'rules' => 'required',
     'comment' => NULL,
  ),
  1 => 
  (object) array(
     'type' => 'String',
     'name' => 'link',
     'rules' => 'required',
     'comment' => NULL,
  ),
  2 => 
  (object) array(
     'type' => 'Bigint',
     'name' => 'parent',
     'rules' => 'required',
     'comment' => NULL,
  ),
  3 => 
  (object) array(
     'type' => 'Integer',
     'name' => 'sort',
     'rules' => 'required',
     'comment' => NULL,
  ),
  4 => 
  (object) array(
     'type' => 'String',
     'name' => 'class',
     'comment' => NULL,
  ),
  5 => 
  (object) array(
     'type' => 'Bigint',
     'name' => 'menu',
     'rules' => 'required',
     'comment' => NULL,
  ),
  6 => 
  (object) array(
     'type' => 'Integer',
     'name' => 'depth',
     'rules' => 'required',
     'comment' => NULL,
  ),
  7 => 
  (object) array(
     'type' => 'Integer',
     'name' => 'role_id',
     'rules' => 'required',
     'comment' => NULL,
  ),
);
>>>>>>> ede0df7 (first)
    }

    /**
     * Get the tabs available.
<<<<<<< HEAD
     */
    public function tabs(): array {
=======
     *
     * @return array
     */
    public function tabs():array {
>>>>>>> ede0df7 (first)
        $tabs_name = [];

        return $tabs_name;
    }

    /**
     * Get the cards available for the request.
<<<<<<< HEAD
     */
    public function cards(Request $request): array {
=======
     *
     * @return array
     */
    public function cards(Request $request):array {
>>>>>>> ede0df7 (first)
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Illuminate\Http\Request $request
<<<<<<< HEAD
     */
    public function filters(Request $request = null): array {
=======
     *
     * @return array
     */
    public function filters(Request $request = null):array {
>>>>>>> ede0df7 (first)
        return [];
    }

    /**
     * Get the lenses available for the resource.
<<<<<<< HEAD
     */
    public function lenses(Request $request): array {
=======
     *
     * @return array
     */
    public function lenses(Request $request):array {
>>>>>>> ede0df7 (first)
        return [];
    }

    /**
     * Get the actions available for the resource.
<<<<<<< HEAD
     */
    public function actions(): array {
=======
     *
     * @return array
     */
    public function actions():array {
>>>>>>> ede0df7 (first)
        return [];
    }
}
