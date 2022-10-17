<?php

declare(strict_types=1);

namespace Modules\Theme\View\Composers;

use Modules\Theme\Models\Menu;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Modules\Xot\Services\FileService;

/**
 * --.
 */
class ThemeComposer {
    /**
     * --. fa riferimento a modelli di theme, e per mostrare una cosa nel tema.
     */
    public function getMenuByName(string $name): ?Menu {
        return Menu::firstWhere('name', $name);
    }

    /**
     * --.
     */
    public function getMenuItemsByName(string $name): Collection {
        $menu = Menu::firstWhere('name', $name);
        if (null === $menu) {
            return collect([]);
        }
        $rows = $menu->items;

        return $rows;
    }


    public function cssInLine(string $file):string {
        
        $content=File::get(FileService::assetPath($file));;
        return $content;
    }
}
