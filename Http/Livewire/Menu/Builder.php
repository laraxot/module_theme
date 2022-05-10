<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Menu;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Modules\Theme\Models\Menu;
use Modules\Theme\Models\MenuItem;

class Builder extends Component {
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

    public function render() {
        $this->getMenus();
        if (config('menu.use_roles')) {
            $this->roles = DB::table(config('menu.roles_table'))->select([config('menu.roles_pk'), config('menu.roles_title_field')])->get();
            $this->role_pk = config('menu.roles_pk');
            $this->role_title_field = config('menu.roles_title_field');
        }
        $view = 'theme::livewire.menu.builder';

        return view($view);
    }

    public function getMenus() {
        $menu = new Menu();
        $this->menulist = $menu->select(['id', 'name'])->get()->pluck('name', 'id')->prepend('Select menu', 0)->all();
    }

    public function deleteMenu($id) {
        $menus = new MenuItem();
        $getall = $menus->getall($id);
        if (0 === \count($getall)) {
            $menudelete = Menu::find($id);
            $menudelete->delete();
            $this->success = 'you delete this item';

            $this->selectedMenu = '';
            $this->getMenus();
        } else {
            $this->error = 'You have to delete all items first';
        }
    }

    public function deleteMenuItem($id) {
        $menuitem = MenuItem::find($id);
        $menuitem->delete();
        $this->menuItemSelected = null;
        $this->chooseMenu();
    }

    public function updateMenuItem() {
        $menuitem = MenuItem::find($this->menuItemSelected['id']);
        $menuitem->label = $this->menuItemLabel;
        $menuitem->link = $this->menuItemLink;
        $menuitem->class = $this->menuItemClass;
        if (config('menu.use_roles')) {
            $menuitem->role_id = $this->menuItemRole ?: 0;
        }
        $menuitem->save();
        $this->menuItemSelected = null;
        $this->chooseMenu();
    }

    public function selectMenuItem($id) {
        $item = MenuItem::find($id);
        if (null === $this->menuItemSelected || $this->menuItemSelected['id'] !== $item['id']) {
            $this->menuItemSelected = $item;
            $this->menuItemLabel = $item->label;
            $this->menuItemClass = $item->class;
            $this->menuItemLink = $item->link;
            $this->menuItemRole = $item->role_id;
        } else {
            $this->menuItemSelected = null;
        }
    }

    public function changeTree($data) {
        if (\is_array($data)) {
            foreach ($data as $value) {
                $menuitem = MenuItem::find($value['id']);
                $menuitem->parent = $value['parent'];
                $menuitem->sort = $value['sort'];
                $menuitem->depth = $value['depth'];

                $menuitem->save();
            }
            $this->chooseMenu();
        }
    }

    public function createNewMenu() {
        $this->selectedMenu = '';
        $this->menuItems = [];
        $this->menuName = '';
    }

    public function chooseMenu() {
        if ($this->selectedMenu) {
            $menuItem = new MenuItem();
            $menu_list = $menuItem->getall($this->selectedMenu);
            $roots = $menu_list->where('menu', (int) $this->selectedMenu);
            $this->menuItems = self::tree($roots, $menu_list);
            $menu = Menu::find($this->selectedMenu);
            $this->menuName = $menu->name;
        } else {
            $this->menuItems = [];
        }
//        dd($this->menuItems);
    }

    public function addMenuItem() {
        $menuitem = new MenuItem();
        $menuitem->label = $this->label;
        $menuitem->link = $this->url;
        if (config('menu.use_roles')) {
            $menuitem->role_id = $this->role ?: 0;
        }
        $menuitem->menu = $this->selectedMenu;
        $menuitem->sort = MenuItem::getNextSortRoot($this->selectedMenu);
        $menuitem->save();
        $this->chooseMenu();
        $this->label = '';
        $this->url = '';
    }

    public function updateMenu() {
        if ('' === $this->menuName) {
            $this->error = 'Enter menu name!';
        } else {
            $menu = Menu::find($this->selectedMenu);
            $menu->name = $this->menuName;
            $menu->save();

            $this->getMenus();
        }
    }

    public function changeOrder($id, $dir) {
        $item = MenuItem::find($id);

        switch ($dir) {
            case 'up':
                $prevElem = MenuItem::where('sort', '<', $item->sort)->where('menu', $item->menu)->orderBy('sort', 'desc')->first();
                $prevElem->sort = $prevElem->sort + 1;
                $prevElem->save();

                $item->sort = $item->sort - 1;
                $item->save();
                break;
            case 'down':
                $nextElem = MenuItem::where('sort', '>', $item->sort)->where('menu', $item->menu)->orderBy('sort')->first();
                $nextElem->sort = $nextElem->sort - 1;
                $nextElem->save();

                $item->sort = $item->sort + 1;
                $item->save();
                break;
            case 'top':
                MenuItem::where('id', '<>', $item->id)->where('menu', $item->menu)
                    ->update([
                        'sort' => DB::raw('sort+1'),
                    ]);

                $item->sort = 1;
                $item->save();
                break;
        }

        $this->chooseMenu();
        $this->menuItemSelected = null;
    }

    public function createMenu() {
        if ('' === $this->menuName) {
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

    private static function tree($items, $all_items) {
        $data_arr = [];
        $i = 0;
        foreach ($items as $item) {
            $data_arr[$i] = $item;
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
