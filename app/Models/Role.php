<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //Es: Desde aqui
    protected $fillable = [
        'nombre', 'slug', 'descripcion',  'full-access',
    ];

    public function users(){
        return $this->belongsToMany('App\User')->withTimesTamps();
    }

    public function permissions(){
        return $this->belongsToMany('App\Models\Permission')->withTimesTamps();
    }
}
