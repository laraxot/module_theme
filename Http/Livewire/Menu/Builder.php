<?php

<<<<<<< HEAD
declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Menu;

use Exception;
// use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Modules\Theme\Models\Menu;
use Modules\Theme\Models\MenuItem;

class Builder extends Component {
    public array $menulist = [];
    public array $menuItems = [];
    public ?int $selectedMenu = null;
    public string $menuName = '';
    public string $error = '';
    public string $success = '';
    public string $label = '';
    public string $url = '';
    public ?int $role = null;
    public string $role_pk = '';
    public string $role_title_field = '';
    public string $menuItemLabel = '';
    public string $menuItemClass = '';
    public string $menuItemLink = '';
    public string $menuItemRole = '';
    public Collection $roles;
    public ?MenuItem $menuItemSelected = null;

    /**
     * Undocumented variable.
     *
     * @var array
     */
    protected $listeners = ['change-tree' => 'changeTree'];

    public function render(): Renderable {
        $this->getMenus();
        /**
         * @var string
         */
        $menu_roles_table = config('menu.roles_table');
        if (config('menu.use_roles')) {
            $this->roles = DB::table($menu_roles_table)
                ->select([config('menu.roles_pk'), config('menu.roles_title_field')])
                ->get();
            /**
             * @var string
             */
            $role_pk = config('menu.roles_pk');
            $this->role_pk = $role_pk;
            /**
             * @var string
             */
            $role_title_field = config('menu.roles_title_field');
            $this->role_title_field = $role_title_field;
        }
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::livewire.menu.builder';

        return view($view);
    }

    public function getMenus(): array {
        $menu = new Menu();
        $this->menulist = $menu->select(['id', 'name'])->get()->pluck('name', 'id')->prepend('Select menu', 0)->all();

        return $this->menulist;
    }

    public function deleteMenu(int $id): void {
        $menus = new MenuItem();
        $getall = $menus->getall($id);
        if (0 === \count($getall)) {
            $menudelete = Menu::findOrFail($id);
            $menudelete->delete();
            $this->success = 'you delete this item';

            $this->selectedMenu = null;
            $this->getMenus();
        } else {
            $this->error = 'You have to delete all items first';
        }
    }

    public function deleteMenuItem(int $id): void {
        $menuitem = MenuItem::find($id);
        if (null != $menuitem) {
            $menuitem->delete();
        }
        $this->menuItemSelected = null;
        $this->chooseMenu();
    }

    public function updateMenuItem(): void {
        // $menuitem = MenuItem::findOrFail($this->menuItemSelected['id']);
        if (null == $this->menuItemSelected) {
            return;
        }
        $menuitem = MenuItem::where('id', $this->menuItemSelected['id'])->first();
        if (null == $menuitem) {
            throw new Exception('['.__LINE__.']['.__FILE__.']');
        }
        $up = [
            'label' => $this->menuItemLabel,
            'link' => $this->menuItemLink,
            'class' => $this->menuItemClass,
            'role_id' => $this->menuItemRole ?: 0,
        ];

        $menuitem->update($up);
        /*
=======
namespace Modules\Theme\Http\Livewire\Menu;

use Illuminate\Support\Facades\DB;
use Modules\Theme\Models\MenuItem;
use Modules\Theme\Models\Menu;
use Livewire\Component;

class Builder extends Component{
    public $menulist = [];
    public $menuItems = [];
    public $selectedMenu = '';
    public $menuName = '';
    public $error = '';
    public $success = '';
    public $label = '';
    public $url = '';
    public $role = '';
    public $role_pk = '';
    public $role_title_field = '';
    public $menuItemLabel = '';
    public $menuItemClass = '';
    public $menuItemLink = '';
    public $menuItemRole = '';
    public $roles = [];
    public $menuItemSelected = null;
    protected $listeners = ['change-tree' => 'changeTree'];

    public function render(){
        $this->getMenus();
        if (config('menu.use_roles')) {
            $this->roles = DB::table(config('menu.roles_table'))->select([config('menu.roles_pk'), config('menu.roles_title_field')])->get();
            $this->role_pk = config('menu.roles_pk');
            $this->role_title_field = config('menu.roles_title_field');
        }
        $view = 'theme::livewire.menu.builder';
        return view($view);
    }


    public function getMenus()
    {
        $menu = new Menu();
        $this->menulist = $menu->select(['id', 'name'])->get()->pluck('name', 'id')->prepend('Select menu', 0)->all();
    }

    public function deleteMenu($id)
    {
        $menus = new MenuItem();
        $getall = $menus->getall($id);
        if (count($getall) == 0) {
            $menudelete = Menu::find($id);
            $menudelete->delete();
            $this->success = "you delete this item";

            $this->selectedMenu = '';
            $this->getMenus();
        } else {
            $this->error = "You have to delete all items first";
        }
    }

    public function deleteMenuItem($id)
    {
        $menuitem = MenuItem::find($id);
        $menuitem->delete();
        $this->menuItemSelected = null;
        $this->chooseMenu();

    }

    public function updateMenuItem()
    {
        $menuitem = MenuItem::find($this->menuItemSelected['id']);
>>>>>>> ede0df7 (first)
        $menuitem->label = $this->menuItemLabel;
        $menuitem->link = $this->menuItemLink;
        $menuitem->class = $this->menuItemClass;
        if (config('menu.use_roles')) {
<<<<<<< HEAD
            $menuitem->role_id = $this->menuItemRole ?: 0;
        }
        $menuitem->save();
        */
=======
            $menuitem->role_id = $this->menuItemRole ? $this->menuItemRole : 0;
        }
        $menuitem->save();
>>>>>>> ede0df7 (first)
        $this->menuItemSelected = null;
        $this->chooseMenu();
    }

