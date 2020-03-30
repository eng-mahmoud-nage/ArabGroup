<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model 
{

    protected $table = 'agents';
    public $timestamps = true;
    protected $fillable = array('country', 'title', 'website');

}