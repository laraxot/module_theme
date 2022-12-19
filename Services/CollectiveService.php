<?php

declare(strict_types=1);

namespace Modules\Theme\Services;

use Collective\Html\FormFacade as Form;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Modules\Xot\Services\FileService;

/**
 * CollectiveService. was on Xot module.
 */
class CollectiveService {
    private static ?self $instance = null;

    public function __construct() {
        // ---
        // include_once __DIR__.'/vendor/autoload.php';
    }

    public static function getInstance(): self {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public static function make(): self {
        return static::getInstance();
    }

    /**
     * Undocumented function.
     */
    public static function getComponents(string $view_path, string $namespace, string $prefix, bool $force_recreate = false): array {
        // $view_path = realpath(__DIR__.'/../Resources/views/collective/fields');

        $components_json = $view_path.'/_components.json';
        $components_json = str_replace(['/', '\\'], [\DIRECTORY_SEPARATOR, \DIRECTORY_SEPARATOR], $components_json);

        $exists = File::exists($components_json);

        if ($exists && ! $force_recreate) {
            $content = File::get($components_json);
            /**
             * @var array
             */
            $json = json_decode($content);

            if (empty($json)) {
                return [];
            }

            return $json;
        }

        $comps = [];

        if (! $view_path) {
            throw new \Exception('$view_path is false');
        }

        $dirs = FileService::allDirectories($view_path, ['css', 'js']);
        $comps = collect($dirs)->map(
            function ($item) use ($prefix) {
                $ris = new \stdClass();
                $tmp = str_replace(\DIRECTORY_SEPARATOR, ' ', $item);
                $tmp_dot = str_replace(\DIRECTORY_SEPARATOR, '.', $item);
                $ris->name = 'bs'.Str::studly($tmp);
                $ris->view = $prefix.'collective.fields.'.$tmp_dot.'.field';

                return $ris;
            }
        )->all();

        $content = json_encode($comps);
        if (! $content) {
            throw new \Exception('$content is false');
        }
        File::put($components_json, $content);

        return $comps;
    }

    public static function registerComponents(string $path = '', string $namespace = '', string $prefix = ''): void {
        $comps = self::getComponents($path, $namespace, $prefix, false);
        /*
        $blade_component = 'components.blade.input';
        if (inAdmin()) {
            $blade_component = 'adm_theme::layouts.'.$blade_component;
        } else {
            $blade_component = 'pub_theme::layouts.'.$blade_component;
        }
        */
        $blade_component_piece = 'collective.fields.group';
        if (inAdmin()) {
            $blade_component = 'adm_theme::'.$blade_component_piece;
        } else {
            $blade_component = 'pub_theme::'.$blade_component_piece;
        }

        // dddx(['blade_component_piece'=>'theme::'.$blade_component_piece, 'blade_component'=>$blade_component]);

        FileService::viewCopy('theme::'.$blade_component_piece, $blade_component);

        foreach ($comps as $comp) {
            Form::component(
                $comp->name,
                $comp->view,
                ['name', 'value' => null, 'attributes' => [],
                    'options' => [],
                    'comp_view' => $comp->view,
                    // 'comp_dir' => realpath($comp->dir),
                    'comp_ns' => implode('.', \array_slice(explode('.', $comp->view), 0, -1)),
                    'blade_component' => $blade_component, ]
            );
        }// end foreach
    }

    // end function

    public static function registerMacros(string $macros_dir): void {
        // $macros_dir = __DIR__.'/../Macros';
        $files = glob($macros_dir.'/*.php');
        if (false === $files) {
            $files = [];
        }
        Collection::make($files)
            ->mapWithKeys(
                function ($path) {
                    if (false !== $path) {
                        return [$path => pathinfo($path, PATHINFO_FILENAME)];
                    }
                }
            )
            ->reject(
                function ($macro) {
                    return Collection::hasMacro($macro);
                }
            )
            ->each(
                function ($macro, $path): void {
                    $class = '\\Modules\\Theme\\Macros\\'.$macro;
                    if ('BaseFormBtnMacro' !== $macro && \is_string($macro)) {
                        Form::macro('bs'.Str::studly($macro), app($class)());
                    }
                }
            );
    }

    // end function
}
