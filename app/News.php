<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model 
{

    protected $table = 'news';
    public $timestamps = true;
    protected $fillable = array('title', 'description');

    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }

}