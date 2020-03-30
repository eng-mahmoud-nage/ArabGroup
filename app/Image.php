<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model 
{

    protected $table = 'images';
    public $timestamps = true;
    protected $fillable = array('source', 'imageable_type', 'imageable_id');

    public function new()
    {
        return $this->morphTo();
    }

}