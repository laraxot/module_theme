<?php

declare(strict_types=1);

namespace Modules\Theme\Models;

use Illuminate\Database\Eloquent\Model;

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
