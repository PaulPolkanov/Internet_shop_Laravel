<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Facades\DB;

    class Category extends Model{
        protected $table = 'category';
        public $timestamps= false;
        //protected $filt
        public function products(){
            return $this->hasMany('App\Models\Product', 'category_id');
        }
    }
