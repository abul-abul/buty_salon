<?php 

namespace App\Contracts;

interface ServicesInterface
{
    /**
     * Create salon 
     *
     * @param array $data
     * @return response
     */
    public function createOneSalon($data);

    /**
     * Get all salon
     * 
     * @param 
     * @return 
     */
    public function getAll();

    /**
     * Get one salon by userid
     *
     * @param integer $id
     * @return response
     */
    public function getOne($id);

    /**
     * delete one domain
     *
     * @return domain 
     */
    public function deleteOne($id);

    /**
     * Update salon value
     * @param string $params
     * @return domain
     */
    public function editSalon($id , $params);

    /**
     * salon service list
     *
     * @param $id
     * @return salonservices
     */
    public function salonAdmiServiceslist($id);

    /**
     * get all services
     *
     * @param 
     * @return salonservices
     */
    public function getAllServices();

    /**
     * 
     */
    public function serachMinMaxPrice($min,$max);
    

}
