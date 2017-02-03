<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Http\Requests\admin\AdminLoginRequest;
use App\Http\Requests\admin\SalonAdminWorkerRequest;
use App\Http\Requests\worker\AlbumRequest;
use App\Contracts\SalonInterface;
use App\Contracts\ServicesInterface;
use App\Contracts\CategoryInterface;
use App\Contracts\NotificationInterface;
use App\Contracts\PortfolioInterface;
use App\Contracts\SubscribeInterface;
use App\Contracts\ImageInterface;
use App\Contracts\UserInterface;
use App\Contracts\AlbumInterface;
use App\Contracts\MessageInterface;
use App\Contracts\WorkersJobsInterface;
use App\Contracts\PositionInterface;
use App\Contracts\AddressInterface;
use App\Http\Requests;
use Auth;
use Validator;
use Session;
use File;

class SalonAdminController extends BaseController
{

    /**
     * Create a new instance of BaseController class.
     *
     * @return void
     */
    public function __construct(NotificationInterface $notificationRepo, UserInterface $userRepo,SubscribeInterface $subscribeRepo)
    {
        parent::__construct($notificationRepo, $userRepo,$subscribeRepo);
        $this->middleware('salon', ['except' => ['getLogin', 'postLogin','getLogout']]);
    }

    /**
     * Salon admin Login
     * GET /salon/login
     *
     * @param 
     * @return view
     */
    public function getLogin()
    {
    	return view('salon-admin.salon-admin-login');
    }

    /**
     * Salon admin Login
     * POST /salon/login
     * 
     * @param AdminLoginRequest $request
     * @return redirect
     */
    public function postLogin(AdminLoginRequest $request)
    {
    	$email = $request->get('email');
    	$password  = $request->get('password');
    	if(Auth::attempt ([
            'email' => $email,
            'password' => $password,
            'role' => 'salon_admin'
        ])){
        	return redirect()->action('SalonAdminController@getDashboard');
        }else{
        	return redirect()->back()->with('error_danger', 'Invalid login or password');
        }
    }

    /**
     * get new notifications
     * GET /salon/new-notifications
     * 
     * @param NotificationInterface $notificationRepo
     * @param UserInterface $userRepo
     * @return redirect
     */
    public function getNewNotifications(NotificationInterface $notificationRepo, UserInterface $userRepo)
    {
        $salon_admin_id = Auth::id();
        $salon_admin =  $userRepo->getOne($salon_admin_id);
        $salon_id = $salon_admin['salon_id'];
        $newNotifications = $notificationRepo->getNewNotifications($salon_id);
        foreach ($newNotifications as $NewNotification) {
            $NewNotification->user_name = $NewNotification->user()->first()->firstname;
            $NewNotification->worker_name = $NewNotification->worker()->first()->firstname;
            $NewNotification->service_name = $NewNotification->service()->first()->services;
            //dd($NewNotification->service_name);
        }
        $data = [
            'new_notifications' => $newNotifications,
        ];
        //dd($data);
        return view('salon-admin.salon-notification.new_notification',$data);
    }

    /**
     * get notifications
     * GET /salon/notifications
     * 
     * @param NotificationInterface $notificationRepo
     * @param UserInterface $userRepo
     * @return array
     */
    public function getNotifications(NotificationInterface $notificationRepo, UserInterface $userRepo)
    {
        $salon_admin_id = Auth::id();
        $salon_admin =  $userRepo->getOne($salon_admin_id);
        $salon_id = $salon_admin['salon_id'];
        $Notifications = $notificationRepo->getNotifications($salon_id);
        foreach ($Notifications as $Notification) {
            $Notification->user_name = $Notification->user()->first()->firstname;
            $Notification->worker_name = $Notification->worker()->first()->firstname;
            $Notification->service_name = $Notification->service()->first()->services;
        }
        $data = [
            'notifications' => $Notifications
        ];
        return view('salon-admin.salon-notification.notification',$data);
    }
    
    /**
     * Registering  user, Send message
     * GET /salon/notification-yes
     * 
     * @param $id
     * @return NotificationInterface $notificationRepo
     * @return array
     */
    public function getNotificationYes($id, NotificationInterface $notificationRepo)
    {
        $notification = $notificationRepo->getOne($id);
        if($notification){          
            if(!empty($notification['email'])){
                $email = $notification['email'];
                $data = [
                    'notification' => $notification
                ];
                $email_send = $notificationRepo->SendNotification($email,$data);
                if($email_send){
                    $data = [
                        'status' => 1
                    ];
                    $result = $notificationRepo->updateNotification($id,$data);
                    return redirect()->action('SalonAdminController@getNotifications');
                }else{
                    dd('error');
                }    
            }
            if(!empty($notification['phone'])){
                dd('send message to phone ,that accept register');
            }
        }else{
            dd('error');
        }
    }

    /**
     * delete notifications, send message
     * GET /salon/notification-delete
     * 
     * @param $id
     * @param NotificationInterface $notificationRepo
     * @return redirect
     */
    public function getNotificationDelete($id, NotificationInterface $notificationRepo)
    {
        $notification = $notificationRepo->getOne($id);
        if($notification){
            if(!empty($notification['email'])){
                $email = $notification['email'];
                $data = [
                    'notification' => $notification
                ];
                $email_send = $notificationRepo->SendNotificationCancel($email,$data);
                if($email_send){
                    $result = $notificationRepo->deleteNotification($id);
                    return redirect()->action('SalonAdminController@getNotifications');
                }else{
                    dd('error');
                }    
            }
            if(!empty($notification['phone'])){
                dd('send message to phone ,that canceled register');
            }
        }else{
            dd('error');
        }
    }

