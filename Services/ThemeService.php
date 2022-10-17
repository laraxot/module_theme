<?php

declare(strict_types=1);

namespace Modules\Theme\Services;

use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
<<<<<<< HEAD
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Modules\Cms\Services\RouteService;
=======
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
>>>>>>> ede0df7 (first)
use Modules\Tenant\Services\TenantService;
use Modules\Xot\Contracts\PanelContract;
use Modules\Xot\Services\ArtisanService;
use Modules\Xot\Services\FileService;
use Modules\Xot\Services\PanelService;
<<<<<<< HEAD
use Modules\Xot\Services\StubService;
use Modules\Xot\Traits\Getter;

// ---------CSS------------
=======
use Modules\Xot\Services\RouteService;
use Modules\Xot\Services\StubService;
use Modules\Xot\Traits\Getter;

//---------CSS------------
>>>>>>> ede0df7 (first)

/**
 * Class ThemeService.
 */
class ThemeService {
    use Getter;

    protected static string $config_name = 'metatag';

    protected static array $vars = [];

    private static ?self $instance = null;

    public static array $attrs;

    public static array $classes;

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
     * get_url.
     */
    public static function get_url(array $params): string {
        return url('/');
    }

    public static function get_tags(array $params): array {
        return [];
    }

    public static function get_styles(array $params): array {
        return [];
    }

    public static function get_scripts(array $params): array {
        return [];
    }

    /*
    public static function get_langs(array $params){
        $cache_key = Str::slug(req_uri().'_langs');
        $langs = Cache::get($cache_key);
        if (! is_array($langs)) {
            $langs = [];
        }

        return $langs;
    }
    */

    public static function get_scripts_pos(array $params): array {
        return [];
    }

    public static function get_styles_pos(array $params): array {
        return [];
    }

    public static function get_view_params(array $params): array {
        return [];
    }

    public static function get_language(array $params): string {
        $lang = app()->getLocale();
<<<<<<< HEAD
        /**
         * @var array
         */
=======
>>>>>>> ede0df7 (first)
        $locale = config('laravellocalization.supportedLocales.'.$lang);

        return $locale['regional'];
    }

    public static function add(string $file, ?int $position = null): void {
<<<<<<< HEAD
        $path_parts = pathinfo($file);
=======
        $path_parts = \pathinfo($file);
>>>>>>> ede0df7 (first)

        if (! isset($path_parts['extension'])) {
            throw new \Exception('$path_parts with index extension is null');
        }

<<<<<<< HEAD
        $ext = mb_strtolower($path_parts['extension']);
        switch ($ext) {
            case 'css':
                /* return */
                self::addStyle($file, $position);
                break;
            case 'scss':
                /* return */
                self::addStyle($file, $position);
                break;
            case 'js':
                /* return */
                self::addScript($file, $position);
                break;
            default:
                echo '<h3>'.$file.'['.$ext.']</h3>';
                dddx('['.__LINE__.']['.__FILE__.']');
                break;
        }

        // return;
    }

