<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model 
{

    protected $table = 'settings';
    public $timestamps = true;
    protected $fillable = array('welcome_msg', 'contact_msg', 'about', 'phone', 'mobile', 'address', 'email', 'facebook', 'instagram', 'twitter', 'linkedin', 'youtube', 'whatsapp');

}