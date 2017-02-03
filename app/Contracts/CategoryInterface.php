<?php 

namespace App\Contracts;

interface CategoryInterface
{
    
    /**
     * Get one salon by userid
     *
     * @param integer $id
     * @return response
     */
    public function getOne($id);

    /**
     * update category
     *
     * @param integer $id
     * @param integer $data
     * @return response
     */
    public function editOne($id,$param);

    /**
     * Create category
     *
     * @param array $data
     * @return response
     */
    public function createOne($data);

    /**
     * Get All Category
     *
     * @param $id
     * @return saloncategoryservices
     */
    public function getAll($id);
    
    /**
     * Category Service List
     *
     * @param $id
     * @param categoryservice
     */
    public function deleteCategorySer($id);

    /**
     * Create Category Service
     * 
     * @param $data
     * @return categoryservice
     */
    public function createCategoryService($data);

    /**
     * Category Service List
     *
     * @param $id
     * @param categoryservice
     */
    public function SalonCategoryService($id);

    /**
     * Category Service List
     *
     * @param $id
     * @param categoryservice
     */
     public function deleteServicesByCategoryId($category_id,$service_id);

    /**
     * Category Service List
     *
     * @param $id
     * @param categoryservice
     */
    public function deleteCategory($id);
    

    /**
     * Salon category
     *
     * @param $id
     * @param response
     */
    public function salonCategory($id);

    /**
     * delete category fild
     *
     * @param $id
     * @param response
     */
    public function deleteCategoryFild($id);

    /**
     * 
     */
    public function searchSalon($param);

    /**
     * 
     */
    public function searchCategory($param);

     /**
     * 
     */
    public function categoryWithSalon($id);

     /**
     * 
     */ 
    public function searchSalonCategoryService($salon_id=null,$category_id=null,$service_id=null);
}
