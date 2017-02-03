<?php 

namespace App\Services;

use App\Contracts\ArticleImagesInterface;
use App\ArticleImages;

class ArticleImagesService implements ArticleImagesInterface
{

	/**
	 * Create a new instance of UserService class
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->articleimages = new ArticleImages();
	}

    /**
     * select all article
     *
     * @param 
     * @return  article
     */
    public function getAll()
    {
        return $this->articleimages->get();
    }

    /**
     * 
     */
    public function createImages($data)
    {
        return $this->articleimages->create($data);
    }

    /**
     * 
     */
    public function selectThisImages($id)
    {
        return $this->articleimages->where('article_id',$id)->get();
    }

    /**
     * 
     */
    public function getOne($id)
    {
        return $this->articleimages->find($id);
    }

    /**
     * 
     */
    public function getDelete($id)
    {
        return $this->getOne($id)->delete($id);
    }

    /**
     * update  article images 
     *
     * @param array $id
     * @param array $data
     * @return response
     */
    public function getUpdateArticleImages($id,$data)
    {
        return $this->getOne($id)->update($data); 
    }

}