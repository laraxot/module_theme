<?php

namespace Modules\Theme\Services;

use Assetic\Asset\AssetCache;
use Assetic\Asset\AssetCollection;
use Assetic\Asset\FileAsset;
use Assetic\Cache\FilesystemCache;
use Assetic\Filter\CssMinFilter;
use Assetic\Filter\JsMinFilter;
use Assetic\Filter\ScssphpFilter;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
//----- Models -----

//---- xot extend -----
use Illuminate\Support\Str;
use Modules\FormX\Services\FormXService;
//----- services --
use Modules\Xot\Services\ArtisanService;
use Modules\Xot\Services\StubService;
use Modules\Xot\Traits\Getter;

//---------CSS----------

class ThemeService {
    use Getter;
    protected static $config_name = 'metatag';
    protected static $vars = [];
    private static $instance = null;

    public static function getInstance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public static function get_url($params) {
        return url('/');
    }

    public static function get_tags($params) {
        return [];
    }

    public static function get_styles($params) {
        return [];
    }

    public static function get_scripts($params) {
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

    public static function get_scripts_pos($params) {
        return [];
    }

    public static function get_styles_pos($params) {
        return [];
    }

    public static function get_view_params($params) {
        return [];
    }

    public static function get_language($params) {
        $lang = \App::getLocale();
        $locale = config('laravellocalization.supportedLocales.'.$lang);

        return $locale['regional'];
    }

    public static function add($file, $position = null) {
        $path_parts = \pathinfo($file);
        $ext = \mb_strtolower($path_parts['extension']);
        switch ($ext) {
            case 'css':
                return self::addStyle($file, $position);
            case 'js':
                return self::addScript($file, $position);
            default:
                echo '<h3>'.$file.'['.$ext.']</h3>';
                die('['.__LINE__.']['.__FILE__.']');
            break;
        }
    }

    public static function addStyle($style, $position = null) {
        if (null == $position) {
            $styles = self::__getStatic('styles');
            $position = \count($styles) + 10;
        }
        $styles_pos = self::__merge('styles_pos', [$position]);
        $styles = self::__merge('styles', [$style]);
    }

    public static function addScript($script, $position = null) {
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

    public static function addContentTools($params = []) {
        self::add('theme/bc/ContentTools/build/content-tools.min.css');
        self::add('theme/bc/ContentTools/build/content-tools.min.js');
        self::add('blog::js/contenttools.js');
        self::add('theme/bc/ContentTools/sandbox/sandbox.css');
    }

    public static function addSelect2($params = []) {
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

    public static function view_path($view) {
        $viewNamespace = '---';
        $pos = \mb_strpos($view, '::');

        if ($pos) {
            $hints = \mb_substr($view, 0, $pos);
            $filename = \mb_substr($view, $pos + 2);
            $viewHints = View::getFinder()->getHints();
            if (isset($viewHints[$hints][0])) {
                $viewNamespace = $viewHints[$hints][0];

                return $viewNamespace.\DIRECTORY_SEPARATOR.$filename;
            } else {
                $viewNamespace = '---';
            }
        }

        return $viewNamespace;
    }

    public static function img_src($src) {
        ///$srcz = self::viewNamespaceToUrl([$src]);
        //$src = $srcz[0];
        return self::asset($src);
    }

    public static function logo_html() {
        $logo_src = self::metatag('logo_img');
        $newsrc = self::getFileUrl($logo_src);
        $logo_alt = self::metatag('logo_alt');
        $attrs = [];
        $attrs['alt'] = $logo_alt;
        $img = '<img src="'.$newsrc.'"';
        foreach ($attrs as $k => $v) {
            $img .= ' '.$k.'="'.$v.'"';
        }

        return $img.'/>';
    }

    public static function showImg($src, $attrs = [], $only_url = false) {
        $srcz = self::viewNamespaceToUrl([$src]);
        $src = $srcz[0];
        $newsrc = self::getFileUrl($src);
        if ($only_url) {
            return $newsrc;
        }
        $img = '<img src="'.$newsrc.'"';
        foreach ($attrs as $k => $v) {
            $img .= ' '.$k.'="'.$v.'"';
        }

        return $img.'/>';
    }

    public static function getNameSpace($path) {
        $pos = \mb_strpos($path, '::');
        if (false === $pos) {
            return false;
        }

        return \mb_substr($path, 0, $pos);
    }

    public static function getViewNameSpacePath($ns) {
        if (null == $ns) {
            return null;
        }
        //dirname(\View::getFinder()->find('theme::includes.components.form.text'));
        $viewHints = View::getFinder()->getHints();
        if (isset($viewHints[$ns])) {
            return $viewHints[$ns][0];
        }
    }

    public static function getViewNameSpaceUrl($ns, $path1) {
        if (in_array($ns, ['pub_theme', 'adm_theme'])) {
            $path = self::getViewNameSpacePath($ns);
        } else {
            $module_path = \Module::getModulePath($ns);
            $view_dir = config('modules.paths.generator.views.path');
            $path = $module_path.$view_dir;
        }

        $filename = $path.DIRECTORY_SEPARATOR.$path1;
        $public_path = realpath(public_path('/'));

        if (Str::startsWith($filename, $public_path)) {
            $url = substr($filename, strlen($public_path));
            $url = str_replace(DIRECTORY_SEPARATOR, '/', $url);

            return asset($url);
        }
        /* 4 debug , dovrebbe uscire al return prima
        if($ns=='adm_theme'){

            ddd($msg);
        }
        //*/
        $url = \Module::asset($ns.':'.$path1);
        $filename_pub = \Module::assetPath($ns).DIRECTORY_SEPARATOR.$path1;
        if (! \File::exists(\dirname($filename_pub))) {
            try {
                \File::makeDirectory(\dirname($filename_pub), 0755, true, true);
            } catch (Exception $e) {
                dd('Caught exception: ', $e->getMessage(), '\n['.__LINE__.']['.__FILE__.']');
            }
        }
        if (\File::exists($filename)) {
            try {
                //echo '<hr>'.$filename.' >>>>  '.$filename_pub; //4 debug
                \File::copy($filename, $filename_pub);
            } catch (Exception $e) {
                dd('Caught exception: ', $e->getMessage(), '\n['.__LINE__.']['.__FILE__.']');
            }
        } else {
            $msg = [
                'ns' => $ns,
                'path1' => $path1,
                'filename' => $filename,
                'msg' => 'Filename not Exists',
            ];
            ddd($msg); //4 debug
        }

        //$url=str_replace(url('/'),'',$url);
        //ddd(url($url));
        return $url;
    }

    public static function getViewNameSpaceUrl_nomodule($ns, $path1) {
        $path = self::getViewNameSpacePath($ns);
        /* 4 debug
        if(basename($path1)=='font-awesome.min.css'){
            ddd('-['.$path.']['.public_path('').']');
        }
        //*/
        if (Str::startsWith($path, public_path(''))) {
            $relative = \mb_substr($path, \mb_strlen(public_path('')));
            $relative = str_replace('\\', '/', $relative);

            return asset($relative.'/'.$path1);
        }
        $filename = $path.'/'.$path1;
        $path_pub = 'assets_packs/'.$ns.'/'.$path1;
        $filename_pub = public_path($path_pub);

        if (! \File::exists(\dirname($filename_pub))) {
            try {
                \File::makeDirectory(\dirname($filename_pub), 0755, true, true);
            } catch (Exception $e) {
                dd('Caught exception: ', $e->getMessage(), '\n['.__LINE__.']['.__FILE__.']');
            }
        }
        if (\File::exists($filename)) {
            try {
                //echo '<hr>'.$filename.' >>>>  '.$filename_pub; //4 debug
                \File::copy($filename, $filename_pub);
            } catch (Exception $e) {
                dd('Caught exception: ', $e->getMessage(), '\n['.__LINE__.']['.__FILE__.']');
            }
        } else {
            $filename = str_replace('/', DIRECTORY_SEPARATOR, $filename);
            $full = $ns.':'.$path1;
            $msg = [
                'ns' => $ns,
                'Module::getModulePath' => \Module::getModulePath($ns.':'.$path1), ///home/vagrant/code/htdocs/lara/foodm/Modules/LU/
                'Module::assetPath' => \Module::assetPath($ns), //"/home/vagrant/code/htdocs/lara/foodm/public/modules/lu
                'view_dir' => config('modules.paths.generator.views.path'),
                'full' => $full,
                'test1' => \Module::asset($full),
                'test2' => \Module::getAssetsPath(),
                'path1' => $path1,
                'filename' => $filename,
                'msg' => 'Filename not Exists',
            ];
            ddd($msg);
            //ddd('non esiste '.); //4 debug
        }

        return asset($path_pub);
    }

    public static function path2Url($path, $ns) {
        if (Str::startsWith($path, public_path('/'))) {
            $relative = \mb_substr($path, \mb_strlen(public_path('/')));

            return asset($relative);
        }
        $filename = $path;
        $ns_dir = self::getViewNameSpacePath($ns);
        $path1 = substr($path, strlen($ns_dir));
        $path_pub = 'assets_packs/'.$ns.'/'.$path1;
        $filename_pub = public_path($path_pub);

        if (! \File::exists(\dirname($filename_pub))) {
            try {
                \File::makeDirectory(\dirname($filename_pub), 0755, true, true);
            } catch (Exception $e) {
                dd('Caught exception: ', $e->getMessage(), '\n['.__LINE__.']['.__FILE__.']');
            }
        }
        if (\File::exists($filename)) {
            try {
                //echo '<hr>'.$filename.' >>>>  '.$filename_pub; //4 debug
                \File::copy($filename, $filename_pub);
            } catch (Exception $e) {
                dd('Caught exception: ', $e->getMessage(), '\n['.__LINE__.']['.__FILE__.']');
            }
        } else {
            //ddd('non esiste '.$filename); //4 debug
        }

        return asset($path_pub);
    }

    public static function viewThemeNamespaceToAsset($key) {
        $ns_name = Str::before($key, '::');
        $ns_dir = View::getFinder()->getHints()[$ns_name][0];
        $ns_name = config('xra.'.$ns_name);
        $tmp = Str::after($key, '::');
        $tmp0 = Str::before($tmp, '/');
        $tmp1 = Str::after($tmp, '/');
        //--------------------------------------------------
        $filename = str_replace('.', '/', $tmp0).'/'.$tmp1;
        $filename_from = $ns_dir.'/'.$filename;
        $asset = '/themes/'.$ns_name.'/'.$filename;
        $filename_to = public_path($asset);
        //--------------------------------------------------
        $msg = [
            'filename' => $filename,
            'from' => $filename_from,
            'to' => $filename_to,
            'asset' => $asset,
            'pub_theme' => config('xra.pub_theme'),
        ];

        $dir_to = \dirname($filename_to);
        if (! \File::exists($dir_to)) {
            try {
                File::makeDirectory($dir_to, 0755, true, true);
            } catch (Exception $e) {
                ddd('Caught exception: ', $e->getMessage(), '\n['.__LINE__.']['.__FILE__.']');
            }
        }

        if (! File::exists($filename_from)) {
            //ddd('['.$filename_from.'] not exists');
            //ddd($msg);
            return '';
        }
        if (! File::exists($filename_to)) {
            try {
                File::copy($filename_from, $filename_to);
            } catch (Exception $e) {
                ddd('Caught exception: '.$e->getMessage());
            }
        }

        return $asset;
    }

    public static function viewNamespaceToAsset($key) {
        $ns_name = Str::before($key, '::');
        $ns_dir = View::getFinder()->getHints()[$ns_name][0];
        $tmp = Str::after($key, '::');
        $tmp0 = Str::before($tmp, '/');
        $tmp1 = Str::after($tmp, '/');

        $filename = str_replace('.', '/', $tmp0).'/'.$tmp1;
        $filename_from = $ns_dir.'/'.$filename;
        $public_path = public_path();
        if (Str::startsWith($filename_from, $public_path)) {  //se e' in un percoro navigabile
            $path = Str::after($filename_from, $public_path);
            $path = str_replace(['\\'], ['/'], $path);

            return asset($path);
        }

        if (in_array($ns_name, ['pub_theme', 'adm_theme'])) {
            return self::viewThemeNamespaceToAsset($key);
        }

        $tmp = '/assets/'.$ns_name.'/'.$filename;
        $filename_to = public_path($tmp);

        $asset = asset($tmp);
        $msg = [
            'key' => $key,
            'filename_from' => $filename_from,
            'filename_from_exists' => File::exists($filename_from),
            'filename_to' => $filename_to,
            'filename_to_exists' => File::exists($filename_to),
            'asset' => $asset,
            'public_path' => public_path(),
        ];
        if (! File::exists($filename_from)) {
        }
        $dir_to = \dirname($filename_to);
        if (! \File::exists($dir_to)) {
            try {
                File::makeDirectory($dir_to, 0755, true, true);
            } catch (Exception $e) {
                dd('Caught exception: ', $e->getMessage(), '\n['.__LINE__.']['.__FILE__.']');
            }
        }
        if (File::exists($filename_to)) {
            File::delete($filename_to); //
            //return $asset;
        }

        if (File::exists($filename_from)) {
            try {
                File::copy($filename_from, $filename_to);
            } catch (Exception $e) {
                ddd('Caught exception: '.$e->getMessage());
            }
        } else {
            ddd('['.$filename_from.'] not exists');
        }

        return $asset;
    }

    public static function asset($path) {
        if ('/' == $path[0]) {
            $path = \mb_substr($path, 1);
        }
        $str = 'theme/bc/';
        if (Str::startsWith($path, $str)) {
            return asset('/bc/'.\mb_substr($path, \mb_strlen($str)));
        }
        $str = 'theme/pub/';
        if (Str::startsWith($path, $str)) {
            $path = 'pub_theme::'.\mb_substr($path, \mb_strlen($str));
        }
        $str = 'theme/';
        if (Str::startsWith($path, $str)) {
            $path = 'adm_theme::'.\mb_substr($path, \mb_strlen($str));
        }

        $str = 'https://';
        if (Str::startsWith($path, $str)) {
            return $path;
        }

        $str = 'http://';
        if (Str::startsWith($path, $str)) {
            return $path;
        }

        if (! Str::contains($path, '::')) {
            return $path;
        }

        /*
            to DOOOO
            viewNamespaceToPath     => /images/prova.png
            viewNamespaceToDir      => c:\var\wwww\test\images\prova.png
            viewNamespaceToAsset    => http://example.com/images/prova.png
        */

        return asset(self::viewNamespaceToAsset($path));
    }

    /*
    public static function url($path)
    {
        if($path=='') return $path;
        if ('/' == $path[0]) {
            $path = \mb_substr($path, 1);
        }
        $str = 'theme/bc/';
        if (\mb_substr($path, 0, \mb_strlen($str)) == $str) {
            $filename = asset('/bc/'.\mb_substr($path, \mb_strlen($str)));

            return $filename;
        }
        $str = 'theme/pub/';
        $theme = config('xra.pub_theme');
        if (\mb_substr($path, 0, \mb_strlen($str)) == $str) {
            $filename = asset('/themes/'.$theme.'/'.\mb_substr($path, \mb_strlen($str)));

            return $filename;
        }
        $str = 'theme/';
        $theme = config('xra.adm_theme');
        if (\mb_substr($path, 0, \mb_strlen($str)) == $str) {
            $filename = asset('/themes/'.$theme.'/'.\mb_substr($path, \mb_strlen($str)));

            return $filename;
        }

        return ''.$path;
    }
    */
    /*
    public static function getFileUrl($path)
    {
        if(Str::startsWith($path, '//')) {

        }elseif(Str::startsWith($path, '/')) {
            $path = \mb_substr($path, 1);
        }
        $str = 'theme/bc/';
        if (Str::startsWith($path, $str)) {
            $filename = asset('/bc/'.\mb_substr($path, \mb_strlen($str)));

            return $filename;
        }
        $str = 'theme/pub/';
        $theme = config('xra.pub_theme');
        if (Str::startsWith($path, $str)) {
            $filename = asset('/themes/'.$theme.'/'.\mb_substr($path, \mb_strlen($str)));

            return $filename;
        }
        $str = 'theme/';
        $theme = config('xra.adm_theme');
        if (Str::startsWith($path, $str)) {
            $filename = asset('/themes/'.$theme.'/'.\mb_substr($path, \mb_strlen($str)));

            return $filename;
        }

        return ''.$path;
    }
    */
    /*
    public static function viewNamespaceToUrl($files)
    {
        foreach ($files as $k => $filePath) {
            //TODO testare con ARTISAN vendor:publish
            $pos = \mb_strpos($filePath, '::');
            if ($pos) {
                $hints = \mb_substr($filePath, 0, $pos);
                $filename = \mb_substr($filePath, $pos + 2);
                $viewHints = View::getFinder()->getHints();
                if (isset($viewHints[$hints][0])) {
                    $viewNamespace = $viewHints[$hints][0];
                } else {
                    $viewNamespace = '---';
                }
                if ('pub_theme' == $hints) {
                    $tmp = \str_replace(public_path(''), '', $viewNamespace);
                    $tmp = \str_replace(\DIRECTORY_SEPARATOR, '/', $tmp);
                    $pos = \mb_strpos($filename, '/');
                    $filename0 = \mb_substr($filename, 0, $pos);
                    $filename0 = \str_replace('.', '/', $filename0);
                    $filename1 = \mb_substr($filename, $pos);
                    $filename = $filename0.''.$filename1;
                    //echo '<h3>'.$filename0.''.$filename1.'</h3>';
                    //dd($tmp.'/'.$filename);
                    $new_url = $tmp.'/'.$filename;
                } else {
                    $old_path = $viewNamespace.\DIRECTORY_SEPARATOR.$filename;
                    $old_path = \str_replace('/', \DIRECTORY_SEPARATOR, $old_path);
                    $new_path = public_path('assets_packs'.\DIRECTORY_SEPARATOR.$hints.\DIRECTORY_SEPARATOR.$filename);
                    $new_path = \str_replace('/', \DIRECTORY_SEPARATOR, $new_path);
                    if (!\File::exists(\dirname($new_path))) {
                        try {
                            \File::makeDirectory(\dirname($new_path), 0755, true, true);
                        } catch (Exception $e) {
                            dd('Caught exception: ', $e->getMessage(), '\n['.__LINE__.']['.__FILE__.']');
                        }
                    }
                    if (\File::exists($old_path)) {
                        try {
                            \File::copy($old_path, $new_path);
                        } catch (Exception $e) {
                            dd('Caught exception: ', $e->getMessage(), '\n['.__LINE__.']['.__FILE__.']');
                        }
                    }
                    $new_url = \str_replace(public_path(), '', $new_path);
                    $new_url = \str_replace('\\/', '/', $new_url);
                    $new_url = \str_replace(\DIRECTORY_SEPARATOR, '/', $new_url);
                }
                $files[$k] = $new_url;
            }
        }

        return $files;
    }
    */

    public static function showScripts($compress_js = true, $page = '') {
        //TODO FIX url da funzione e non replace !!!
        //
        $scripts_pos = self::__getStatic('scripts_pos');
        $scripts = self::__getStatic('scripts');
        $scripts = \array_values(Arr::sort($scripts, function ($v, $k) use ($scripts_pos) {
            return $scripts_pos[$k];
        }));
        $scripts = \array_unique($scripts);

        //$scripts = self::viewNamespaceToUrl($scripts);
        $scripts = collect($scripts)->map(function ($item) {
            return self::asset($item);
        })->all();
        //ddd($scripts);

        /*
        $scripts=collect($scripts)->map(function($item){
            return self::asset($item);
        })->all();
        */
        //ddd($scripts);

        if ($compress_js) {
            $scripts_list = \implode(',', $scripts);
            $scripts_md5 = \md5($scripts_list);

            $name = '/js/script_'.$scripts_md5.'.js';
            $path = public_path($name);
            $force = 1;
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

        /*
        foreach ($scripts as $k => $v) {
            $scripts[$k] = self::getFileUrl($v);
        }//end foreach
        */
        $scripts = \array_unique($scripts);

        return view('theme::services.script')->with('scripts', $scripts);
    }

    //end function

    public static function getRealFile($path) {
        if (Str::startsWith($path, asset(''))) {
            return public_path(substr($path, strlen(asset(''))));
        }
        if ('/' == $path[0]) {
            $path = \mb_substr($path, 1);
        }
        $str = 'theme/bc/';
        //if (\mb_substr($path, 0, \mb_strlen($str)) == $str) {
        if (Str::startsWith($path, $str)) {
            $filename = public_path('bc/'.\mb_substr($path, \mb_strlen($str)));
            //$filename=str_replace('\\/','/',$filename);
            //$filename=realpath($filename);
            return $filename;
        }
        $str = 'theme/pub/';
        $theme = config('xra.pub_theme');
        //if (\mb_substr($path, 0, \mb_strlen($str)) == $str) {
        if (Str::startsWith($path, $str)) {
            $filename = public_path('themes/'.$theme.'/'.\mb_substr($path, \mb_strlen($str)));
            //$filename=str_replace('\\/','/',$filename);
            //$filename=realpath($filename);
            return $filename;
        }
        $str = 'theme/';
        $theme = config('xra.adm_theme');
        //if (\mb_substr($path, 0, \mb_strlen($str)) == $str) {
        if (Str::startsWith($path, $str)) {
            $filename = public_path('themes/'.$theme.'/'.\mb_substr($path, \mb_strlen($str)));

            return $filename;
        }
        $str = 'https://';
        if (Str::startsWith($path, $str)) {
            $info = pathinfo($path);
            switch ($info['extension']) {
                case 'css': $filename = public_path('/css/'.$info['basename']); break;
                case 'js':  $filename = public_path('/js/'.$info['basename']); break;
                default:
                    echo '<h3>Unknown Extension</h3>';
                    echo '<h3>['.$path.']</h3>';
                    ddd($info);
                break;
            }
            ImportService::download(['url' => $path, 'filename' => $filename]);

            return $filename;
        }

        return ''.$path;
    }

    public static function showStyles($compress_css = true) {
        $styles_pos = self::__getStatic('styles_pos');
        $styles = self::__getStatic('styles');
        $styles = \array_values(Arr::sort($styles, function ($v, $k) use ($styles_pos) {
            return $styles_pos[$k];
        }));
        $styles = \array_unique($styles);

        //$styles = self::viewNamespaceToUrl($styles);
        $styles = collect($styles)->map(function ($item) {
            return self::asset($item);
        })->all();
        //ddd($styles);
        //ddd(asset('/'));
        $not_compress = [];

        if ($compress_css) {
            $styles_list = \implode(',', $styles);
            $styles_md5 = \md5($styles_list);
            $name = '/css/style_'.$styles_md5.'.css';
            $path = public_path($name);
            $force = 1;
            //dd( storage_path('cache')); //pb\laravel\storage\cache
            //dd(\Storage::disk('cache')->url('file.jpg'));//getPath());
            if (! \file_exists($path) || $force) {
                //$cache = new FilesystemCache($_SERVER['DOCUMENT_ROOT'] . '/tmp');
                //$cache = new FilesystemCache(dirname($path));
                require __DIR__.'/vendor/autoload.php'; //carico la mia libreria che uso solo qui..
                $cache = new FilesystemCache(base_path('../cache'));
                $collection = new AssetCollection();

                foreach ($styles as $filePath) {
                    //echo '<br/>['.$filePath.']';
                    $filePath = self::getRealFile($filePath);
                    if (! \File::exists($filePath)) {
                        //echo '<h3> non esiste il file ['.$filePath.']</h3>';
                        //die('['.__LINE__.']['.__FILE__.']');

                        $not_compress[] = $filePath;
                    } else {
                        $asset = new FileAsset($filePath);
                        $info = \pathinfo($filePath);
                        if (isset($info['extension'])) {
                            switch ($info['extension']) {
                                case 'scss':
                                    $asset->ensureFilter(new ScssphpFilter());
                                break;
                            default:
                                $asset->ensureFilter(new CssMinFilter());
                            break;
                            }
                        }
                        $cachedAsset = new AssetCache($asset, $cache);
                        $collection->add($cachedAsset);
                    }
                }

                $path = public_path().$name;

                \File::put($path, $collection->dump());
            }
            $styles = [$name];
        } else {
            /*
            foreach ($styles as $k => $filePath) {
                $styles[$k] = self::getFileUrl($filePath);
            }
            */
        }
        //ddd($not_compress);
        return view('theme::services.style')->with('styles', $styles);
    }

    public static function tag($html) {
        $count = 0;
        \preg_match_all('/##([a-z]*)_([a-z]*)_([0-9]{1,30})##/i', $html, $matches);

        $count += \count($matches);
        $tmp = [];
        foreach ($matches[0] as $km => $vm) {
            $obj = new \stdclass();
            $obj->obj = $obj->act = $matches[1][$km];
            $obj->act = $matches[2][$km];

            $obj->id = $matches[3][$km];
            $obj->str = $matches[0][$km];
            $tmp[] = $obj;
        }

        $params = \Route::current()->parameters();

        $params['html'] = $html;
        $params['azioniTags'] = $tmp;
        $html = self::do_mySpecialTags($params);

        \preg_match_all('/##([a-z]*)_([0-9]*)_([a-z]{1,30})##/i', $html, $matches);

        $count += \count($matches);
        $tmp = [];
        foreach ($matches[0] as $km => $vm) {
            $obj = new \stdclass();
            $obj->obj = $obj->act = $matches[1][$km];
            $obj->act = $matches[3][$km];
            $obj->id = $matches[2][$km];
            $obj->str = $matches[0][$km];
            $tmp[] = $obj;
        }

        $params = \Route::current()->parameters();

        $params['html'] = $html;
        $params['azioniTags'] = $tmp;
        $html = self::do_mySpecialTags($params);

        \preg_match_all('/##([a-z]*)_([0-9]{1,30})##/i', $html, $matches);

        $count += \count($matches);
        $tmp = [];
        foreach ($matches[0] as $km => $vm) {
            $obj = new \stdclass();
            $obj->obj = $obj->act = $matches[1][$km];
            if ('albumran' == $obj->obj) {
                $obj->obj = 'album';
            }
            $obj->act = 'get';
            if ('albumran' == $obj->obj) {
                $obj->obj = 'album';
            }
            $obj->id = $matches[2][$km];
            $obj->str = $matches[0][$km];
            $tmp[] = $obj;
        }

        $html = self::do_mySpecialTags(['html' => $html, 'azioniTags' => $tmp]);

        \preg_match_all('/##([a-z]*)_([a-z]*)##/i', $html, $matches);

        $count += \count($matches);
        $tmp = [];
        foreach ($matches[0] as $km => $vm) {
            $obj = new \stdclass();
            $obj->obj = $obj->act = $matches[1][$km];
            $obj->act = $matches[2][$km];

            $obj->str = $matches[0][$km];
            $tmp[] = $obj;
        }

        $html = self::do_mySpecialTags(['html' => $html, 'azioniTags' => $tmp]);

        \preg_match_all('/##([a-z]*)##/i', $html, $matches);

        $count += \count($matches);
        $tmp = [];
        foreach ($matches[0] as $km => $vm) {
            $obj = new \stdclass();
            $obj->obj = $obj->act = $matches[1][$km];
            $obj->act = $matches[1][$km];

            $obj->str = $matches[0][$km];
            $tmp[] = $obj;
        }

        $html = self::do_mySpecialTags(['html' => $html, 'azioniTags' => $tmp]);

        return $html;
    }

    public static function do_mySpecialTags($params) {
        \extract($params);
        \reset($azioniTags);

        $params = \Route::current()->parameters();

        foreach ($azioniTags as $kt => $vt) {
            $obj = $vt->obj;
            if ('form' == $obj) {
                $obj .= 'tpl';
            }
            $act = $vt->act.'HTML';

            $params['html'] = '';

            $params = \array_merge($params, \get_object_vars($vt));

            $controller_name = '\App\Http\Controllers\\'.\ucwords($obj).'Controller';

            $out = app($controller_name)->$act($params);
            if (! \is_string($out)) {
                $out = $out->__toString();
            }

            $html = \str_replace($vt->str, $out, $html);
        }

        return $html;
    }

    public static function getBladeInclude($obj, $act, $id) {
        $controller_name = '\App\Http\Controllers\\'.\ucwords($obj).'Controller';
        $act = $act.'BladeInclude';

        return app($controller_name)->$act($id);
    }

    public static function metatags() {
        $view = 'theme::metatags';

        return (string) view($view);
    }

    public static function metatag($index) {
        $ris = self::__getStatic($index);
        //echo '<br/>['.$index.']['.$ris.']';
        if ('' == $ris) {
            $ris = config('metatag.'.$index);
            self::__setStatic($index, $ris);
        }

        return $ris;
    }

    public static function setMetatags($row) {
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
            $row->lang = \App::getLocale();
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

    public static function getArea() {
        $params = \Route::current()->parameters();
        if (isset($params['module'])) {
            return  $params['module'];
        }
        $tmp = \explode('/', \Route::current()->getCompiled()->getStaticPrefix());
        $tmp = \array_slice($tmp, 2, 1);
        if (\count($tmp) < 1) {
            return false;
        }

        return $tmp[0];
    }

    public static function getModels($params) {
        extract($params);
        $mod = \Module::find($module);
        $mod_path = $mod->getPath().'\Models';
        $files = File::files($mod_path);
        $data = [];
        $ns = 'Modules\\'.$mod->name.'\\Models';  // con la barra davanti non va il search ?
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
                        $params['lang'] = \App::getLocale();
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

    public static function viewNamespaceToDir($view) {
        $pos = \mb_strpos($view, '::');
        $pack = \mb_substr($view, 0, $pos);
        //relative from pack
        $relative_path = \str_replace('.', '/', \mb_substr($view, $pos + 2));
        $viewHints = View::getFinder()->getHints();
        $pack_dir = $viewHints[$pack][0];
        $view_dir = $pack_dir.'/'.$relative_path;
        $view_dir = \str_replace('/', \DIRECTORY_SEPARATOR, $view_dir);

        return $view_dir;
    }

    public static function tabs($params) {
        //o glielo passo come parametro o me lo calcolo, ma da errore su tabs annidati
        if (isset($params['view'])) {
            $tabs_view = $params['view'].'.tabs';
            $tabs_dir = self::viewNamespaceToDir($tabs_view);
        } else {
            $routename = Route::currentRouteName();
            $action = Route::currentRouteAction();
            $action = \explode('\\', $action);
            $pack = \mb_strtolower($action[1]);
            $tabs_view = $pack.'::'.$routename.'.tabs';
            //manca "admin"
            $tabs_dir = self::viewNamespaceToDir($tabs_view);
        }
        //dd($tabs_dir);
        $files = \File::files($tabs_dir);
        $tabs = [];
        $blade_ext = '.blade.php';
        foreach ($files as $file) {
            /* sostituire pathinfo in queste funzioni per la laravel way
            $file->getSize();
        $file->getFilename();
        $file->getType();
            */
            $path_parts = \pathinfo($file);

            if (\mb_substr($path_parts['basename'], -\mb_strlen($blade_ext)) == $blade_ext) {
                $tmp = [];
                //$tmp['path']=(string)$file; //usefull for debug
                $name = \mb_substr($path_parts['basename'], 0, -\mb_strlen($blade_ext));
                $re = '/([^_]*)_([0-9]*)/';
                $ris = \preg_match($re, $name, $matches);
                //echo '<pre>';print_r($ris);echo '</pre>';die();
                if ($ris) {
                    $tmp['name'] = $matches[1];
                    $tmp['position'] = $matches[2] * 1;
                } else {
                    $tmp['name'] = $name;
                    $tmp['position'] = 10;
                }
                $tmp['view'] = $name;

                $tabs[] = $tmp;
            }
        }

        $tabs = collect($tabs)->sortBy('position')->all();
        $tabs = \array_values($tabs);
        //echo '<pre>';print_r($tabs);echo '</pre>';die();
        /*
        $tabs=[
                ['name'=>'menu',        'icon'=>'fa fa-cutlery orange-text'],
                ['name'=>'bookatable',  'icon'=>'fa fa-calendar-check-o orange-text'],
                ['name'=>'reviews',     'icon'=>'fa fa-comments orange-text'],
                ['name'=>'info',        'icon'=>'fa fa-info-circle orange-text'],
                ];
        */

        //return view('theme::services.tabs',$params)
        $view = 'theme::services.tabs';
        $view = 'pub_theme::includes.partials.tabs';
        $view = 'adm_theme::includes.partials.tabs';

        return view($view, $params)
        ->with('tabs', $tabs)
        ->with('tabs_view', $tabs_view)
        //->with('row',$params['row'])
        ;
    }

    /**
     * { item_description }.
     */
    public static function route($params = []) {
        $params = \array_merge(\Route::current()->parameters(), $params);
        $routename = Route::currentRouteName();

        return url(route($routename, $params, false));
    }

    /**
     * { item_description }.
     */
    public static function getView($parz = []) {
        $params = \Route::current()->parameters();
        $route_action = \Route::currentRouteAction();
        //ddd($route_action);//Modules\Xot\Http\Controllers\Container0Controller@index
        $tmp = Str::after($route_action, '\Http\Controllers\\');
        $tmp = \str_replace('\\', '.', $tmp);
        $tmp = \str_replace('Controller@', '.', $tmp);
        $path = collect(explode('.', $tmp))->map(function ($item) use ($params) {
            $item = Str::snake($item);
            if (isset($params[$item])) {
                return $params[$item];
            }

            return $item;
        })->implode('.');
        if (isset($params['module'])) {
            $mod = $params['module'];
        } else {
            $mod = Str::before(Str::after($route_action, 'Modules\\'), '\\Http\Controllers\\');
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
        //-----------------------------------------
        return $view;
    }

    public static function getViewWork() {
        $params = \Route::current()->parameters();
        $route_action = \Route::currentRouteAction();
        $act = Str::snake(Str::after($route_action, '@'));
        if (\in_admin()) {
            $view_default = 'adm_theme::layouts.default.'.$act;
            $view_extend = 'theme::layouts.default.admin.'.$act;
        } else {
            $view_default = 'pub_theme::layouts.default.'.$act; //pub_theme o extend ?
            $view_extend = 'theme::layouts.default.'.$act;
        }
        //---------------------------------------------------------------------------
        if (\Request::ajax()) {
            $view_default .= '_ajax';
            $view_extend .= '_ajax';
        }
        $use_default = false;
        //if (null == $view) {
        $view = self::getView($params);
        //}
        $views = [$view, $view_default, $view_extend];
        $view_work = collect($views)->first(function ($view_check) {
            return View::exists($view_check);
        });
        if (false == $view_work) {
            $ddd_msg = array_merge(['err' => 'Not Exists ..', 'line' => __LINE__, 'file' => __FILE__], $views);
            ddd($ddd_msg);
        }

        return $view_work;
    }

    public static function view($params = null) {
        $view = null;
        if (is_array($params)) {
            extract($params);
        } else {
            $view = $params;
        }

        $params = \Route::current()->parameters();
        $route_action = \Route::currentRouteAction();
        $act = Str::snake(Str::after($route_action, '@'));
        if (\in_admin()) {
            $view_default = 'adm_theme::layouts.default.'.$act;
            $view_extend = 'theme::layouts.default.admin.'.$act;
        } else {
            $view_default = 'pub_theme::layouts.default.'.$act; //pub_theme o extend ?
            $view_extend = 'theme::layouts.default.'.$act;
        }
        //---------------------------------------------------------------------------
        if (\Request::ajax()) {
            $view_default .= '_ajax';
            $view_extend .= '_ajax';
        }
        $use_default = false;
        if (null == $view) {
            $view = self::getView($params);
        }
        $views = [$view, $view_default, $view_extend];
        $view_work = collect($views)->first(function ($view_check) {
            return View::exists($view_check);
        });
        if (false == $view_work) {
            $ddd_msg = array_merge(
                [
                    'err' => 'Not Exists ..',
                    'line' => __LINE__,
                    'file' => __FILE__,
                    'pub_theme' => config('xra.pub_theme'),
                    'adm_theme' => config('xra.adm_theme'),
                    'view0_dir'=>self::viewNamespaceToDir($views[0]),
                ],
                $views
            );
            ddd($ddd_msg);
        }
        if (! isset($row)) {
            $row = last($params);
            if (! is_object($row) && '' != config('xra.model.'.$row)) {
                $model = config('xra.model.'.$row);
                $row = new $model();
            }
        }
        $row_type = '';

        if (is_object($row)) {
            self::setMetatags($row);
            $row_type = $row->post_type;
            if (! isset($panel)) {
                $panel = StubService::getByModel($row, 'panel', true);
            }
        }
        if ('' == $row_type) {
            $row_type = Str::camel(class_basename($row));
        }

        $routename = \Route::current()->getName();
        $lang = \App::getLocale();
        //--- per passare la view all'interno dei componenti
        \View::composer('*', function ($view_params) use ($view) {
            \View::share('view', $view);
            $trad = implode('.', array_slice(explode('.', $view), 0, -1));
            \View::share('trad', $trad);
        });

        $layout = new \stdClass();
        $layout->view = $view;
        $layout->trad = implode('.', array_slice(explode('.', $view), 0, -1));
        $layout->view_default = $view_default;
        $layout->view_extend = $view_extend;
        $layout->row_type = $row_type;
        $layout->act = $act;

        if (isset($panel) && method_exists($panel, 'bodyContentView')) {
            $layout->body_content = $panel->bodyContentView(['_layout' => $layout]);
        } else {
            $layout->body_content = $view_extend.'.body_content';
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
            ddd($item_view_arr);
        }

        list($containers, $items) = params2ContainerItem($params);
        $last_container = last($containers);
        $types = Str::camel(Str::plural($last_container));
        $last_item = last($items);
        $theView = view($view_work)
            ->with('lang', $lang)
            ->with('params', $params)
            ->with('containers', $containers)
            ->with('last_container', $last_container)
            ->with('items', $items)
            ->with('types', $types)
            ->with('last_item', $last_item)
            ->with('_layout', $layout)
            ->with('routename', $routename);
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
                break;
            case 'save_close':
                $routename = $routename_base.'.index';
                if (\Route::has($routename.'_edit')) {
                    return redirect()->route($routename.'_edit', $params);
                }

                return redirect()->route($routename, $params);
                break;
            case 'come_back':
                return redirect()->back();
                break;
            case 'row':
                return $row;
                break;
            default:
                echo '<h3>['.__LINE__.']['.__FILE__.']</h3>';
                ddd($data['_action']);
                break;
        }//end switch
    }

    //end function

    public static function cache(/*ViewContract $vc,*/$view, $data = [], $mergeData = []) {
        //scopiazzato da spatie partialcache
        $lang = \App::getLocale();
        $data['lang'] = $lang;
        $cache_key = Str::slug($view).'-'.md5(json_encode($data)).'-1';
        $seconds = 60 * 60 * 24;
        try {
            $html = Cache::/*store('apc')->*/remember($cache_key, $seconds, function () use ($view, $data, $mergeData) {
                return (string) \View::make($view, $data, $mergeData)->render();
                //return (string)self::view($view);
            });
        } catch (\Exception $e) {
            ArtisanService::exe('cache:clear');
            $html = (string) \View::make($view, $data, $mergeData)->render();
        }

        return $html;
    }

    public static function imageSrc($params) {
        extract($params);
        $path = self::asset($path);
        /* TO DOOOOOOOO
        */

        return $path; // ci mette troppo nel server
        //ddd($path);
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
    }

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

    //--- lo chiamo da blade, in prod si puo' ipotizzare di usare la cache
    public static function include($view_tpl, $params_tpl, $vars) {
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

    public static function xotModel($name) {
        //try{
        $name = Str::snake($name);
        //}catch(\Eception $e){
        //    ddd($name);
        //}

        $class = config('xra.model.'.$name);
        if (null == $class) {
            return null;
            ddd('['.$name.'] non presente in config/xra.model');
        }
        $model = new $class();

        $panel = self::panelModel($model);
        $with = $panel->with();
        $model = $model->load($with);

        return $model;
    }

    public static function panelModel($model) {
        return StubService::getByModel($model, 'panel', true);
    }

    public static function inputFreeze($params) {
        return FormXService::inputFreeze($params);
    }

    public static function inputHtml($params) {
        return FormXService::inputHtml($params);
    }

    public static function getBreadContainer($params) {
        extract($params);
        $route_params = \Route::current()->parameters();
        $tmp = new \stdClass();
        $tmp->title = $v;
        /*
        list($containers,$items)=params2ContainerItem();
        $container_i=collect($containers)->search($k);
        ddd($containers);
        ddd($container_i.' '.$k);
        */
        $container_i = str_replace('container', '', $k) * 1;
        $route_piece = [];
        if (in_admin()) {
            $route_piece[] = 'admin';
        }
        for ($i = 0; $i <= $container_i; ++$i) {
            $route_piece[] = 'container'.$i;
        }
        $route_piece[] = 'index';
        $route_name = implode('.', $route_piece);
        //ddd($route_name);
        $currentQueries = request()->query();
        //ddd($currentQueries);
        $tmp->url = route($route_name, array_merge($route_params, $currentQueries));

        return $tmp;
    }

    public static function getBreadLang($params) {
        extract($params);
        $tmp = new \stdClass();
        $tmp->title = $v;
        $tmp->url = '#######';

        return $tmp;
    }

    public static function getBreadModule($params) {
        extract($params);
        $tmp = new \stdClass();
        $tmp->title = $v;
        $tmp->url = route('admin.index', [$v]);

        return $tmp;
    }

    public static function getBread($params) {
        extract($params);
        $pattern = '/[0-9]+/';

        $k1 = (preg_replace($pattern, '', $k));
        $func = 'getBread'.Str::studly($k1);

        return self::$func($params);
    }

    public static function getAdminJsonMenu() {
        $route_params = \Route::current()->parameters();
        extract($route_params);
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
        ddd($menu);
        /*
        $json_content=File::get($json_path);
        $json=json_decode($json_content);
        ddd($json);
        */
    }

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
}//end class
