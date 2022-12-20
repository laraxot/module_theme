<?php

declare(strict_types=1);

namespace Modules\Theme\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Modules\Theme\Models\DataBaseDatum.
 *
 * @method static \Illuminate\Database\Eloquent\Builder|DataBaseDatum newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DataBaseDatum newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DataBaseDatum query()
 *
 * @mixin \Eloquent
 */
class DataBaseDatum extends Model {
    protected $fillable = [
        'id',
        'data_id',
        'base_id',
        'order',
    ];

    protected $dates = ['created_at', 'updated_at'];
}
