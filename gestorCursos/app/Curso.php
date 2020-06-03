<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo', 'imagen',
    ];
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
