<?php 

namespace App\Contracts;

interface PortfolioInterface
{

	/**
     * Get one salon by userid
     *
     * @param integer $id
     * @return response
     */
    public function getOne($id);

    /**
     * Get All Portfolio
     *
     * @param $id
     * @return response
     */ 
    public function getAll($id);

    /**
     * Create Portfolio
     *
     * @param $data
     * @return response
     */
    public function createCertificate($data);

    /**
     * get Certificates
     *
     * @param $worker_id
     * @return response
     */
    public function getCertificates($worker_id);

    /**
     * get Diplomas
     *
     * @param $worker_id
     * @return response
     */
    public function getDiplomas($worker_id);

    /**
     * delete Certificate
     *
     * @param $id
     * @return response
     */
    public function deletePortfolio($id);
}
