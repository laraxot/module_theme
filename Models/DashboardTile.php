<?php

declare(strict_types=1);

namespace Modules\Theme\Models;

use Spatie\Dashboard\Models\Tile as BaseTile;

/**
 * Modules\Theme\Models\DashboardTile.
 *
 * @property int                             $id
 * @property string                          $name
 * @property array|null                      $data
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property string|null                     $created_by
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null                     $updated_by
 *
 * @method static \Illuminate\Database\Eloquent\Builder|DashboardTile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DashboardTile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DashboardTile query()
 * @method static \Illuminate\Database\Eloquent\Builder|DashboardTile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DashboardTile whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DashboardTile whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DashboardTile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DashboardTile whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DashboardTile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DashboardTile whereUpdatedBy($value)
 *
 * @mixin \Eloquent
 */
class DashboardTile extends BaseTile
{
    protected $fillable = ['id', 'name', 'data', 'created_at', 'created_by', 'updated_at', 'updated_by'];
}
