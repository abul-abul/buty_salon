<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryService extends Model
{
    protected $table = 'categoryservice';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = ['salon-id', 'salon-category-id', 'salon-service-id'];


	public function salonCategoryService()
    {
        return $this->hasMany('App\SalonServices','id','salon-service-id');
    }

    /**
     * 
     */
    // public function salonCategorys()
    // {
    //     return $this->belongsTo('App\SalonCategory','salon-category-id','id');
    // }



}
