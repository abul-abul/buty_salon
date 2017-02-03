<?php 

namespace App\Services;

use App\Contracts\CategoryInterface;
use App\SalonCategory;
//use App\CategoryService;
use App\Salon;

class CategoryService implements CategoryInterface
{

	/**
	* Create a new instance of UserService class
	*
	* @return void
	*/
	public function __construct()
	{
		$this->category = new SalonCategory();
        $this->categoryservice = new \App\CategoryService();
		$this->salon = new Salon();
	}

    
    /**
    * delete salon category
    *
    * @param integer $salon_admin_id
    * @return response
    */
    public function deleteSalonCategory($salon_admin_id)
    {
        return $this->category->where('salon-admin-id',$salon_admin_id)->delete();
    }


    /**
    * Get one salon by userid
    *
    * @param integer $id
    * @return response
    */
    public function getOne($id)
    {
        return $this->category->find($id);
    }

    /**
    * update category
    *
    * @param integer $id
    * @param integer $data
    * @return response
    */
    public function editOne($id,$param)
    {
        return $this->category->where('id',$id)->update($param);
    }

	/**
    * Create subscribe
    *
    * @param array $data
    * @return response
    */
    public function createOne($data)
    {
    	return $this->category->create($data);
    }

    /**
     * Get All Category
     *
     * @param $id
     * @return category
     */
    public function getAll($id)
    {
    	return $this->category->where('salon-admin-id',$id)->get();
    }

    /**
     * Create Category Service
     * 
     * @param $data
     * @return categoryservice
     */
    public function createCategoryService($data)
    {
    	return $this->categoryservice->create($data);
    }

    /**
     * Category Service List
     *
     * @param $id
     * @param categoryservice
     */
    public function salonCategoryService($id)
    {
        return $this->categoryservice->where(["salon-category-id"=>$id])->with("salonCategoryService")->get();
    }
    


    /**
     * Category Service List
     *
     * @param $id
     * @param categoryservice
     */
    public function deleteServicesByCategoryId($category_id,$service_id)
    {
        return $this->categoryservice->where(["salon-category-id"=>$category_id])->where("salon-service-id",$service_id)->delete();
    }

    /**
     * 
     */
    public function deleteCategoryFild($id)
    {
        return $this->getOne($id)->delete();
    }
    /**
     * Category Service List
     *
     * @param $id
     * @param categoryservice
     */
    public function deleteCategory($id)
    {
        return $this->categoryservice->where('id',$id)->delete();
    }
    /**
     * Category Service List
     *
     * @param $id
     * @param categoryservice
     */
    public function deleteCategorySer($id)
    {
        return $this->categoryservice->where('salon-service-id',$id)->delete();
    }

    /**
     * 
     */
    public function salonCategory($id)
    {
        return $this->salon->where(["id"=>$id])->with('salonCategorys')->get();
    }

    /**
     * 
     */
    public function searchSalon($param)
    {
        return $this->salon->where('name',$param)->get();
    }

    /**
     * 
     */
    public function searchCategory($param)
    {
        return $this->category->where('category',$param)->get();
    }

    /**
     * 
     */
    public function categoryWithSalon($id)
    {
         return $this->category->where(["id"=>$id])->with('categoryWithSalon')->get();
    }

    /**
     * 
     */ 
    public function searchSalonCategoryService($salon_id=null,$category_id=null,$service_id=null)
    {
        
        return $this->categoryservice->where('salon-id',$salon_id)->where('salon-category-id',$category_id)->where('salon-service-id',$service_id)->get();
    }

    //categoryservice
}