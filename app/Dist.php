<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dist extends Model 
{

    protected $table = 'dists';
    public $timestamps = true;
    protected $fillable = array('name', 'address', 'phone');

}