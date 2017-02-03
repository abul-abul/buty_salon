<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebSiteSubscribe extends Model
{
   	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'web_site_subscribe';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['email','user_id'];
}
