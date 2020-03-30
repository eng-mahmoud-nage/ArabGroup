<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookOrder extends Model 
{

    protected $table = 'book_order';
    public $timestamps = true;
    protected $fillable = array('book_id', 'order_id', 'user_id', 'price', 'weight', 'quantity', 'session_id');

}