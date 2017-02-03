<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalonImages extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'salon-images';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = ['salon_id', 'image_name'];

}
