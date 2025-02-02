<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{   
    protected $fillable = [
        'nombre', 'slug', 'descripcion',
    ];

    public function roles(){
        return $this->belongsToMany('App\Models\Role')->withTimesTamps();
    }
}
