<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salon extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'salons';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = [
        'name' , 
        'sub_domain', 
        'salon_email' , 
        'phonenumber',
        'image',
        'description',
        'workings_time_days',
        'status',
        'position',
        'slide_active',
        'salon_status',
        'description_am',
        'description_ru',
        'description_en',
    ];

	
	public function salonCategory()
	{
		return $this->belongsToMany('App\SalonCategory', 'salonidcategoryid', 'salon_id', 'category_id');
	}

	/**
	 * 
	 */
	public function salonCategorys()
	{
		return $this->belongsToMany('App\SalonCategory','salonidcategoryid','salon_id','category_id');
	}

	/**
	 * 
	 */
	public function deal()
    {
        return $this->belongsTo('App\DealOfTheDay','id','salon_id');
    }

    /**
     * 
     */
    public function salonWithCategory()
    {
    	return $this->belongsToMany('App\SalonCategory','categoryservice','id','salon-category-id');
    }

    /**
     * 
     */
    public function salonWithService()
    {
    	return $this->belongsToMany('App\SalonServices','categoryservice','id','salon-service-id');
    }

    /**
     * 
     */
    public function salonWithPosition()
    {
    	return $this->belongsTo('App\SalonPosition','position','position');
    }

    /**
     * salon owns many addresses
     *
     */
    public function addresses() 
    {
        return $this->hasMany('App\SalonAddress', 'salon_id');
    }
}
