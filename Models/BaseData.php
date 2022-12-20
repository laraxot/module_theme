<?php

declare(strict_types=1);

namespace Modules\Theme\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Modules\Theme\Models\BaseData
 *
 * @property-read \Modules\Theme\Models\Category|null $categories
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Theme\Models\Data[] $datas
 * @property-read int|null $datas_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseData newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseData newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseData query()
 * @mixin \Eloquent
 */
class BaseData extends Model {
    protected $fillable = [
        'id',
        'name',
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function categories() {
        return $this->belongsTo(Category::class);
    }

    public function datas() {
        return $this->belongsToMany(Data::class);
    }
}
