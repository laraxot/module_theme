<?php

declare(strict_types=1);

namespace Modules\Theme\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Traits\SushiConfigCrud;
use Sushi\Sushi;

/**
 * @mixin IdeHelperMenuItem
 */
class MenuItem extends Model {
    use Sushi;
    use SushiConfigCrud;

    protected string $config_name = 'menu_builder_item';

    // protected $table = null;

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

    /*
    public function __construct(array $attributes = [])
    {
        //parent::construct( $attributes );
        $this->table = config('menu.table_prefix') . config('menu.table_name_items');
    }
    */

    public function getRows(): array {
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

        return $rows;
    }

    /*
    public function getDepthAttribute(?int $value):int{
        return 0;
    }
    */

    public function getsons($id) {
        return $this->where('parent', $id)->get();
    }

    public function getall($id) {
        return $this->where('menu', $id)
            ->orderBy('sort', 'asc')
            ->get();
    }

    public static function getNextSortRoot($menu) {
        return self::where('menu', $menu)->max('sort') + 1;
    }

    public function parent_menu() {
        return $this->belongsTo(Menu::class, 'menu');
    }

    public function child() {
        return $this->hasMany(self::class, 'parent')
            ->orderBy('sort', 'ASC');
    }
}
