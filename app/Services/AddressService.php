<?php 

namespace App\Services;

use App\Contracts\AddressInterface;
use App\SalonAddress;

class AddressService implements AddressInterface
{
	/**
	 * Create a new instance of UserService class
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->salonAddress = new SalonAddress();
	}

	 /**
     * delete addresses 
     *
     * @param integer $id
     * @return response
     */
    public function deleteAddresses($id)
    {
    	$salonAddress = $this->salonAddress->where('salon_id','=',$id)->delete();
		return $salonAddress;
    }

    /**
    * create addresses 
    *
    * @param array $data
    * @param integer $id
    * @return response
    */
    public function createAddresses($data)
    {

    	$salonAddress = $this->salonAddress->insert($data);
		return $salonAddress;
    }

    /**
    * get addresses
    *
    * 
    * @return response
    */
    public function getSalonAddresses()
    {
    	$salonAddress = $this->salonAddress->get();
    	return $salonAddress;
    }

    /**
    * get address
    *
    * @param integer $id
    * @return response
    */
    public function getSalonAddres($id)
    {
    	$salonAddress = $this->salonAddress->where('salon_id','=',$id)->get();
    	return $salonAddress;
    }
}