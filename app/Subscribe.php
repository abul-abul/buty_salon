<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'subscribe';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = ['salon_id','email','user_id'];

	// public function user()
 //    {
 //        return $this->belongsTo('App\User','user_id');
 //    }

	public function salon()
    {
        return $this->belongsTo('App\Salon','salon_id');
    }
}
