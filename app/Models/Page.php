<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Page extends Model{
    protected $table = 'pages';
    protected $fillable = array('id', 'tittle');
    //protected $filt
}
