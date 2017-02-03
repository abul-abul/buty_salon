<?php 

namespace App\Contracts;

interface WorkersJobsInterface
{
    /**
    * Create album 
    *
    * @param array $data
    * @return response
    */
    public function createWorkersJobs($data);
    

    

    /**
     * get one album 
     *
     * @param array $id
     * @return response
     */
    public function getOne($id);

    /**
     * get  salon worker job by salon_id
     *
     * @param array $id
     * @return response
     */
    public function getSalonWorkerJobs($salon_id);

    /**
     * delete salon worker job by salon_id
     *
     * @param array $id
     * @return response
     */
    public function deleteSalonWorkerJobs($salon_id);

    

    /**
     * update  album 
     *
     * @param array $id
     * @param array $data
     * @return response
     */
    public function getUpdate($id, $data);

    /**
     * delete album 
     *
     * @param array $id
     * @return response
     */
    public function deleteWorkerJobs($id);

    /**
     * Select wokers in filter
     *
     * @param $salon_id
     * @param $worker_id
     * @param $category_id
     */
    public function selectworkerCategorySalon($salon_id,$worker_id,$category_id);

    /**
     * Select wokers in filter
     *
     * @param $salon_id
     * @param $worker_id
     * @param $category_id
     */
    public function jogsSalonCategory($salon_id,$category_id);

    /**
     * 
     */
    public function getAlbomImages($album_id);



}
