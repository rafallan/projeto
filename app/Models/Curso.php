<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Curso
 *
 * @property int $id
 * @property string $nome
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Curso newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Curso newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Curso onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Curso query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Curso whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Curso whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Curso whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Curso whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Curso whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Curso withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Curso withoutTrashed()
 * @mixin \Eloquent
 */
class Curso extends Model
{

    protected $table = 'cursos';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    use SoftDeletes;


    protected $dates = ['deleted_at'];


}
