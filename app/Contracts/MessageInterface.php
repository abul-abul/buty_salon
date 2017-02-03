<?php 

namespace App\Contracts;

interface MessageInterface
{
    /**
     * Create message 
     *
     * @param array $data
     * @return response
     */
    public function createMessage($data);

    /**
     * get all review
     *
     * @return response
     */
    public function AllReview();

   	/**
     * get salon reviews
     *
     * @return response
     */
    public function SalonReview($salon_id);

    /**
     * get salon reviews
     *
     * @return response
     */
    public function SalonReviews($salon_id);

    /**
     * get Worker Review
     *
     * @param array $worker_id
     * @return response
     */
    public function deleteOneReview($id);

    /**
     * delete worker Reviews
     *
     * @param array $id
     * @return response
     */
    public function deleteWorkerReview($id);

    /**
     * get more review
     *
     * @param array $id
     * @return response
     */
    public function showMoreReview($id);
    
    /**
     * 
     */
    public function userReview($id);
    
    /**
     * 
     */
    public function updateUserReview($id,$data);

    /**
     * 
     */
    public function countMessage($id);
}
