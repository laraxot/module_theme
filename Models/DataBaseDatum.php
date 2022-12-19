<?php

declare(strict_types=1);

namespace Modules\Theme\Models;

use Illuminate\Database\Eloquent\Model;

class DataBaseDatum extends Model {
    protected $fillable = [
        'id',
        'data_id',
        'base_id',
        'order',
    ];

    protected $dates = ['created_at', 'updated_at'];
}
