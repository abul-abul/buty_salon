<?php 

namespace App\Services;

use App\Contracts\SubscribeInterface;

use App\Subscribe;
use App\WebSiteSubscribe;
use Mail;


class SubscribeService implements SubscribeInterface
{

	/**
	* Create a new instance of UserService class
	*
	* @return void
	*/
	public function __construct()
	{
		$this->subscribe = new Subscribe();
        $this->subscribeweb = new WebSiteSubscribe();
	}

    /**
     * Create subscribe 
     *
     * @param array $data
     * @return response
     */
    public function createOne($data)
	{
		return $this->subscribe->create($data);
	}
        /**
     * get subscribe
     *
     * @param array $user_id
     * @param array $salon_id
     * @return response
     */
    public function getOneSubscribe($id)
    {
        return $this->subscribe->where('id',$id)->first();
    }

    /**
     * 
     */
    public function vaidetEmailInSalon($salon_id,$email)
    {
        return $this->subscribe->where('salon_id',$salon_id)->where('email',$email)->get();
    }

    /**
     * 
     */
    public function UserSubscribedWebSite($email)
    {
        return $this->subscribeweb->where('email',$email)->get();
    }
    /**
     * 
     */
    public function SendEmailNewSalon($email,$data)
    {
        Mail::send('admin.subscribe.subscribe_new_salon', $data, function($message) use ($email)
        {
            $message->from("beauty_salon@gmail.com", 'Beauty Salon');
            $message->to($email)->subject("Beauty Salon");
        });
        return true;
    }

    /**
     * 
     */
    public function DeleteSubscribeWeb($id)
    {
        return $this->subscribeweb->where('id',$id)->delete();
    }

    /**
     * 
     */
    public function DeleteSubscribeUserWeb($email)
    {
        return $this->subscribeweb->where('id',$email)->delete();
    }

    /**
     * 
     */
    public function UnsubscribeWebSite($id)
    {
        return $this->subscribeweb->where('user_id',$id)->delete();
    }

    /**
     * 
     */
    public function getStatusSubscribe($id)
    {
        return $this->subscribeweb->where('user_id',$id)->first();
    }
    

    /**
     * 
     */
    public function SubscribedUsers()
    {
        return $this->subscribeweb->get();
    }

    /**
     * 
     */
    public function createOneSubscribeWebSite($data)
    {
        return $this->subscribeweb->create($data);
    }
    
    

    /**
     * 
     */
     public function vaidetUserEmailInSalon($salon_id,$email,$user_id)
     {
        return $this->subscribe->where('user_id',$user_id)->where('salon_id',$salon_id)->where('user_id',$user_id)->first();
     }

	/**
     * get subscribe
     *
     * @param array $user_id
     * @param array $salon_id
     * @return response
     */
    public function getOne($user_id, $salon_id)
    {
    	return $this->subscribe->where('user_id',$user_id)->where('salon_id',$salon_id)->first();
    }

    

    // /**
    //  * 
    //  */
    // public function Unsubscribe($user_id,$data)
    // {
    //     return $this->subscribe->where('user_id',$user_id)->update($data);
    // }
    /**
     * get subscribe
     *
     * @param array $salon_id
     * @return response
     */
    public function getAll($salon_id)
    {
        return $this->subscribe->where('salon_id',$salon_id)->get();
    }

    /**
     * Unsubscribe
     *
     * @param array $user_id
     * @param array $salon_id
     * @return response
     */
    public function DeleteOne($user_id,$salon_id)
    {
        return $this->subscribe->where('user_id',$user_id)->where('salon_id',$salon_id)->delete();
    }

}