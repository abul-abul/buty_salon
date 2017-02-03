<?php 

namespace App\Services;

use App\Contracts\SalonInterface;
use App\Contracts\UserInterface;
use App\Salon;
use App\User;
use App\DealOfTheDay;
use App\SalonImages;


class SalonService implements SalonInterface
{

	/**
	 * Create a new instance of UserService class
	 *
	 * @return void
	*/
	public function __construct()
	{
		$this->salon = new Salon();
		$this->user = new User();
		$this->deal_of_the_day = new DealOfTheDay();
		$this->salon_images = new SalonImages();
	}


    /**
    * delete salon images 
    *
    * @param array $salon_id
    * @return response
    */
    public function deletesalonImages($salon_id)
    {
        return $this->salon_images->where('salon_id',$salon_id)->delete();
    }

    /**
    * Create salon 
    *
    * @param array $data
    * @return response
    */
    public function createOneSalon($data)
	{
		return $this->salon->create($data);
	}

	/**
    * Create salon 
    *
    * @param array $data
    * @return response
    */
    public function createDealOfTheDay($data)
	{
		return $this->deal_of_the_day->create($data);
	}

	/**
    * Create image 
    *
    * @param array $data
    * @return response
    */
    public function createImage($data)
	{
		return $this->salon_images->create($data);
	}
	
	/**
     * Get salon images
     *
     * @param integer $id
     * @return response
     */
    public function getSalonImages($id)
    {
        return $this->salon_images->where('salon_id',$id)->get();
    }
    /**
     * Get salon one image
     *
     * @param integer $id
     * @return response
     */
    public function getOneSalonImage($id)
    {
        return $this->salon_images->where('id',$id)->first();
    }
    
    /**
     * delete salon image
     *
     * @param integer $id
     * @return response
     */
    public function deleteOneSalonImage($id)
    {
        return $this->salon_images->where('id',$id)->delete();
    }
    

	/**
     * Get one salon by userid
     *
     * @param integer $id
     * @return response
     */
    public function getOneDealOfTheDay($id)
    {
        return $this->deal_of_the_day->where('salon_id',$id)->first();
    }

    /**
     * Get one salon by userid
     *
     * @param integer $id
     * @return response
     */
    public function getOneDeal($id)
    {
        return $this->deal_of_the_day->where('id',$id)->first();
    }

    /**
	 * delete one domain
	 *
	 * @return domain 
	 */
	public function deleteOneDealOfTheDay($id)
	{
		return $this->deal_of_the_day->where('id',$id)->delete();
	}

	/**
	 * Update salon value
	 *
	 * @param string $params
	 * @return salon
	 */
	public function editDealOfTheDay($id , $params)
	{
		return $this->deal_of_the_day->where('id',$id)->update($params);
	}

	/**
	 * Get all salon
	 * 
	 * @param 
	 * @return 
	 */
	public function getAll()
	{
		return $this->salon->where('salon_status',1)->with('addresses')->get();
	}

	public function getAllSalons()
	{
		return $this->salon->with('addresses')->paginate(10);
	}


	/**
    * Get one salon by userid
    *
    * @param integer $id
    * @return response
    */
    public function getOne($id)
    {
        return $this->salon->where('id',$id)->with('addresses')->first();
    }

    /**
	 * delete one domain
	 *
	 * @return domain 
	 */
	public function deleteOne($id)
	{
		return $this->getOne($id)->delete();
	}

	/**
	 * Update salon value
	 *
	 * @param string $params
	 * @return salon
	 */
	public function editSalon($id,$params)
	{
		return $this->getOne($id)->update($params);
	}

	/**
	 * Salon worker list
	 *
	 * @param $id
	 * @param user
	 */
	public function salonWorkerList($id)
	{
		return $this->user->where('salon_admin_id',$id)->where('role','salon_worker')->paginate(5);
	}

	/**
     * get offers salons
     *
     * @param 
     * @return salon
     */
    public function OffersSalons()
    {
    	return $this->salon->where('status',1)->limit(4)->get();
    }

    /**
     * get slide salons
     *
     * @param 
     * @return salon
     */
    public function SlideSalons()
    {
    	return $this->salon->where('slide_active',1)->with('addresses')->get();
    }

    /**
     * get salons (deal of the day)
     *
     * @param 
     * @return salon
     */
    public function DealOfTheDaySalons()
    {
        return $this->deal_of_the_day->get();
    }

    /**
     * 
     */
    public function showMoreSalon($id)
    {
    	return $this->salon->where('id','>',$id)->where('status',1)->limit(4)->get();
    }

    /**
     * search salons
     *
     * @param 
     * @return salon
     */
    public function search($salon_id=null,$category_id=null,$service_id=null,$position_name=null)
    {
    	$search = $this->salon;

        if (isset($salon_id) && $salon_id != null){
            $search = $search->where('id', $salon_id);
        }
        if (isset($category_id) && $category_id != null){
            $search = $search->whereHas('salonWithCategory', function($query) use ($category_id){
               $query->where('salon-category-id', $category_id);
           }, '>', 0);
        }
        if (isset($service_id) && $service_id != null){
            $search = $search->whereHas('salonWithService', function($query) use ($service_id){
               $query->where('salon-service-id', $service_id);
           }, '>', 0);
        }
        if(isset($position_name) && $position_name != null){
            $search = $search->whereHas('salonWithPosition', function($query) use ($position_name){
               $query->where('position', $position_name);
            }, '>', 0);

        }

        $search = $search->get();
        return $search;
    }


}