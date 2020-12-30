<?php

namespace Modules\Theme\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Modules\Theme\Models\Theme
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $version
 * @property string|null $txt
 * @property string|null $link
 * @property int|null $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @method static \Illuminate\Database\Eloquent\Builder|Theme newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Theme newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Theme query()
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereTxt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereVersion($value)
 * @mixin \Eloquent
 */
class Theme extends Model
 {
    protected $fillable=['id','title','version','txt','link','status','created_at','created_by','updated_at','updated_by'];


    protected $dates = ['created_at', 'updated_at'];

}
