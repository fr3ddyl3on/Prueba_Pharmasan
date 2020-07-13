<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    public function reports(){
        return $this->belongsToMany('App\Models\Report')->withTimesTamps();
    }
}
