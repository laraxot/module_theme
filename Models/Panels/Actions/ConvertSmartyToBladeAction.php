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
<<<<<<< HEAD
class ConvertSmartyToBladeAction extends XotBasePanelAction {
=======
class ConvertSmartyToBladeAction extends XotBasePanelAction
{
>>>>>>> ede0df7 (first)
    public bool $onContainer = true;

    public string $icon = '<i class="fas fa-exchange-alt"></i>';

    /**
     * @return mixed
     */
<<<<<<< HEAD
    public function handle() {
        $directory = FileService::getViewNameSpacePath('pub_theme');

        if (null === $directory) {
=======
    public function handle()
    {
        $directory = FileService::getViewNameSpacePath('pub_theme');

        if (null == $directory) {
>>>>>>> ede0df7 (first)
            throw new \Exception('$directory is null');
        }

        $files = File::allFiles($directory);
        $smarty = new SmartyService();

        foreach ($files as $file) {
<<<<<<< HEAD
            // dddx(get_class_methods($file));
            if ('tpl' === $file->getExtension()) {
                $file_get_real_path = $file->getRealPath();
                if (false === $file_get_real_path) {
=======
            //dddx(get_class_methods($file));
            if ('tpl' == $file->getExtension()) {
                $file_get_real_path = $file->getRealPath();
                if (false == $file_get_real_path) {
>>>>>>> ede0df7 (first)
                    throw new \Exception('$directory is null');
                }
                $converted = $smarty->convert($file_get_real_path);

<<<<<<< HEAD
                // $new_file = substr(optional($file)->getRealPath(), 0, -3).'blade.php';
                $new_file = substr($file->getRealPath(), 0, -3).'blade.php';
                // dddx($new_file);
=======
                $new_file = substr(optional($file)->getRealPath(), 0, -3).'blade.php';
                //dddx($new_file);
>>>>>>> ede0df7 (first)
                File::put($new_file, $converted);
            }
        }

        return '<h3>+Done</h3>';
    }
}
