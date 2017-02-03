<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\user\UsersCreateRequest;
use App\Http\Requests;
use App\Http\Requests\admin\AdminLoginRequest;
use App\Http\Requests\admin\AdminSalonRequest;
use App\Contracts\SalonInterface;
use App\Contracts\UserInterface;
use App\Contracts\NotificationInterface;
use App\Contracts\WorkersJobsInterface;
use App\Contracts\CategoryInterface;
use App\Contracts\ServicesInterface;
use App\Contracts\PortfolioInterface;
use App\Contracts\AlbumInterface;
use App\Contracts\ArticleInterface;
use App\Contracts\ArticleImagesInterface;
use App\Contracts\SubscribeInterface;
use App\Contracts\PositionInterface;
use App\Contracts\AddressInterface;
use View;
use Session;
use Validator;
use Auth;
use File;

class AdminController extends BaseController
{
    
    /**
     * Create a new instance of BaseController class.
     *
     * @return void
     */
	public function __construct(NotificationInterface $notificationRepo, UserInterface $userRepo,SubscribeInterface $subscribeRepo)
    {
        parent::__construct($notificationRepo, $userRepo,$subscribeRepo);
        $this->middleware('auth', ['except' => ['getLogin', 'postLogin','getLogout']]);
    }
    
    /**
     * The login page
     *
     * GET /admin/login
     * @return  view
     */
    public function getLogin()
    {
       return view('admin.login-admin.login-admin');
    }

    /**
     * Admin login
     * POST /admin/login
     *	
     * @param AdminLoginRequest $request
     * @return 	redirect
     */
    public function postLogin(AdminLoginRequest $request)
    {
    	$email = $request->get('email');
    	$password  = $request->get('password');
    	if(Auth::attempt ([
            'email'=>$email,
            'password'=>$password,
            'role' => 'main-admin'
            ]))
        {
        	return redirect()->action('AdminController@getDashboard');
        }else{

        	return redirect()->back()->with('error_danger', 'Invalid login or password');
        }
    }


    /**
     * Admin Logout
     * GET /admin/logout
     *
     * @param 
     * @return redirect
     */
    public function getLogout()
    {	
    	Auth::logout();
    	return redirect()->action('AdminController@getLogin');
    }

    /**
     * Dashboard page
     * GET /admin/dashboard
     *
     * @param 
     * @return redirect
     */
    public function getDashboard()
    {
    	return view('admin.dashboard.dashboard');
    }

    /**
     * add salon page
     * GET /admin/add-salon
     *
     * @param 
     * @return redirect
     */
    public function getAddSalon(PositionInterface $positionRepo)
    {
        $data=[
            'positions' => $positionRepo->getAll()
        ];
        return view('admin.salon.add-salon',$data);
    }

    /**
     * Add new salon 
     * POST /admin/add-salon
     * 
     * @param AdminSalonRequest $request
     * @param SalonInterface $salonRepo
     * @param UserInterface $userRepo
     * @return redirect
     */
    public function postAddSalon(AdminSalonRequest $request, SalonInterface $salonRepo, UserInterface $userRepo)
    {
        $result = $request->all();
        if(isset($result['image'])){
            $logoFile = $request->file('image')->getClientOriginalExtension();
            $name = str_random(12);
            $path = public_path() . '/assets/salon_images/';
            $result_move = $request->file('image')->move($path, $name.'.'.$logoFile);
            $result['image'] = $name.'.'.$logoFile;
        }
        $result['salon_email'] = $result['email'];
        $salon = $salonRepo->createOneSalon($result);
        $data_user['firstname'] = $result['firstname'];
        $data_user['password'] = bcrypt($result['password']);
        $data_user['email'] = $result['email'];
        $data_user['role'] = 'salon_admin';
        $data_user['position'] = $result['position'];
        $data_user['salon_id'] = $salon->id;
        $userRepo->createOne($data_user);
        return redirect()->action('AdminController@getSalonList');
    }


    /**
     * get Salon list
     * GET /admin/salon-list
     *
     * @param SalonInterface $salonRepo
     * @return redirect
     */
    public function getSalonList(SalonInterface $salonRepo,AddressInterface $salonAddressRepo)
    {
        $result = $salonRepo->getAllSalons(); 
        $data = [
            'salons' => $result,
        ];
        return view('admin.salon.salon-list',$data);
    }

