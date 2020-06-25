<?php

namespace Modules\Theme\Models;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
 {
    protected $fillable=['id','title','version','txt','link','status','created_at','created_by','updated_at','updated_by'];


    protected $dates = ['created_at', 'updated_at'];

}
