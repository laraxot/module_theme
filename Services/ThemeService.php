<?php

declare(strict_types=1);

namespace Modules\Theme\Services;

//use Assetic\Asset\FileAsset;
//use Assetic\Cache\FilesystemCache;
//use Assetic\Filter\JsMinFilter;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
//---facades -----
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
//----- Models -----

//---- xot extend -----
//-------- services --------
use Modules\FormX\Services\FormXService;
use Modules\Xot\Contracts\ModelContract;
use Modules\Xot\Services\ArtisanService;
use Modules\Xot\Services\FileService;
use Modules\Xot\Services\PanelService;
use Modules\Xot\Services\StubService;
//----- contracts  --
use Modules\Xot\Services\TenantService;
use Modules\Xot\Traits\Getter;

//---------CSS------------

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
    public static function get_langs($params) {
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
        $locale = config('laravellocalization.supportedLocales.'.$lang);

        return $locale['regional'];
    }

    public static function add(string $file, ?int $position = null): void {
        $path_parts = \pathinfo($file);
        $ext = \mb_strtolower($path_parts['extension']);
        switch ($ext) {
            case 'css':
                /*return*/ self::addStyle($file, $position); break;
            case 'scss':
                /*return*/ self::addStyle($file, $position); break;
            case 'js':
                /*return*/ self::addScript($file, $position); break;
            default:
                echo '<h3>'.$file.'['.$ext.']</h3>';
                dddx('['.__LINE__.']['.__FILE__.']');
            break;
        }

        //return;
    }

    public static function addStyle(string $style, ?int $position = null): void {
        if (null == $position) {
            $styles = self::__getStatic('styles');
            $position = \count($styles) + 10;
        }
        $styles_pos = self::__merge('styles_pos', [$position]);
        $styles = self::__merge('styles', [$style]);
    }

    public static function addScript(string $script, ?int $position = null): void {
        if (null == $position) {
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
        ///$srcz = self::viewNamespaceToUrl([$src]);
        //$src = $srcz[0];
        return self::asset($src);
    }

    /**
     * @return string
     */
    public static function logo_html() {
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
        $pos = \mb_strpos($path, '::');
        if (false === $pos) {
            return false;
        }

        return \mb_substr($path, 0, $pos);
    }

    /**
     * @param string $path
     *
     * @return bool|mixed|string
     */
    public static function asset($path) {
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
                $scripts,
                function ($v, $k) use ($scripts_pos) {
                    return $scripts_pos[$k];
                }
            )
        );
        $scripts = \array_unique($scripts);

        //$scripts = self::viewNamespaceToUrl($scripts);
        $scripts = collect($scripts)->map(
            function ($item) {
                return self::asset($item);
            }
        )->all();
        //ddd($scripts);

        /*
        $scripts=collect($scripts)->map(function($item){
            return self::asset($item);
        })->all();
        */
        //ddd($scripts);
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
            //	$scripts[$k] = self::getFileUrl($filePath);
            //}//end foreach
        }//end if
        */

        $scripts = \array_unique($scripts);

        return view('theme::services.script')->with('scripts', $scripts);
    }

    //end function

    /**
     * @param bool $compress_css
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public static function showStyles($compress_css = true) {
        $styles_pos = self::__getStatic('styles_pos');
        $styles = self::__getStatic('styles');
        $styles = \array_values(\Arr::sort($styles, function ($v, $k) use ($styles_pos) {
            return $styles_pos[$k];
        }));
        $styles = \array_unique($styles);

        //$styles = self::viewNamespaceToUrl($styles);
        $styles = collect($styles)->map(function ($item) {
            return self::asset($item);
        })->all();

        return view('theme::services.style')->with('styles', $styles);
    }

    /**
     * @return string
     */
    public static function metatags() {
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
        //echo '<br/>['.$index.']['.$ris.']';
        if ('' == $ris) {
            $ris = config('metatag.'.$index);
            self::__setStatic($index, $ris);
        }

        return $ris;
    }

    /**
     * @param object $row
     */
    public static function setMetatags($row): void {
        //ddd($row);
        $params = \Route::current()->parameters();
        foreach ($params as $v) {
            if (\is_object($v) && isset($v->title)) {
                self::__concatBeforeStatic('title', $v->title.' | ');
            }
        }
        if (! \is_object($row)) {
            return; // forse buttare in 404 ..
        }
        //-- solo i campi che interessano
        $fields = ['subtitle', 'meta_description', 'meta_keywords', 'url', 'type', 'updated_at', 'published_at'];
        foreach ($fields as $field) {
            self::__setStatic($field, $row->$field);
        }
        //self::__concatBeforeStatic('title', $row->title.' | ');
        //ddd(self::__getStatic('title'));
        //self::__concatBeforeStatic('subtitle', $row->subtitle.' | ');
        //self::__setStatic('url', $row->url);
        //self::__setStatic('category', $row->post_type);
        //self::__setStatic('published_at', $row->published_at);
        //self::__setStatic('updated_at', $row->updated_at);
        $supportedLocales = config('laravellocalization.supportedLocales');
        if ('' == $row->lang) {
            $row->lang = app()->getLocale();
        }
        self::__setStatic('locale', $supportedLocales[$row->lang]['regional']);
        //self::__setStatic('description', $row->meta_description);
        //self::__setStatic('keywords', $row->meta_keywords);
        //self::__setStatic('type', $row->post_type);
        if (\method_exists($row, 'imageResizeSrc')) {
            $image_width = 200;
            $image_height = 200;
            $image = $row->imageResizeSrc(['width' => $image_width, 'height' => $image_height]);
            self::__setStatic('image', asset($image));
            self::__setStatic('image_width', $image_width);
            self::__setStatic('image_height', $image_height);
        }
    }

    /**
     * @return bool|mixed|string
     */
    public static function getArea() {
        $params = \Route::current()->parameters();
        if (isset($params['module'])) {
            return $params['module'];
        }
        $tmp = \explode('/', \Route::current()->getCompiled()->getStaticPrefix());
        $tmp = \array_slice($tmp, 2, 1);
        if (\count($tmp) < 1) {
            return false;
        }

        return $tmp[0];
    }

    /**
     * @param array $params
     *
     * @return array|void
     */
    public static function getModels($params) {
        extract($params);
        if (! isset($module)) {
            dddx(['err' => 'module is missing']);

            return;
        }
        $mod = \Module::find($module);
        $mod_path = $mod->getPath().'\Models';
        $files = File::files($mod_path);
        $data = [];
        $ns = 'Modules\\'.$mod->getName().'\\Models';  // con la barra davanti non va il search ?
        $models = config('xra.model');

        //ddd($model_coll);
        //$related_type=collect(config('xra.model'))
        foreach ($files as $file) {
            $filename = $file->getRelativePathname();
            $ext = '.php';
            if (Str::endsWith($filename, $ext)) {
                $tmp = new \stdClass();
                $name = substr(($filename), 0, -strlen($ext));
                $tmp->name = $name;
                $tmp->class = $ns.'\\'.$name;
                $tmp->type = collect($models)->search($tmp->class);
                //$tmp->name.='['.$tmp->class.']['.$tmp->type.']'; //4debug
                if ('' != $tmp->type) {
                    if (! isset($params['lang'])) {
                        $params['lang'] = app()->getLocale();
                    }
                    $params['container0'] = $tmp->type;
                    $tmp->url = route('admin.container0.index', $params);
                    $data[] = $tmp;
                }
            }
        }

        return $data;
    }

    //end getXmlMenu

    /**
     * { item_description }.
     *
     * @return mixed
     */
    public static function route(array $params = []) {
        $params = \array_merge(\Route::current()->parameters(), $params);
        $routename = Route::currentRouteName();

        return url(route($routename, $params, false));
    }

    /**
     * { item_description }.
     *
     * @param array $parz
     *
     * @return mixed|string
     */
    public static function getView($parz = []) {
        $params = \Route::current()->parameters();
        $route_action = \Route::currentRouteAction();
        //ddd($route_action);//Modules\Xot\Http\Controllers\Container0Controller@index
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
            $mod = \Str::before(\Str::after($route_action, 'Modules\\'), '\\Http\Controllers\\');
            $mod = strtolower($mod);
        }
        if (in_admin()) {
            $path = str_replace('admin.'.$mod.'.', 'admin.', $path);
            $view = $mod.'::'.$path;
        } else {
            $view = 'pub_theme::'.$path;
        }
        //------------ CASI PARTICOLARI -----------
        if ('pub_theme::translation.index' == $view) {
            return 'theme::translation.index';
        }
        //---------------Panel Actions --------------------------
        /*
        $act = \Request::input('_act');
        if (null != $act) {
            $view .= '.acts.'.$act;
        }
        */

        return self::getViewWithFormat($view);
    }

    /**
     * @return mixed|string
     */
    public static function getViewDefault(array $params = []) {
        extract($params);
        if (! isset($act)) {
            $route_action = \Route::currentRouteAction();
            $act = \Str::snake(\Str::after($route_action, '@'));
        }
        $view_default = 'pub_theme::layouts.default.'.$act; //pub_theme o extend ?
        if (\in_admin()) {
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
            $route_action = \Route::currentRouteAction();
            $act = \Str::snake(\Str::after($route_action, '@'));
        }
        $view_extend = 'theme::layouts.default.'.$act;
        if (\in_admin()) {
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
            $route_action = \Route::currentRouteAction();
            $act = \Str::snake(\Str::after($route_action, '@'));
        }

        [$containers,$items] = \params2ContainerItem();
        if (0 == count($containers)) {
            return null;
        }
        $panel = PanelService::getRequestPanel();
        $mod_name_low = $panel->getModuleNameLow();

        $container_0 = collect($containers)->first();
        //dddx($container_0);

        //$model = Tenant::model(last($containers));
        $model = TenantService::model($container_0);
        $mod_name = getModuleNameFromModel($model);
        $mod_name_low = strtolower($mod_name);

        $last_container = last($containers);

        $view = $mod_name_low.'::'.$last_container.'.'.$act;

        return self::getViewWithFormat($view);
    }

    /**
     * @param string $view
     *
     * @return mixed|string
     */
    public static function getViewWithFormat($view) {
        //return $view; //bypasso tutto
        /*
        if (\Request::ajax()) {
            $view .= '_ajax';
        } elseif ('iframe' == \Request::input('format')) {
            $view .= '_iframe';
        }
        */

        $act = \Request::input('_act');
        $act = Str::snake($act);
        if (null != $act) {
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
        $params = \Route::current()->parameters();
        $route_action = \Route::currentRouteAction();
        $act = Str::snake(Str::after($route_action, '@'));
        */
        $view_default = self::getViewDefault();
        $view_extend = self::getViewExtend();
        $view_module = self::getViewModule();
        //---------------------------------------------------------------------------
        if (null == $view) {
            $params = \Route::current()->parameters();
            $view = self::getView($params);
        }

        $view_arr = explode('::', $view);
        $view_short = $view_arr[0].'::'.implode('.', array_slice(explode('.', $view_arr[1]), -4));
        $view_short1 = $view_arr[0].'::'.implode('.', array_slice(explode('.', $view_arr[1]), -3));
        $view_short2 = $view_arr[0].'::'.implode('.', array_slice(explode('.', $view_arr[1]), -2));

        $view_update = str_replace('.update.acts.', '.show.acts.', $view);
        //$view_store = str_replace('.store.', '.show.', $view); ??

        $views = [$view, $view_update, $view_short, $view_short1, $view_short2, $view_module, $view_default, $view_extend];
        /*
         * forse mettere filtro per togliere se c'e' una view a null, e le view che contengono ::show
         */

        return $views;
    }

    /**
     * @return mixed
     */
    public static function getViewWork(array $params = []) {
        $views = self::getDefaultViewArray($params);
        $view_work = collect($views)->first(function ($view_check) {
            return View::exists($view_check);
        });
        if (false == $view_work) {
            $ddd_msg =
                [
                    'err' => 'Not Exists ..',
                    'pub_theme' => config('xra.pub_theme'),
                    'adm_theme' => config('xra.adm_theme'),
                    'view0_dir' => FileService::viewNamespaceToDir($views[0]),
                    'views' => $views,
                ];

            dddx($ddd_msg);
        }

        return $view_work;
    }

    /**
     * view.
     *
     * @return mixed
     */
    public static function view(string $view = null) {
        $view_work = self::getViewWork(['view' => $view]);
        if (null == $view) {
            $view = self::getView();
        }
        //$view = self::getViewWithFormat($view);

        $route_params = \Route::current()->parameters();
        //if (! isset($row)) {
        $row = last($route_params);
        if (! is_object($row) && '' != config('xra.model.'.$row)) {
            /*
            $model = config('xra.model.'.$row);
            $row = new $model();
            */
            $row = TenantService::model($row);
        }
        //}
        $row_type = '';

        if (is_object($row)) {
            self::setMetatags($row);
            $row_type = $row->post_type;
            //if (! isset($panel)) {
            $panel = StubService::getByModel($row, 'panel', true);
            //}
        }
        if ('' == $row_type) {
            $row_type = \Str::camel(class_basename($row));
        }

        $routename = \Route::current()->getName();
        $lang = app()->getLocale();
        //--- per passare la view all'interno dei componenti
        \View::composer('*', function ($view_params) use ($view): void {
            \View::share('view', $view);
            $trad = implode('.', array_slice(explode('.', $view), 0, -1));
            \View::share('trad', $trad);
        });

        $route_action = \Route::currentRouteAction();
        $act = \Str::snake(\Str::after($route_action, '@'));
        /*
        $layout = new \stdClass();
        $layout->view = $view;
        $layout->trad = implode('.', array_slice(explode('.', $view), 0, -1));
        $layout->view_default = self::getViewDefault();
        $layout->view_extend = self::getViewExtend();
        $layout->row_type = $row_type;
        $layout->act = $act;

        if (isset($panel) && method_exists($panel, 'bodyContentView')) {
            $layout->body_content = $panel->bodyContentView(['_layout' => $layout]);
        } else {
            $layout->body_content = self::getViewExtend().'.body_content';
        }

        $layout->left_side = self::getDynView('left', ['_layout' => $layout]);
        $layout->right_side = self::getDynView('right', ['_layout' => $layout]);
        $layout->view_body = (isset($layout->left_side) ? 'left_' : '').'body'.(isset($layout->right_side) ? '_right' : '');
        $layout->item_view = self::getDynView('item', ['_layout' => $layout]);

        if ('' != $row_type && '' == $layout->item_view) {
            $item_view_arr = self::getDynViewsArray('item', ['_layout' => $layout]);
            echo '<h3>Not Exists <ol><li>'.implode('</li><li>', $item_view_arr).'</li></ol>';
            //$data=with(new \Illuminate\Support\NamespacedItemResolver)->parseKey('pub_theme::layouts.default.index.item');
            //$view_file=View::getFinder()->getHints()[$data[0]][0].'/'.$data[1].'/'.str_replace('.','/',$data[2]).'.blade.php';
            //ddd(\File::exists($view_file));
            dddx($item_view_arr);
        }
        */
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

        $modal = null;
        if (\Request::ajax()) {
            $modal = 'ajax';
        } elseif ('iframe' == \Request::input('format')) {
            $modal = 'iframe';
        }

        $theView = view($view_work)
            ->with('trad_short1', $trad_short1)
            ->with('trad_short2', $trad_short2)
            ->with('trad_mod', $trad_mod)
            ->with('lang', $lang)
            ->with('params', $route_params)
            ->with('containers', $containers)
            ->with('last_container', $last_container)
            ->with('items', $items)
            //->with('types', $types)
            ->with('last_item', $last_item)
            //->with('_layout', $layout) ??deprecated
            ->with('routename', $routename)
            ->with('page', new Objects\PageObject())
            ->with('modal', $modal)
            ;
        /*
        $view_params = self::__getStatic('view_params');
        foreach ($view_params as $key => $value) {
            $theView->with($key, $value);
        }
        */
        /*
        \Debugbar::addMessage($view, 'primary view:');
        if (is_object($row)) {
            \Debugbar::addMessage(get_class($row), 'row_class');
            \Debugbar::addMessage(get_class($panel), 'panel');
        } else {
            \Debugbar::addMessage($row, 'row');
        }

        \Debugbar::stopMeasure('render');
        */
        // \xdebug_print_function_stack( '['.__LINE__.']['.__FILE__.']' );
        return $theView;
    }

    /**
     * @param object $row
     *
     * @return \Illuminate\Http\RedirectResponse|void
     */
    /* deprecated
    public static function action(Request $request, $row) {
        //echo '<pre>';print_r($routes);echo '</pre>';
        $routename = \Route::current()->getName();
        $rotename_arr = explode('.', $routename);
        $rotename_arr = array_slice($rotename_arr, 0, -1);
        $routename_base = implode('.', $rotename_arr);
        //ddd($rotename_arr);
        $params = \Route::current()->parameters();
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
                //ddd($row->guid); //deve esserci, controllare che nel modello non ci sia function getGuidAttribute, e che ci sia
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
    //end function

    /**
     * @param string $view
     * @param array  $data
     * @param array  $mergeData
     *
     * @return mixed|string
     */
    public static function cache(/*ViewContract $vc,*/ $view, $data = [], $mergeData = []) {
        //scopiazzato da spatie partialcache
        $lang = app()->getLocale();
        $data['lang'] = $lang;
        $cache_key = Str::slug($view).'-'.md5(json_encode($data)).'-1';
        $seconds = 60 * 60 * 24;
        try {
            $html = Cache::/*store('apc')->*/ remember($cache_key, $seconds, function () use ($view, $data, $mergeData) {
                return (string) \View::make($view, $data, $mergeData)->render();
                //return (string)self::view($view);
            });
        } catch (\Exception $e) {
            ArtisanService::exe('cache:clear');
            $html = (string) \View::make($view, $data, $mergeData)->render();
        }

        return $html;
    }

    /**
     * @param array $params
     *
     * @return bool|mixed|string|void
     */
    public static function imageSrc($params) {// DA RIFARE
        extract($params);
        if (! isset($path)) {
            dddx(['err' => 'path is missing']);

            return;
        }
        $path = self::asset($path);
        /* TO DOOOOOOOO
        */

        return $path; // ci mette troppo nel server
        //ddd($path);
        /*
        $parz = ['src' => $path, 'height' => $height, 'width' => $width];
        $img = new ImageService($parz);
        $ris = $img->fit()->save()->src();
        $ris = str_replace('\\', '/', $ris);
        $ris = str_replace('//', '/', $ris);
        ddd([
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
        //ddd($views); 4debug
        $view_first = collect($views)->first(function ($view_check) {
            return View::exists($view_check);
        });

        return $view_first;
    }
    */

    /**
     * @param string $view_tpl
     * @param array  $params_tpl
     * @param array  $vars
     *
     * @return \Illuminate\Contracts\View\View|null
     */
    public static function include($view_tpl, $params_tpl, $vars) {
        $views = ThemeService::getDefaultViewArray();
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

        if (null == $view_work) {
            if (in_array($view_tpl, ['topbar', 'bottombar', 'inner_page'])) {
                return null;
            }
            dddx(['err' => 'view not Exists', 'views' => $views]);
        }

        return view($view_work)->with($vars)->with($params_tpl); // quale delle 2 ?
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
            //ddd('not exists ['.implode(']'.chr(13).'[',$views).']');
            ddd($views);
        }

        return view($view_first)->with($vars)->with($params_tpl); // quale delle 2 ?
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
     * @param ModelContract $model
     *
     * @return \Illuminate\Contracts\Foundation\Application|mixed|null
     */
    public static function panelModel($model) {
        return StubService::getByModel($model, 'panel', true);
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
        $route_params = \Route::current()->parameters();
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
        $mod_path = $mod->getPath();
        $json_path = $mod_path.'/_menuxml/admin/'.$module.'/_menufull.php';
        //\Debugbar::addMessage($json_path, 'menu path:');
        $json_path = str_replace(['\\', '/'], [DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR], $json_path);
        $menu = include $json_path;
        dddx($menu);
        /*
        $json_content=File::get($json_path);
        $json=json_decode($json_content);
        ddd($json);
        */
    }

    /**
     * @return array|mixed
     */
    public static function getXmlMenu() {
        $route_params = \Route::current()->parameters();
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
        $mod_path = $mod->getPath();
        $json_path = $mod_path.'/_menuxml/admin/'.$module.'/_menufull.php';
        //\Debugbar::addMessage($json_path, 'menu path:');
        $json_path = str_replace(['\\', '/'], [DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR], $json_path);
        if (! File::exists($json_path)) {
            return [];
        }
        $menu = include $json_path;

        return $menu;
    }

    /**
     * @return string
     */
    public static function getPath() { //da jigsaw
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
        if ('body' == $scope) {
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
            if (is_array($v)) {
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
    public static function initThemes() {
        $themes = [];

        /*
        $themes[] = 'css/themes/layout/header/base/'.TenantService::config('layout.header.self.theme').'.css';
        $themes[] = 'css/themes/layout/header/menu/'.TenantService::config('layout.header.menu.desktop.submenu.theme').'.css';
        $themes[] = 'css/themes/layout/aside/'.TenantService::config('layout.aside.self.theme').'.css';
        */
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
     */
    public static function renderHorMenu($item, $parent = null, $rec = 0, bool $singleItem = false): ?string {
        return MenuService::renderHorMenu($item, $parent, $rec); //??, $singleItem
    }

    // Render icon or bullet
    public static function renderIcon(?string $icon): string {
        if (SvgService::isSVG($icon)) {
            return SvgService::getSVG($icon, 'menu-icon');
        } else {
            return '<i class="menu-icon '.$icon.'"></i>';
        }
    }

    public static function renderIconName(string $icon_name): string {
        $icon_key = 'icons.'.$icon_name;
        $icon = TenantService::config($icon_key);
        //forse conviene inserire un controllo per verificare che si trovi la corrispondente chiave della lingua
        // esempio es per spagnolo, nell'array di laravel\config\4venti-local\icons.php
        // ho dovuto aggiungere la riga 'es' => 'media/svg/flags/128-spain.svg', per visualizzare il pannello admin
        //dddx(['icon_name' => $icon_name, 'icon' => $icon, 'icon_key' => $icon_key, 'result' => self::renderIcon($icon)]);

        return self::renderIcon($icon);
    }

    public static function getSVG(string $filepath, ?string $class = ''): string {
        return SvgService::getSVG($filepath, $class);
    }
}//end class
