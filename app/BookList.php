<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookList extends Model 
{

    protected $table = 'book_lists';
    public $timestamps = true;
    protected $fillable = array('title', 'source');

}