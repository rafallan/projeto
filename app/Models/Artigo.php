<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artigo extends Model
{

    protected $table = 'artigos';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function disciplina(){
        return $this->belongsTo('App\Models\Disciplina');
    }

    public function autor(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function tags(){
        return $this->belongsToMany('App\Models\Tag', 'artigos_tags', 'artigo_id', 'tag_id');
    }

}