    public static function addStyle(string $style, ?int $position = null): void {
        if (null === $position) {
            /**
             * @var array
             */
=======
        $ext = \mb_strtolower($path_parts['extension']);
        switch ($ext) {
        case 'css':
            /*return*/ self::addStyle($file, $position);
            break;
        case 'scss':
            /*return*/ self::addStyle($file, $position);
            break;
        case 'js':
            /*return*/ self::addScript($file, $position);
            break;
        default:
            echo '<h3>'.$file.'['.$ext.']</h3>';
            dddx('['.__LINE__.']['.__FILE__.']');
            break;
        }

        //return;
    }

    public static function addStyle(string $style, ?int $position = null): void {
        if (null == $position) {
>>>>>>> ede0df7 (first)
            $styles = self::__getStatic('styles');
            $position = \count($styles) + 10;
        }
        $styles_pos = self::__merge('styles_pos', [$position]);
        $styles = self::__merge('styles', [$style]);
    }

    public static function addScript(string $script, ?int $position = null): void {
<<<<<<< HEAD
        if (null === $position) {
            /**
             * @var array
             */
=======
        if (null == $position) {
>>>>>>> ede0df7 (first)
            $scripts = self::__getStatic('scripts');
            $position = \count($scripts) + 10;
        }

        $scripts_pos = self::__merge('scripts_pos', [$position]);
        $scripts = self::__merge('scripts', [$script]);
    }

    /*
    public static function addViewParam($key, $value = null){
        $view_params = self::__getStatic('view_params');
        if (!\is_array($key)) {
            $view_params[$key] = $value;
        } else {
            $view_params = \array_merge($view_params, $key);
        }
        self::__setStatic('view_params', $view_params);

        return self::getInstance(); /// per il fluent, o chaining
    }

    public static function addFavicon($src, $attrs = []){
        $newsrc = self::getFileUrl($src);

        $favicon = '<link rel="shortcut icon" href="'.$newsrc.'"';
        foreach ($attrs as $k => $v) {
            $favicon .= ' '.$k.'="'.$v.'"';
        }

        return $favicon.'/>';
    }*/
    /*
    public static function addContentTools(array $params = []) {
        self::add('theme/bc/ContentTools/build/content-tools.min.css');
        self::add('theme/bc/ContentTools/build/content-tools.min.js');
        self::add('blog::js/contenttools.js');
        self::add('theme/bc/ContentTools/sandbox/sandbox.css');
    }

    public static function addSelect2(array $params = []) {
        $tipo = 2; //0 bc, 1 cdn ,2  mix
        switch ($tipo) {
            case 0:
                // librerie in locale
                self::add('theme/bc/select2/dist/css/select2.min.css');
                self::add('theme/bc/select2-bootstrap4-theme/dist/select2-bootstrap4.css');
                self::add('theme/bc/popper.js/dist/popper.min.js');
                self::add('theme/bc/select2/dist/js/select2.full.min.js');
                self::add('theme::js/select2ajax.js');
            break;
            case 1:
                //* librerin in cdn
                self::add('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css');
                self::add('theme/bc/select2-bootstrap4-theme/dist/select2-bootstrap4.css');
                self::add('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js');
                self::add('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js');
            break;
            case 2:
                //mix , non va aggiunto nulla
            break;
        }
        self::add('theme::js/select2ajax.js');
    }
    */
    /* deprecated
    public static function view_path($view) {
        $viewNamespace = '---';
        $pos = \mb_strpos($view, '::');

        if ($pos) {
            $hints = \mb_substr($view, 0, $pos);
            $filename = \mb_substr($view, $pos + 2);
            $viewHints = View::getFinder()->getHints();
            if (isset($viewHints[$hints][0])) {
                $viewNamespace = $viewHints[$hints][0];

                $out = $viewNamespace.\DIRECTORY_SEPARATOR.$filename;
                $out = str_replace(['\\', '/'], [DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR], $out);

                return $out;
            } else {
                $viewNamespace = '---';
            }
        }

        return $viewNamespace;
    }
    */

    /**
     * @param string $src
     *
     * @return bool|mixed|string
     */
    public static function img_src($src) {
<<<<<<< HEAD
        // /$srcz = self::viewNamespaceToUrl([$src]);
        // $src = $srcz[0];
=======
        ///$srcz = self::viewNamespaceToUrl([$src]);
        //$src = $srcz[0];
>>>>>>> ede0df7 (first)
        return self::asset($src);
    }

    /**
     * @return string
     */
    public static function logo_html() {
<<<<<<< HEAD
        /**
         * @var string
         */
=======
>>>>>>> ede0df7 (first)
        $logo_src = self::metatag('logo_img');
        $newsrc = FileService::getFileUrl($logo_src);
        $logo_alt = self::metatag('logo_alt');
        $attrs = [];
        $attrs['alt'] = $logo_alt;
        $img = '<img src="'.$newsrc.'"';
        foreach ($attrs as $k => $v) {
            $img .= ' '.$k.'="'.$v.'"';
        }

        return $img.'/>';
    }

    /**
     * @param string $src
     * @param array  $attrs
     * @param bool   $only_url
     *
     * @return string
     */
    public static function showImg($src, $attrs = [], $only_url = false) {
        $srcz = FileService::viewNamespaceToUrl([$src]);
        $src = $srcz[0];
        $newsrc = FileService::getFileUrl($src);
        if ($only_url) {
            return $newsrc;
        }
        $img = '<img src="'.$newsrc.'"';
        foreach ($attrs as $k => $v) {
            $img .= ' '.$k.'="'.$v.'"';
        }

        return $img.'/>';
    }

    /**
     * @param string $path
     *
     * @return bool|string
     */
    public static function getNameSpace($path) {
<<<<<<< HEAD
        $pos = mb_strpos($path, '::');
=======
        $pos = \mb_strpos($path, '::');
>>>>>>> ede0df7 (first)
        if (false === $pos) {
            return false;
        }

<<<<<<< HEAD
        return mb_substr($path, 0, $pos);
    }

    public static function asset(?string $path): string {
        if (null === $path) {
            return '';
        }

        return FileService::asset($path);
    }

    public static function showScripts(): Renderable {
        /**
         * @var array
         */
        $scripts_pos = self::__getStatic('scripts_pos');

        /**
         * @var array
         */
        $scripts = self::__getStatic('scripts');

        $scripts = array_values(
            Arr::sort(
=======
        return \mb_substr($path, 0, $pos);
    }

    public static function asset(string $path): string {
        return FileService::asset($path);
    }

    /**
     * @param bool   $compress_js
     * @param string $page
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public static function showScripts($compress_js = true, $page = '') {
        //TODO FIX url da funzione e non replace !!!
        //
        $scripts_pos = self::__getStatic('scripts_pos');
        $scripts = self::__getStatic('scripts');
        $scripts = \array_values(
            \Arr::sort(
>>>>>>> ede0df7 (first)
                $scripts,
                function ($v, $k) use ($scripts_pos) {
                    return $scripts_pos[$k];
                }
            )
        );
<<<<<<< HEAD
        $scripts = array_unique($scripts);

=======
        $scripts = \array_unique($scripts);

        //$scripts = self::viewNamespaceToUrl($scripts);
>>>>>>> ede0df7 (first)
        $scripts = collect($scripts)->map(
            function ($item) {
                return self::asset($item);
            }
        )->all();
<<<<<<< HEAD

        $scripts = array_unique($scripts);

        $view = 'theme::services.script';

        $view_params = [
            'view' => $view,
            'scripts' => $scripts,
        ];

        return view($view, $view_params);
    }
    // end function
=======
        //dddx($scripts);

        /*
        $scripts=collect($scripts)->map(function($item){
            return self::asset($item);
        })->all();
        */
        //dddx($scripts);
        /*  -- forse creare AsseticService o MinifyService
        if ($compress_js) {
            $scripts_list = \implode(',', $scripts);
            $scripts_md5 = \md5($scripts_list);

            $name = '/js/script_'.$scripts_md5.'.js';
            $path = public_path($name);
            $force = config('xra.force_rewrite_js');
            if (! \file_exists($path) || $force) {
                //$cache = new FilesystemCache($_SERVER['DOCUMENT_ROOT'] . '/tmp'); //cartella tmp non esiste piu'
                $cache = new FilesystemCache(base_path('../cache'));
                $collection = new AssetCollection();
                foreach ($scripts as $filePath) {
                    $filePath = self::getRealFile($filePath);
                    if ('http' == \mb_substr($filePath, 0, \mb_strlen('http'))) {
                        $filename = \md5($filePath).'.css';
                        if (! \Storage::disk('cache')->exists($filename)) {
                            \Storage::disk('cache')->put($filename, \fopen($filePath, 'r'));
                        }
                        $asset = new FileAsset(\Storage::disk('cache')->path($filename));
                    } else {
                        $asset = new FileAsset($filePath);
                    }
                    if (\class_exists('JsMinFilter')) {
                        $asset->ensureFilter(new JsMinFilter());
                    }

                    $cachedAsset = new AssetCache($asset, $cache);
                    $collection->add($cachedAsset);
                }//end foreach

                \File::put($path, $collection->dump());
            }//end if
            $scripts = [$name];
        } else {
            //foreach ($scripts as $k => $filePath) {
            //    $scripts[$k] = self::getFileUrl($filePath);
            //}//end foreach
        }//end if
        */

        $scripts = \array_unique($scripts);

        return view()->make('theme::services.script')->with('scripts', $scripts);
    }

    //end function
>>>>>>> ede0df7 (first)

    /**
     * @param bool $compress_css
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public static function showStyles($compress_css = true) {
<<<<<<< HEAD
        /**
         * @var array
         */
        $styles_pos = self::__getStatic('styles_pos');
        /**
         * @var array
         */
        $styles = self::__getStatic('styles');
        /**
         * @var array
         */
        $styles = array_values(
=======
        $styles_pos = self::__getStatic('styles_pos');
        $styles = self::__getStatic('styles');
        $styles = \array_values(
>>>>>>> ede0df7 (first)
            \Arr::sort(
                $styles,
                function ($v, $k) use ($styles_pos) {
                    return $styles_pos[$k];
                }
            )
        );
<<<<<<< HEAD
        $styles = array_unique($styles);

        // $styles = self::viewNamespaceToUrl($styles);
=======
        $styles = \array_unique($styles);

        //$styles = self::viewNamespaceToUrl($styles);
>>>>>>> ede0df7 (first)
        $styles = collect($styles)->map(
            function ($item) {
                return self::asset($item);
            }
        )->all();

        return view()->make('theme::services.style')->with('styles', $styles);
    }

    /**
     * @return string
     */
    public static function metatags() {
<<<<<<< HEAD
        /**
         * @phpstan-var view-string
         */
=======
>>>>>>> ede0df7 (first)
        $view = 'theme::metatags';

        return (string) view($view);
    }

    /**
     * @param string $index
     *
     * @return \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    public static function metatag($index) {
        $ris = self::__getStatic($index);
<<<<<<< HEAD
        // echo '<br/>['.$index.']['.$ris.']';
        if ('' === $ris || null === $ris) {
=======
        //echo '<br/>['.$index.']['.$ris.']';
        if ('' == $ris) {
>>>>>>> ede0df7 (first)
            $ris = config('metatag.'.$index);
            self::__setStatic($index, $ris);
        }

        return $ris;
    }

    /**
     * SetMetatags function.
     */
    public static function setMetatags(Model $row): void {
<<<<<<< HEAD
        // dddx($row);
        $params = getRouteParameters();
=======
        //dddx($row);
        $params = optional(\Route::current())->parameters();
>>>>>>> ede0df7 (first)
        foreach ($params as $v) {
            if (\is_object($v) && isset($v->title)) {
                self::__concatBeforeStatic('title', $v->title.' | ');
            }
        }
        if (! \is_object($row)) {
            return; // forse buttare in 404 ..
        }
<<<<<<< HEAD
        // -- solo i campi che interessano
=======
        //-- solo i campi che interessano
>>>>>>> ede0df7 (first)
        $fields = ['subtitle', 'meta_description', 'meta_keywords', 'url', 'type', 'updated_at', 'published_at'];
        foreach ($fields as $field) {
            self::__setStatic($field, $row->getAttributeValue($field));
        }
<<<<<<< HEAD
        // self::__concatBeforeStatic('title', $row->title.' | ');
        // dddx(self::__getStatic('title'));
        // self::__concatBeforeStatic('subtitle', $row->subtitle.' | ');
        // self::__setStatic('url', $row->url);
        // self::__setStatic('category', $row->post_type);
        // self::__setStatic('published_at', $row->published_at);
        // self::__setStatic('updated_at', $row->updated_at);
        /**
         * @var array
         */
        $supportedLocales = config('laravellocalization.supportedLocales');
        $lang = app()->getLocale();
        if ('' === $row->getAttributeValue('lang')) {
=======
        //self::__concatBeforeStatic('title', $row->title.' | ');
        //dddx(self::__getStatic('title'));
        //self::__concatBeforeStatic('subtitle', $row->subtitle.' | ');
        //self::__setStatic('url', $row->url);
        //self::__setStatic('category', $row->post_type);
        //self::__setStatic('published_at', $row->published_at);
        //self::__setStatic('updated_at', $row->updated_at);
        $supportedLocales = config('laravellocalization.supportedLocales');
        $lang = app()->getLocale();
        if ('' == $row->getAttributeValue('lang')) {
>>>>>>> ede0df7 (first)
            $row->update(['lang' => $lang]);
        }

        self::__setStatic('locale', $supportedLocales[$lang]['regional']);
<<<<<<< HEAD
        // self::__setStatic('description', $row->meta_description);
        // self::__setStatic('keywords', $row->meta_keywords);
        // self::__setStatic('type', $row->post_type);
        if (method_exists($row, 'imageResizeSrc')) {
            $image_width = 200;
            $image_height = 200;
            if (! \is_object($row)) {
=======
        //self::__setStatic('description', $row->meta_description);
        //self::__setStatic('keywords', $row->meta_keywords);
        //self::__setStatic('type', $row->post_type);
        if (\method_exists($row, 'imageResizeSrc')) {
            $image_width = 200;
            $image_height = 200;
            if (! is_object($row)) {
>>>>>>> ede0df7 (first)
                throw new \Exception('['.$row.'] was not found');
            }
            $image = $row->imageResizeSrc(['width' => $image_width, 'height' => $image_height]);
            self::__setStatic('image', asset($image));
            self::__setStatic('image_width', $image_width);
            self::__setStatic('image_height', $image_height);
        }
    }

    /**
<<<<<<< HEAD
     * ---.
     */
    public static function getArea(): ?string {
        $params = getRouteParameters();
        if (isset($params['module'])) {
            return $params['module'];
        }
        /*
        $tmp = explode('/', optional(\Route::current())->getCompiled()->getStaticPrefix());
=======
     * @return bool|mixed|string
     */
    public static function getArea() {
        $params = optional(\Route::current())->parameters();
        if (isset($params['module'])) {
            return $params['module'];
        }
        $tmp = \explode('/', optional(\Route::current())->getCompiled()->getStaticPrefix());
>>>>>>> ede0df7 (first)
        $tmp = \array_slice($tmp, 2, 1);
        if (\count($tmp) < 1) {
            return false;
        }

        return $tmp[0];
<<<<<<< HEAD
        */
        return null;
    }

    /**
     * ---.
     */
    public static function getModels(array $params): ?array {
=======
    }

    /**
     * @return array|void
     */
    public static function getModels(array $params) {
>>>>>>> ede0df7 (first)
        extract($params);
        if (! isset($module)) {
            dddx(['err' => 'module is missing']);

<<<<<<< HEAD
            return null;
        }
        $mod = \Module::find($module);
        if (null === $mod) {
=======
            return;
        }
        $mod = \Module::find($module);
        if (null == $mod) {
>>>>>>> ede0df7 (first)
            throw new \Exception('module ['.$module.'] was not found');
        }
        $mod_path = $mod->getPath().'\Models';
        $files = File::files($mod_path);
<<<<<<< HEAD
        /**
         * @var array
         */
        $data = [];
        $ns = 'Modules\\'.$mod->getName().'\\Models';  // con la barra davanti non va il search ?
        /**
         * @var array<int,string>
         */
        $models = config('morph_map');

        // dddx($model_coll);
=======
        $data = [];
        $ns = 'Modules\\'.$mod->getName().'\\Models';  // con la barra davanti non va il search ?
        $models = config('morph_map');

        //dddx($model_coll);
>>>>>>> ede0df7 (first)

        foreach ($files as $file) {
            $filename = $file->getRelativePathname();
            $ext = '.php';
            if (Str::endsWith($filename, $ext)) {
                $tmp = new \stdClass();
<<<<<<< HEAD
                $name = substr($filename, 0, -\strlen($ext));
                $tmp->name = $name;
                $tmp->class = $ns.'\\'.$name;
                $tmp->type = collect($models)->search($tmp->class);
                // $tmp->name.='['.$tmp->class.']['.$tmp->type.']'; //4debug
                if ('' !== $tmp->type) {
=======
                $name = substr(($filename), 0, -strlen($ext));
                $tmp->name = $name;
                $tmp->class = $ns.'\\'.$name;
                $tmp->type = collect($models)->search($tmp->class);
                //$tmp->name.='['.$tmp->class.']['.$tmp->type.']'; //4debug
                if ('' != $tmp->type) {
>>>>>>> ede0df7 (first)
                    if (! isset($params['lang'])) {
                        $params['lang'] = app()->getLocale();
                    }
                    $params['container0'] = $tmp->type;
                    $tmp->url = route('admin.containers.index', $params);
                    $data[] = $tmp;
                }
            }
        }

        return $data;
    }

<<<<<<< HEAD
    // end getXmlMenu
=======
    //end getXmlMenu
>>>>>>> ede0df7 (first)

    /**
     * { item_description }.
     *
     * @return mixed
     */
    public static function route(array $params = []) {
<<<<<<< HEAD
        $params = array_merge(getRouteParameters(), $params);
        $routename = Route::currentRouteName();
        if (null === $routename) {
=======
        $params = \array_merge(optional(\Route::current())->parameters(), $params);
        $routename = Route::currentRouteName();
        if (null == $routename) {
>>>>>>> ede0df7 (first)
            throw new \Exception('$routename is null');
        }

        return url(route($routename, $params, false));
    }

    /**
     * { item_description }.
     */
    public static function getView(?array $parz = []): string {
<<<<<<< HEAD
=======
        /*
        $params = optional(\Route::current())->parameters();
        $route_action = \Route::currentRouteAction();
        //dddx($route_action);//Modules\Xot\Http\Controllers\Container0Controller@index
        if (null == $route_action) {
            throw new \Exception('$route_action is null');
        }
        $tmp = \Str::after($route_action, '\Http\Controllers\\');
        $tmp = \str_replace('\\', '.', $tmp);
        $tmp = \str_replace('Controller@', '.', $tmp);
        $path = collect(explode('.', $tmp))->map(function ($item) use ($params) {
            $item = \Str::snake($item);
            if (isset($params[$item])) {
                return $params[$item];
            }

            return $item;
        })->implode('.');
        if (isset($params['module'])) {
            $mod = $params['module'];
        } else {
            if (null == $route_action) {
                throw new \Exception('$route_action is null');
            }
            $mod = \Str::before(\Str::after($route_action, 'Modules\\'), '\\Http\Controllers\\');
            $mod = strtolower($mod);
        }
        if (inAdmin()) {
            $path = str_replace('admin.'.$mod.'.', 'admin.', $path);
            $view = $mod.'::'.$path;
        } else {
            $view = 'pub_theme::'.$path;
        }
        */
>>>>>>> ede0df7 (first)
        $params = getRouteParameters();
        $view1 = RouteService::getView().'.'.RouteService::getAct();
        $view1 = Str::replace('..', '.', $view1);

        if (inAdmin()) {
            $mod = $params['module'] ?? RouteService::getModuleName();
            $view1 = strtolower($mod.'::'.$view1);
        } else {
            $view1 = 'pub_theme::'.$view1;
        }
<<<<<<< HEAD
        // dddx(['view0' => $view, 'view1' => $view1, 'route_action' => $route_action]);
        $view1 = Str::replace('::.', '::', $view1);

        $view2 = self::getViewWithFormat($view1);
        // dddx(['view1' => $view1, 'view2' => $view2]);

        return $view2;

        // ------------ CASI PARTICOLARI -----------
        // if ('pub_theme::translation.index' == $view) {
        //    return 'theme::translation.index';
        // }
        // ---------------Panel Actions --------------------------
=======
        //dddx(['view0' => $view, 'view1' => $view1, 'route_action' => $route_action]);
        $view1 = Str::replace('::.', '::', $view1);

        return self::getViewWithFormat($view1);

        //------------ CASI PARTICOLARI -----------
        //if ('pub_theme::translation.index' == $view) {
        //    return 'theme::translation.index';
        //}
        //---------------Panel Actions --------------------------
>>>>>>> ede0df7 (first)
        /*
        $act = \Request::input('_act');
        if (null != $act) {
            $view .= '.acts.'.$act;
        }
        */

<<<<<<< HEAD
        // dddx(['view' => $view, 'view1' => $view1, 'route_action' => $route_action]);

        // return self::getViewWithFormat($view);
=======
        //dddx(['view' => $view, 'view1' => $view1, 'route_action' => $route_action]);

        //return self::getViewWithFormat($view);
>>>>>>> ede0df7 (first)
    }

    /**
     * @return mixed|string
     */
    public static function getViewDefault(array $params = []) {
        extract($params);
        if (! isset($act)) {
<<<<<<< HEAD
            $act = RouteService::getAct();
        }
        $view_default = 'pub_theme::layouts.default.'.$act; // pub_theme o extend ?
        if (inAdmin()) {
=======
            /*
            $route_action = \Route::currentRouteAction();
            if (null == $route_action) {
                throw new \Exception('$route_action is null');
            }
            $act = \Str::snake(\Str::after($route_action, '@'));
            */
            $act = RouteService::getAct();
        }
        $view_default = 'pub_theme::layouts.default.'.$act; //pub_theme o extend ?
        if (\inAdmin()) {
>>>>>>> ede0df7 (first)
            $view_default = 'adm_theme::layouts.default.'.$act;
        }

        return self::getViewWithFormat($view_default);
    }

    /**
     * @return mixed|string
     */
    public static function getViewExtend(array $params = []) {
        extract($params);
        if (! isset($act)) {
<<<<<<< HEAD
            $act = RouteService::getAct();
        }
        $view_extend = 'theme::layouts.default.'.$act;
        if (inAdmin()) {
=======
            /*
            $route_action = \Route::currentRouteAction();
            if (null == $route_action) {
                throw new \Exception('$route_action is null');
            }
            $act = \Str::snake(\Str::after($route_action, '@'));
            */
            $act = RouteService::getAct();
        }
        $view_extend = 'theme::layouts.default.'.$act;
        if (\inAdmin()) {
>>>>>>> ede0df7 (first)
            $view_extend = 'theme::layouts.default.admin.'.$act;
        }

        return self::getViewWithFormat($view_extend);
    }

    /**
     * @return mixed|string|null
     */
    public static function getViewModule(array $params = []) {
        extract($params);

        if (! isset($act)) {
            $act = RouteService::getAct();
        }

<<<<<<< HEAD
        // [$containers,$items] = \params2ContainerItem();
=======
        //[$containers,$items] = \params2ContainerItem();
>>>>>>> ede0df7 (first)
        /*
        if (0 == count($containers)) {
            return null;
        }
        */
        $panel = PanelService::make()->getRequestPanel();
<<<<<<< HEAD
        if (null !== $panel) {
=======
        if (null != $panel) {
>>>>>>> ede0df7 (first)
            $mod_name_low = $panel->getModuleNameLow();
            $panel_name_low = strtolower($panel->getName());
            $view = $mod_name_low.'::'.(inAdmin() ? 'admin.' : '').$panel_name_low.'.'.$act;

            return self::getViewWithFormat($view);
        }

        $mod_name = RouteService::getModuleName();
        $mod_name_low = strtolower($mod_name);
        $controller = RouteService::getControllerName();
        $controller = Str::replace('\\', '.', $controller);
        $controller_low = strtolower($controller);

        $view = $mod_name_low.'::'.$controller_low.'.'.$act;

        return self::getViewWithFormat($view);
    }

    /**
<<<<<<< HEAD
     * ---.
     */
    public static function getViewWithFormat(string $view): string {
        // return $view; //bypasso tutto
=======
     * @param string $view
     *
     * @return mixed|string
     */
    public static function getViewWithFormat($view) {
        //return $view; //bypasso tutto
>>>>>>> ede0df7 (first)
        /*
        if (\Request::ajax()) {
            $view .= '_ajax';
        } elseif ('iframe' == \Request::input('format')) {
            $view .= '_iframe';
        }
        */
<<<<<<< HEAD
        /**
         * @var string
         */
        $act = Request::input('_act', '');
        $act = Str::snake($act);
        if ('' !== $act) {
=======

        $act = \Request::input('_act');
        $act = Str::snake($act);
        if (null != $act) {
>>>>>>> ede0df7 (first)
            $view .= '.acts.'.$act;
        }

        return $view;
    }

    /**
     * @return array
     */
    public static function getDefaultViewArray(array $params = []) {
        $view = null;
        extract($params);

        /*
<<<<<<< HEAD
        $params = getRouteParameters();
=======
        $params = optional(\Route::current())->parameters();
>>>>>>> ede0df7 (first)
        $route_action = \Route::currentRouteAction();
        $act = Str::snake(Str::after($route_action, '@'));
        */
        $view_default = self::getViewDefault();
        $view_extend = self::getViewExtend();
        $view_module = self::getViewModule();
<<<<<<< HEAD

        // ---------------------------------------------------------------------------
        if (null === $view) {
            $params = getRouteParameters();
=======
        //---------------------------------------------------------------------------
        if (null == $view) {
            $params = optional(\Route::current())->parameters();
>>>>>>> ede0df7 (first)
            $view = self::getView($params);
        }

        $view_arr = explode('::', $view);
        if (Str::startsWith($view_arr[1], 'admin.')) {
            $view_arr[1] = Str::after($view_arr[1], 'admin.');
        }
        $ns = $view_arr[0].'::'.(inAdmin() ? 'admin.' : '');
<<<<<<< HEAD
        $view_short = $ns.implode('.', \array_slice(explode('.', $view_arr[1]), -4));
        $view_short1 = $ns.implode('.', \array_slice(explode('.', $view_arr[1]), -3));
        $view_short2 = $ns.implode('.', \array_slice(explode('.', $view_arr[1]), -2));

        $view_update = str_replace('.update.acts.', '.show.acts.', $view);
        // $view_store = str_replace('.store.', '.show.', $view); ??
=======
        $view_short = $ns.implode('.', array_slice(explode('.', $view_arr[1]), -4));
        $view_short1 = $ns.implode('.', array_slice(explode('.', $view_arr[1]), -3));
        $view_short2 = $ns.implode('.', array_slice(explode('.', $view_arr[1]), -2));

        $view_update = str_replace('.update.acts.', '.show.acts.', $view);
        //$view_store = str_replace('.store.', '.show.', $view); ??
>>>>>>> ede0df7 (first)

        $views = [$view, $view_update, $view_short, $view_short1, $view_short2, $view_module, $view_default, $view_extend];

        /*
         * forse mettere filtro per togliere se c'e' una view a null, e le view che contengono ::show
         */
        $debug = debug_backtrace();
        if (isset($debug[3]) && isset($debug[3]['file'])) {
            $caller = $debug[3];
            $mod_trad = getModTradFilepath($caller['file']);
            if (Str::endsWith($mod_trad, '_action')) {
                $mod_trad = Str::before($mod_trad, '_action');
                $mod_trad = Str::before($mod_trad, '::').'::acts.'.Str::after($mod_trad, '::');
            }
            if (inAdmin()) {
                $mod_trad = Str::before($mod_trad, '::').'::admin.'.Str::after($mod_trad, '::');
            }
            $views[] = $mod_trad;
        }

        if (isset($debug[2]) && isset($debug[2]['file'])) {
            $caller = $debug[2];
            $mod_trad = getModTradFilepath($caller['file']);
            if (Str::endsWith($mod_trad, '_action')) {
                $mod_trad = Str::before($mod_trad, '_action');
                $mod_trad = Str::before($mod_trad, '::').'::acts.'.Str::after($mod_trad, '::');
            }
            if (inAdmin()) {
                $mod_trad = Str::before($mod_trad, '::').'::admin.'.Str::after($mod_trad, '::');
            }
            $views[] = $mod_trad;
        }

<<<<<<< HEAD
        return array_unique($views);
    }

    public static function getViewWork(array $params = []): string {
        $views = self::getDefaultViewArray($params);

=======
        return $views;
    }

    /**
     * @return string
     */
    public static function getViewWork(array $params = []) {
        $views = self::getDefaultViewArray($params);
>>>>>>> ede0df7 (first)
        $view_work = collect($views)->first(
            function ($view_check) {
                return View::exists($view_check);
            }
        );
<<<<<<< HEAD
        if (false === $view_work || null === $view_work) {
=======
        if (false == $view_work) {
>>>>>>> ede0df7 (first)
            $ddd_msg =
                [
                    'err' => 'Not Exists ..',
                    'pub_theme' => config('xra.pub_theme'),
                    'adm_theme' => config('xra.adm_theme'),
                    'view0_dir' => FileService::viewNamespaceToDir($views[0]),
                    'views' => $views,
<<<<<<< HEAD
                    // 'debug_backtrace' => debug_backtrace(),
=======
                    //'debug_backtrace' => debug_backtrace(),
>>>>>>> ede0df7 (first)
                ];

            dddx($ddd_msg);
        }

        return $view_work;
    }

    /**
     * view.
     * Illuminate\Contracts\View\View perche' poi posso appicciare parametri con with.
     */
    public static function view(string $view = null): \Illuminate\Contracts\View\View {
        $view_work = self::getViewWork(['view' => $view]);
<<<<<<< HEAD
        if (null === $view) {
=======
        if (null == $view) {
>>>>>>> ede0df7 (first)
            $view = self::getView();
        }
        $route_params = getRouteParameters();
        $lang = app()->getLocale();
        $panel = PanelService::make()->getRequestPanel();
<<<<<<< HEAD
        if (null === $panel) {
            throw new \Exception('Panel does not exists');
        }
        $row = $panel->row;
        // $route_params = getRouteParameters();
        // $row_name = last($route_params);
        // if (! is_object($row) && '' != config('morph_map.'.$row)) {
=======
        if (is_null($panel)) {
            throw new \Exception('Panel does not exists');
        }
        $row = $panel->row;
        //$route_params = optional(\Route::current())->parameters();
        //$row_name = last($route_params);
        //if (! is_object($row) && '' != config('morph_map.'.$row)) {
>>>>>>> ede0df7 (first)
        /*
        $model = config('morph_map.'.$row);
        $row = new $model();
        */
<<<<<<< HEAD
        // $row = TenantService::model($row_name);
        // }
        // }
        // $row_type = '';

        if (\is_object($row)) {
            self::setMetatags($row);
            // if (isset($row->post_type)) {
            //    $row_type = $row->post_type;
            // }
            // if (! isset($panel)) {
            // $panel = StubService::make()->setModelAndName($row, 'panel')->get();
            // }
        }
        // if ('' == $row_type) {
        //    $row_type = \Str::camel(class_basename($row));
        // }

        $routename = getRouteName();
        $route_action = \Route::currentRouteAction();

        // --- per passare la view all'interno dei componenti
=======
        //$row = TenantService::model($row_name);
        //}
        //}
        //$row_type = '';

        if (is_object($row)) {
            self::setMetatags($row);
            //if (isset($row->post_type)) {
            //    $row_type = $row->post_type;
            //}
            //if (! isset($panel)) {
            //$panel = StubService::make()->setModelAndName($row, 'panel')->get();
            //}
        }
        //if ('' == $row_type) {
        //    $row_type = \Str::camel(class_basename($row));
        //}

        $routename = optional(\Route::current())->getName();
        $route_action = \Route::currentRouteAction();

        //--- per passare la view all'interno dei componenti
>>>>>>> ede0df7 (first)
        \View::composer(
            '*',
            function ($view_params) use ($view, $panel): void {
                \View::share('view', $view);
<<<<<<< HEAD
                // $trad = implode('.', array_slice(explode('.', $view), 0, -1));
                // \View::share('trad', $trad);
=======
                //$trad = implode('.', array_slice(explode('.', $view), 0, -1));
                //\View::share('trad', $trad);
>>>>>>> ede0df7 (first)
                \View::share('_panel', $panel);
            }
        );
        [$containers, $items] = params2ContainerItem($route_params);
        /*
        list($containers, $items) = params2ContainerItem($route_params);
        $last_container = last($containers);
        //$types = \Str::camel(\Str::plural($last_container));
        $last_item = last($items);

        [$ns,$group] = explode('::', $view);
        $group = explode('.', $group);
        $trad_short1 = $ns.'::'.implode('.', array_slice($group, -3));
        $trad_short2 = $ns.'::'.implode('.', array_slice($group, -2));

        //$trad_mod = '';

        //if(isset($group[0]) && $group[0]!='auth'){

        try {
            $trad_mod = strtolower(getModuleNameFromModelName($group[0]).'').'::'.$group[0];
        } catch (\Exception $e) {
            $trad_mod = 'xot::txt';
        }
        //}
        */

        $trad_mod = $panel->getTradMod();
        $modal = null;
        if (\Request::ajax()) {
            $modal = 'ajax';
<<<<<<< HEAD
        } elseif ('iframe' === \Request::input('format')) {
=======
        } elseif ('iframe' == \Request::input('format')) {
>>>>>>> ede0df7 (first)
            $modal = 'iframe';
        }

        $view_params = [
            'trad_mod' => $trad_mod,
            'lang' => $lang,
            'params' => $route_params,
            'containers' => $containers,
            'last_container' => last($containers),
            'items' => $items,
            'last_item' => last($items),
            'routename' => $routename,
            'page' => new Objects\PageObject(),
            'modal' => $modal,
        ];

        return view()->make($view, $view_params);
    }

    /**
<<<<<<< HEAD
     * @param mixed $view
     * @param mixed $data
     * @param mixed $mergeData
     *
=======
>>>>>>> ede0df7 (first)
     * @return \Illuminate\Http\RedirectResponse|void
     */
    /* deprecated
    public static function action(Request $request, $row) {
        //echo '<pre>';print_r($routes);echo '</pre>';
        $routename = \Route::current()->getName();
        $rotename_arr = explode('.', $routename);
        $rotename_arr = array_slice($rotename_arr, 0, -1);
        $routename_base = implode('.', $rotename_arr);
        //dddx($rotename_arr);
<<<<<<< HEAD
        $params = getRouteParameters();
=======
        $params = optional(\Route::current())->parameters();
>>>>>>> ede0df7 (first)
        $data = $request->all();
        if (! isset($data['_action'])) {
            $data['_action'] = 'save_close';
        }
        switch ($data['_action']) {
            case 'save_continue':
                //$this->routes->getByName($name)
                $routes = app('router')->getRoutes();
                $routename = $routename_base.'.edit';
                $route_info = $routes->getByName($routename);
                $pattern = '/\{([^}]+)\}/';
                preg_match_all($pattern, $route_info->uri, $matches);
                $parz = [];
                //dddx($row->guid); //deve esserci, controllare che nel modello non ci sia function getGuidAttribute, e che ci sia
                //  linkedTrait
                foreach ($matches[1] as $match) {
                    if (isset($params[$match])) {
                        $parz[$match] = $params[$match];
                    } else {
                        $parz[$match] = $row;
                    }
                }

                return redirect()->route($routename, $parz);
                //break;
            case 'save_close':
                $routename = $routename_base.'.index';
                if (\Route::has($routename.'_edit')) {
                    return redirect()->route($routename.'_edit', $params);
                }

                return redirect()->route($routename, $params);
                //break;
            case 'come_back':
                return redirect()->back();
                //break;
            case 'row':
                return $row;
                //break;
            default:
                echo '<h3>['.__LINE__.']['.__FILE__.']</h3>';
                dddx($data['_action']);
                break;
        }//end switch
    }
    */
<<<<<<< HEAD
    // end function
=======
    //end function
>>>>>>> ede0df7 (first)

    /**
     * @param string $view
     * @param array  $data
     * @param array  $mergeData
     *
     * @return mixed|string
     */
<<<<<<< HEAD
    public static function cache(/* ViewContract $vc, */ $view, $data = [], $mergeData = []) {
        // scopiazzato da spatie partialcache
=======
    public static function cache(/*ViewContract $vc,*/ $view, $data = [], $mergeData = []) {
        //scopiazzato da spatie partialcache
>>>>>>> ede0df7 (first)
        $lang = app()->getLocale();
        $data['lang'] = $lang;

        $json_data = json_encode($data);
        if (! $json_data) {
            throw new \Exception('json_encod $data false');
        }

        $cache_key = Str::slug($view).'-'.md5($json_data).'-1';

        $seconds = 60 * 60 * 24;
        try {
<<<<<<< HEAD
            $html = Cache::/* store('apc')-> */ remember(
=======
            $html = Cache::/*store('apc')->*/ remember(
>>>>>>> ede0df7 (first)
                $cache_key,
                $seconds,
                function () use ($view, $data, $mergeData) {
                    return (string) \View::make($view, $data, $mergeData)->render();
<<<<<<< HEAD
                    // return (string)self::view($view);
=======
                    //return (string)self::view($view);
>>>>>>> ede0df7 (first)
                }
            );
        } catch (\Exception $e) {
            ArtisanService::exe('cache:clear');
            $html = (string) \View::make($view, $data, $mergeData)->render();
        }

        return $html;
    }

    /**
     * @return bool|mixed|string|void
     */
    public static function imageSrc(array $params) {
        // DA RIFARE
        extract($params);
        if (! isset($path)) {
            dddx(['err' => 'path is missing']);

            return;
        }
        $path = self::asset($path);
        /* TO DOOOOOOOO
        */

        return $path; // ci mette troppo nel server
<<<<<<< HEAD
        // dddx($path);
=======
        //dddx($path);
>>>>>>> ede0df7 (first)
        /*
        $parz = ['src' => $path, 'height' => $height, 'width' => $width];
        $img = new ImageService($parz);
        $ris = $img->fit()->save()->src();
        $ris = str_replace('\\', '/', $ris);
        $ris = str_replace('//', '/', $ris);
        dddx([
            'ris' => $ris,
            'asset ris' => asset($ris),
        ]);

        return asset($ris);
        */
    }

    /* deprecated ??
    public static function getDynViewsArray($view_tpl, $params) {
        extract($params);
        $views = [
            $_layout->view.'.'.$view_tpl.'',
            $_layout->view_default.'.'.$view_tpl.'.'.$_layout->row_type,
            $_layout->view_extend.'.'.$view_tpl.'.'.$_layout->row_type, //?incerto
            $_layout->view_default.'.'.$view_tpl.'',
            $_layout->view_extend.'.'.$view_tpl.'',
        ];

        return $views;
    }

    public static function getDynView($view_tpl, $params) {
        $views = self::getDynViewsArray($view_tpl, $params);
        //dddx($views); 4debug
        $view_first = collect($views)->first(function ($view_check) {
            return View::exists($view_check);
        });

        return $view_first;
    }
    */

    public static function include(string $view_tpl, array $params_tpl, array $vars): ?Renderable {
<<<<<<< HEAD
        $views = self::getDefaultViewArray();
=======
        $views = ThemeService::getDefaultViewArray();
>>>>>>> ede0df7 (first)
        $views = collect($views)->map(
            function ($item) use ($view_tpl) {
                return $item.'.'.$view_tpl;
            }
        );
        $view_work = $views->first(
            function ($view_check) {
                return View::exists($view_check);
            }
        );

<<<<<<< HEAD
        if (null === $view_work) {
            if (\in_array($view_tpl, ['topbar', 'bottombar', 'inner_page'], true)) {
                return null;
                // throw new \Exception('$view_work is null');
=======
        if (null == $view_work) {
            if (in_array($view_tpl, ['topbar', 'bottombar', 'inner_page'])) {
                return null;
                //throw new \Exception('$view_work is null');
>>>>>>> ede0df7 (first)
            }

            dddx(['err' => 'view not Exists', 'views' => $views]);
        }

        $view_params = array_merge($vars, $params_tpl);

<<<<<<< HEAD
        if (null === $view_work) {
=======
        if (null == $view_work) {
>>>>>>> ede0df7 (first)
            throw new \Exception('$view_work is null');
        }

        return view()->make($view_work, $view_params);
<<<<<<< HEAD
        // return view($view_work)->with($vars)->with($params_tpl); // quale delle 2 ?
=======
        //return view($view_work)->with($vars)->with($params_tpl); // quale delle 2 ?
>>>>>>> ede0df7 (first)
        // return (string)\View::make($view_work, $params_tpl, $vars)->render();
    }

    /*
    //--- lo chiamo da blade, in prod si puo' ipotizzare di usare la cache
    public static function include_old($view_tpl, $params_tpl, $vars) {
        extract($vars);
        $view_first = self::getDynView($view_tpl, $vars);
        if ('' == $view_first) {
            $views = self::getDynViewsArray($view_tpl, $vars);
            echo '<h3 style="text:#d60021;">--NOT EXISTS--</h3>';
            //dddx('not exists ['.implode(']'.chr(13).'[',$views).']');
            dddx($views);
        }

        return view()->make($view_first)->with($vars)->with($params_tpl); // quale delle 2 ?
                // return (string)\View::make($view_check, $params_tpl, $vars)->render();
    }
    */

    /**
     * @param string $name
     *
     * @return mixed
     */
    public static function xotModelEager($name) {
        return TenantService::modelEager($name);
    }

    /**
     * @param string $name
     *
     * @return array|false|mixed
     */
    public static function xotModel($name) {
        return TenantService::model($name);
    }

    /**
     * Undocumented function.
     */
    public static function panelModel(Model $model): PanelContract {
        $class = StubService::make()->setModelAndName($model, 'panel')->get();
        $panel = app($class)->setRow($model);

        return $panel;
    }

    public static function inputFreeze(array $params): Renderable {
        return FormXService::inputFreeze($params);
    }

    /**
     * Undocumented function.
     *
     * @return \Illuminate\Contracts\Support\Renderable|\Illuminate\Support\HtmlString
     */
    public static function inputHtml(array $params) {
        return FormXService::inputHtml($params);
    }

    public static function getAdminJsonMenu(): void {
<<<<<<< HEAD
        $route_params = getRouteParameters();
=======
        $route_params = optional(\Route::current())->parameters();
>>>>>>> ede0df7 (first)
        extract($route_params);
        if (! isset($module)) {
            dddx(['err' => 'module is missing']);

            return;
        }
        if (Str::startsWith($module, 'trasferte')) {
            $module_original = 'trasferte';
        } else {
            $module_original = $module;
        }
        $mod = \Module::find($module_original);
<<<<<<< HEAD
        if (null === $mod) {
=======
        if (null == $mod) {
>>>>>>> ede0df7 (first)
            throw new \Exception('module ['.$module_original.'] was not found');
        }
        $mod_path = $mod->getPath();
        $json_path = $mod_path.'/_menuxml/admin/'.$module.'/_menufull.php';
<<<<<<< HEAD
        // \Debugbar::addMessage($json_path, 'menu path:');
        $json_path = str_replace(['\\', '/'], [\DIRECTORY_SEPARATOR, \DIRECTORY_SEPARATOR], $json_path);
=======
        //\Debugbar::addMessage($json_path, 'menu path:');
        $json_path = str_replace(['\\', '/'], [DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR], $json_path);
>>>>>>> ede0df7 (first)
        $menu = include $json_path;
        dddx($menu);
        /*
        $json_content=File::get($json_path);
        $json=json_decode($json_content);
        dddx($json);
        */
    }

    /**
     * @return array|mixed
     */
    public static function getXmlMenu() {
<<<<<<< HEAD
        $route_params = getRouteParameters();
=======
        $route_params = optional(\Route::current())->parameters();
>>>>>>> ede0df7 (first)
        extract($route_params);
        if (! isset($module)) {
            return [];
        }
        if (Str::startsWith($module, 'trasferte')) {
            $module_original = 'trasferte';
        } else {
            $module_original = $module;
        }
        $mod = \Module::find($module_original);
<<<<<<< HEAD
        if (null === $mod) {
=======
        if (null == $mod) {
>>>>>>> ede0df7 (first)
            throw new \Exception('module ['.$module_original.'] was not found');
        }
        $mod_path = $mod->getPath();
        $json_path = $mod_path.'/_menuxml/admin/'.$module.'/_menufull.php';
<<<<<<< HEAD
        // \Debugbar::addMessage($json_path, 'menu path:');
        $json_path = str_replace(['\\', '/'], [\DIRECTORY_SEPARATOR, \DIRECTORY_SEPARATOR], $json_path);
=======
        //\Debugbar::addMessage($json_path, 'menu path:');
        $json_path = str_replace(['\\', '/'], [DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR], $json_path);
>>>>>>> ede0df7 (first)
        if (! File::exists($json_path)) {
            return [];
        }
        $menu = include $json_path;

        return $menu;
    }

    /**
     * @return string
     */
    public static function getPath() {
<<<<<<< HEAD
        // da jigsaw
=======
        //da jigsaw
>>>>>>> ede0df7 (first)
        return 'to do';
    }

    /**
     * @param string $scope
     * @param string $name
     * @param mixed  $value
     */
    public static function addAttr($scope, $name, $value): void {
        self::$attrs[$scope][$name] = $value;
    }

    /**
     * @param string $scope
     * @param string $class
     */
    public static function addClass($scope, $class): void {
        self::$classes[$scope][] = $class;
    }

    /**
     * @param string $scope
     */
    public static function printAttrs($scope): void {
        $attrs = [];

        if (isset(self::$attrs[$scope]) && ! empty(self::$attrs[$scope])) {
            foreach (self::$attrs[$scope] as $name => $value) {
                $attrs[] = $name.'="'.$value.'"';
            }
            echo ' '.implode(' ', $attrs).' ';
        }
        echo '';
    }

    /**
     * @param string $scope
     * @param bool   $full
     */
    public static function printClasses($scope, $full = true): void {
<<<<<<< HEAD
        if ('body' === $scope) {
=======
        if ('body' == $scope) {
>>>>>>> ede0df7 (first)
            self::$classes[$scope][] = 'page-loading';
        }

        if (isset(self::$classes[$scope]) && ! empty(self::$classes[$scope])) {
            $classes = implode(' ', self::$classes[$scope]);
            if ($full) {
                echo ' class="'.$classes.'" ';
            } else {
                echo ' '.$classes.' ';
            }
        } else {
            echo '';
        }
    }

    /**
     * Prints Google Fonts.
     */
    public static function getGoogleFontsInclude(): void {
        if (TenantService::config('layout.resources.fonts.google.families')) {
            $fonts = TenantService::config('layout.resources.fonts.google.families');
<<<<<<< HEAD
            if (! \is_array($fonts)) {
=======
            if (! is_array($fonts)) {
>>>>>>> ede0df7 (first)
                $fonts = [];
            }
            echo '<link rel="stylesheet" href="https://fonts.googleapis.com/css?family='.implode('|', $fonts).'">';
        }
        echo '';
    }

    /**
     * Walk recursive array with callback.
     *
     * @return array
     */
    public static function arrayWalkCallback(array &$array, callable $callback) {
        foreach ($array as $k => &$v) {
<<<<<<< HEAD
            if (\is_array($v)) {
=======
            if (is_array($v)) {
>>>>>>> ede0df7 (first)
                $callback($k, $v, $array);
                self::arrayWalkCallback($v, $callback);
            }
        }

        return $array;
    }

    /**
     * Convert css file path to RTL file.
     *
     * @param string $css_path
     *
     * @return string|string[]
     */
    public static function rtlCssPath($css_path) {
        $css_path = substr_replace($css_path, '.rtl.css', -4);

        return $css_path;
    }

    /**
     * Initialize theme CSS files.
     *
     * @return array
     */
    /* metronic ?
    public static function initThemes() {
        $themes = [];


        //$themes[] = 'css/themes/layout/header/base/'.TenantService::config('layout.header.self.theme').'.css';
        //$themes[] = 'css/themes/layout/header/menu/'.TenantService::config('layout.header.menu.desktop.submenu.theme').'.css';
        //$themes[] = 'css/themes/layout/aside/'.TenantService::config('layout.aside.self.theme').'.css';

        $themes[] = self::asset('adm_theme::dist/css/themes/layout/header/base/'.TenantService::config('layout.header.self.theme').'.css');
        $themes[] = self::asset('adm_theme::dist/css/themes/layout/header/menu/'.TenantService::config('layout.header.menu.desktop.submenu.theme').'.css');
        $themes[] = self::asset('adm_theme::dist/css/themes/layout/aside/'.TenantService::config('layout.aside.self.theme').'.css');

        if (TenantService::config('layout.aside.self.display')) {
            $themes[] = self::asset('adm_theme::dist/css/themes/layout/brand/'.TenantService::config('layout.brand.self.theme').'.css');
        } else {
            $themes[] = self::asset('adm_theme::dist/css/themes/layout/brand/'.TenantService::config('layout.header.self.theme').'.css');
        }

        return $themes;
    }
    */

    /**
     * @return \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    public static function tenantConfig(string $config) {
        return TenantService::config($config);
    }

    /**
     * @param array      $item
     * @param array|null $parent
     * @param int        $rec
     *
     * @return string|void
     */
    public static function renderVerMenu($item, $parent = null, $rec = 0, bool $singleItem = false) {
        return MenuService::renderVerMenu($item, $parent, $rec, $singleItem);
    }

    /**
     * @param array      $item
     * @param array|null $parent
     * @param int        $rec
     *
     * @return string|void
     */
    public static function renderHorMenu($item, $parent = null, $rec = 0, bool $singleItem = false) {
<<<<<<< HEAD
        return MenuService::renderHorMenu($item, $parent, $rec); // ??, $singleItem
=======
        return MenuService::renderHorMenu($item, $parent, $rec); //??, $singleItem
>>>>>>> ede0df7 (first)
    }

    // Render icon or bullet
    public static function renderIcon(?string $icon = ''): string {
<<<<<<< HEAD
        if (null === $icon) {
            // throw new \Exception('icon not exists in config icons file ['.__LINE__.']['.__FILE__.']');
            return '<i class="menu-icon"></i>';
        }
        if (SvgService::isSVG($icon)) {
            return (string) SvgService::getSVG($icon, 'menu-icon').'';
=======
        if (null == $icon) {
            //throw new \Exception('icon not exists in config icons file ['.__LINE__.']['.__FILE__.']');
            return '<i class="menu-icon"></i>';
        }
        if (SvgService::isSVG($icon)) {
            return strval(SvgService::getSVG($icon, 'menu-icon')).'';
>>>>>>> ede0df7 (first)
        }

        return '<i class="menu-icon '.$icon.'"></i>';
    }

    /**
     * Undocumented function.
     */
    public static function renderIconName(string $icon_name): string {
        $icon_key = 'icons.'.$icon_name;
        $icon = TenantService::config($icon_key);
<<<<<<< HEAD
        if (! \is_string($icon)) {
            // dddx($icon_name);
            throw new \Exception('icon not exists in config icons file ['.__LINE__.']['.__FILE__.']');
        }
        // forse conviene inserire un controllo per verificare che si trovi la corrispondente chiave della lingua
        // esempio es per spagnolo, nell'array di laravel\config\4venti-local\icons.php
        // ho dovuto aggiungere la riga 'es' => 'media/svg/flags/128-spain.svg', per visualizzare il pannello admin
        // dddx(['icon_name' => $icon_name, 'icon' => $icon, 'icon_key' => $icon_key, 'result' => self::renderIcon($icon)]);
=======
        if (! is_string($icon)) {
            //dddx($icon_name);
            throw new \Exception('icon not exists in config icons file ['.__LINE__.']['.__FILE__.']');
        }
        //forse conviene inserire un controllo per verificare che si trovi la corrispondente chiave della lingua
        // esempio es per spagnolo, nell'array di laravel\config\4venti-local\icons.php
        // ho dovuto aggiungere la riga 'es' => 'media/svg/flags/128-spain.svg', per visualizzare il pannello admin
        //dddx(['icon_name' => $icon_name, 'icon' => $icon, 'icon_key' => $icon_key, 'result' => self::renderIcon($icon)]);
>>>>>>> ede0df7 (first)

        return self::renderIcon($icon);
    }

    /**
     * Undocumented function.
     */
    public static function getSVG(string $filepath = '', string $class = ''): string {
<<<<<<< HEAD
        return (string) SvgService::getSVG($filepath, $class);
    }

    public static function getThemeType(string $theme_type): string {
        $xot = config('xra');
        if (! \is_array($xot)) {
            // throw new Exception('['.__LINE__.']['.class_basename(__CLASS__).']');
            $xot = [];
        }
        if (! isset($xot[$theme_type])) {
            $xot[$theme_type] = self::firstThemeName($theme_type);
            // throw new Exception('[' . __LINE__ . '][' . class_basename(__CLASS__) . ']');
=======
        return strval(SvgService::getSVG($filepath, $class));
    }

    public static function getThemeType($theme_type) {
        $xot = config('xra');
        if (! is_array($xot)) {
            throw new Exception('['.__LINE__.']['.class_basename(__CLASS__).']');
        }
        if (! isset($xot[$theme_type])) {
            $xot[$theme_type] = ThemeService::firstThemeName($theme_type);
            throw new Exception('['.__LINE__.']['.class_basename(__CLASS__).']');
>>>>>>> ede0df7 (first)
            TenantService::saveConfig(['name' => 'xra', 'data' => $xot]);
        }
        $theme = $xot[$theme_type];

        return $theme;
    }

    public static function getThemes(): Collection {
        $themes_dir = base_path('Themes');
        if (! File::exists($themes_dir)) {
<<<<<<< HEAD
            throw new Exception('Themes directory do not exits ['.__LINE__.']['.__FILE__.']');
=======
            throw new \Exception('Themes directory do not exits ['.__LINE__.']['.__FILE__.']');
>>>>>>> ede0df7 (first)
        }
        $themes = File::directories($themes_dir);
        $default_data = [
            'name' => 'name',
            'type' => 'adm',
            'description' => '',
            'keywords' => [],
            'active' => 1,
            'order' => 0,
            'aliases' => (object) [],
            'files' => [],
            'requires' => [],
        ];

        $themes = collect($themes)->map(
            function ($item) use ($default_data) {
<<<<<<< HEAD
                $file_json = $item.\DIRECTORY_SEPARATOR.'theme.json';
=======
                $file_json = $item.DIRECTORY_SEPARATOR.'theme.json';
>>>>>>> ede0df7 (first)
                if (! File::exists($file_json)) {
                    $default_data['name'] = basename($item);
                    $data = json_encode($default_data);
                    if ($data) {
                        File::put($file_json, $data);
                    }
                }
                $json = (array) json_decode(File::get($file_json), true);
                $json['name'] = basename($item);
                $json['path'] = $item;
                $json = array_merge($default_data, $json);
<<<<<<< HEAD
                // $info = pathinfo($item);

                return collect($json)->map(
                    function ($item) {
                        if (! \is_string($item)) {
=======
                //$info = pathinfo($item);

                return collect($json)->map(
                    function ($item) {
                        if (! is_string($item)) {
>>>>>>> ede0df7 (first)
                            return json_encode($item);
                        }

                        return $item;
                    }
                )
                    ->all();
            }
        );

        return $themes;
    }

    public static function themeScreenshot(string $name): string {
        $img = 'Themes\\'.$name.'\screenshot.jpg';
        $img_low = strtolower($img);
        $from = base_path($img);
        $to = public_path($img_low);
        $asset = asset(str_replace(['/', '\\'], ['/', '/'], $img_low));
        if (Str::startswith($asset, url(''))) {
            $asset = Str::after($asset, url(''));
        }
        if (! File::exists($to)) {
<<<<<<< HEAD
            File::makeDirectory(\dirname($to), 0755, true, true);
=======
            File::makeDirectory(dirname($to), 0755, true, true);
>>>>>>> ede0df7 (first)
            File::copy($from, $to);
        }

        return $asset;
    }

    public static function firstThemeName(string $theme_type): string {
        $themes = self::getThemes();

        $type = Str::before($theme_type, '_theme');
<<<<<<< HEAD
        /**
         * @var array|null
         */
        $theme = $themes->firstWhere('type', $type);

        if (null === $theme /* || $theme->isEmpty() */) {
=======
        $theme = $themes->firstWhere('type', $type);

        if (null == $theme /* || $theme->isEmpty() */) {
>>>>>>> ede0df7 (first)
            throw new Exception('['.__LINE__.']['.class_basename(__CLASS__).']');
        }

        return $theme['name'];

        /*
        if ('adm_theme' == $theme_type) {
            return $themes->firstWhere('type', 'adm')['name'];
        }

        return $themes->firstWhere('type', 'pub')['name'];
        */
    }
<<<<<<< HEAD
}// end class
=======
}//end class
>>>>>>> ede0df7 (first)
