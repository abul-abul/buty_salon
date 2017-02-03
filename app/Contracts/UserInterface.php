<?php 

namespace App\Contracts;

interface UserInterface
{
	/**
     * Create new  user 
     *
     * @param array  $dataArray
     * @return response
     */
	public function createOne($dataArray);

    /**
     * Get one user by user id
     *
     * @param integer $id
     * @return response
     */	
    public function getOne($id);

    /**
     * Get all Users
     *
     * @param
     * @return user
     */
    public function getAllUsers();
    
    /**
     * edit a user by id 
     *
     * @param $id
     * @param $params
     * @return user 
     */
    public function editUser($data,$id);

    /**
     * return user by email and $id
     *
     * @param $id
     * @param $email
     * @return user 
     */
    public function getEmail($id,$email);

    /**
     * edit password
     *
     * @param $id
     * @param $data
     * @return user 
     */
    public function editPassword($data,$id);
    
    /**
     * delete Salon worker
     * 
     * @param $id
     * @return user 
     */
     public function deleteSalonWorker($id);

    /**
     * Get salon ADMIN by salon id
     *
     * @param integer $id
     * @return response
     */  
    public function getAdmin($id);

    /**
     * get salon workers
     *
     * @param $salonAdminId
     * @return response
     */
    public function getWorkers($salonAdminId,$id);

    /**
     * get salon workers
     *
     * @param $salonAdminId
     * @return response
     */
    public function getWorkersByAdminId($salonAdminId);

    /**
     * Get All Raiting
     *
     * @param $id
     * @return rating 
     */
    public function getAllRaiting($id);

    /**
     * Get All Raiting Service
     *
     * @param $id
     * @return rating 
     */
    public function getAllRaitingService($id);

    /**
     * Service raiting
     *
     * @param $vote
     * @return rating
     */
    public function raitingService($vote);

    /**
     * Worker raiting
     *
     * @param $vote
     * @return rating
     */
    public function raitingSalonWorker($vote);

    /**
     * Get All Raiting Worker
     * @param $id
     * @return rating
     */
    public function getAllRaitingWorker($id);

    /**
     * Get All Workers
     *
     * @param
     * @return user
     */
    public function getAllWorkers($category_id);

    /** 
     * Send active profile message
     *
     * @param string $dataEmail
     * @param string $email
     * @return response
     */
    public function sendEmailFromRegistration($dataEmail,$email);
    
    /** 
     * Send active profile message
     *
     * @param string $dataEmail
     * @param string $email
     * @return response
     */
    public function sendEmailFromRegistrationSalon($dataEmail,$email);

    /**
     * Update token if user active
     *
     * @param string $token
     * @return response
     */
    public function updateActive($token);

    /**
     * Get token by users active
     *
     * @param string $token
     * @return response
     */
    public function getActive($token);

    /**
     * Select all social login Email
     *
     * @param @emil
     * @return user
     */
    public function getAllSocial($email);

    /**
     * Update token 
     *
     * @param $token
     * @param $email
     * @return user
     */
    public function updateSocialToken($email,$token);


    /**
     * get salon staff
     *
     * @param $salon_admin_id
     * @return user
     */
    public function salonstaff($salon_admin_id);

    /**
     * Delete User
     *
     * @param $id
     * @return user
     */
    public function deleteUser($id);

    /**
     * Active/Inactive user
     *
     * @param $data
     * @param $id
     * @return user
     */
    public function activeUser($data,$id);

    /**
     * create Salon Category workers
     *
     * @param $salon_admin_id
     * @param $category_id
     * @return user
     */
    public function getSalonWorkerCategory($salon_admin_id,$category_id);

    /**
     * 
     */
    public function userSalonOneRating($salonId,$user_id);
}
