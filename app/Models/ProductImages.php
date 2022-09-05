<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductImages extends Model{
   
    public $timestamps = false;
    protected $table =  'product_images';
    public function product(){
        return $this->belongsTo('App\Models\Product', 'product_id');
   }
}