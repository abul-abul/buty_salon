<?php 

namespace App\Contracts;

interface SalonInterface
{
    /**
    * Create salon 
    *
    * @param array $data
    * @return response
    */
    public function createOneSalon($data);

    /**
     * Get all salon
     * 
     * @param 
     * @return 
     */
    public function getAll();

    /**
    * Get one salon by userid
    *
    * @param integer $id
    * @return response
    */
    public function getOne($id);

    /**
     * delete one domain
     *
     * @return domain 
     */
    public function deleteOne($id);

    /**
     * Update salon value
     * @param string $params
     * @return domain
     */
    public function editSalon($id,$params);

    /**
     * Salon worker list
     *
     * @param $id
     * @param user
     */
    public function salonWorkerList($id);

    /**
     * get offers salons
     *
     * @param 
     * @return salon
     */
    public function OffersSalons();

    /**
     * get slide salons
     *
     * @param 
     * @return salon
     */
    public function SlideSalons();

    /**
     * get salons (deal of the day)
     *
     * @param 
     * @return salon
     */
    public function DealOfTheDaySalons();
    

    /**
     * 
     */
    public function showMoreSalon($id);

    /**
     * search salons
     *
     * @param 
     * @return salon
     */
    public function search($text);


}
