<?php

declare(strict_types=1);

namespace Modules\Theme\Models;

use Illuminate\Database\Eloquent\Model;

class BaseData extends Model {
    protected $fillable = [
        'id',
        'name',
    ];

    protected $dates = ['created_at', 'updated_at'];
}
