<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CharacteristicProduct extends Model{
   
    protected $table =  'value_characteristic_produc';
    public function characteristic(){
        return $this->belongsTo('App\Models\Characteristic', 'id_characteristic');
    }
    public function product(){
        return $this->belongsTo('App\Models\Product', 'id_product');
    }
    
}
