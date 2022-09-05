<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Characteristic extends Model
{
    protected $tables = "characteristics";
    //use HasFactory;
    public function valueChar(){
        return $this->hasMany('App\Models\CharacteristicProduct', 'id_characteristic');
    }
}
