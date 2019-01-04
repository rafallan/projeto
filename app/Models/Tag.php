<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    protected $table = 'tags';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    use SoftDeletes;


    protected $dates = ['deleted_at'];
}
