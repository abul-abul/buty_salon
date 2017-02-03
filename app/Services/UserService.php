<?php 

namespace App\Services;

use App\Contracts\UserInterface;
use App\User;
use App\Rating;
use Mail;

class UserService implements UserInterface
{

	/**
	* Create a new instance of UserService class
	*
	* @return void
	*/
	public function __construct()
	{
        $this->user = new User();
		$this->rating = new Rating();
	}

    /**
    * Create new user 
    *
    * @param array $dataArray
    * @return response
    */
	public function createOne($dataArray)
	{
		return $this->user->create($dataArray);
	}

    /**
    * Get one user by user id
    *
    * @param integer $id
    * @return response
    */
    public function getOne($id)
    {
        return $this->user->find($id);
    }

    /**
     * Get all Users
     *
     * @param
     * @return user
     */
    public function getAllUsers()
    {
        return $this->user->where('role','user')->paginate(10);;
    }

    /**
    * edit a user by id 
    *
    * @param $id
    * @param $params
    * @return user 
    */
    public function editUser($data, $id)
    {
        return $this->user->where('id',$id)->update($data);
    }

    /**
    * return user by email and $id
    *
    * @param $id
    * @param $email
    * @return user 
    */
    public function getEmail($id,$email)
    {
        return $this->user->where('id', '!=' ,$id)->where('email', '=',$email)->get();
    }

    /** 
     * Send active profile message
     *
     * @param string $dataEmail
     * @param string $email
     * @return response
     */
    public function sendEmailFromRegistration($dataEmail,$email)
    {
        Mail::send('user.send-email-registration', $dataEmail, function($message) use ($email)
        {
            $message->from('beauty_salon@gmail.com');
            $message->to($email)->subject("Welcome!");
        });
    }

    /** 
     * Send active profile message
     *
     * @param string $dataEmail
     * @param string $email
     * @return response
     */
    public function sendEmailFromRegistrationSalon($dataEmail,$email)
    {
        Mail::send('user.send-email-registration-salon', $dataEmail, function($message) use ($email)
        {
            $message->from('beauty_salon@gmail.com');
            $message->to($email)->subject("Welcome!");
        });
    }

    /**
     * Get token by users active
     *
     * @param string $token
     * @return response
    */
    public function getActive($token)
    {
        return $this->user->where('active_user' , '=' , $token)->first();
    }

    /**
     * Update token if user active
     *
     * @param string $token
     * @return response
    */
    public function updateActive($token)
    {
        return $this->user->where('active_user' , '=' , $token)->update(['active_user' => true]);
    }

    /** 
     * Send forgos password hash
     *
     * @param string $data
     * @param string $email
     * @return response
     */
    public function forgotPassHash($data, $email)
    {
        Mail::send('user.mail.forgot-password', $data, function($message) use ($email)
        {
            $message->from('beauty_salon@gmail.com');
            $message->to($email)->subject("Welcome!");
        });
    }

    /**
    * create user hash forgot password
    *
    * @param string $email
    * @param string $hash
    * @return response
    */
    public function createHash($email, $hash)
    {
        return $this->user->where('email' , '=' , $email)->update(['hash' => $hash]);
    }

    /**
     * Get hash password reset
     *
     * @param string $hash
     * @return response
    */
    public function getHash($hash)
    {
        return $this->user->where('hash' , '=' , $hash)->first();
    }

    /**
     * Update hash forgot password
     *
     * @param string $hash
     * @return response
    */
    public function updateHash($hash, $password)
    {
        return $this->user->where('hash' , '=' , $hash)->update(['hash' => null, 'password' => $password]);
    }

    /**
     * 
     */
    public function updateProfilePicture($id,$data)
    {
        return $this->getOne($id)->update($data);
    }  

    /**
    * edit password
    *
    * @param $id
    * @param $data
    * @return user 
    */
    public function editPassword($data,$id)
    {

        return $this->user->where('id',$id)->update($data);
    }

    /**
     * delete Salon worker
     * 
     * @param $id
     * @return user 
     */
    public function deleteSalonWorker($id)
    {
       return $this->getOne($id)->delete();
    }

    /**
     * Delete User
     *
     * @param $id
     * @return user
     */
    public function deleteUser($id)
    {
        return $this->getOne($id)->delete();
    }     

    /**
    * Get salon ADMIN by salon id
    *
    * @param integer $id
    * @return response
    */  
    public function getAdmin($id)
    {
        return $this->user->where('salon_id',$id)->first();
    }

    /**
     * get salon workers
     *
     * @param $salonAdminId
     * @return response
     */
    public function getWorkersByAdminId($salonAdminId)
    {
        return $this->user->where('salon_admin_id',$salonAdminId)->get();
    }

