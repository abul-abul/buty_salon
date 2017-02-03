<?php 

namespace App\Contracts;

interface ImageInterface
{

    /**
     * delete images
     *
     * @param array $id
     * @return response
     */
    public function deleteImages($id);

    /**
     * add picture
     *
     * @param array $id
     * @param array $data
     * @return response
     */
    public function getAddPicture($id,$data);

    /**
     * get images
     *
     * @param array $id
     * @return response
     */
    public function getImages($id);

    /**
     * delete one image
     *
     * @param array $id
     * @return response
     */
    public function deleteOneImage($id);


	/**
     * Get one salon by userid
     *
     * @param integer $id
     * @return response
     */
    public function getOne($id);

    /**
     * Create Albom Images 
     * 
     * @param $data
     * @return image
     */ 
    public function createImage($data);
}
