<?php 

namespace App\Contracts;

interface AddressInterface
{
    /**
     * delete addresses 
     *
     * @param integer $id
     * @return response
     */
    public function deleteAddresses($id);

    /**
     * create addresses 
     *
     * @param array $data
     * @return response
     */
    public function createAddresses($data);

    /**
    * get address
    *
    * @param integer $id
    * @return response
    */
    public function getSalonAddres($id);
}