    /**
     * delete Registered user notifications
     * GET /salon/registered-notification-delete
     * 
     * @param $id
     * @param NotificationInterface $notificationRepo
     * @return redirect
     */
    public function getRegisteredNotificationDelete($id, NotificationInterface $notificationRepo)
    {
        $notification = $notificationRepo->getOne($id);
        if($notification){
            $result = $notificationRepo->deleteNotification($id);
            return redirect()->action('SalonAdminController@getNotifications');
        }else{
            dd('error');
        }
    }
    
    /**
     * delete Registered user notifications
     * POST /salon/select-all-delete-notification
     * 
     * @param Request $request
     * @param NotificationInterface $notificationRepo
     * @return response
     */
    public function postSelectAllDeleteNotification(Request $request, NotificationInterface $notificationRepo)
    {
        $datas = $request->all();
        foreach ($datas['id']  as $id) {
           $result = $notificationRepo->deleteNotification($id);
        }
        return response()->json();
    }

    /**
     * delete Registered user notifications
     * POST /salon/select-all-delete-reviews
     * 
     * @param Request $request
     * @param NotificationInterface $notificationRepo
     * @return response
     */
    public function postSelectAllDeleteReviews(Request $request, MessageInterface $reviewRepo)
    {
        $datas = $request->all();
        foreach ($datas['id']  as $id) {
           $result = $reviewRepo->deleteOneReview($id);
        }
        return response()->json();
    }

    /**
     * get salon reviews
     * GET /salon/salon-review
     * 
     * @param MessageInterface $reviewRepo
     * @return UserInterface $userRepo
     * @return array
     */
    public function getSalonReview(MessageInterface $reviewRepo, UserInterface $userRepo)
    {
        $salon_admin_id = Auth::id();
        $salon_workers = $userRepo->getOne($salon_admin_id);
        $salon_id = $salon_workers['salon_id'];
        $workers_review = [];
        $salon_reviews = $reviewRepo->SalonReview($salon_id);
        foreach ($salon_reviews as $salon_review) {
            $salon_review->user_name = $salon_review->user()->first()->firstname;
        }

        $data = [
            'salon_reviews' => $salon_reviews
        ];

        return view('salon-admin.review.salon_review',$data);
    }


    /**
     * delete salon review
     * GET /salon/salon-review-delete
     * 
     * @param $id
     * @param MessageInterface $reviewRepo
     * @return redirect
     */
    public function getSalonReviewDelete($id, MessageInterface $reviewRepo)
    {
        $result = $reviewRepo->deleteOneReview($id);
        if($result){
            return redirect()->back();
        }else{
            dd('error');
        }
    } 
    
    /**
     * Admin Salon Logout
     * GET /salon/logout
     *
     * @param 
     * @return redirect
     */
    public function getLogout()
    {	
    	Auth::logout();
    	return redirect()->action('SalonAdminController@getLogin');
    }

    /**
     * Get Dashboard page
     * GET /salon/dashboard
     *
     * @param
     * @return view
     */
    public function getDashboard()
    {
    	return view('salon-admin.dashboard.salon-admin-dashboard');
    }

    /**
     * Get Deal Of The Day page
     * GET /salon/deal-of-the-day
     *
     * @param SalonInterface $salonRepo
     * @param UserInterface $userRepo
     * @return view
     */
    public function getDealOfTheDay(SalonInterface $salonRepo, UserInterface $userRepo)
    {
        $id = Auth::id();
        $salon_admin = $userRepo->getOne($id);
        $salon_id = $salon_admin['salon_id'];
        $dealOfTheDay = $salonRepo->getOneDealOfTheDay($salon_id);
        $data = [
            'deal_of_the_day' => $dealOfTheDay 
        ];
        return view('salon-admin.deal-of-the-day.deal-of-the-day',$data);
    }

        /**
     * Delete Deal Of The Day
     * GET /salon/deal-of-the-day-delete
     *
     * @param $id
     * @param UserInterface $userRepo
     * @return redirect
     */
    public function getDealOfTheDayDelete($id, SalonInterface $salonRepo)
    {
        $result = $salonRepo->getOneDeal($id);
        $salonRepo->deleteOneDealOfTheDay($id);
        return redirect()->back();
    }


    /**
     * Get salon Settings
     * GET /salon/salon-settings
     *
     * @param SalonInterface $salonRepo
     * @return array
     */
    public function getSalonSettings(SalonInterface $salonRepo,AddressInterface $salonAddressRepo)
    {
        $result = Auth::user()->salon;
        $id = Auth::user()->salon->id;
        $resul = $salonAddressRepo->getSalonAddres($id);
        foreach ($resul as $address){
            $addres = $address;
        }
    	$data = [
    		'settings' => $result,
            'address' => $addres
    	];

    	return view('salon-admin.settings.salon-settings',$data);
    }
    /**
     * edit salon
     * GET /salon/edit-salon-detalis
     * 
     * @param $id
     * @param SalonInterface $salonRepo
     * @return response
     */
    public function getEditSalonDetalis($id,SalonInterface $salonRepo,PositionInterface $positionRepo)
    {
        $result = $salonRepo->getOne($id);
        $data = [
            'salons'=>$result,
            'positions' => $positionRepo->getAll()
        ];
        return view('salon-admin.settings.edit-salon-detalis',$data);
    }

