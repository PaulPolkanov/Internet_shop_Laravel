<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tag extends Model{
   
       protected $table =  'tags';
       public $timestamps = false;
       public function products(){
            return $this->belongsToMany('App\Models\Product');
       }
       
}
