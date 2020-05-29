<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categoria;

class Cursos extends Model
{
    protected $table = 'cursos';

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function profesores()
    {
        return $this->belongsToMany('App\Profesor', 'cursos_profesor');
    }
}
