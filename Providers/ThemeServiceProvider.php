<?php

namespace Modules\Theme\Providers;

use Illuminate\Foundation\AliasLoader;
//---- bases ----
use Modules\Xot\Providers\XotBaseServiceProvider;
//--- services ---
use Modules\Xot\Services\TenantService as Tenant;

class ThemeServiceProvider extends XotBaseServiceProvider {
    protected $module_dir = __DIR__;
    protected $module_ns = __NAMESPACE__;
    public $module_name = 'theme';

    public function bootCallback() {
        $xot = Tenant::config('xra');

        $adm_theme = $xot['adm_theme'];
        $adm_theme_dir = resource_path('views'.\DIRECTORY_SEPARATOR.'themes'.\DIRECTORY_SEPARATOR.$adm_theme.\DIRECTORY_SEPARATOR.'Resources'.\DIRECTORY_SEPARATOR.'views');
        $pub_theme = $xot['pub_theme'];
        //$pub_theme = config('xra.pub_theme');
        $pub_theme_dir = resource_path('views'.\DIRECTORY_SEPARATOR.'themes'.\DIRECTORY_SEPARATOR.$pub_theme.\DIRECTORY_SEPARATOR.'Resources'.\DIRECTORY_SEPARATOR.'views');
        //die($pub_theme_dir.'['.__LINE__.']['.__FILE__.']');

        $this->app['view']->addNamespace('adm_theme', $adm_theme_dir);
        $this->app['view']->addNamespace('pub_theme', $pub_theme_dir);

        //ddd($pub_theme_dir.'/translations');
        $this->loadTranslationsFrom($pub_theme_dir.'/Resources/lang', 'pub_theme');
        $this->loadTranslationsFrom($adm_theme_dir.'/Resources/lang', 'adm_theme');

        $this->commands([
            \Modules\Theme\Console\CreateThemeCommand::class,
        ]);

        //livewire registration
    }

    public function registerCallback() {
        $loader = AliasLoader::getInstance();
        $loader->alias('Theme', 'Modules\Theme\Services\ThemeService');
    }
}
