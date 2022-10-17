<?php

declare(strict_types=1);

namespace Modules\Theme\Providers;

use Exception;
<<<<<<< HEAD
// ---- bases ----
use Illuminate\Foundation\AliasLoader;
use Illuminate\Pagination\Paginator;
// --- services ---
=======
//---- bases ----
use Illuminate\Foundation\AliasLoader;
use Illuminate\Pagination\Paginator;
//--- services ---
>>>>>>> ede0df7 (first)
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
<<<<<<< HEAD
class ThemeServiceProvider extends XotBaseServiceProvider {
=======
class ThemeServiceProvider extends XotBaseServiceProvider
{
>>>>>>> ede0df7 (first)
    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;

    public string $module_name = 'theme';

<<<<<<< HEAD
    public array $xot = [];

    /**
     * Undocumented function.
     */
    public function getXot(): array {
        return $this->xot;
    }

    /**
     * Undocumented function.
     */
    public function bootCallback(): void {
        $xot = config('xra');

        // $xot = TenantService::config('xra');
        if (! \is_array($xot)) {
            // throw new Exception('['.__LINE__.']['.class_basename(__CLASS__).']');
            $xot = [];
        }
        $this->xot = $xot;

=======
    public function bootCallback(): void
    {
>>>>>>> ede0df7 (first)
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

<<<<<<< HEAD
        $this->registerViewComposers(); // era in registercallback
=======
        $this->registerViewComposers(); //era in registercallback
>>>>>>> ede0df7 (first)

        Paginator::useBootstrap();
    }

<<<<<<< HEAD
    public function registerCollective(): void {
=======
    public function registerCollective(): void
    {
>>>>>>> ede0df7 (first)
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
<<<<<<< HEAD
    public function bootThemeProvider(string $theme_type) {
        $xot = $this->getXot();
=======
    public function bootThemeProvider(string $theme_type)
    {
        $xot = config('xra');

        //$xot = TenantService::config('xra');
        if (! \is_array($xot)) {
            throw new Exception('['.__LINE__.']['.class_basename(__CLASS__).']');
        }
>>>>>>> ede0df7 (first)
        if (! isset($xot[$theme_type])) {
            return;
        }
        $theme = $xot[$theme_type];
        if (! File::exists(base_path('Themes/'.$theme))) {
<<<<<<< HEAD
            $xot[$theme_type] = ThemeService::firstThemeName($theme_type);
            TenantService::saveConfig(['name' => 'xra', 'data' => $xot]);
            throw new Exception('['.base_path('Themes/'.$theme).' not exists]['.__LINE__.']['.class_basename(__CLASS__).']');
=======
            throw new Exception('['.base_path('Themes/'.$theme).' not exists]['.__LINE__.']['.class_basename(__CLASS__).']');
            $xot[$theme_type] = ThemeService::firstThemeName($theme_type);
            TenantService::saveConfig(['name' => 'xra', 'data' => $xot]);

            return;
>>>>>>> ede0df7 (first)
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
<<<<<<< HEAD
    public function registerNamespaces(string $theme_type) {
        /**
         * @var array
         */
        $xot = $this->getXot();
=======
    public function registerNamespaces(string $theme_type)
    {
        $xot = config('xra');
>>>>>>> ede0df7 (first)

        /*
        $xot = TenantService::config('xra');
        if (! is_array($xot)) {
            throw new Exception('['.__LINE__.']['.class_basename(__CLASS__).']');
        }
        */
        if (! isset($xot[$theme_type])) {
            $xot[$theme_type] = ThemeService::firstThemeName($theme_type);
<<<<<<< HEAD
            // TenantService::saveConfig(['name' => 'xra', 'data' => $xot]);
        }
        // */
=======
            //TenantService::saveConfig(['name' => 'xra', 'data' => $xot]);
        }
        //*/
>>>>>>> ede0df7 (first)
        $theme = $xot[$theme_type];

        $resource_path = 'Themes/'.$theme.'/Resources';
        $lang_dir = base_path($resource_path.'/lang');
        $lang_dir = FileService::fixPath($lang_dir);
        $theme_dir = base_path($resource_path.'/views');
        $theme_dir = FileService::fixPath($theme_dir);
<<<<<<< HEAD
        // 120    Cannot access offset 'view' on Illuminate\Contracts\Foundation\Application.
=======
        //120    Cannot access offset 'view' on Illuminate\Contracts\Foundation\Application.
>>>>>>> ede0df7 (first)
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

<<<<<<< HEAD
    public function registerThemeConfig(string $theme_type): void {
        $xot = $this->getXot();

        if (! isset($xot[$theme_type])) {
            $xot[$theme_type] = ThemeService::firstThemeName($theme_type);
            // TenantService::saveConfig(['name' => 'xra', 'data' => $xot]);
=======
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
>>>>>>> ede0df7 (first)
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

<<<<<<< HEAD
    public function registerCallback(): void {
        $loader = AliasLoader::getInstance();
        $loader->alias('Theme', 'Modules\Theme\Services\ThemeService');

        // $this->registerViewComposers();
    }

    /**
     * Undocumented function.
     */
    private function registerViewComposers(): void {
        $xot = $this->getXot();
        if (! isset($xot['pub_theme'])) {
            $xot['pub_theme'] = ThemeService::getThemeType('pub_theme');
        }
        if (! isset($xot['adm_theme'])) {
            $xot['adm_theme'] = ThemeService::getThemeType('adm_theme');
        }
=======
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
>>>>>>> ede0df7 (first)

        $theme = inAdmin() ? $xot['adm_theme'] : $xot['pub_theme'];
        if (null === $theme) {
            throw new Exception('iuston gavemo un problema ['.__LINE__.']['.class_basename(__CLASS__).']');
        }

        $custom_composer = '\Themes\\'.$theme.'\View\Composers\ThemeComposer';
        if (class_exists($custom_composer)) {
            View::composer('*', $custom_composer);

            return;
<<<<<<< HEAD
        } else {
            dddx('['.$custom_composer.']');
        }

        View::composer('*', ThemeComposer::class);
        // dddx($res);
=======
        }

        View::composer('*', ThemeComposer::class);
        //dddx($res);
>>>>>>> ede0df7 (first)
    }
}
