<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fair extends Model 
{

    protected $table = 'fairs';
    public $timestamps = true;
    protected $fillable = array('name', 'location', 'date', 'pdf');

}