<?php

declare(strict_types=1);

namespace Modules\Theme\Models\Panels\Actions;

//-------- services --------
use Illuminate\Support\Facades\File;
use Modules\Tenant\Services\TenantService;
use Modules\Theme\Services\ThemeService;
use Modules\Xot\Models\Panels\Actions\XotBasePanelAction;

/*
Voglio visualizzare tutte le icone (svg) del tema perchè così, chi di dovere, se lo sceglie
collaudato con la cartella metronic_one\Resources\views\media\svg,
le altre cartelle sembra diano problemi
*/

//-------- bases -----------
class ShowAllIconsAction extends XotBasePanelAction {
    public bool $onItem = true;

    public string $icon = '<i class="fas fa-plus-circle"></i>';

    public array $html = [];

    public function handle() {
        //$html_icon = ThemeService::renderIcon(ThemeService::tenantConfig('icons.tree.'.$name_icon));

        if (TenantService::config('icons.'.TenantService::config('xra.adm_theme'))) {
            $folder = TenantService::config('icons.'.TenantService::config('xra.adm_theme').'.folder');
            if (File::exists($folder)) {
                $this->checkDirectories($folder);
            //$this->checkFiles($folder);
            } else {
                return 'la cartella '.$folder.' non esiste';
            }
        } else {
            return 'aggionare file icons.php della cartella config/...-local';
        }
        /*
        $view = $this->panel->view();

        return view()->make($view, ['my_html' => $this->html]);
        */

        $view = 'adm_theme::layouts.default.show.acts.'.$this->getName();
        //dddx($view);
        /*
        return ThemeService::view($view)
            ->with('html', $this->html);
         */

        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }

    public function checkDirectories(string $folder): void {
        // controllo tutte le eventuali sottodirectory presenti
        foreach (File::directories($folder) as $dir) {
            //dddx(File::files($dir));
            $files = collect(File::files($dir))->map(
                function ($value) {
                    return ['file_name' => $value->getFilename(), 'extension' => $value->getExtension(), 'path_name' => $value->getPathname()];
                }
            )->all();

            //dddx($files);
            foreach ($files as $file) {
                if ('svg' == $file['extension']) {
                    $html_icon = ThemeService::renderIcon($file['path_name']);
                    $this->html[] = ['html' => $html_icon, 'file' => $file['path_name']];
                }
            }
            $this->checkDirectories($dir);
        }
        //$this->checkFiles($folder); //mi sa che questo non serve, forse perchè File::directories prende già tutti i file...
    }

    public function checkFiles(string $folder): void {
        // visualizzo tutti i possibili file presenti
        $files = collect(File::files($folder))->map(
            function ($value) {
                return ['file_name' => $value->getFilename(), 'extension' => $value->getExtension(), 'path_name' => $value->getPathname()];
            }
        )->all();
        foreach ($files as $file) {
            if ('svg' == $file['extension']) {
                $html_icon = ThemeService::renderIcon($file['path_name']);

                $this->html[] = ['html' => $html_icon, 'file' => $file['path_name']];
            }
        }
    }
}
