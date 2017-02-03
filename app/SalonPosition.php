<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalonPosition extends Model
{
   	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'salon_position';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = ['position'];
}
