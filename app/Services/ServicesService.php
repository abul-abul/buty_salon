<?php 

namespace App\Services;

use App\Contracts\ServicesInterface;

use App\SalonServices;
use App\Video;


class ServicesService implements ServicesInterface
{

	/**
	* Create a new instance of UserService class
	*
	* @return void
	*/
	public function __construct()
	{
		$this->services = new SalonServices();

	}

	/**
	 * delete salon services
	 *
	 * @param $salon_admin_id
	 * @return services
	 */
	public function deleteAdmiServices($salon_admin_id)
	{
		return $this->services->where('salon_admin_id',$salon_admin_id)->delete();
	}

    /**
    * Create salon 
    *
    * @param array $data
    * @return response
    */
    public function createOneSalon($data)
	{
		return $this->services->create($data);
	}
	

	/**
	 * Get all salon
	 * 
	 * @param 
	 * @return 
	 */
	public function getAll()
	{
		return $this->services->get();
	}

	/**
    * Get one salon by userid
    *
    * @param integer $id
    * @return response
    */
    public function getOne($id)
    {
        return $this->services->find($id);
    }

    /**
	 * delete one domain
	 *
	 * @return services 
	 */
	public function deleteOne($id)
	{
		return $this->getOne($id)->delete();
	}

	/**
	 * Update salon value
	 *
	 * @param string $params
	 * @return services
	 */
	public function editSalon($id,$params)
	{
		return $this->getOne($id)->update($params);
	}

	/**
	 * salon service list
	 *
	 * @param $id
	 * @return services
	 */
	public function salonAdmiServiceslist($id)
	{
		return $this->services->where('salon_admin_id',$id)->get();
	}

	/**
     * get all services
     *
     * @param 
     * @return services
     */
    public function getAllServices()
    {
    	return $this->services->get();
    }

    /**
     * 
     */
    public function serachMinMaxPrice($min,$max)
    {
    	return $this->services->where('service_prices_min',$min)->where('service_prices_max',$max)->get();
    }

}