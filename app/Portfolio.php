<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'salon_worker_portfolio';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = ['worker_id' , 'certificate', 'diploma'];
}
