<?php

declare(strict_types=1);

namespace Modules\Theme\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Traits\SushiConfigCrud;
use Sushi\Sushi;

/**
 * Modules\Theme\Models\Menu
 *
 * @property int $id
 * @property string|null $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Theme\Models\MenuItem[] $items
 * @property-read int|null $items_count
 * @method static \Illuminate\Database\Eloquent\Builder|Menu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu query()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereName($value)
 * @mixin IdeHelperMenu
 */
class Menu extends Model {
    use Sushi;
    use SushiConfigCrud;

    protected string $config_name = 'menu_builder';

    protected $fillable = ['id', 'name'];

    protected $table = 'menus';
    /*
    public function __construct(array $attributes = [])
    {
        //parent::construct( $attributes );
        $this->table = config('menu.table_prefix') . config('menu.table_name_menus');
    }
    */

    public function getRows(): array {
        $rows = config($this->config_name);
        if (! \is_array($rows)) {
            return
            [
                [
                    'id' => 1,
                    'name' => 'test',
                ],
            ];
        }

        return $rows;
    }

    public static function byName($name) {
        return self::where('name', '=', $name)->first();
    }

    public function items() {
        return $this->hasMany(MenuItem::class, 'menu')
            ->with('child')
            ->where(function ($query) {
                $query->where('parent', 0)->orWhere('parent', null);
            })
            ->orderBy('sort', 'ASC');
    }
}
