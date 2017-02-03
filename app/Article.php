<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'article';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = ['article_image', 'title', 'description','article_video1','article_video2'];
}