    /**
     * Delete One salon
     * GET /admin/delete-one-salon
     * 
     * @param $id
     * @param SalonInterface $salonRepo
     * @param UserInterface $userRepo
     * @return redirect
     */
    public function getDeleteOneSalon($id, SalonInterface $salonRepo,PortfolioInterface $portfolioRepo,AlbumInterface $albumRepo, WorkersJobsInterface $workerjobRepo, UserInterface $userRepo, CategoryInterface $categoryRepo, ServicesInterface $serviceRepo)
    {
        $salon = $salonRepo->getOne($id);
        $salon_admin = $userRepo->getAdmin($salon['id']);
        $delete_salon_admin = $userRepo->deleteSalonWorker($salon_admin['id']);
        $imgName = $salon['image'];
        $filename = public_path() . '/assets/salon_images/' . $imgName;
        $status = File::delete($filename);
        $salon_images = $salonRepo->getSalonImages($id);
        $deal_of_the_day = $salonRepo->getOneDeal($id);
        if(isset($deal_of_the_day->picture) && $deal_of_the_day->picture != null){
            $imgName = $deal_of_the_day['picture'];
            $filename = public_path() . '/assets/salon_images/deal_of_the_day/' . $imgName;
            $status = \File::delete($filename);
        }
        $SalonCategories = $categoryRepo->getAll($salon_admin['id']);
        foreach ($SalonCategories as $key => $SalonCategory) {
            $imgName = $SalonCategory['image'];
            $filename = public_path() . '/assets/salon_images/category/' . $imgName;
            $status = File::delete($filename);
        }
        $salon_category = $categoryRepo->deleteSalonCategory($salon_admin['id']);
        $salon_services = $serviceRepo->deleteAdmiServices($salon_admin['id']);

        foreach ($salon_images as $key => $img) {
            $imgName = $img['image_name'];
            $filename = public_path() . '/assets/salon_images/salon-images/' . $imgName;
            $status = File::delete($filename);
        }
        $salon_workers = $userRepo->salonstaff($salon_admin['id']);
        foreach ($salon_workers as $key => $salon_worker) {
            $diplomas = $portfolioRepo->getDiplomas($salon_worker['id']);
            if(!empty($diplomas)){
                foreach($diplomas as $key => $diploma){
                    $imgName = $diploma['diploma'];
                    $filename = public_path() . '/assets/salon-worker/diplomas/' . $imgName;
                    $status = \File::delete($filename);
                }
            }
            if($salon_worker->profile_picture != null){
                $imgName = $salon_worker['profile_picture'];
                $filename = public_path() . '/assets/salon-worker/worker-images/' . $imgName;
                $status = \File::delete($filename);
            }
            $certificates = $portfolioRepo->getCertificates($salon_worker['id']);
            if(!empty($certificates)){
                foreach ($certificates as $key => $certificate){
                    $imgName = $certificate['certificate'];
                    $filename = public_path() . '/assets/salon-worker/certificates/' . $imgName;
                    $status = \File::delete($filename);
                }
            }
            $albums = $albumRepo->getThisWorkerAlbums($salon_worker['id']);
            if(!empty($albums)){
                foreach ($albums as $key => $album){
                    $imgName = $album['album_prof_pic'];
                    $filename = public_path() . '/assets/salon-worker/album-profile-pictures/' . $imgName;
                    $status = \File::delete($filename);
                }
            }
            $delete_worker = $userRepo->deleteUser($salon_worker['id']);
        }
        $workerjobs = $workerjobRepo->getSalonWorkerJobs($salon_admin['id']);
        foreach ($workerjobs as $key => $workerjob) {
            $imgName = $workerjob['worker_jobs_image'];
            $filename = public_path() . '/assets/salon_images/worker-jobs/' . $imgName;
            $status = File::delete($filename);
        }
        $delete_worker_jobs = $workerjobRepo->deleteSalonWorkerJobs($salon_admin['id']);
        $salon_images = $salonRepo->getSalonImages($id);
        if($salon_images){
            $delete_salon_images = $salonRepo->deletesalonImages($id);
        }
        $salonRepo->deleteOne($id);
        return redirect()->back();
    }


