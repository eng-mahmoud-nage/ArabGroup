<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model 
{

    protected $table = 'cities';
    public $timestamps = true;
    protected $fillable = array('name', 'country_id');

    public function country()
    {
        return $this->belongsTo('App\Country', 'country_id');
    }

    public function regions()
    {
        return $this->hasMany('App\Region');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

}