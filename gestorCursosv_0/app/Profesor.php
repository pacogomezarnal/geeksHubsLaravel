<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cursos;

class Profesor extends Model
{
    protected $table = 'profesores';

    public function cursos()
    {
        return $this->belongsToMany('App\Cursos');
    }
}
