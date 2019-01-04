<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Disciplina
 *
 * @property int $id
 * @property int $curso_id
 * @property string $nome
 * @property string $descricao
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Curso $curso
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Disciplina newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Disciplina newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Disciplina onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Disciplina query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Disciplina whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Disciplina whereCursoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Disciplina whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Disciplina whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Disciplina whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Disciplina whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Disciplina whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Disciplina withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Disciplina withoutTrashed()
 * @mixin \Eloquent
 */
class Disciplina extends Model
{
    protected $table = 'disciplinas';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    use SoftDeletes;


    protected $dates = ['deleted_at'];

    public function curso(){
        return $this->belongsTo('App\Models\Curso');
    }
}
