<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model{
   
     public $timestamps = false;
     protected $table =  'products';
     public function category(){
          return $this->belongsTo('App\Models\Category', 'category_id');
     }
     public function valueChar(){
          return $this->hasMany('App\Models\CharacteristicProduct', 'id_product');
     }
     public function tags(){
          return $this->belongsToMany('App\Models\Tag','tags_products', 'product_id', 'tag_id');
     }
     public function images(){
          return $this->hasMany('App\Models\ProductImages', 'product_id');
      }
}
