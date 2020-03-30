<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model 
{

    protected $table = 'categories';
    public $timestamps = true;
    protected $fillable = array('name', 'parent_id');

    public function books()
    {
        return $this->hasMany('App\Book');
    }

}