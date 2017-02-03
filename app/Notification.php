<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'notification';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = ['user_id' , 'worker_id', 'salon_id', 'service_id', 'date', 'message','email', 'phone', 'status'];

	public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

   	public function worker()
    {
        return $this->belongsTo('App\User','worker_id');
    }

    public function service()
    {
        return $this->belongsTo('App\SalonServices','service_id');
    }

    public function salon()
    {
        return $this->belongsTo('App\Salon','salon_id');
    }

}
