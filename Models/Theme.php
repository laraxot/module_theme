<?php

declare(strict_types=1);

namespace Modules\Theme\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Modules\Theme\Services\ThemeService;
use Sushi\Sushi;

/**
 * Modules\Theme\Models\Theme.
 *
 * @property int                             $id
 * @property string|null                     $title
 * @property string|null                     $version
 * @property string|null                     $txt
 * @property string|null                     $link
 * @property int|null                        $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property string|null                     $created_by
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null                     $updated_by
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Theme newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Theme newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Theme query()
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereTxt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereVersion($value)
 * @mixin \Eloquent
 *
 * @property string|null $name
 * @property string|null $type
 * @property string|null $description
 * @property string|null $keywords
 * @property float|null  $active
 * @property float|null  $order
 * @property string|null $aliases
 * @property string|null $files
 * @property string|null $requires
 * @property string|null $path
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereAliases($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereFiles($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereRequires($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereType($value)
 * @mixin IdeHelperTheme
 */

 // mixin \IdeHelperTheme
class Theme extends Model {
    use Sushi;

    protected $connection = 'theme'; // this will use the specified database connection
    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'name',
        'type',
        'description',
        'keywords',
        'active',
        'order',
        'aliases',
        'files',
        'requires',
    ];

    /*
    "active", "aliases", "description", "files", "keywords", "name", "order", "path", "requires", "type"
    */

    /**
     * @var string[]
     */
    protected $dates = ['created_at', 'updated_at'];
    /*
    protected $schema = [
        'id' => 'integer',
        'title' => 'string',
        'version' => 'string',
        'txt' => 'string',
        'link' => 'string',
        'status' => 'string',
    ];
    */

    public function getRows(): array {
        /*
        $dir = base_path('Themes');
        $themes_dirs = File::directories($dir);
        $themes = collect($themes_dirs)->map(
            function ($item) {
                $file_json = $item.DIRECTORY_SEPARATOR.'theme.json';

                $json = json_decode(File::get($file_json), true);

                $info = pathinfo($item);

                return collect($json)->map(
                    function ($item) {
                        if (! is_string($item)) {
                            return json_encode($item);
                        }

                        return $item;
                    }
                )
                ->all()
                ;
            }
        )
        ->all()
        ;


        return $themes;
        */
        return ThemeService::getThemes()->all();
    }

    /*
    protected function sushiShouldCache() {
        return true;
    }
    */
}
