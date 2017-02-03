<?php 

namespace App\Contracts;

interface NotificationInterface
{
    /**
     * Create notification
     *
     * @param array $data
     * @return response
     */
    public function createNotification($data);

    /**
     * get one notification
     *
     * @param array $id
     * @return response
     */
    public function getOne($id);

    /**
     * get one notification
     *
     * @param array $id
     * @return response
     */
    public function getNotificByService($id);
    
    
    /**
     * get new notifications
     *
     * @param array $salon_id
     * @return response
     */
    public function getNewNotifications($salon_id);

    /**
     * get notifications
     *
     * @param array $salon_id
     * @return response
     */
    public function getNotifications($salon_id);

    /**
     * update notification
     *
     * @param array $id
     * @param array $data
     * @return response
     */
    public function updateNotification($id,$data);

    /**
     * delete notification
     *
     * @param array $id
     * @return response
     */
    public function deleteNotification($id);

        /**
     * delete worker notifications
     *
     * @param array $id
     * @return response
     */
    public function deleteWorkerNotification($id);

    /**
     * send email (yes)
     *
     * @param array $email
     * @param array $data
     * @return response
     */
    public function SendNotification($email,$data);

    /**
     * send email (not)
     *
     * @param array $email
     * @param array $data
     * @return response
     */
    public function SendNotificationCancel($email,$data);

    
    


}