    /**
     * get salon workers
     *
     * @param $salonAdminId
     * @return response
     */
    public function getWorkers($salonAdminId,$id)
    {
        return $this->user->where('salon_admin_id',$salonAdminId)->where('category_id',$id)->get();
    }

    /**
     * salon rating
     *
     * @param $vote
     * @return rating
     */
    public function raitingSalon($vote)
    {
        $salonId = $vote['salon_id'];
        $user_id = $vote['user_id'];
        $count = $this->rating->where('salon_id' , '=' , $salonId)->where('user_id' , '=' , $user_id)->get();

        if(count($count) == ''){
            return $this->rating->create($vote);
        }
        // else{
  
        //     //return $this->rating->where('salon_id' , '=' , $salonId)->where('user_id' , '=' , $user_id)->update($vote);
        // }       
    }

    /**
     * 
     */
    public function userSalonOneRating($salonId,$user_id)
    {
        return $this->rating->where('salon_id' , '=' , $salonId)->where('user_id' , '=' , $user_id)->get();
    }
    /**
     * Service raiting
     *
     * @param $vote
     * @return rating
     */
    public function raitingService($vote)
    {
        $salonId = $vote['salon_id'];
        $user_id = $vote['user_id'];
        $service_id = $vote['service_id'];
        $count = $this->rating->where('salon_id' , '=' , $salonId)->where('user_id' , '=' , $user_id)->where('service_id', '=' ,$service_id)->get();
        if(count($count) == ''){
            return $this->rating->create($vote);
        }else{
            return $this->rating->where('salon_id' , '=' , $salonId)->where('user_id' , '=' , $user_id)->where('service_id', '=' ,$service_id)->update($vote);
        } 
    }

    /**
     * Worker raiting
     *
     * @param $vote
     * @return rating
     */
    public function raitingSalonWorker($vote)
    {
        $salonId = $vote['salon_id'];
        $user_id = $vote['user_id'];
        $service_id = $vote['service_id'];
        $worker_id = $vote['worker_id'];
        $count = $this->rating->where('salon_id' , '=' , $salonId)->where('user_id' , '=' , $user_id)->where('service_id', '=' ,$service_id)->where('worker_id', '=' ,$worker_id)->get();
        if(count($count) == ''){
            return $this->rating->create($vote);
        }else{
            return $this->rating->where('salon_id' , '=' , $salonId)->where('user_id' , '=' , $user_id)->where('service_id', '=' ,$service_id)->where('worker_id', '=' ,$worker_id)->update($vote);
        } 
    }

    /**
     * Get All Raiting Salon
     *
     * @param $id
     * @return rating 
     */
    public function getAllRaiting($id)
    {
        return $this->rating->where('salon_id',$id)->where('salon_rating','!=',0)->get();
    }

    /**
     * Get All Raiting Service
     *
     * @param $id
     * @return rating 
     */
    public function getAllRaitingService($id)
    {
        return $this->rating->where('service_id',$id)->where('service_rating','!=',0)->get();
    }

    /**
     * Get All Raiting Worker
     * @param $id
     * @return rating
     */
    public function getAllRaitingWorker($id)
    {
        return $this->rating->where('worker_id',$id)->where('worker_rating','!=',0)->get();
    }

    /**
     * Get All Workers
     *
     * @param
     * @return user
     */
    public function getAllWorkers($category_id)
    {
        return $this->user->where('role','salon_worker')->where('category_id',$category_id)->get();
    }

    /**
     * Select all social login Email
     *
     * @param @emil
     * @return user
     */
    public function getAllSocial($email)
    {
        return $this->user->where('email',$email)->first();
    }

    /**
     * Update token 
     *
     * @param $token
     * @param $email
     * @return user
     */
    public function updateSocialToken($email,$token)
    {
        return $this->user->where('email',$email)->update($token);
    }

    /**
     * get salon staff
     *
     * @param $salon_admin_id
     * @return user
     */
    public function salonstaff($salon_admin_id)
    {
        return $this->user->where('salon_admin_id',$salon_admin_id)->where('role','salon_worker')->where('activ_inactive','active')->get();
    }

    /**
     * Active/Inactive user
     *
     * @param $data
     * @param $id
     * @return user
     */
    public function activeUser($data,$id)
    {
        return $this->getOne($id)->update($data);
    }

    /**
     * create Salon Category workers
     *
     * @param $salon_admin_id
     * @param $category_id
     * @return user
     */
    public function getSalonWorkerCategory($salon_admin_id,$category_id)
    {
        return $this->user->where('salon_admin_id',$salon_admin_id)->where('category_id',$category_id)->where('role','salon_worker')->get();
    }
}