<?php

declare(strict_types=1);

namespace Modules\Theme\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Modules\Theme\Models\Data.
 *
 * @property \Illuminate\Database\Eloquent\Collection|\Modules\Theme\Models\BaseData[] $baseDatas
 * @property int|null                                                                  $base_datas_count
 * @property \Modules\Theme\Models\Category|null                                       $categories
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Data newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Data newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Data query()
 *
 * @mixin \Eloquent
 */
class Data extends Model {
    protected $fillable = [
        'id',
        'name',
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function categories() {
        return $this->belongsTo(Category::class);
    }

    public function baseDatas() {
        return $this->belongsToMany(BaseData::class);
    }
}
