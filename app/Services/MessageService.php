<?php 

namespace App\Services;

use App\Contracts\MessageInterface;
use App\Message;

class MessageService implements MessageInterface
{

	/**
	 * Create a new instance of UserService class
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->message = new Message();
	}

    /**
    * Create message 
    *
    * @param array $data
    * @return response
    */
    public function createMessage($data)
	{
		return $this->message->create($data);
	}

	/**
     * get all review
     *
     * @return response
     */
    public function AllReview()
    {
    	return $this->message->get();
    }

	/**
     * get salon reviews
     *
     * @return response
     */
    public function SalonReview($salon_id)
    {
    	return $this->message->where('salon_id',$salon_id)->get();
    }
    /**
     * get salon reviews
     *
     * @return response
     */
    public function SalonReviews($salon_id)
    {
        return $this->message->where('salon_id',$salon_id)->orderBy('id','desc')->limit(3)->get();
    }
    /**
     * get more review
     *
     * @param array $id
     * @return response
     */
    public function showMoreReview($id)
    {
        return $this->message->where('id','<',$id)->orderBy('id','desc')->limit(3)->get();
    }

	/**
     * delete Worker Review
     *
     * @param array $worker_id
     * @return response
     */
    public function deleteOneReview($id)
    {
    	return $this->message->where('id',$id)->delete();
    }

    /**
     * delete worker Reviews
     *
     * @param array $id
     * @return response
     */
    public function deleteWorkerReview($id)
    {
    	return $this->message->where('worker_id',$id)->delete();
    }
    
    /**
     * 
     */
    public function userReview($id)
    {
        return $this->message->where('user_id',$id)->with('user')->get();
    }


    /**
     * 
     */
    public function updateUserReview($id,$data)
    {
        return $this->message->where('id',$id)->update($data);
    }

    /**
     * 
     */
    public function countMessage($id)
    {
        return $this->message->where('id','>',$id)->get();
    }
}