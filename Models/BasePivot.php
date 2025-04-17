<?php

declare(strict_types=1);

namespace Modules\Theme\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// //use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Modules\Xot\Services\FactoryService;
use Modules\Xot\Traits\Updater;

/**
 * Class BasePivot.
 */
abstract class BasePivot extends Pivot
{
    // use Searchable;
    use HasFactory;
    use Updater;
    /**
     * Indicates whether attributes are snake cased on arrays.
     *
     * @see  https://laravel-news.com/6-eloquent-secrets
     *
     * @var bool
     */
    public static $snakeAttributes = true;

    protected $perPage = 30;

    /**
     * @var string
     */
    protected $connection = 'liveuser_general'; // this will use the specified database conneciton
    /**
     * @var array
     */
    protected $appends = [];
    /**
     * @var array<string, string>
     */
    protected $casts = [];
    /**
     * @var string[]
     */
    protected $dates = ['created_at', 'updated_at'];
    // protected $primaryKey = 'id';
    /**
     * @var bool
     */
    public $incrementing = true;

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return FactoryService::newFactory(static::class);
    }
}
