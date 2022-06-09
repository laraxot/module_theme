<?php

declare(strict_types=1);

namespace Modules\Theme\Models\Panels\Actions;

use Illuminate\Support\Facades\File;
use Modules\Xot\Models\Panels\Actions\XotBasePanelAction;
use Modules\Xot\Services\FileService;
use Modules\Xot\Services\SmartyService;

/**
 * Class TestAction.
 */
class ConvertSmartyToBladeAction extends XotBasePanelAction {
    public bool $onContainer = true;

    public string $icon = '<i class="fas fa-exchange-alt"></i>';

    /**
     * @return mixed
     */
    public function handle() {
        $directory = FileService::getViewNameSpacePath('pub_theme');

        if (null === $directory) {
            throw new \Exception('$directory is null');
        }

        $files = File::allFiles($directory);
        $smarty = new SmartyService();

        foreach ($files as $file) {
            // dddx(get_class_methods($file));
            if ('tpl' === $file->getExtension()) {
                $file_get_real_path = $file->getRealPath();
                if (false === $file_get_real_path) {
                    throw new \Exception('$directory is null');
                }
                $converted = $smarty->convert($file_get_real_path);

                //$new_file = substr(optional($file)->getRealPath(), 0, -3).'blade.php';
                $new_file = substr($file->getRealPath(), 0, -3).'blade.php';
                // dddx($new_file);
                File::put($new_file, $converted);
            }
        }

        return '<h3>+Done</h3>';
    }
}