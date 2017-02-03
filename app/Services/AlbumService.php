<?php 

namespace App\Services;

use App\Contracts\AlbumInterface;
use App\Album;

class AlbumService implements AlbumInterface
{

	/**
	 * Create a new instance of UserService class
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->album = new Album();
	}

    /**
     * Create salon 
     *
     * @param array $data
     * @return response
     */
    public function createAlbum($data)
	{
		return $this->album->create($data);
	}

    /**
     * get the worker's albums 
     *
     * @param array $id
     * @return response
     */
    public function getThisWorkerAlbums($id)
    {
    	return $this->album->where('worker_id',$id)->get();
    }

    /**
     * get one album 
     *
     * @param array $id
     * @return response
     */
    public function getOneAlbum($id)
    {
        return $this->album->where('id',$id)->first();
    }

    /**
     * update  album 
     *
     * @param array $id
     * @param array $data
     * @return response
     */
    public function getUpdateAlbum($id,$data)
    {
        return $this->album->where('id',$id)->update($data); 
    }

    /**
     * delete album 
     *
     * @param array $id
     * @return response
     */
    public function deleteAlbum($id)
    {  
        return $this->album->where('id',$id)->delete();
    }

}