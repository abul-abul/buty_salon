<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleImages extends Model
{
     protected $table = 'articleimages';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = ['article_id', 'article_image'];
}
