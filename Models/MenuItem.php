<?php

<<<<<<< HEAD
declare(strict_types=1);

namespace Modules\Theme\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Xot\Traits\SushiConfigCrud;
use Sushi\Sushi;

/**
 * Modules\Theme\Models\MenuItem.
 *
 * @property int $id
 * @property string|null $label
 * @property string|null $link
 * @property int|null $parent
 * @property int|null $sort
 * @property string|null $class
 * @property int|null $menu
 * @property int|null $depth
 * @property int|null $role_id
 * @property-read Collection|MenuItem[] $child
 * @property-read int|null $child_count
 * @property-read \Modules\Theme\Models\Menu|null $parent_menu
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem whereClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem whereDepth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem whereMenu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem whereSort($value)
 * @mixin \Eloquent
 */
class MenuItem extends Model {
    use Sushi;
    use SushiConfigCrud;

    protected string $config_name = 'menu_builder_item';

    // protected $table = null;
    /**
     * Undocumented variable.
     *
     * @var array<string>
     */
=======
namespace Modules\Theme\Models;

use Sushi\Sushi;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Traits\SushiConfigCrud;

/**
 * @mixin IdeHelperMenuItem
 */
class MenuItem extends Model
{

    use Sushi;
    use SushiConfigCrud;

    protected string $config_name='menu_builder_item';

    //protected $table = null;

>>>>>>> ede0df7 (first)
    protected $fillable = [
        'id',
        'label',
        'link',
        'parent',
        'sort',
        'class',
        'menu',
        'depth',
        'role_id',
    ];

<<<<<<< HEAD
    /**
     * Undocumented variable.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'id' => 'int',
        'label' => 'string',
        'link' => 'string',
        'parent' => 'int',
        'sort' => 'int',
        'class' => 'string',
        'menu' => 'int',
        'depth' => 'int',
        'role_id' => 'int',
    ];
=======
>>>>>>> ede0df7 (first)
    /*
    public function __construct(array $attributes = [])
    {
        //parent::construct( $attributes );
        $this->table = config('menu.table_prefix') . config('menu.table_name_items');
    }
    */

    public function getRows(): array {
<<<<<<< HEAD
        $rows = config($this->config_name);
        if (! \is_array($rows)) {
            return [
                [
                    'id' => 1,
                    'label' => '',
                    'link' => '',
                    'parent' => 0,
                    'sort' => 1,
                    'class' => '',
                    'menu' => 0,
                    'depth' => 0,
                    'role_id' => 0,
                ],
            ];
        }

=======
        $rows=config($this->config_name);
        if(!is_array($rows)){
            return [
                [
                'id'=>1,
                'label'=>'',
                'link'=>'',
                'parent'=>0,
                'sort'=>1,
                'class'=>'',
                'menu'=>0,
                'depth'=>0,
                'role_id'=>0,
                ],
            ];
        }
>>>>>>> ede0df7 (first)
        return $rows;
    }

    /*
    public function getDepthAttribute(?int $value):int{
        return 0;
    }
    */

<<<<<<< HEAD
    public function getsons(int $id): Collection {
        return $this->where('parent', $id)->get();
    }

    public function getall(int $id): Collection {
        return $this->where('menu', $id)
            ->orderBy('sort', 'asc')
            ->get();
    }

    public static function getNextSortRoot(int $menu): int {
        // return (int) self::where('menu', $menu)->max('sort') + 1;
        $max_sort = self::where('menu', $menu)->max('sort');

        return $max_sort + 1;
    }

    public function parent_menu(): BelongsTo {
        return $this->belongsTo(Menu::class, 'menu');
    }

    public function child(): HasMany {
        return $this->hasMany(self::class, 'parent')
            ->orderBy('sort', 'ASC');
    }
}
=======

    public function getsons($id){
        return $this->where("parent", $id)->get();
    }

    public function getall($id){
        return $this->where("menu", $id)
            ->orderBy("sort", "asc")
            ->get();
    }

    public static function getNextSortRoot($menu){
        return self::where('menu', $menu)->max('sort') + 1;
    }

    public function parent_menu(){
        return $this->belongsTo(Menu::class, 'menu');
    }

    public function child(){
        return $this->hasMany(MenuItem::class, 'parent')
            ->orderBy('sort', 'ASC');
    }
}
>>>>>>> ede0df7 (first)