    /**
     * Edit Salon detalis
     * POST /salon/edit-salon-settings
     *
     * @param $id
     * @param Request $request
     * @param SalonInterface $salonRepo
     * @return redirect
     */
    public function postEditSalonSettings($id, Request $request, SalonInterface $salonRepo,AddressInterface $salonAddressRepo)
    {
        $result = $request->all();
        // dd($result);
        $lat =  $request->lat;
        $lng = $request->lng;
        $data = $request->addresses;
        foreach ($data as $key => $address){
            if($address == ''){
                return redirect()->back();
            }else{
            $dataArray[] = [
                'salon_id' => $id,
                'address' => $address,
                'lat' => $lat[$key],
                'lng' =>$lng[$key],
             ];
            } 
        }
        $validator = Validator::make($result, [
            'name' => 'required',
            'sub_domain' => 'required',
            'salon_email' => 'email',
        ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{
            $salon = $salonRepo->getOne($id);
            if($request->file('image')) {
                $imgName = $salon['image'];
                $filename = public_path() . '/assets/salon_images/' . $imgName;
                $status = \File::delete($filename);
                $logoFile = $request->file('image')->getClientOriginalExtension();
                $name = str_random(12);
                $path = public_path() . '/assets/salon_images/';
                $result_move = $request->file('image')->move($path, $name.'.'.$logoFile);
                $result['image'] = $name.'.'.$logoFile;
            }else{
                $result['image'] = $salon['image'];
            }
            $salonRepo->editSalon($id,$result);
            $salonAddressRepo->deleteAddresses($id);
            $salonAddressRepo->createAddresses($dataArray);    
            return redirect()->action('SalonAdminController@getSalonSettings');
            //return redirect()->back(); 
        }      
    }

    /**
     * Edit Salon Descriptions
     * POST /salon/edit-salon-Descriptions
     *
     * @param Request $request
     * @param SalonInterface $salonRepo
     * @return redirect
     */
    public function postEditSalonDescriptions(Request $request, SalonInterface $salonRepo)
    {
        $result = $request->all();
        if(Auth::user()->salon_id == $result['salon_id']){
            if ($result['desc_lang'] == 'ru') {
                $data['description_ru'] = $result['desc_text'];
            } else if ($result['desc_lang'] == 'am') {
                $data['description_am'] = $result['desc_text'];
            } else if ($result['desc_lang'] == 'en') {
                $data['description_en'] = $result['desc_text'];
            } else {
                return response()->json('false');
            }
            $salonRepo->editSalon($result['salon_id'],$data);
        }
        else{
            return response()->json('false');
        }     
    }

    /**
     * add salon category page
     * GET /salon/add-salon-category
     *
     * @param 
     * @return view
     */
    public function getAddSalonCategory()
    {
        return view('salon-admin.salon-service.add-salon-service-category');
    }

    /**
     * Add salon service page
     * GET /salon/add-salon-service
     *
     * @param CategoryInterface $serviceCategory
     * @return array
     */
    public function getAddSalonService(CategoryInterface $serviceCategory)
    {
        $id = Auth::id();
        $allCategory = $serviceCategory->getAll($id);
        $data = [
            'categorys' => $allCategory
        ];
        return view('salon-admin.salon-service.add-salon-service',$data);
    }
  

    /**
     *Add Deal Of The Day
     * POST /salon/add-deal-of-the-day
     *
     * @param Request $request
     * @param CategoryInterface $serviceCategory
     * @param SubscribeInterface $subscribeRepo
     * @return redirect
     */
    public function postAddDealOfTheDay(Request $request, SalonInterface $salonRepo, UserInterface $userRepo)
    {
        $id = Auth::id();
        $salon_admin = $userRepo->getOne($id);
        $salon_id = $salon_admin['salon_id'];
        $result = $request->all();
        $result['salon_id'] = $salon_id;
        $validator = Validator::make($result, [
            'description' => 'required',
        ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{
            $dealoftheday = $salonRepo->createDealOfTheDay($result);
        }
        return redirect()->back();
    }

    /**
     * Edit user detalis
     * POST /salon/edit-deal-of-the-day
     *
     * @param $id
     * @param Request $request
     * @param SalonInterface $salonRepo
     * @return redirect
     */
    public function postEditDealOfTheDay($id, Request $request, SalonInterface $salonRepo)
    {
        $result = $request->all();
        $salon = Auth::user()->salon;
        $salon_id = $salon->id;
        $result['salon_id'] = $salon_id;
        $deal_of_the_day = $salonRepo->getOneDeal($id);
        unset($result['_token']);
        $salonRepo->editDealOfTheDay($id,$result);
        return redirect()->back(); 
    }
    

    /**
     * Add Salon Services Category
     * POST /salon/add-salon-services-category
     *
     * @param Request $request
     * @param CategoryInterface $serviceCategory
     * @param SubscribeInterface $subscribeRepo
     * @return redirect
     */
    public function postAddSalonServicesCategory(Request $request, CategoryInterface $serviceCategory, SubscribeInterface $subscribeRepo)
    {
        $salon = Auth::user()->salon;
        $salon_id = $salon->id;
        $result = $request->all();
        $result['salon-admin-id'] = Auth::id();
        $validator = Validator::make($result, [
            'category' => 'required',
        ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{
            $category = $serviceCategory->createOne($result);
            $salon->salonCategory()->attach($category->id);
            return redirect()->back();
        } 
    }

    /**
     * Post add Salon services
     * POST /salon/add-salon-services
     *
     * @param Request $request
     * @param ServicesInterface $salonServiceRepo
     * @param CategoryInterface $serviceCategory
     * @param SubscribeInterface $subscribeRepo
     * @return redirect
     */
    public function postAddSalonServices(Request $request, ServicesInterface $salonServiceRepo, CategoryInterface $serviceCategory)
    {
        $result = $request->all();

        if(isset($result['salon-category-id'])){
            $salon_category_id = $result['salon-category-id'];
            $salon = Auth::user()->salon;
            $salon_id = $salon->id;

            $validator = Validator::make($result, [
                'services' => 'required',
                'service_prices_min' => 'required',
                'service_prices_max' => 'required',
            ]);
            if($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }else{
                $result['salon_admin_id'] = Auth::id();
                $salonService = $salonServiceRepo->createOneSalon($result);
                $service_id = $salonService->id;
                $param = [
                    'salon-category-id' => $salon_category_id,
                    'salon-id' => $salon_id,
                    'salon-service-id' => $service_id
                ];
                $serviceCategory->createCategoryService($param);
                $status = 'service_create';
                return redirect()->action('SalonAdminController@getSalonCatService',[$salon_category_id]);
            }
        }else{
            return redirect()->back()->with('error_danger','Please add categorry');
        }
    }



    /**
     * Get Salon Service List
     * GET /salon/salon-category-list
     * 
     * @param CategoryInterface $salonServiceRepo
     * @return array
     */
    public function getSalonCategoryList(CategoryInterface $salonServiceRepo)
    {
        $id = Auth::id();
        $param = $salonServiceRepo->getall($id);
        $data = [
            'categorys' => $param
        ];
        return view('salon-admin.salon-service.salon-service-category-list',$data);
    }

    /**
     * Get Salon service
     * GET /salon/salon-cat-service
     *
     * @param $category_id
     * @param CategoryInterface $salonServiceRepo
     * @return array
     */
    public function getSalonCatService($category_id, CategoryInterface $salonServiceRepo)
    {
        $result = $salonServiceRepo->salonCategoryService($category_id);
        $services = [];
        foreach ($result as $key => $value) {
            foreach ($value->salonCategoryService as $serviceKey => $service) {
                array_push($services,$service);
            }
        }
        $data = [
            'category_id' => $category_id,
            'services' => $services
        ];
        return view('salon-admin.salon-service.salon-service-list',$data);
    }

    /**
     * Get Add workers jobs
     *
     * @param $cat_id
     * @return view
     */
    public function getAddWorkersJobs($cat_id,UserInterface $userRepo,AlbumInterface $albomRepo)
    {
        $salon_id = Auth::id();
        $workers = $userRepo->getSalonWorkerCategory($salon_id,$cat_id);
        $data = [
            'category_id'=> $cat_id,
            'workers'=>$workers
        ];
        return view('salon-admin.salon-service.worker-jobs-image',$data);
    }

    /**
     * 
     */
    public function getSelectAlbomWorker($worker_id,AlbumInterface $albomRepo)
    {
        $result = $albomRepo->getThisWorkerAlbums($worker_id);
        return response()->json($result);
    }

    /**
     * Add Worker Jobs
     * 
     * @param $request
     * @param $workerRepo
     * @return redirect
     */
    public function postAddWorkersJobs(request $request,WorkersJobsInterface $workerRepo)
    {
        $result = $request->all();
        unset($result['_token']);
        if ($result['images'][0] == null) {
            return redirect()->back()->with('error_danger','Please Select Images');             
        }else if(!isset($result['album_id'])){
            return redirect()->back()->with('error_danger','Please Select Album');   
        }else{
           foreach ($result['images'] as $key => $img) {
                $logoFile = $img->getClientOriginalExtension();
                $name = str_random(12);
                $path = public_path() . '/assets/salon_images/worker-jobs/';
                $result_move = $img->move($path, $name.'.'.$logoFile); 
                $data['worker_jobs_image'] = $name.'.'.$logoFile;
                $data['worker_id'] = $result['worker_id'];
                $data['salon_id'] = Auth::id();
                $data['category_id'] = $request['category_id'];
                $data['album_id'] = $request['album_id'];
                $workerRepo->createWorkersJobs($data);
            } 
        }
        return redirect()->back()->with('error','successfully uploade');
    }
        /**
     * Add Worker Jobs
     * 
     * @param $request
     * @param $workerRepo
     * @return redirect
     */
    public function postAddWorkersJobsImages($worker_id,$album_id,Request $request,UserInterface $userRepo,WorkersJobsInterface $workerRepo)
    {

        $result = $request->all();
        if(count($result['images'][0]) == 0){
            return redirect()->back()->with('error_danger','Image is required');
        }else{  
            $worker = $userRepo->getOne($worker_id);
            foreach ($result['images'] as $key => $img) {
                $logoFile = $img->getClientOriginalExtension();
                $name = str_random(12);
                $path = public_path() . '/assets/salon_images/worker-jobs/';
                $result_move = $img->move($path, $name.'.'.$logoFile); 
                $data['worker_jobs_image'] = $name.'.'.$logoFile;
                $data['worker_id'] = $worker_id;
                $data['salon_id'] = Auth::id();
                $data['category_id'] = $worker['category_id'];
                $data['album_id'] = $album_id;
                $workerRepo->createWorkersJobs($data);
            }
            return redirect()->back();
        }  
    }

    /**
     * 
     */
    public function postWorkersJobs(request $request,UserInterface $userRepo,AlbumInterface $albomRepo)
    {   
        $salon_id = $request['salon_id'];
        $category_id = $request['category_id'];
        $worker_id = $request['worker_id'];
        $worker = $userRepo->getOne($worker_id);
        $jobs = $albomRepo->getThisWorkerAlbums($worker_id);
        return response()->json(['worker'=>$worker,'jobs'=>$jobs]);
    }

    /**
     * 
     */
    public function getAlbumImages($album_id,WorkersJobsInterface $workerRepo, AlbumInterface $albomRepo)
    {
        $result = $workerRepo->getAlbomImages($album_id);
        $album = $albomRepo->getOneAlbum($album_id);
        $worker_id =$album['worker_id'];
        $data = [
            'album_images'=>$result,
            'worker_id' => $worker_id,
            'album_id' => $album_id
        ];
        return view('salon-admin.salon-worker.album-images',$data);
    }

    /**
     * Delete worker jobs
     *
     * @param $id
     * @param $workerRepo
     * @param response
     */
    public function getDeleteWorkerJob($id,WorkersJobsInterface $workerRepo)
    {
        $oneWork = $workerRepo->getOne($id);
        $path = public_path() . '/assets/salon_images/worker-jobs/'.$oneWork->worker_jobs_image;
        File::delete($path);
        $workerRepo->deleteWorkerJobs($id);
        return response()->json();
    }


    /**
     * Delete Salon Service
     * GET /salon/salon-service-delete
     *
     * @param $id
     * @param ServicesInterface $salonServiceRepo
     * @return redirect
     */
    public function getSalonServiceDelete($id, CategoryInterface $saloncatRepo, ServicesInterface $salonServiceRepo, NotificationInterface $notificationRepo)
    {
        $service = $salonServiceRepo->getOne($id);
        $notifications = $notificationRepo->getNotificByService($service->id);
        foreach ($notifications as $key => $notification) {
            $delete_not = $notificationRepo->deleteNotification($notification->id);
        }
        $catservice = $saloncatRepo->deleteCategorySer($service['id']);
        $salonServiceRepo->deleteOne($id);
        return redirect()->back();
    }

    /**
     * Get Service value
     * GET /salon/ajax-edit-service
     *
     * @param $id
     * @param ServicesInterface $salonServiceRepo
     * @return response
     */
    public function getAjaxEditService($id, ServicesInterface $salonServiceRepo)
    {
        $result = $salonServiceRepo->getOne($id);
        return response()->json($result);
    }

    /**
     * Get Service value
     * GET /salon/ajax-edit-category
     *
     * @param $id
     * @param CategoryInterface $categoryRepo
     * @return response
     */
    public function getAjaxEditCategory($id, CategoryInterface $categoryRepo)
    {
        $result = $categoryRepo->getOne($id);
        return response()->json($result);
    }

    /**
     * Edit user detalis
     * POST /salon/update-salon-category
     *
     * @param Request $request
     * @param CategoryInterface $categoryRepo
     * @return redirect
     */
    public function postUpdateSalonCategory(Request $request, CategoryInterface $categoryRepo)
    {
        $result = $request->all();
        $id = $result['category_id'];
        $validator = Validator::make($result, [
            'category' => 'required',
        ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{
            unset($result['category_id']);
            unset($result['_token']);
            $categoryRepo->editOne($id,$result);
        }
        return redirect()->back();
    }

    /**
     * 
     */
    public function getEditSalonService($id,ServicesInterface $salonServiceRepo)
    {
        $result = $salonServiceRepo->getOne($id);
        $data = [
            'salonservices'=>$result
        ];
        return view('salon-admin.salon-service.edit-service-detalis',$data);
    }
    /**
     * Get update Salon Service
     * GET /salon/update-service
     *
     * @param $id
     * @param Request $request
     * @param ServicesInterface $salonServiceRepo
     * @param SubscribeInterface $subscribeRepo
     * @return response
     */
    public function postUpdateService($id, Request $request, ServicesInterface $salonServiceRepo, SubscribeInterface $subscribeRepo)
    { 
        $result = $request->all();
        $service = $salonServiceRepo->getOne($id);
        $new_price = $result['discount']; 
        $old_price = $service['discount'];
        $salon = Auth::user()->salon;
        $salon_id = $salon->id;
        $salonServiceRepo->editSalon($id,$result);
        $salonService = $salonServiceRepo->getOne($id);
        return redirect()->back()->with('error','update successful');
    }

    /**
     * Get Salon Worker Page
     * GET /salon/add-salon-worker
     *
     * @param CategoryInterface $servicesRepo
     * @return array
     */
    public function getAddSalonWorker(CategoryInterface $servicesRepo)
    {
        $id = Auth::id();
        $categorys = $servicesRepo->getAll($id);
        $prof = [];
        $prof[] = "Select Category";
        foreach($categorys as $category){
            $prof[$category->id] = $category->category;
        }
        if(count($prof) == ''){
            $data = [
                'prof' => ''
            ];
        }else{
            $data = [
                'prof' => $prof
            ];  
        }       
        return view('salon-admin.salon-worker.add-salon-worker',$data);
    }

    /**
     * Post Add salon worker
     * POST /salon/add-salon-worker
     *
     * @param SalonAdminWorkerRequest $request
     * @param UserInterface $userRepo
     * @return redirect
     */
    public function postAddSalonWorker(SalonAdminWorkerRequest $request, UserInterface $userRepo)
    {
        $id = Auth::id();       
        $result = $request->all();

        if ($request->file('profile_picture')) {
            $logoFile = $request->file('profile_picture')->getClientOriginalExtension();
            $name = str_random(12);
            $path = public_path() . '/assets/salon-worker/worker-images/';
            $result_move = $request->file('profile_picture')->move($path, $name.'.'.$logoFile);
            $result['profile_picture'] = $name.'.'.$logoFile;
        }
        $result['salon_admin_id'] = (int)$id;
        $result['role'] = 'salon_worker';
        $result['activ_inactive'] = 'inactive';
        $userRepo->createOne($result);
        return redirect()->action('SalonAdminController@getSalonWorkerList');
    }

    /**
     * Get Salon workers list
     * GET /salon/salon-worker-list
     * 
     * @param SalonInterface $salonRepo
     * @param CategoryInterface $serviceCategory
     * @return array
     */
    public function getSalonWorkerList(SalonInterface $salonRepo, CategoryInterface $serviceCategory)
    {
        $id = Auth::id();
        $result = $salonRepo->salonWorkerList($id);
        if(count($result) == 0){
            $message = "Not workers";
            $data = [
                'message' => $message,
                'prof' => ''
            ];
            return view('salon-admin.salon-worker.salon-worker-list',$data);
        }else{
            $allCategory = $serviceCategory->getAll($id);
            $prof = [];
            $prof['0'] = "Select Category";
            foreach($allCategory as $category){
                $prof[$category->id] = $category->category;
            }
            $data = [
                'workers' => $result,
                'prof' => $prof,
            ];          
            return view('salon-admin.salon-worker.salon-worker-list',$data);
        }
    }

    /**
     * Delete Salon worker
     * GET /salon/salon-worker-delete
     *
     * @param $id
     * @param UserInterface $userRepo
     * @param MessageInterface $reviewRepo
     * @param NotificationInterface $notificationRepo
     * @return redirect
     */
    public function getSalonWorkerDelete($id, UserInterface $userRepo)
    {
        $result = $userRepo->getOne($id);
        if($result->profile_picture != null){
            $filename = public_path() . '/assets/salon-worker/worker-images/' . $result->profile_picture;
            $status = \File::delete($filename);
        }
        $userRepo->deleteSalonWorker($id);
        return redirect()->back();
    }

    /**
     * Delete Salon worker
     * GET /salon/salon-category-delete
     *
     * @param $category_id
     * @param CategoryInterface $serviceCategoryRepo
     * @param ServicesInterface $serviceRepo
     * @return redirect
     */
    public function getSalonCategoryDelete($category_id, CategoryInterface $serviceCategoryRepo, ServicesInterface $serviceRepo)
    {
        $result = $serviceCategoryRepo->salonCategoryService($category_id);
        foreach ($result as $key => $category) {
           foreach ($category['salonCategoryService'] as $key => $service) {
                $serviceRepo->deleteOne($service->id);
                $serviceCategoryRepo->deleteServicesByCategoryId($category_id,$service->id);
           }
        }
        $category = $serviceCategoryRepo->getOne($category_id);
        $serviceCategoryRepo->deleteCategoryFild($category_id);
        return redirect()->back(); 
    }
   
    /**
     * ajax worker detalis
     * GET /salon/salon-category-delete
     *
     * @param $id
     * @param UserInterface $userRepo
     * @return response
     */
    public function getAjaxEditWorkerDetalis($id, UserInterface $userRepo)
    {
        $result = $userRepo->getOne($id);
        return response()->json($result);
    }

    /**
     * Edit user detalis
     * POST /salon/update-salon-worker-detalis
     *
     * @param Request $request
     * @param UserInterface $userRepo
     * @return redirect
     */
    public function postUpdateSalonWorkerDetalis(Request $request, UserInterface $userRepo)
    {
        $id = $request->get('worker_id');
        $result = $request->all();
        $row = $userRepo->getOne($id);
        $oldEmail = $row->email;
        $newEmail = $result['email'];
        unset($result['_token']);
        unset($result['worker_id']);
        $validator = Validator::make($result, [
            'firstname' => 'required',
            'lastname'  => 'required',
            'phone' => 'required',
            'profession' => 'required',
            'email' => 'required',
        ]);
        if($validator->fails()) {
            return redirect()->back()->with('error_danger','firstname,lastname,phone,email,profession is required');;
        }else{
            if($userRepo->getEmail($id,$result['email'])->all()){
                return redirect()->back()->with('error_danger','This email has already been taken');
            }else{
                if($oldEmail == $newEmail && $request->file('profile_picture')){
                    $imgName = $row['profile_picture'];
                    $filename = public_path() . '/assets/salon-worker/worker-images/' . $imgName;
                    $status = \File::delete($filename);
                    unset($result['email']);
                    $logoFile = $request->file('profile_picture')->getClientOriginalExtension();
                    $name = str_random(12);
                    $path = public_path() . '/assets/salon-worker/worker-images/';
                    $result_move = $request->file('profile_picture')->move($path, $name.'.'.$logoFile);
                    $result['profile_picture'] = $name.'.'.$logoFile;
                }
                elseif($request->file('profile_picture')) {
                    $imgName = $row['profile_picture'];
                    $filename = public_path() . '/assets/salon-worker/worker-images/' . $imgName;
                    $status = \File::delete($filename);
                    $logoFile = $request->file('profile_picture')->getClientOriginalExtension();
                    $name = str_random(12);
                    $path = public_path() . '/assets/salon-worker/worker-images/';
                    $result_move = $request->file('profile_picture')->move($path, $name.'.'.$logoFile);
                    $result['profile_picture'] = $name.'.'.$logoFile;
                }
                $userRepo->editUser($result,$id);
            }
            return redirect()->back();
        }     
    }

    /**
     * Active and passive salon worker
     * POST /salon/activation-salon-worker
     *
     * @param $id
     * @param UserInterface $userRepo
     * @return response
     */
    public function getActivationSalonWorker($id, UserInterface $userRepo)
    {
        $row = $userRepo->getOne($id);
        if($row['activ_inactive'] == 'active'){
            $result['activ_inactive'] = 'inactive';
        }else if($row['activ_inactive'] == 'inactive'){
            $result['activ_inactive'] = 'active';
        }
        $userRepo->editUser($result,$id);
        return response()->json($result); 
    }

    /**
     * Get worker jobs
     * GET /salon/add-salon-worker-jobs
     * 
     * @param SalonInterface $salonRepo
     * @return array
     */
    public function getAddSalonWorkerJobs(SalonInterface $salonRepo)
    {
        $id = Auth::id();
        $result = $salonRepo->salonWorkerList($id);
        $data = [
            'workers' => $result,
        ];
        return view('salon-admin.salon-worker.add-salon-workers-jobs',$data);
    }

    /**
     * Get add Worker works
     * GET /salon/add-works
     *
     * @param $id
     * @param $albomRepo
     * @return array
     */
    public function getAddWorks($id, AlbumInterface $albomRepo)
    {
        $data = [
            'id' => $id
        ];
        return view('salon-admin.salon-worker.add-salon-worker-albom',$data);
    }

    /**
     * Post add Worker Albom
     * POST /salon/add-album
     * 
     * @param $id 
     * @param AlbumRequest $request
     * @param AlbumInterface $albomRepo
     * @return redirect 
     */
    public function postAddAlbom($id, AlbumRequest $request, AlbumInterface $albomRepo)
    {
        $result = $request->all();
        if($request->file('album_prof_pic')){
            $logoFile = $request->file('album_prof_pic')->getClientOriginalExtension();
            $name = str_random(12);
            $path = public_path() . '/assets/salon-worker/album-profile-pictures/';
            $result_move = $request->file('album_prof_pic')->move($path, $name.'.'.$logoFile);            
            $result['album_prof_pic'] = $name.'.'.$logoFile;
        }
        $result['worker_id'] = $id;     
        $albomRepo->createAlbum($result);
        return redirect()->action('SalonAdminController@getSalonWorkerAlbomList',$id);
    }

    /**
     * Get albom workers List
     * POST /salon/salon-worker-albom-list
     *
     * @param $id
     * @param AlbumInterface $albomRepo
     * @return array
     */
    public function getSalonWorkerAlbomList($id, AlbumInterface $albomRepo)
    {
        $result = $albomRepo->getThisWorkerAlbums($id);
        $data = [
            'id' => $id,
            'alboms' => $result 
        ];
        return view('salon-admin.salon-worker.salon-worker-albom-list',$data);
    }

    /**
     * 
     */
    public function postEditWorkerAlbumImage(request $request,AlbumInterface $albumRepo)
    {
        $result = $request->all();
        if(isset($result['album_name'])){
            unset($result['_token']);
            $id = $result['album_id'];
            $albumRow = $albumRepo->getOneAlbum($id);
            if($albumRow->album_prof_pic != null){
                $oldPath = public_path().'/assets/salon-worker/album-profile-pictures/'.$albumRow->album_prof_pic;
                File::delete($oldPath);
            }
            $logoFile = $result['album_name']->getClientOriginalExtension();
            $name = str_random(12);
            $path = public_path() . '/assets/salon-worker/album-profile-pictures';
            $result_move = $result['album_name']->move($path, $name.'.'.$logoFile);            
            $data['album_prof_pic'] = $name.'.'.$logoFile;
            $albumRepo->getUpdateAlbum($id,$data);
            return redirect()->back();
        }else{
            return redirect()->back()->with('error_danger','Please select Image');
        }
        
    }


    /**
     * Post Salon worker Images
     * POST /salon/salon-worker-albom-images
     *
     * @param $worker_id
     * @param $albom_id
     * @param ImageInterface $imageRepo
     * @param Request $request
     * @return redirect
     */
    // public function postSalonWorkerAlbomImages($worker_id, $albom_id, ImageInterface $imageRepo, Request $request)
    // {
    //     $result = $request->all();
    //     if(count($result['image_name'][0]) == 0){
    //         return redirect()->back()->with('error_danger','image name required');
    //     }else{        
    //         unset($result['_token']);
    //         foreach ($result['image_name'] as $key => $img) {
    //             $logoFile = $img->getClientOriginalExtension();
    //             $name = str_random(12);
    //             $path = public_path() . '/assets/salon-worker/album-images/';
    //             $result_move = $img->move($path, $name.'.'.$logoFile);            
    //             $result['image_name'] = $name.'.'.$logoFile;
    //             $result['worker_id'] = $worker_id;
    //             $result['album_id'] = $albom_id;
    //             $imageRepo->createImage($result);
    //         }
    //         return redirect()->back();
    //     }
    // }

    /**
     * get edit salon name
     *
     * @param $id
     * @param $request
     * @param $albomRepo
     * @return response
     */
    public function getEditWorkerAlbomName($id,Request $request,AlbumInterface $albomRepo)
    {
        $result = $albomRepo->getOneAlbum($id);
       // $param = $request['album_name'];
        $data = [
           'album_name' => $request['album_name'],
        ];
        $albomRepo->getUpdateAlbum($id,$data);
        return response()->json($data);
    }

    /**
     * Get Delete worker Job
     * GET /salon/delete-worker-jobs
     *
     * @param $id
     * @param ImageInterface $imageRepo
     * @return response
     */
    // public function getDeleteWorkerJobs($id, ImageInterface $imageRepo)
    // {
    //     $result = $imageRepo->getOne($id);
    //     $imgName = $result->image_name;
    //     $imageRepo->deleteOneImage($id);
    //     $filename = public_path() . '/assets/salon-worker/album-images/' . $imgName;
    //     $status = \File::delete($filename);
    //     return response()->json($status);
    // }

    /**
     * get Portfolio page
     * GET /salon/portfolio
     *
     * @param $worker_id
     * @return array
     */
    public function getPortfolio($worker_id){
        $data = [
            'id' => $worker_id
        ];
        return view('salon-admin.salon-worker.portfolio',$data);
    }

    /**
     * get Certificates
     * GET /salon/certificates
     *
     * @param $worker_id
     * @param PortfolioInterface $porfolioRepo
     * @return response
     */
    public function getCertificates($worker_id, PortfolioInterface $porfolioRepo){

        $result = $porfolioRepo->getCertificates($worker_id);
        $data = [
            'id' => $worker_id,
            'certificates' => $result
        ];
        return view('salon-admin.salon-worker.certificates',$data);
    }

    /**
     * get Diplomas
     * GET /salon/diplomas
     *
     * @param $worker_id
     * @param PortfolioInterface $porfolioRepo
     * @return array
     */
    public function getDiplomas($worker_id, PortfolioInterface $porfolioRepo){
        $result = $porfolioRepo->getDiplomas($worker_id);
        $data = [
            'id' => $worker_id,
            'diplomas' => $result
        ];
        return view('salon-admin.salon-worker.diplomas',$data);
    }

    /**
     * Add Certificate
     * POST /salon/add-certificate
     *
     * @param $id
     * @param Request $request
     * @param PortfolioInterface $porfolioRepo
     * @return response
     */
    public function postAddCertificate($id, Request $request, PortfolioInterface $porfolioRepo){

        $result = $request->all();
        $validator = Validator::make($result, [
            'certificate' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $logoFile = $request->file('certificate')->getClientOriginalExtension();
        $certificateName = str_random(12);
        $path = public_path() . '/assets/salon-worker/certificates/';
        $result = $request->file('certificate')->move($path, $certificateName.'.'.$logoFile);
        $data = [
            'worker_id' => $id,
            'certificate' => $certificateName.'.'.$logoFile,
        ];
        $porfolioRepo->createCertificate($data);
        return redirect()->action('SalonAdminController@getCertificates',$id);
    }
    

    /**
     * Get Delete certificate
     * GET /salon/delete-worker-jobs
     *
     * @param $id
     * @param PortfolioInterface $porfolioRepo
     * @return response
     */
    public function getCertificateDelete($id, PortfolioInterface $porfolioRepo)
    {
        $result = $porfolioRepo->getOne($id);
        $imgName = $result->certificate;
        $filename = public_path() . '/assets/salon-worker/certificates/' . $imgName;
        $status = \File::delete($filename);
        $porfolioRepo->deletePortfolio($id);
        return redirect()->back();
    }

    /**
     * Get Delete certificate
     * GET /salon/delete-worker-jobs
     *
     * @param $id
     * @param PortfolioInterface $porfolioRepo
     * @return response
     */
    public function getDiplomaDelete($id, PortfolioInterface $porfolioRepo)
    {
        $result = $porfolioRepo->getOne($id);
        $imgName = $result->diploma;
        $filename = public_path() . '/assets/salon-worker/diplomas/' . $imgName;
        $status = \File::delete($filename);
        $porfolioRepo->deletePortfolio($id);
        return redirect()->back();
    }
    /**
     * Get Delete certificate
     * GET /salon/delete-worker-jobs
     *
     * @param $id
     * @param WorkersJobsInterface $workerjobsRepo
     * @return response
     */
    public function getAlbumDelete($id, AlbumInterface $albumRepo, WorkersJobsInterface $workerjobsRepo)
    {
        $images = $workerjobsRepo->getAlbomImages($id);
        foreach ($images as $image) {
            $imgName = $image->worker_jobs_image;
            $filename = public_path() . '/assets/salon_images/worker-jobs/' . $imgName;
            $status = File::delete($filename);
        }
        $album = $albumRepo->getOneAlbum($id);
        $imgName = $album ->album_prof_pic;
        $filename = public_path() . '/assets/salon-worker/album-profile-pictures/' . $imgName;
        $status = File::delete($filename);
        $albumRepo->deleteAlbum($id);
        return redirect()->back();
    }
    

    /**
     * Add Diploma
     * POST /salon/add-diploma
     *
     * @param $id
     * @param Request $request
     * @param PortfolioInterface $porfolioRepo
     * @return response
     */
    public function postAddDiploma($id, Request $request, PortfolioInterface $porfolioRepo)
    {
        $result = $request->all();
        $validator = Validator::make($result, [
            'diploma' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $diplomaFile = $request->file('diploma')->getClientOriginalExtension();
        $diplomaName = str_random(12);
        $path = public_path() . '/assets/salon-worker/diplomas/';
        $result = $request->file('diploma')->move($path, $diplomaName.'.'.$diplomaFile);
        $data = [
            'worker_id' => $id,
            'diploma' => $diplomaName. '.' .$diplomaFile,
        ];
        $porfolioRepo->createCertificate($data);
        return redirect()->action('SalonAdminController@getDiplomas',$id);
    }

    /**
     * Add salon image
     * GET /salon/add-image
     *
     * @param
     * @return array
     */
    public function getAddImage()
    {
        return view('salon-admin.salon-images.add-image');
    }

    /**
     * get salon image list
     * GET /salon/image-list
     *
     * @param
     * @return array
     */
    public function getImagesList(SalonInterface $salonimageRepo)
    {
        $salon = Auth::user()->salon;
        $salon_id = $salon['id'];
        $images = $salonimageRepo->getSalonImages($salon_id);
        $data = [
            'images' => $images,
        ];
        return view('salon-admin.salon-images.images-list',$data);
    }

    /**
     * Add salon service page
     * POST /salon/add-image
     *
     * @param Request $request
     * @param SalonInterface $salonimageRepo
     * @return redirect
     */
    public function postAddImage(Request $request, SalonInterface $salonimageRepo)
    {
        $salon = Auth::user()->salon;
        $salon_id = $salon['id'];
        $result = $request->all();
        if(count($result['image_name'][0]) == 0){
            return redirect()->back()->with('error_danger','Image is required');
        }else{        
            unset($result['_token']);
            foreach ($result['image_name'] as $key => $img) {
                $logoFile = $img->getClientOriginalExtension();
                $name = str_random(12);
                $path = public_path() . '/assets/salon_images/salon-images/';
                $result_move = $img->move($path, $name.'.'.$logoFile);            
                $result['image_name'] = $name.'.'.$logoFile;
                $result['salon_id'] = $salon_id;
                $salonimageRepo->createImage($result);
            }
            return redirect()->action('SalonAdminController@getImagesList');
        }
    }

    /**
     * delete salon image
     * GET /salon/salon-image-delete
     *
     * @param $id
     * @param SalonInterface $salonimageRepo
     * @return redirect
     */
    public function getSalonImageDelete($id, SalonInterface $salonimageRepo)
    {
        $image = $salonimageRepo->getOneSalonImage($id);
        $imgName = $image ->image_name;
        $filename = public_path() . '/assets/salon_images/salon-images/' . $imgName;
        $status = \File::delete($filename);
        $salonimageRepo->deleteOneSalonImage($id);
        return redirect()->back();
    }

    /**
     * 
     */
    // public function postSubscripSalon($salon_id,request $request,SubscribeInterface $subscripRepo)
    // {
    //     $email = $request->get('email');
    //     $validator = Validator::make($request->all(), [
    //         'email' => 'required',
    //     ]);
    //     if($validator->fails()) {
    //         return redirect()->back()->withErrors($validator);
    //     }else{
    //         $data = [
    //             'salon_id' => $salon_id,
    //             'email' => $email
    //         ];
    //         $subscripRepo->createOne($data);
    //         return redirect()->back()->with('error','You are subscripe to salon');
    //     }
        
    // }

    /**
     * 
     */
    public function getSubscripeUserList(SubscribeInterface $subscripRepo)
    {
        $salon = Auth::user()->salon;
        $result = $subscripRepo->getAll($salon->id);
        $data = [
            'emails' => $result
        ];
        return view('salon-admin.subscripe_user.subscripe_email_list',$data);
    }
    
}    
