<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'albums';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = ['worker_id' , 'album_name', 'album_prof_pic'];

	public function user()
    {
    	return $this->belongsTo('App\User','worker_id', 'id');
    }
}
