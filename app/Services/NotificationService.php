<?php 

namespace App\Services;

use App\Contracts\NotificationInterface;
use App\Notification;
use Mail;

class NotificationService implements NotificationInterface
{

	/**
	 * Create a new instance of UserService class
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->notification = new \App\Notification();
	}

    /**
     * Create notification
     *
     * @param array $data
     * @return response
     */
    public function createNotification($data)
    {
        return $this->notification->create($data);
    }
    
    /**
     * get new notifications
     *
     * @param array $salon_id
     * @return response
     */
    public function getNewNotifications($salon_id)
    {
        return $this->notification->where('salon_id',$salon_id)->where('status',0)->orderBy('date')->paginate(12);
    }

    /**
     * get notifications
     *
     * @param array $salon_id
     * @return response
     */
    public function getNotifications($salon_id)
    {
        return $this->notification->where('salon_id',$salon_id)->where('status',1)->orderBy('date')->paginate(12);
    }

    /**
     * get one notification
     *
     * @param array $id
     * @return response
     */
    public function getOne($id)
    {
        return $this->notification->where('id',$id)->first();
    }

    /**
     * get one notification
     *
     * @param array $id
     * @return response
     */
    public function getNotificByService($id)
    {
        return $this->notification->where('service_id',$id)->get();
    }

    /**
     * update notification
     *
     * @param array $id
     * @param array $data
     * @return response
     */
    public function updateNotification($id,$data)
    {
        return $this->notification->where('id',$id)->update($data);
    }
     
    /**
     * delete notification
     *
     * @param array $id
     * @return response
     */
    public function deleteNotification($id)
    {
        return $this->notification->where('id',$id)->delete();
    }

    /**
     * delete worker notifications
     *
     * @param array $id
     * @return response
     */
    public function deleteWorkerNotification($id)
    {
        return $this->notification->where('worker_id',$id)->delete();
    }

    /**
     * send email (yes)
     *
     * @param array $email
     * @param array $data
     * @return response
     */
    public function SendNotification($email,$data)
    {
        Mail::send('salon-admin.salon-notification.email_yes', $data, function($message) use ($email)
        {
            $message->from("beauty_salon@gmail.com", 'Beauty Salon');
            $message->to($email)->subject("Beauty Salon");
        });
        return true;
    }

    /**
     * send email (not)
     *
     * @param array $email
     * @param array $data
     * @return response
     */
    public function SendNotificationCancel($email,$data)
    {
        Mail::send('salon-admin.salon-notification.email_no', $data, function($message) use ($email)
        {
            $message->from("beauty_salon@gmail.com", 'Beauty Salon');
            $message->to($email)->subject("Beauty Salon");
        });
        return true;  
    }

    
}