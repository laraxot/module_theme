<?php

declare(strict_types=1);

namespace Modules\Theme\Providers;

use Exception;
//---- bases ----
use Illuminate\Foundation\AliasLoader;
use Illuminate\Pagination\Paginator;
//--- services ---
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Modules\Tenant\Services\TenantService;
use Modules\Theme\Http\View\Composers\ThemeComposer;
use Modules\Theme\Services\CollectiveService;
use Modules\Theme\Services\ThemeService;
use Modules\Xot\Providers\XotBaseServiceProvider;
use Modules\Xot\Services\BladeService;
use Modules\Xot\Services\FileService;

/**
 * Class ThemeServiceProvider.
 */
class ThemeServiceProvider extends XotBaseServiceProvider
{
    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;

    public string $module_name = 'theme';

    public function bootCallback(): void
    {
        $this->registerNamespaces('adm_theme');
        $this->registerNamespaces('pub_theme');

        $this->commands(
            [
                \Modules\Theme\Console\CreateThemeCommand::class,
            ]
        );

        $this->bootThemeProvider('pub_theme');

        BladeService::registerComponents($this->module_dir.'/../View/Components', 'Modules\\Theme');

        $this->registerCollective();

        $this->registerThemeConfig('adm_theme');
        $this->registerThemeConfig('pub_theme');

        $this->registerViewComposers(); //era in registercallback

        Paginator::useBootstrap();
    }

    public function registerCollective(): void
    {
        CollectiveService::registerComponents(
            $this->module_dir.'/../Resources/views/collective/fields',
            '',
            $this->module_name.'::',
        );

        CollectiveService::registerMacros($this->module_dir.'/../Macros');
    }

    /**
     * Undocumented function.
     *
     * @return void
     */
    public function bootThemeProvider(string $theme_type)
    {
        $xot = config('xra');

        //$xot = TenantService::config('xra');
        if (! \is_array($xot)) {
            throw new Exception('['.__LINE__.']['.class_basename(__CLASS__).']');
        }
        if (! isset($xot[$theme_type])) {
            return;
        }
        $theme = $xot[$theme_type];
        if (! File::exists(base_path('Themes/'.$theme))) {
            throw new Exception('['.base_path('Themes/'.$theme).' not exists]['.__LINE__.']['.class_basename(__CLASS__).']');
            $xot[$theme_type] = ThemeService::firstThemeName($theme_type);
            TenantService::saveConfig(['name' => 'xra', 'data' => $xot]);

            return;
        }
        $provider = 'Themes\\'.$theme.'\Providers\\'.$theme.'ServiceProvider';
        if (! class_exists($provider)) {
            throw new \Exception('class not exists ['.$provider.']['.__LINE__.']['.basename(__FILE__).']');
        }

        $provider = new $provider();

        if (method_exists($provider, 'bootCallback')) {
            $provider->bootCallback();
        }
    }

    /**
     * Undocumented function.
     *
     * @return void
     */
    public function registerNamespaces(string $theme_type)
    {
        $xot = config('xra');

        /*
        $xot = TenantService::config('xra');
        if (! is_array($xot)) {
            throw new Exception('['.__LINE__.']['.class_basename(__CLASS__).']');
        }
        */
        if (! isset($xot[$theme_type])) {
            $xot[$theme_type] = ThemeService::firstThemeName($theme_type);
            //TenantService::saveConfig(['name' => 'xra', 'data' => $xot]);
        }
        //*/
        $theme = $xot[$theme_type];

        $resource_path = 'Themes/'.$theme.'/Resources';
        $lang_dir = base_path($resource_path.'/lang');
        $lang_dir = FileService::fixPath($lang_dir);
        $theme_dir = base_path($resource_path.'/views');
        $theme_dir = FileService::fixPath($theme_dir);
        //120    Cannot access offset 'view' on Illuminate\Contracts\Foundation\Application.
        /*
        dddx([
            '$this->app[view]' => $this->app['view'], //Illuminate\View\Factory
            'test' => app('view'),
        ]
        );

        $this->app['view']->addNamespace($theme_type, $theme_dir);
        */
        app('view')->addNamespace($theme_type, $theme_dir);
        $this->loadTranslationsFrom($lang_dir, $theme_type);
    }

    public function registerThemeConfig(string $theme_type): void
    {
        //$xot = TenantService::config('xra');
        $xot = config('xra');
        if (! \is_array($xot)) {
            throw new Exception('['.__LINE__.']['.class_basename(__CLASS__).']');
        }
        if (! isset($xot[$theme_type])) {
            $xot[$theme_type] = ThemeService::firstThemeName($theme_type);
            //TenantService::saveConfig(['name' => 'xra', 'data' => $xot]);
        }
        $theme = $xot[$theme_type];

        $config_path = base_path('Themes/'.$theme.'/Config');
        if (! File::exists($config_path)) {
            return;
        }
        $files = File::files($config_path);
        foreach ($files as $file) {
            $name = $file->getFilenameWithoutExtension();
            $real_path = $file->getRealPath();
            if (false === $real_path) {
                throw new Exception('['.__LINE__.']['.class_basename(__CLASS__).']');
            }
            $data = File::getRequire($real_path);
            Config::set($theme_type.'::'.$name, $data);
        }
    }

    public function registerCallback(): void
    {
        $loader = AliasLoader::getInstance();
        $loader->alias('Theme', 'Modules\Theme\Services\ThemeService');

        //$this->registerViewComposers();
    }

    private function registerViewComposers(): void
    {
        $xot = config('xra');
        //$xot = TenantService::config('xra');
        if (! \is_array($xot)) {
            throw new Exception('['.__LINE__.']['.class_basename(__CLASS__).']');
        }
        $xot['pub_theme'] = ThemeService::getThemeType('pub_theme');

        $theme = inAdmin() ? $xot['adm_theme'] : $xot['pub_theme'];
        if (null === $theme) {
            throw new Exception('iuston gavemo un problema ['.__LINE__.']['.class_basename(__CLASS__).']');
        }

        $custom_composer = '\Themes\\'.$theme.'\View\Composers\ThemeComposer';
        if (class_exists($custom_composer)) {
            View::composer('*', $custom_composer);

            return;
        }

        View::composer('*', ThemeComposer::class);
        //dddx($res);
    }
}
