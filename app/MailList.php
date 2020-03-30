<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MailList extends Model 
{

    protected $table = 'mail_lists';
    public $timestamps = true;
    protected $fillable = array('name', 'email');

}