<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model 
{
    protected $table = 'books';
    public $timestamps = true;
    protected $fillable = array('details', 'name', 'author', 'isbn', 'publish_date',
     'cover_img', 'back_img', 'pdf', 'price', 'weight', 'views', 'favourite',
      'category_id', 'permalink_title', 'permalink_description', 'permalink_keyword');

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Order', 'order_id');
    }

}