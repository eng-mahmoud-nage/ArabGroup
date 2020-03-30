<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model 
{

    protected $table = 'orders';
    public $timestamps = true;
    protected $fillable = array('order_price', 'delivery_charge', 'total_price', 'total_weight', 'user_id', 'date', 'address', 'status', 'payment', 'city_id');

    public function books()
    {
        return $this->belongsToMany('App\Book', 'book_id');
    }

    public function city()
    {
        return $this->belongsTo('App\City', 'city_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

}