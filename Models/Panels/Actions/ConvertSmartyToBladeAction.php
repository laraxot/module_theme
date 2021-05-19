<?php

declare(strict_types=1);

namespace Modules\Theme\Models\Panels\Actions;

use Illuminate\Support\Facades\File;
use Modules\Ewb\Services\EwbService;
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
        $converted = EwbService::convertSmartyToBladeAction();

        /*
        $directory = FileService::getViewNameSpacePath('pub_theme');

        $files = File::allFiles($directory);
        $smarty = new SmartyService();

        foreach ($files as $file) {
            //dddx(get_class_methods($file));
            if ('tpl' == $file->getExtension()) {
                $converted = $smarty->convert($file->getRealPath());


                $new_file = substr($file->getRealPath(), 0, -3).'blade.php';
                //dddx($new_file);
                File::put($new_file, $converted);
            }
        }
        */
        return '<h3>+Done</h3>';
    }
}
