<?php 

namespace App\Services;

use App\Contracts\WorkersJobsInterface;
use App\WorkersJobs;

class WorkersJobsService implements WorkersJobsInterface
{

	/**
	 * Create a new instance of UserService class
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->workersjobs = new WorkersJobs();
	}

    /**
     * Create salon 
     *
     * @param array $data
     * @return response
     */
    public function createWorkersJobs($data)
	{
		return $this->workersjobs->create($data);
	}


    /**
     * get one album 
     *
     * @param array $id
     * @return response
     */
    public function getOne($id)
    {
        return $this->workersjobs->find($id);
    }

    /**
     * get  salon worker job by salon_id
     *
     * @param array $id
     * @return response
     */
    public function getSalonWorkerJobs($salon_id)
    {
        return $this->workersjobs->where('salon_id',$salon_id)->get();
    }
    /**
     * delete salon worker job by salon_id
     *
     * @param array $id
     * @return response
     */
    public function deleteSalonWorkerJobs($salon_id)
    {
        return $this->workersjobs->where('salon_id',$salon_id)->delete();
    }

    /**
     * update  album 
     *
     * @param array $id
     * @param array $data
     * @return response
     */
    public function getUpdate($id,$data)
    {
        return $this->getOne($id)->update($data); 
    }

    /**
     * delete album 
     *
     * @param array $id
     * @return response
     */
    public function deleteWorkerJobs($id)
    {  
        return $this->getOne($id)->delete();
    }

    /**
     * Select wokers in filter
     *
     * @param $salon_id
     * @param $worker_id
     * @param $category_id
     */
    public function selectworkerCategorySalon($salon_id,$category_id,$worker_id)
    {
        return $this->workersjobs->where('salon_id',$salon_id)->where('worker_id',$worker_id)->where('category_id',$category_id)->get();
    }

    /**
     * Select wokers in filter
     *
     * @param $salon_id
     * @param $worker_id
     * @param $category_id
     */
    public function jogsSalonCategory($salon_id,$category_id)
    {
        return $this->workersjobs->where('salon_id',$salon_id)->where('category_id',$category_id)->get();
    }

    /**
     * 
     */
    public function getAlbomImages($album_id)
    {
        return $this->workersjobs->where('album_id',$album_id)->get();
    }

  

}