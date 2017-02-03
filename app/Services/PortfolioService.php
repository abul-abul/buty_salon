<?php 

namespace App\Services;

use App\Contracts\PortfolioInterface;
use App\Portfolio;

class PortfolioService implements PortfolioInterface
{

	/**
	* Create a new instance of UserService class
	*
	* @return void
	*/
	public function __construct()
	{
		$this->portfolio = new Portfolio();
	}
	
	/**
     * Get one salon by userid
     *
     * @param integer $id
     * @return response
     */
    public function getOne($id)
    {
        return $this->portfolio->find($id);
    }

    /**
	 * Get All Portfolio
	 *
	 * @param $id
	 * @return response
	 */	
	public function getAll($id)
	{
		return $this->portfolio->where('worker_id',$id)->get();
	}

	/**
	 * Create Portfolio
	 *
	 * @param $data
	 * @return response
	 */
	public function createCertificate($data)
	{
		return $this->portfolio->create($data);
	}

	/**
	 * get Certificates
	 *
	 * @param $worker_id
	 * @return response
	 */
	public function getCertificates($worker_id)
	{
		return $this->portfolio->where('worker_id',$worker_id)->where('certificate','!=','')->get();
	}
	
	/**
	 * get Diplomas
	 *
	 * @param $worker_id
	 * @return response
	 */
	public function getDiplomas($worker_id)
	{
		return $this->portfolio->where('worker_id',$worker_id)->where('diploma','!=','')->get();
	}

	/**
     * delete Certificate
     *
     * @param $id
     * @return response
     */
    public function deletePortfolio($id)
    {
    	return $this->portfolio->where('id',$id)->delete();
    }
}