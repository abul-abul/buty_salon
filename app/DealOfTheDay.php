<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DealOfTheDay  extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'deal_of_the_day';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = ['salon_id','description'];

	public function salon()
    {
        return $this->belongsTo('App\Salon','salon_id','id');
    }

}