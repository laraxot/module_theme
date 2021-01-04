<?php

namespace Modules\Theme\Providers;

use Illuminate\Foundation\AliasLoader;
//---- bases ----
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Modules\Theme\Http\View\Composers\ThemeComposer;
//--- services ---
use Modules\Xot\Providers\XotBaseServiceProvider;
use Modules\Xot\Services\TenantService as Tenant;

class ThemeServiceProvider extends XotBaseServiceProvider {
    protected $module_dir = __DIR__;
    protected $module_ns = __NAMESPACE__;
    public $module_name = 'theme';

    public function bootCallback() {
        $xot = Tenant::config('xra');

        $adm_theme = $xot['adm_theme'];
        $adm_resource_path = 'views/themes/'.$adm_theme.'/Resources';
        $adm_lang_dir = resource_path($adm_resource_path.'/lang');
        $adm_theme_dir = resource_path($adm_resource_path.'/views');

        $pub_theme = $xot['pub_theme'];
        $pub_resource_path = 'views/themes/'.$pub_theme.'/Resources';
        $pub_lang_dir = resource_path($pub_resource_path.'/lang');
        $pub_theme_dir = resource_path($pub_resource_path.'/views');

        //$pub_theme_dir = resource_path('views'.\DIRECTORY_SEPARATOR.'themes'.\DIRECTORY_SEPARATOR.$pub_theme.\DIRECTORY_SEPARATOR.'Resources'.\DIRECTORY_SEPARATOR.'views');
        //die($pub_theme_dir.'['.__LINE__.']['.__FILE__.']');
        $adm_theme_dir = str_replace(['/', '\\'], [DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR], $adm_theme_dir);
        $pub_theme_dir = str_replace(['/', '\\'], [DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR], $pub_theme_dir);

        $adm_lang_dir = str_replace(['/', '\\'], [DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR], $adm_lang_dir);
        $pub_lang_dir = str_replace(['/', '\\'], [DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR], $pub_lang_dir);

        $this->app['view']->addNamespace('adm_theme', $adm_theme_dir);
        $this->app['view']->addNamespace('pub_theme', $pub_theme_dir);

        $this->loadTranslationsFrom($pub_lang_dir, 'pub_theme');
        $this->loadTranslationsFrom($adm_lang_dir, 'adm_theme');

        $this->commands([
            \Modules\Theme\Console\CreateThemeCommand::class,
        ]);
        //dddx(dirname($this->module_ns));
        Blade::componentNamespace(dirname($this->module_ns).'\View\Components', 'theme');
    }

    public function registerCallback() {
        $loader = AliasLoader::getInstance();
        $loader->alias('Theme', 'Modules\Theme\Services\ThemeService');

        $this->registerViewComposers();
    }

    private function registerViewComposers() {
        //Factory $view
        //$view->composer('bootstrap-italia::page', BootstrapItaliaComposer::class);
        View::composer('*', ThemeComposer::class);
        //dddx($res);
    }
}
