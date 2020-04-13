<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';
    //

    public function roles(){
        return $this->belongsToMany("App\Role")->withPivot('menu_id');
    }

}