<<<<<<< HEAD
    public function selectMenuItem(int $id): void {
        $item = MenuItem::find($id);
        if (null != $item) {
            if (null === $this->menuItemSelected || $this->menuItemSelected['id'] !== $item['id']) {
                $this->menuItemSelected = $item;
                $this->menuItemLabel = $item->label ?? '';
                $this->menuItemClass = $item->class ?? '';
                $this->menuItemLink = $item->link ?? '';
                $this->menuItemRole = (string) $item->role_id;
            } else {
                $this->menuItemSelected = null;
            }
        }
    }

    /**
     * Undocumented function.
     *
     * @param array|null $data
     */
    public function changeTree($data): void {
        if (\is_array($data)) {
            foreach ($data as $value) {
                // $menuitem = MenuItem::find($value['id']);
                $menuitem = MenuItem::where('id', $value['id'])->first();
                if (null == $menuitem) {
                    throw new Exception('['.__LINE__.']['.__FILE__.']');
                }
                $menuitem->parent = $value['parent'];
                $menuitem->sort = $value['sort'];
                $menuitem->depth = $value['depth'];
=======
    public function selectMenuItem($id)
    {
        $item = MenuItem::find($id);
        if ($this->menuItemSelected == null || $this->menuItemSelected['id'] != $item['id']) {
            $this->menuItemSelected = $item;
            $this->menuItemLabel = $item->label;
            $this->menuItemClass = $item->class;
            $this->menuItemLink = $item->link;
            $this->menuItemRole = $item->role_id;
        } else {
            $this->menuItemSelected = null;
        }

    }

    public function changeTree($data)
    {
        if (is_array($data)) {
            foreach ($data as $value) {

                $menuitem = MenuItem::find($value["id"]);
                $menuitem->parent = $value["parent"];
                $menuitem->sort = $value["sort"];
                $menuitem->depth = $value["depth"];
>>>>>>> ede0df7 (first)

                $menuitem->save();
            }
            $this->chooseMenu();
        }
    }

<<<<<<< HEAD
    public function createNewMenu(): void {
        $this->selectedMenu = null;
=======
    public function createNewMenu()
    {
        $this->selectedMenu = '';
>>>>>>> ede0df7 (first)
        $this->menuItems = [];
        $this->menuName = '';
    }

<<<<<<< HEAD
    public function chooseMenu(): void {
        if ($this->selectedMenu) {
            $menuItem = new MenuItem();
            $menu_list = $menuItem->getall($this->selectedMenu);
            $roots = $menu_list->where('menu', (int) $this->selectedMenu);
            $this->menuItems = self::tree($roots, $menu_list);
            $menu = Menu::find($this->selectedMenu);
            if (null != $menu) {
                $this->menuName = $menu->name ?? '';
            }
=======
    public function chooseMenu()
    {
        if ($this->selectedMenu) {

            $menuItem = new MenuItem;
            $menu_list = $menuItem->getall($this->selectedMenu);
            $roots = $menu_list->where('menu', (integer)$this->selectedMenu);
            $this->menuItems = self::tree($roots, $menu_list);
            $menu = Menu::find($this->selectedMenu);
            $this->menuName = $menu->name;
>>>>>>> ede0df7 (first)
        } else {
            $this->menuItems = [];
        }
//        dd($this->menuItems);
    }

<<<<<<< HEAD
    public function addMenuItem(): void {
=======
    public function addMenuItem()
    {
>>>>>>> ede0df7 (first)
        $menuitem = new MenuItem();
        $menuitem->label = $this->label;
        $menuitem->link = $this->url;
        if (config('menu.use_roles')) {
<<<<<<< HEAD
            $menuitem->role_id = $this->role ?: 0;
        }
        $menuitem->menu = $this->selectedMenu;
        $menuitem->sort = MenuItem::getNextSortRoot($this->selectedMenu ?? 0);
=======
            $menuitem->role_id = $this->role ? $this->role : 0;
        }
        $menuitem->menu = $this->selectedMenu;
        $menuitem->sort = MenuItem::getNextSortRoot($this->selectedMenu);
>>>>>>> ede0df7 (first)
        $menuitem->save();
        $this->chooseMenu();
        $this->label = '';
        $this->url = '';
    }

<<<<<<< HEAD
    public function updateMenu(): void {
        if ('' === $this->menuName) {
            $this->error = 'Enter menu name!';
        } else {
            $menu = Menu::findOrFail($this->selectedMenu);
=======
    public function updateMenu()
    {
        if ($this->menuName == '') {
            $this->error = 'Enter menu name!';
        } else {

            $menu = Menu::find($this->selectedMenu);
>>>>>>> ede0df7 (first)
            $menu->name = $this->menuName;
            $menu->save();

            $this->getMenus();
        }
    }

<<<<<<< HEAD
    public function changeOrder(string $id, string $dir): void {
        $item = MenuItem::find($id);
        if (null == $item) {
            return;
        }
        switch ($dir) {
            case 'up':
                $prevElem = MenuItem::where('sort', '<', $item->sort)
                    ->where('menu', $item->menu)
                    ->orderBy('sort', 'desc')
                    ->first();
                if (null != $prevElem) {
                    $prevElem->sort = $prevElem->sort + 1;
                    $prevElem->save();
                }
=======
    public function changeOrder($id, $dir)
    {
        $item = MenuItem::find($id);

        switch ($dir) {
            case 'up':

                $prevElem = MenuItem::where('sort', '<', $item->sort)->where('menu', $item->menu)->orderBy('sort', 'desc')->first();
                $prevElem->sort = $prevElem->sort + 1;
                $prevElem->save();
>>>>>>> ede0df7 (first)

                $item->sort = $item->sort - 1;
                $item->save();
                break;
            case 'down':
<<<<<<< HEAD
                $nextElem = MenuItem::where('sort', '>', $item->sort)
                    ->where('menu', $item->menu)
                    ->orderBy('sort')
                    ->first();
                if (null != $nextElem) {
                    $nextElem->sort = $nextElem->sort - 1;
                    $nextElem->save();
                }
=======

                $nextElem = MenuItem::where('sort', '>', $item->sort)->where('menu', $item->menu)->orderBy('sort')->first();
                $nextElem->sort = $nextElem->sort - 1;
                $nextElem->save();
>>>>>>> ede0df7 (first)

                $item->sort = $item->sort + 1;
                $item->save();
                break;
            case 'top':
<<<<<<< HEAD
                MenuItem::where('id', '<>', $item->id)
                    ->where('menu', $item->menu)
=======

                MenuItem::where('id', '<>', $item->id)->where('menu', $item->menu)
>>>>>>> ede0df7 (first)
                    ->update([
                        'sort' => DB::raw('sort+1'),
                    ]);

                $item->sort = 1;
                $item->save();
                break;
<<<<<<< HEAD
=======

>>>>>>> ede0df7 (first)
        }

        $this->chooseMenu();
        $this->menuItemSelected = null;
<<<<<<< HEAD
    }

    public function createMenu(): void {
        if ('' === $this->menuName) {
=======

    }

    public function createMenu()
    {

        if ($this->menuName == '') {
>>>>>>> ede0df7 (first)
            $this->error = 'Enter menu name!';
        } else {
            $menu = new Menu();
            $menu->name = $this->menuName;
            $menu->save();
            $this->getMenus();
            $menu->name = '';
            $this->selectedMenu = $menu->id;

            $this->chooseMenu();
        }
    }

<<<<<<< HEAD
    /**
     * Undocumented function.
     *
     * @param Collection<MenuItem> $items
     * @param Collection<MenuItem> $all_items
     */
    private static function tree(Collection $items, Collection $all_items): array {
        $data_arr = [];
        $i = 0;
        foreach ($items as $item) {
            $data_arr[$i] = $item;
            // Cannot access property $id on mixed.
            $find = $all_items->where('parent', $item->id);
            $data_arr[$i]['child'] = [];
            if ($find->count()) {
                $data_arr[$i]['child'] = self::tree($find, $all_items);
            }
            ++$i;
        }

        return $data_arr;
    }
}
=======
    private static function tree($items, $all_items)
    {
        $data_arr = array();
        $i = 0;
        foreach ($items as $item) {
            $data_arr[$i] = $item;
            $find = $all_items->where('parent', $item->id);
            $data_arr[$i]['child'] = array();
            if ($find->count()) {
                $data_arr[$i]['child'] = self::tree($find, $all_items);
            }
            $i++;
        }
        return $data_arr;
    }
}
>>>>>>> ede0df7 (first)
