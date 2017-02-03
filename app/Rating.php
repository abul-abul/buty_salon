<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'salon_rating';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = ['user_id' , 'salon_id', 'worker_id','service_id','salon_rating','worker_rating','service_rating'];

    public function salon()
    {
        return $this->belongsTo('App\Salon','salon_id','id');
    }
}