    /**
     * edit salon
     * GET /admin/axaj-edit
     * 
     * @param $id
     * @param SalonInterface $salonRepo
     * @return response
     */
    public function getEditSalonDetalis($id,SalonInterface $salonRepo,PositionInterface $positionRepo)
    {
        $result = $salonRepo->getOne($id);
        // dd($result);
        $position = $positionRepo->getAll();
        $data = [
            'salons'=>$result,
            'positions' => $position
        ];
        return view('admin.salon.edit-salon-detalis',$data);
    }

    /**
     * Edit salon detalis
     * GET /admin/edit-salon
     *  
     * @param $id
     * @param Request $request
     * @param SalonInterface $salonRepo
     * @return response
     */
    public function postEditSalonDetalis($id,request $request,SalonInterface $salonRepo)
    {   
        $pic = $salonRepo->getOne($id);
        $result = $request->all();
        $validator = Validator::make($result, [
            'name' => 'required',
            'address1' => 'required',
        ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{
            if(isset($result['image'])){
                if($pic->image != null){
                    $oldPath =  public_path(). '/assets/salon_images/'. $pic->image;
                    File::delete($oldPath);
                    $logoFile = $request->file('image')->getClientOriginalExtension();
                    $name = str_random(12);
                    $path = public_path() . '/assets/salon_images/';
                    $result_move = $request->file('image')->move($path, $name.'.'.$logoFile);
                    $result['image'] = $name.'.'.$logoFile;     
                }else{
                    $logoFile = $request->file('image')->getClientOriginalExtension();
                    $name = str_random(12);
                    $path = public_path() . '/assets/salon_images/';
                    $result_move = $request->file('image')->move($path, $name.'.'.$logoFile);
                    $result['image'] = $name.'.'.$logoFile;
                }    
            }
            unset($result['_token']);
            $salonRepo->editSalon($id,$result);
        }
        return redirect()->action('AdminController@getSalonList');  
    }
    
    /**
     * 
     */
    public function getEditSalon($id, Request $request, SalonInterface $salonRepo)
    {
        $result = $request->all();
        $validator = Validator::make($result, [
            'name' => 'required',
            'sub_domain' => 'required',
        ]);
        if($validator->fails()) {
            return response()->json('error');
        }else{
            $salonRepo->editSalon($id,$result);
            return response()->json($result);
        }
    }

    /**
     * Edit salon status
     * GET /admin/edit-status
     *  
     * @param $salon_id
     * @param SalonInterface $salonRepo
     * @return response
     */
    public function getEditStatus($salon_id, SalonInterface $salonRepo)
    {
        $salon = $salonRepo->getOne($salon_id);
        if($salon['status'] == 1) {
            $data = [
                'status' => 0
            ];
            $salonRepo->editSalon($salon_id,$data);
        }else{
            $data = [
                'status' => 1
            ];
            $salonRepo->editSalon($salon_id,$data);
        }
        return response()->json($data);
    }

    /**
     * Edit salon slide-status
     * GET /admin/edit-slides-status
     *  
     * @param $salon_id
     * @param SalonInterface $salonRepo
     * @return response
     */
    public function getEditSlideStatus($salon_id, SalonInterface $salonRepo)
    {
        $salon = $salonRepo->getOne($salon_id);
        if($salon['slide_active'] == 1) {
            $data = [
                'slide_active' => 0
            ];
            $salonRepo->editSalon($salon_id,$data);
        }else{
            $data = [
                'slide_active' => 1
            ];
            $salonRepo->editSalon($salon_id,$data);
        }
        return response()->json($data);
    }

    /**
     * Edit salon-status
     * GET /admin/edit-salon-status
     *  
     * @param $salon_id
     * @param SalonInterface $salonRepo
     * @return response
     */
    public function getEditSalonStatus($salon_id, SalonInterface $salonRepo)
    {
        $salon = $salonRepo->getOne($salon_id);
        if($salon['salon_status'] == 1) {
            $data = [
                'salon_status' => 0,
                'slide_active' => 0,
                'status' => 0
            ];
            $salonRepo->editSalon($salon_id,$data);
        }else{
            $data = [
                'salon_status' => 1
            ];
            $salonRepo->editSalon($salon_id,$data);
        }
        return response()->json($data);
    }

    /**
     * Get users list
     *
     * @param $userRepo
     * @return view
     */
    public function getUsersList(UserInterface $userRepo)
    {
        $result = $userRepo->getAllUsers();
        $data = [
            'users'=>$result
        ];
        return view('admin.user.user-list',$data);
    }

    /**
     * Get Add user
     *
     * @param 
     * @return view 
     */
    public function getAddUser()
    {
        return view('admin.user.add-user');
    }

    /**
     * 
     */
    public function postAddUser(UsersCreateRequest $request,UserInterface $userRepo)
    {
        $result = $request->inputs();
        if ($request->file('profile_picture')) {
            $logoFile = $request->file('profile_picture')->getClientOriginalExtension();
            $name = str_random(12);
            $path = public_path() . '/assets/user/user_images/';
            $result_move = $request->file('profile_picture')->move($path, $name.'.'.$logoFile);
            $result['profile_picture'] = $name.'.'.$logoFile;
        }
        $result['role'] = 'user';
        $result['activ_inactive'] = 'active';
        $result['active_user'] = 1;
        $userRepo->createOne($result);
        return redirect()->action('AdminController@getUsersList');    
    }

    /**
     * Get Edit One user
     *
     * @param $id
     * @param $userRepo
     * @return view
     */
    public function getEditOneUser($id,UserInterface $userRepo)
    {   
        $result = $userRepo->getOne($id);
        $data = [
            'users'=>$result
        ];
        return view('admin.user.edit-user',$data);
    }

    /**
     * Post edit One user
     * 
     * @param $id
     * @param $request
     * @param $userRepo
     * @return redirect
     */
    public function postEditOneUser($id,request $request,UserInterface $userRepo)
    {
       $data = $request->all();
       $pic = $userRepo->getOne($id);
       if(isset($data['profile_picture'])){
            if($pic->profile_picture != null){
                $oldPath =  public_path(). '/assets/user/user_images/'. $pic->profile_picture;
                File::delete($oldPath);
                $logoFile = $request->file('profile_picture')->getClientOriginalExtension();
                $name = str_random(12);
                $path = public_path() . '/assets/user/user_images/';
                $result_move = $request->file('profile_picture')->move($path, $name.'.'.$logoFile);
                $data['profile_picture'] = $name.'.'.$logoFile;     
            }else{
                $logoFile = $request->file('profile_picture')->getClientOriginalExtension();
                $name = str_random(12);
                $path = public_path() . '/assets/user/user_images/';
                $result_move = $request->file('profile_picture')->move($path, $name.'.'.$logoFile);
                $data['profile_picture'] = $name.'.'.$logoFile;
            }    
       }
       unset($data['_token']);
       $userRepo->editUser($data,$id);
       return redirect()->action('AdminController@getUsersList');
    }

    /**
     * Get Delete One User
     *
     * @param $id
     * @param $userRepo 
     * @return redirect 
     */
    public function getDeleteOneUser($id,UserInterface $userRepo)
    {
        $pic = $userRepo->getOne($id);
        if($pic->profile_picture != null)
        {
            $path =  public_path(). '/assets/user/user_images/'. $pic->profile_picture;
            File::delete($path);
        }
        $userRepo->deleteUser($id);
        return redirect()->back()->with('error', 'You are delete User');
    }

    /**
     * Activation user
     *
     * @param $id
     * @param $userRepo
     * @return response
     */
    public function getActiveUser($id,UserInterface $userRepo)
    {
        $result = $userRepo->getOne($id);
        $active = $result->active_admin_user;
        if($active == 0){
            $data = [
                'active_admin_user' => 1
            ];
        }else{
            $data = [
                'active_admin_user' => 0
            ];
        }
        $userRepo->activeUser($data,$id);
        return response()->json($active);
    }

    /**
     * Get Add Articel Page
     *
     * @param
     * @return view
     */
    public function getAddArticle()
    {
        return view('admin.article.add-article');
    }

    /**
     * post Add Articel
     *
     * @param $request
     * @param $articleRepo
     * @return redirect
     */
    public function postAddArticle(request $request,ArticleInterface $articleRepo)
    {
        $result = $request->all();
        unset($result['_token']);
        $domain = 'youtube.com';
        $dns = dns_get_record($domain , DNS_A);
        $validator = Validator::make($result, [
            'title' => 'required',
            'description' => 'required',
            'article_image'=>'required',
            'article_video1' => 'active_url',
            'article_video2' => 'active_url',
        ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{
            $logoFile = $result['article_image']->getClientOriginalExtension();
            $name = str_random(12);
            $path = public_path() . '/assets/admin/images/article-images';
            $result_move = $result['article_image']->move($path, $name.'.'.$logoFile);
            if($result['article_video1'] != ''){
                 //dd(dns_get_record('youtube.com', DNS_A));
                try {
                    if ($dns && $dns != '') {
                       $dns = dns_get_record($domain , DNS_A);
                    }else{
                       return redirect()->back()->with('error_danger','dns_get_record(): A temporary server error occurred');
                    }
                    //$dns = dns_get_record($domain , DNS_A);
                }catch (Exception $e) {
                    if ($e->getMessage() !== 'dns_get_record(): A temporary server error occurred.') {
                        throw $e;
                    }
                    $dns = false;
                }
                $data['article_video1'] = $result['article_video1'];
            }
            if($result['article_video2'] != ''){      
                try {
                    $dns = dns_get_record($domain , DNS_A);
                }catch (Exception $e) {
                    if ($e->getMessage() !== 'dns_get_record(): A temporary server error occurred.') {
                        throw $e;
                    }
                    $dns = false;
                }
                $data['article_video2'] = $result['article_video1'];
            }

            $data['article_image'] = $name.'.'.$logoFile;
            $data['title'] = $result['title'];
            $data['description'] = $result['description'];
            $create_article = $articleRepo->createArticle($data);
            return redirect()->action('AdminController@getArticleList');
        }
    }

    /**
     * Article Albume
     * Get admin/article-album/$id
     *
     * @param $id
     * @return view
     */
    public function getArticleAlbum($id,ArticleInterface $articleRepo,ArticleImagesInterface $articleImagesRepo)
    {
        $result = $articleRepo->articleAlbum($id);
        $images = $articleImagesRepo->selectThisImages($id);
        $data = [
            'articles'=>$result,
            'images' => $images
        ];
        return view('admin.article.article-page',$data);
    }

    /**
     * Add article Images
     * POST admin/add-article-images
     *
     * @param $id
     * @return redirect
     */
    public function postAddArticleImages($id,request $request,ArticleImagesInterface $articleImagesRepo)
    {
        $result = $request->all();
        unset($result['_token']);
        if($result['article_image'][0] == null){
            return redirect()->back()->with('error_danger','Please select image');
        }else{
            foreach ($result['article_image'] as $key => $img) {
                $logoFile = $img->getClientOriginalExtension();
                $name = str_random(12);
                $path = public_path() . '/assets/admin/images/article-images';
                $result_move = $img->move($path, $name.'.'.$logoFile);
                $data['article_image'] = $name.'.'.$logoFile;
                $data['article_id'] = $id;
                $create_article = $articleImagesRepo->createImages($data);   
            }
            return redirect()->back()->with('error','Uploade succesfully');
        }

    }

    /**
     * Article list
     * GET admin/article/list
     *
     * @param $articleRepo
     * @return view
     */
    public function getArticleList(ArticleInterface $articleRepo)
    {
        $result = $articleRepo->getAll();
        $data = [
            'atricles'=>$result
        ];
        return view('admin.article.article-list',$data);
    }

    /**
     * Edit article images
     * GET admin/edit-article-images/$article_id/$article_iamge_id
     * 
     * @param $article_id 
     * @param $article_iamge_id
     * @return response
     */
    public function getEditArticleImages($article_id,$article_iamge_id,ArticleInterface $articleRepo,ArticleImagesInterface $articleImagesRepo)
    {
        $articleRow = $articleRepo->getOne($article_id);
        $articleImage = $articleImagesRepo->getOne($article_iamge_id);
        $articleRowImage = $articleRow->article_image;
        $articleImagesImg = $articleImage->article_image;
        $dataAricle = [
            'article_image' => $articleImagesImg
        ];
        $dataArticleImage = [
            'article_image' => $articleRowImage
        ];

        $articleImagesRepo->getUpdateArticleImages($article_iamge_id,$dataArticleImage);
        $articleRepo->getUpdateArticle($article_id,$dataAricle);
        return response()->json();
    }

    /**
     * Delete article
     * GET admin/delete/article/$id
     *
     * @param $id
     * @param $articleRepo
     * @param $articleImagesRepo
     * @return redirect
     */
    public function getDeleteArticle($id,ArticleInterface $articleRepo,ArticleImagesInterface $articleImagesRepo)
    {
        $result = $articleRepo->getOne($id);
        $articleMainImg = $result->article_image;
        $path = public_path() . '/assets/admin/images/article-images/'.$articleMainImg;
        $articleRepo->deleteArticle($id);
        File::delete($path);
        $articleImages = $articleImagesRepo->selectThisImages($id);
        foreach ($articleImages as $key => $value) {
            $imgpath = public_path() .'/assets/admin/images/article-images/'.$value->article_image;
            File::delete($imgpath);
            $articleImagesRepo->getDelete($value->id);
        }
        return redirect()->back()->with('error','Delete succesfully');
    }

    /**
     * Delete article image
     * GET admin/delete-article-image/$id
     * 
     * @param $id
     * @param $articleImagesRepo
     * @return redirect
     */
    public function getDeleteArticleImage($id,ArticleImagesInterface $articleImagesRepo)
    {
        $result = $articleImagesRepo->getOne($id);
        $path = public_path() . '/assets/admin/images/article-images/'.$result->article_image;
        File::delete($path);
        $articleImagesRepo->getDelete($id);
        return redirect()->back()->with('error','Delete succesfully');
    }

    /**
     * Edit article
     * GET admin/edit-article/$id
     *
     * @param $id
     * @param $articleRepo
     * @return view
     */
    public function getEditArticle($id,ArticleInterface $articleRepo)
    {
        $result = $articleRepo->getOne($id);
        $data = [
            'article'=>$result
        ];
        return view('admin.article.edit-article',$data);
    }

    /**
     * post edit article 
     *
     * @param $id
     * @param $articleRepo
     * @param $request
     * @return redirect
     */
    public function postEditArticle($id,ArticleInterface $articleRepo,request $request)
    {
        $result = $request->all();
        $validator = Validator::make($result, [
            'title' => 'required',
            'description' => 'required',
            'article_video' => 'active_url',
            'article_video2' => 'active_url',
        ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{
            if(isset($result['article_image'])){
                $articleRow = $articleRepo->getOne($id);
                $path = public_path() . '/assets/admin/images/article-images/'.$articleRow->article_image;
                File::delete($path);
                $logoFile = $result['article_image']->getClientOriginalExtension();
                $name = str_random(12);
                $path = public_path() . '/assets/admin/images/article-images';
                $data = [
                    'title'=>$result['title'],
                    'description'=>$result['description'],
                    'article_image'=>$name.'.'.$logoFile,
                    'article_video1'=>$result['article_video1'],
                    'article_video2'=>$result['article_video2']
                ];
                $result_move = $result['article_image']->move($path, $name.'.'.$logoFile);
            }else{
                $data = [
                    'title'=>$result['title'],
                    'description'=>$result['description'],
                    'article_video1'=>$result['article_video1'],
                    'article_video2'=>$result['article_video2']
                ];
            }
            $articleRepo->getUpdateArticle($id,$data);
            return redirect()->action('AdminController@getArticleList')->with('error','Update succesfully');
        }
    }

    /**
     * get subscribes users
     *
     * @param $subscribeRepo
     * @return redirect
     */
    public function getSuibscribedUsers(SubscribeInterface $subscribeRepo)
    {
        $subscribe_users = $subscribeRepo->SubscribedUsers();
        $data = [
            'subscribe_users' => $subscribe_users
        ];
        return view('admin.subscribe.subscribe_users',$data);
    }

    /**
     * send emails
     *
     * @param $subscribeRepo
     * @return redirect
     */
    public function postSendEmailUsersNewSalon(Request $request, SubscribeInterface $subscribeRepo)
    {
        $result = $request->all();
        $emails = $result['emails'];
        $message = $result['text'];
        foreach ($emails as $key => $email) {
            $data = [
                'message_salon' =>  $message,
                'email' => $email
            ];
            $subscribeRepo->SendEmailNewSalon($email,$data); 
        }
        return response()->json($result);
    }

    /**
     * 
    */
    public function getDeleteSubscribe($id, SubscribeInterface $subscribeRepo)
    {
        $subscribeRepo->DeleteSubscribeWeb($id);
        return redirect()->back()->with('error','Delete succesfully');
    }

    /**
     * 
    */
    public function getUnsubscribeUserWebSite($email, SubscribeInterface $subscribeRepo)
    {
        $subscribeRepo->DeleteSubscribeUserWeb($email);
            $data = [
                'email' => $email
            ];
        return view('admin.subscribe.unsubscribe_users',$data);
    }
    
}
