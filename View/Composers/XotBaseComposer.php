<?php

declare(strict_types=1);

namespace Modules\Theme\View\Composers;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Modules\Theme\Models\Menu;
use Modules\Theme\Models\MenuItem;

/**
 * --.
 */
abstract class XotBaseComposer
{
    /**
     * --.
     */
    public function getMenuByName(string $name): ?Menu
    {
        return Menu::firstWhere('name', $name);
    }

    /**
     * --.
     */
    public function getMenuItemsByName(string $name): Collection
    {
        $menu = Menu::firstWhere('name', $name);
        if (null === $menu) {
            return collect([]);
        }
        $rows = $menu->items;
        // $sql = Str::replaceArray('?', $rows->getBindings(), $rows->toSql());
        // $test = MenuItem::where('menu', 2)->get();
        // dddx(
        //    [
        // 'sql' => $sql,
        // 'test' => $test,
        // 'rows' => $rows,
        // ]
        // );
        return $rows;
    }
}
