<?php

namespace App\Traits;

trait UserTrait{

    public function roles(){
        return $this->belongsToMany('App\Models\Role')->withTimesTamps();
    }

    public function havePermission($permission){
        
        foreach($this->roles as $role){
           
            if($role['full-access']=='si'){
               return true;
           }
           
           foreach($role->permissions as $perm){
               if($perm->slug == $permission){
                   return true;
               }
           }
        }

        return false;

        
    }
}