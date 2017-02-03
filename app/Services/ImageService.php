<?php 

namespace App\Services;

use App\Contracts\ImageInterface;
use App\Image;

class ImageService implements ImageInterface
{

	/**
	* Create a new instance of UserService class
	*
	* @return void
	*/
	public function __construct()
	{
		$this->image = new Image();
	}


    /**
     * delete images
     *
     * @param array $id
     * @return response
     */
	public function deleteImages($id){
		$image = $this->image->where('album_id',$id)->delete();
	    return $image;
	}

	/**
     * add picture
     *
     * @param array $id
     * @param array $data
     * @return response
     */
	public function getAddPicture($id,$data){
		$image = $this->image->create($data);
		return $image;
	}

	/**
     * get images
     *
     * @param array $id
     * @return response
     */
	public function getImages($id){
		$image = $this->image->where('album_id',$id)->get();
	    return $image;

	}

	/**
     * delete one image
     *
     * @param array $id
     * @return response
     */
	public function deleteOneImage($id){
		$image = $this->image->where('id',$id)->delete();
	    return $image;
	}
		
	/**
     * Get one salon by userid
     *
     * @param integer $id
     * @return response
     */
    public function getOne($id)
    {
        return $this->image->find($id);
    }

    /**
	 * Create Albom Images 
	 * 
	 * @param $data
	 * @return image
	 */	
	public function createImage($data)
	{
		return $this->image->create($data);
	}
}