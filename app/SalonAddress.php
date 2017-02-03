<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalonAddress extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'salon_addresses';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = [ 
        'address',
        'salon_id',
        'lat', 
        'lng', 
    ];
}