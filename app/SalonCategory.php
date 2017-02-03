<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalonCategory extends Model
{
    protected $table = 'saloncategory';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = ['category','salon-admin-id'];


	public function categoryWithSalon()
	{
		return $this->belongsToMany('App\Salon', 'salonidcategoryid','category_id','salon_id');
	}

}
