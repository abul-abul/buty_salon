<?php 

namespace App\Contracts;

interface SubscribeInterface
{
    /**
     * Create subscribe
     *
     * @param array $data
     * @return response
     */
    public function createOne($data);


    /**
     * get subscribe
     *
     * @param array $user_id
     * @param array $salon_id
     * @return response
     */
    public function getOne($user_id, $salon_id);

    /**
     * get subscribe
     *
     * @param array $salon_id
     * @return response
     */
    public function getAll($salon_id);

    /**
     * Unsubscribe
     *
     * @param array $user_id
     * @param array $salon_id
     * @return response
     */
    public function DeleteOne($user_id,$salon_id);

    /**
     * 
     */
    public function vaidetEmailInSalon($salon_id,$email);
    
    /**
     * 
     */
    // public function Unsubscribe($user_id,$data);

    /**
     * 
     */
    public function vaidetUserEmailInSalon($salon_id,$email,$user_id);

    /**
     * 
     */
    public function SubscribedUsers();

    

}
