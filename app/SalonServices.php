<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalonServices extends Model
{
    protected $table = 'salonservices';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = ['services', 'service_prices_min', 'service_prices_max', 'discount','salon_admin_id'];

}
