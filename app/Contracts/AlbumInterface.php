<?php 

namespace App\Contracts;

interface AlbumInterface
{
    /**
    * Create album 
    *
    * @param array $data
    * @return response
    */
    public function createAlbum($data);
    
    /**
     * get the worker's albums 
     *
     * @param array $id
     * @return response
     */
    public function getThisWorkerAlbums($id);
    

    /**
     * get one album 
     *
     * @param array $id
     * @return response
     */
    public function getOneAlbum($id);


    /**
     * update  album 
     *
     * @param array $id
     * @param array $data
     * @return response
     */
    public function getUpdateAlbum($id, $data);

    /**
     * delete album 
     *
     * @param array $id
     * @return response
     */
    public function deleteAlbum($id);



}
