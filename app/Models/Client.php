<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UserTrait;


class Client extends Model
{
    use UserTrait;
    
    protected $fillable = [
        'nombre', 'documento', 'email', 'direccion',
    ];

    public function clients(){
        return $this->belongsToMany('App\Models\Client')->withTimesTamps();
    }
}
