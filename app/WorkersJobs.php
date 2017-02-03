<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkersJobs extends Model
{
   	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'worker_job_category';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['salon_id','worker_id','worker_jobs_image','category_id','album_id'];
}
