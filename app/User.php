<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'username',
        'phone',
        'profile_picture',
        'firstname',
        'lastname',
        'role',
        'category_id',
        'salon_id',
        'profession',
        'salon_admin_id',
        'activ_inactive',
        'active_user',
        'hash',
        'address',
        'country',
        'city',
        'facebook_id',
        'facebook_token',
        'google_id',
        'google_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function salon()
    {
        return $this->belongsTo('App\Salon','salon_id','id');
    }

    public function category()
    {
        return $this->belongsTo('App\SalonCategory','category_id');
    }

}
