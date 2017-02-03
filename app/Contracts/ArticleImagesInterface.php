<?php 

namespace App\Contracts;

interface ArticleImagesInterface
{

    /**
     * select all article
     *
     * @param 
     * @return  article
     */
    public function getAll();

    /**
     * 
     */
    public function createImages($data);

    /**
     * 
     */
    public function selectThisImages($id);

    /**
     * 
     */
    public function getOne($id);

    /**
     * 
     */
    public function getDelete($id);

    /**
     * update  article images 
     *
     * @param array $id
     * @param array $data
     * @return response
     */
    public function getUpdateArticleImages($id,$data);

}
