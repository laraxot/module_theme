<?php

declare(strict_types=1);

namespace Modules\Theme\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
=======
use Illuminate\Database\Eloquent\Model;
>>>>>>> ede0df7 (first)
use Modules\Xot\Traits\SushiConfigCrud;
use Sushi\Sushi;

/**
<<<<<<< HEAD
 * Modules\Theme\Models\Menu.
 *
 * @property int $id
 * @property string|null $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Theme\Models\MenuItem[] $items
 * @property-read int|null $items_count
 * @method static Builder|Menu newModelQuery()
 * @method static Builder|Menu newQuery()
 * @method static Builder|Menu query()
 * @method static Builder|Menu whereId($value)
 * @method static Builder|Menu whereName($value)
 * @mixin \Eloquent
=======
 * @mixin IdeHelperMenu
>>>>>>> ede0df7 (first)
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
<<<<<<< HEAD
        if (! \is_array($rows)) {
=======
        if (! is_array($rows)) {
>>>>>>> ede0df7 (first)
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

<<<<<<< HEAD
    public static function byName(string $name): ?Menu {
        return self::where('name', '=', $name)->first();
    }

    /**
     * Undocumented function.
     *
     * @return HasMany<MenuItem>
     */
    public function items(): HasMany {
=======
    public static function byName($name) {
        return self::where('name', '=', $name)->first();
    }

    public function items() {
>>>>>>> ede0df7 (first)
        return $this->hasMany(MenuItem::class, 'menu')
            ->with('child')
            ->where(function ($query) {
                $query->where('parent', 0)->orWhere('parent', null);
            })
            ->orderBy('sort', 'ASC');
    }
}
