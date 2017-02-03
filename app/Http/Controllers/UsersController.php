<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\user\UsersCreateRequest;
use App\Http\Requests\user\UserUpdateRequest;
use App\Http\Requests\user\UserUpdatePasswordRequest;
use App\Http\Requests\user\MessageRequest; 
use App\Contracts\UserInterface;
use App\Contracts\SalonInterface;
use App\Contracts\AlbumInterface;
use App\Contracts\MessageInterface;
use App\Contracts\NotificationInterface;
use App\Contracts\ServicesInterface;
use App\Contracts\CategoryInterface;
use App\Contracts\PortfolioInterface; 
// use App\Contracts\ImageInterface;
use App\Contracts\SubscribeInterface;
use App\Contracts\WorkersJobsInterface;
use App\Contracts\ArticleInterface;
use App\Contracts\PositionInterface;
use App\Http\Requests;
use Auth;
use View;
use Session;
use Validator;
use Carbon\Carbon;
use File;
use Hash;
use Socialize;
use Cookie;

class UsersController extends BaseController
{

        /**
         * Object of SubscribeInterface class
         *
         * @var subscribeRepo
         */
        private $subscribeRepo;

        /**
         * Object of UserInterface class
         *
         * @var userRepo
         */
        private $userRepo;

        /**
         * Object of SalonInterface class
         *
         * @var salonRepo
         */
        private $salonRepo;

        /**
         * Object of CategoryInterface class
         *
         * @var serviceCategory
         */
        private $serviceCategory;

        /**
         * Object of MessageInterface class
         *
         * @var reviewRepo
         */
        private $reviewRepo;

        /**
         * Object of ServicesInterface class
         *
         * @var serviceRepo
         */
        private $serviceRepo;

        /**
         * Object of WorkersJobsInterface class
         *
         * @var workersJobsRepo
         */
        private $workersJobsRepo;

        /**
         * Object of AlbumInterface class
         *
         * @var albumRepo
         */
        private $albumRepo;

        /**
         * Object of PortfolioInterface class
         *
         * @var portfolioRepo
         */
        private $portfolioRepo;
                                               
        /**
         * Object of ArticleInterface class
         *
         * @var articleRepo
         */
         private $articleRepo;

        /**
         * Object of ArticleInterface class
         *
         * @var articleRepo
         */
         private $positionRepo;                                         
                                               
    /**
     * Create a new instance of BaseController class.
     *
     * @return void
     */
    public function __construct(NotificationInterface $notificationRepo,
                                   UserInterface $userRepo,
                                   SubscribeInterface $subscribeRepo,
                                   SalonInterface $salonRepo,
                                   CategoryInterface $serviceCategory,
                                   MessageInterface $reviewRepo,
                                   ServicesInterface $serviceRepo,
                                   WorkersJobsInterface $workersJobsRepo,
                                   AlbumInterface $albumRepo,
                                   PortfolioInterface $portfolioRepo,
                                   ArticleInterface $articleRepo,
                                   PositionInterface $positionRepo 
                                )
    { 
        parent::__construct($notificationRepo,$userRepo,$subscribeRepo);
        $this->middleware('user', ['except' => [
                                                    'getHome',
                                                    'postLogin',
                                                    'postRegistration',
                                                    'getActiveationProfile',
                                                    'getForgotPassword',
                                                    'postForgotPassword',
                                                    'getSetNewPassword',
                                                    'postSetNewPassword',
                                                    'postAddProfilePictures',
                                                    'getShowMoreSalon',
                                                    'getFacebookLogin',
                                                    'getFacebookCallback',
                                                    'getGoogleLogin',
                                                    'getGoogleCallback',
                                                    'postUserAddIsSalon',
                                                    'getLogOut',
                                                    'postSearch',
                                                    'getSalonServiceCategory',
                                                    'getSalonCategorysService',
                                                    'getWorkerProfile',
                                                    'getTheAlbum',
                                                    'postRegistered',
                                                    'getService',
                                                    'getBlog',
                                                    'getArticle',
                                                    'getMonthArticleList',
                                                    'postOneCategoryServices',
                                                    'getShowMoreReview',
                                                    'postSubscripSalon',
                                                    'postReviewLogin',
                                                    'getFirst',
                                                    'postCookie',
                                                    'postUserSubscribeWebSite',
                                                    'postUserSubscripSalon',
                                                    'getSubDomain'
                                                ]]);
        $this->middleware('language');

        $this->subscribeRepo = $subscribeRepo;
        $this->userRepo = $userRepo;
        $this->salonRepo = $salonRepo;
        $this->serviceCategory = $serviceCategory;
        $this->reviewRepo = $reviewRepo;
        $this->serviceRepo = $serviceRepo;
        $this->workersJobsRepo = $workersJobsRepo;
        $this->albumRepo = $albumRepo;
        $this->portfolioRepo = $portfolioRepo;
        $this->articleRepo = $articleRepo;
        $this->positionRepo = $positionRepo;

    }

    /**
     * 
     */
    public function getFirst()
    {
       return view('user.first');
    }
        /**
     * Get Forgot Password
     * GET /user/forgot-password
     * 
     * @param
     * @return view
     */
    public function postCookie(Request $request)
    {
        $result = $request->all();
        $country = $result['country'];
        $response = \Cookie::forever('country',$country);
        $cookie =  \Response::make('www')->withCookie($response);
        if($cookie){
            return redirect()->to('UsersController@getHome')->withCookie($response);
        }
    }

    /**
     * Sort Salon By Reating
     * GET /user/home
     *
     * @param SalonInterface $salonRepo
     * @param UserInterface $userRepo
     * @return array
     */
    public function getHome(Request $request)
    { 

        $locale = $request->segment(1);
        $country = Cookie::get('country');
        if(!isset($country)){ 
            return redirect()->action('UsersController@getFirst');
        }else{
        $data_countries = [];
        $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe"); 
            foreach ($countries as $key=>$value) {
                if($country == $value) {
                    unset($countries[$key]);
                }
            }
            array_unshift($countries, $country); 
            foreach ($countries as $key=>$value) {
                $data_countries[$value] = $value;
            }

        $all_salons = $this->salonRepo->getAll();

        $position = $this->positionRepo->getAll();

        $i = (int)'';
        $tempArray = [];
        if(count($all_salons) != 0){
            foreach($all_salons  as $salon){
                $result = $this->getSalonRaiting($salon->id,$this->userRepo);
                $salonImages = $this->salonRepo->getSalonImages($salon->id);
                $salons[] = array('salon' => $salon, 'raiting' => $result, 'salon_images' => $salonImages);    
            } 
            $sorted_raiting = $this->sortSalonByRating($salons);
            foreach ($sorted_raiting as $key => $value) {
                $tempArray[] = $salons[$key];
            }   
        }
        $offers = [];
        $offers_salons = $this->salonRepo->OffersSalons();
        if(count($offers_salons) != 0){
            foreach($offers_salons as $salon){
                //$salonImages = $this->salonRepo->getSalonImages($salon->id);
                $offers[] = array('salon' => $salon, 'offers_salon_images' => $salonImages);    
            }  
        }

        $last_articles = $this->articleRepo->getLastArticles();
        $articles = [];
        foreach($last_articles as $article){
            $article->description = strip_tags($article->description);
            if(strlen($article->description) > 75)
            {
                $article->description = substr($article->description, 0, 75).'...';
            }
            $articles[] = $article;
        } 
        $deal_of_the_days = $this->salonRepo->DealOfTheDaySalons();
        $salons_deal = [];
        $ids = [];
        foreach($deal_of_the_days as $deal_of_the_day){
            $salons_deal[] = $deal_of_the_day->salon;
            $ids[]  = $deal_of_the_day->salon['id'];
        } 
        $slides_salons = $this->salonRepo->SlideSalons()->toArray();
        foreach($slides_salons  as $key => $slide){
            if(in_array($slide['id'],$ids)) {
                unset($slides_salons[$key]);
            }
        }
        if(Auth::User() != null){
            $result = $this->userRepo->getOne(Auth::User()->id);
            if($result['facebook_id'] != null || $result['google_id'] != null){
                $datarray = [
                    'locale' => $locale,
                    'countries' => $data_countries,
                    'salons' => $tempArray,
                    'i' => $i,
                    'offers_salons' => $offers,
                    'slides' => $slides_salons,
                    'social' => '1',
                    'users' => $result,
                    'social_avatar' => $result->profile_picture,
                    'articles' => $articles,
                    'deal_salons' => $salons_deal,
                    'positions' => $position
                ];
            }else{
                $pic = $result->profile_picture;
                $datarray = [
                    'locale' => $locale,
                    'countries' => $data_countries,
                    'salons' => $tempArray,
                    'i' => $i,
                    'offers_salons' => $offers,
                    'slides' => $slides_salons,
                    'users' => $result,
                    'articles' => $articles,
                    'deal_salons' => $salons_deal,
                    'positions' => $position
                ];
            }
        }else{
            $datarray = [
                'locale' => $locale,
                'countries' => $data_countries,
                'salons' => $tempArray,
                'i' => $i,
                'offers_salons' => $offers,
                'slides' => $slides_salons,
                //'salonImages' => $salonImages, 
                'articles' => $articles,
                'deal_salons' => $salons_deal,
                'positions' => $position
            ];
        }
        // dd($slides_salons->addresses['']->address);
            return view('user.home', $datarray);
        }
    }


    /**
     * 
     */
    public function postSearch(Request $request)
    {   
        $result = $request->all();
        $salons_id= $result['salons_id'];
        $country_name = $result['position_id'];
        $category_id = $result['category_id'];
        $max_price = $result['max_price'];
        $min_price = $result['min_price'];
        $position = $result['position'];

        $data = [
            'salons'=>[],
        ];

        if($max_price != "" && $min_price != "") {
            $price_search = $this->serviceRepo->serachMinMaxPrice($min_price,$max_price);
            if($price_search != ""){ 
                foreach ($price_search as $key => $value) {
                    $search = $this->salonRepo->search($salons_id,$category_id,$value->id,$position);
                    if(count($search) > 0){
                        array_push($data['salons'],$search);
                    }

                }
            }
        }else{
            $search = $this->salonRepo->search($salons_id,$category_id,null,$position);
            array_push($data['salons'],$search);
        }

        if(count($data['salons']) == 0 || count($data['salons'][0]) == 0) {
            return response()->json(["status"=>"500"]);
        }
        $shearchView = view('user.search_result', $data)->render();
        return response()->json(["status"=>"200","resource"=>$shearchView]);
    }

    /**
     * Sort Salon By Reating
     *
     * @param $data
     * @return array
     */
    private function sortSalonByRating($data)
    {
        $tempArray = [];
        foreach ($data as $key => $value) {
            $tempArray[] = $value["raiting"];
        }
        arsort($tempArray);
        return $tempArray;
    }
   
    /**
     * Show more salon
     *
     * @param $id
     * @param SalonInterface $salonRepo
     * @param UserInterface $userRepo
     * @return json
     */
    public function getShowMoreSalon($id)
    {
        $showSalonLimit = $this->salonRepo->showMoreSalon($id);
        $dataArray = [
            'salon' => [],
            'raiting' => []
        ];
        $salon = [];
        $raiting =[];

        foreach ($showSalonLimit as $key => $value) {
            array_push($dataArray['raiting'],$this->getSalonRaiting($value->id,$this->userRepo));
            array_push($dataArray['salon'],$value);
        }
        foreach ($dataArray['salon'] as $key => $value){
            $value['rating'] = $dataArray['raiting'][$key];
        }
        $data = [
            'salons' => $dataArray,
        ];
        $showView = view('user.show-more', $data)->render();
        return response()->json(["status"=>"success","resource"=>$showView]);
    }

        /**
     * Show more salon
     *
     * @param $id
     * @param SalonInterface $salonRepo
     * @param UserInterface $userRepo
     * @return json
     */
    public function getShowMoreReview($id)
    {
        $salon_reviews_last = $this->reviewRepo->showMoreReview($id);
        //$count = $this->reviewRepo->countMessage($id);
        //dd(count($salon_reviews_last));
        $count_result = count($salon_reviews_last);
        $reviews = [];
        foreach ($salon_reviews_last as $salon_review){
            $reviews[] = array('user'=>$salon_review->user,'review'=>$salon_review);
        }
        $data = [
            'reviews' => $reviews,
            'count'=>$count_result
        ];

        // if($count_result == 0){
        //     dd(1);
        // }else{
            $showView = view('user.show-more-review', $data)->render();
            return response()->json(["status"=>"success","resource"=>$showView]);
        //}
       // dd(count($count));
        // if($reviews == []){
        //     return response()->json('1');
        // }
        

    }

    /**
     * Post registration user
     * POST user/registration
     * 
     * @param UsersCreateRequest $request
     * @param UserInterface $userRepo
     * @return redirect
     */
    public function postRegistration(Request $request)
    {
        $result = $request->all();
        
        // if ($request->file('profile_picture')) {
        //     $logoFile = $request->file('profile_picture')->getClientOriginalExtension();
        //     $name = str_random(12);
        //     $path = public_path() . '/assets/uploads/';
        //     $result_move = $request->file('profile_picture')->move($path, $name.'.'.$logoFile);
        //     $result['profile_picture'] = $name.'.'.$logoFile;
        // }

        $validator = Validator::make($result, [
            'firstname' => 'required',
            'lastname'  => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'password_confirmation' => 'same:password',
        ]);
        if($validator->fails()) {
            return response()->json(['status'=>'false','error'=>$validator->errors()]);
        }else{
            $token = str_random(15);
            $result['active_user'] = $token;
            $dataEmail = [
                'email' => $request->get('email'),
                'token' => $token,
            ];
            $sendEmail = $this->userRepo->sendEmailFromRegistration($dataEmail, $request->get('email'));
            $result['role'] = 'user';
            $result['active_user'] = 1;
            $result['password'] = bcrypt($result['password']);
            $user = $this->userRepo->createOne($result);
           // dd($user);
            //return redirect()->action('UsersController@getHome')->with('error','Please check your Email address');
            return response()->json(['status'=>'200']); 
        }    
    }

    /**
     * Active user profile.
     * GET /user/registration
     *
     * @param string $token
     * @param UserInterface $userRepo
     * @return redirect
     */
    public function getActiveationProfile($token, UserInterface $userRepo)
    {
        $active = $userRepo->getActive($token);
        if ($active) {
            $updateActive = $userRepo->updateActive($token);
            return redirect()->action('UsersController@getLogin')->with('error',trans('common.your_account_activated'));
        }else{
            return redirect()->action('UsersController@getLogin')->with('error_danger',trans('common.your_token_invalid'));
        };
    }

    /**
     * Get Forgot Password
     * GET /user/forgot-password
     * 
     * @param
     * @return view
     */
    public function getForgotPassword()
    {
       return view('user.forgot-password.forgot-password');
    }

    /**
     * Get Forgot Password
     * GET /user/forgot-password
     * 
     * @param
     * @return view
     */


    /**
     * Get blog page
     * GET /user/blog
     * 
     * @param
     * @return array
     */
    public function getBlog()
    {
        $articles = $this->articleRepo->getAllPaginate();
        foreach($articles as $article){
            if(strlen($article->description) > 800)
            {
                $article->description = substr($article->description, 0, 800).'...';
            }
        }
        $year = date("Y");
        $month = date("m");
        $data = [
            'articles'=> $articles,
            'year' => $year,
            'month' => $month,
        ];
        return view('user.blog',$data);
    }

    /**
     * Get article
     * GET /user/article
     * 
     * @param
     * @return array
     */
    public function getArticle($id)
    {
        $article = $this->articleRepo->getOne($id);
        $year = date("Y");
        $month = date("m");
        if($article){
            $data = [
                'article' => $article,
                'year' => $year,
                'month' => $month,
            ];
            return view('user.article',$data);
        }else{
            return view('errors.404');
        }

    }
        /**
     * Get article
     * GET /user/article
     * 
     * @param
     * @return array
     */
    public function getMonthArticleList($year,$month)
    {
        $date = $year.'/'.$month;
        $days = $number = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $min = new Carbon($year.'-'.$month.'-1');
        $max = new Carbon($year.'-'.$month.'-'.$days.''.'24:00:00.000000');
        $articles = $this->articleRepo->getMonthArticles($min,$max);
        foreach($articles as $article){
            if(strlen($article->description) > 800)
            {
                $article->description = substr($article->description, 0, 800).'...';
            }
        }
        $year = date("Y");
        $month = date("m");
        $data = [
            'articles'=> $articles,
            'year' => $year,
            'month' => $month,
        ];
        return view('user.blog',$data);
    }

    


    /**
     * Forgot Password
     * POST /user/forgot-password
     *
     * @param Request $request
     * @param UserInterface $userRepo
     * @return redirect
     */
    public function postForgotPassword(Request $request, UserInterface $userRepo)
    {
        $result = $request->all();
        $email = $request->email;
        $validator = Validator::make($result, [
            'email' => 'required|email',
        ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{
            $hash = str_random(25);
            $data = [
                'hash' => $hash,
            ];
            $emailSend = $userRepo->forgotPassHash($data, $email);
            $createHash = $userRepo->createHash($email,$hash); 
            if ($createHash) {
                $message = trans('common.email_was_sent');
                return redirect()->action('UsersController@getForgotPassword')->with('error', $message);
            }else{
                $message = trans('common.you_are_not_registered');
                return redirect()->action('UsersController@getForgotPassword')->with('error_danger', $message);
            }
        }
    }

    /**
     * New password 
     * GET /user/set-new-password
     *
     * @param $hash
     * @return array
     */
    public function getSetNewPassword($hash)
    {
        $data = [
            'hash' => $hash,
        ];
        return view('user.forgot-password.set-new-password', $data);
    }

    /**
     * set new password.
     * POST /user/set-new-password
     *
     * @param string $hash
     * @param Request $request
     * @param UserInterface $userRepo
     * @return redirect
     */
    public function postSetNewPassword($hash, Request $request, UserInterface $userRepo)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $password = bcrypt($request->get('password'));
            $getHash = $userRepo->getHash($hash);
            if ($getHash) {
                $updateHash = $userRepo->updateHash($hash, $password);
                return redirect()->action('UsersController@getLogin')->with('error',trans('common.your_password_updated'));
            }else{
               return redirect()->back()->with('error_danger',trans('common.this_token_invalid'));
            }
        }
    }

    /**
     * Post Login
     * POST /user/login
     *
     * @param Request $request
     * @return redirect
     */
    public function postLogin(Request $request,UserInterface $userRepo)
    {   
        $email = $request->get('email');
        $password = $request->get('password');
        if (Auth::attempt(['email' => $email, 'password' => $password, 'role' => 'user'])) {
            $firstEmail = $userRepo->getAllSocial($email);
            Auth::login($firstEmail);
            return response()->json(['error'=>'success']);
        }else{
            $error = trans('common.login_error');
            return response()->json(['error'=>'error','text'=>$error]);
        }
    }

    /**
     * Get facebook login
     */
    public function getFacebookLogin()
    { 
        return Socialize::with('facebook')->redirect();
    }

    /**
     * Get Facebook Callback
     *
     * @param $request
     * @param $userRepo
     */
    public function getFacebookCallback(Request $request,UserInterface $userRepo)
    {  
       // $user = Socialize::with('facebook')->user();
        $provider = Socialize::with(with('facebook'));    
        $user = $provider->stateless()->user();
        $token = $user->token;
        $id = $user->getId();
        $fullName = $user->getName();
        $userName = $user->getNickname();
        $exp = explode(' ', $fullName);
        $firstname = $exp[0];
        $lastname = $exp[1];
        $email = $user->getEmail();
        $userAvatar =  $user->getAvatar();
        $firstEmail = $userRepo->getAllSocial($email);
        if(count($firstEmail) == 0){
            $data = [
                'facebook_id' => $id,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'username' => $userName,
                'email' => $email,
                'profile_picture' => $userAvatar,
                'facebook_token' => $token,
                'active_user' => true
            ];
            $result = $userRepo->createOne($data);
            Auth::login($userRepo->getOne($result->id));
        }else{
            Auth::login($firstEmail);
            $tokenData = [
                'facebook_token' => $token
            ];
            $userRepo->updateSocialToken($email,$tokenData);
        } 
        return "<script type='text/javascript'>
                        window.success = 'success';" .
                        "window.close();window.trigger('unload');
                </script>";
    }

    /**
     * Get Google login
     */
    public function getGoogleLogin()
    {
        return Socialize::with('google')->redirect();
    }

    /**
     * get Google Callback
     *
     * @param $request
     * @param $userRepo
     * @param script
     */
    public function getGoogleCallback(Request $request,UserInterface $userRepo)
    {
        $provider = Socialize::with(with('google'));    
        $user = $provider->stateless()->user();
        $token = $user->token;
        $id = $user->getId();
        $fullName = $user->getName();
        $userName = $user->getNickname();
        $exp = explode(' ', $fullName);
        $firstname = $exp[0];
        $lastname = $exp[1];
        $email = $user->getEmail();
        $userAvatar =  $user->getAvatar();
        $firstEmail = $userRepo->getAllSocial($email);
        if(count($firstEmail) == 0){
            $data = [
                'google_id' => $id,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'username' => $userName,
                'email' => $email,
                'profile_picture' => $userAvatar,
                'google_token' => $token
            ];
            $result = $userRepo->createOne($data);
            Auth::login($userRepo->getOne($result->id));
        }else{
            Auth::login($firstEmail);
            $tokenData = [
                'google_token' => $token
            ];
            $userRepo->updateSocialToken($email,$tokenData);
        }    
        return "<script type='text/javascript'>
                        window.success = 'success';" .
                        "window.close();window.trigger('unload');
                </script>";
    }

    /**
     * profile page
     * GET /user/profile
     *
     * @param UserInterface $userRepo
     * @return array
    */
    public function getProfile(UserInterface $userRepo)
    {
        $result = $userRepo->getOne(Auth::User()->id);
            if($result['facebook_id'] != null || $result['google_id'] != null){
            $datarray = [
                'social' => '1',
                'users' => $result,
                'social_avatar' => $result->profile_picture   
            ];
        }else{
            $pic = $result->profile_picture;
            if(empty($pic)){
                $datarray = [
                    'users' => $result,
                ];
            }else{
                $datarray = [
                    'users' => $result,
                    'avatar' => $pic
                ];
            }
        }      
        return view('user.profile', $datarray);
    }

    /**
     * profile page
     * GET /user/profile
     *
     * @param UserInterface $userRepo
     * @return array
    */
    public function getEditAccount(UserInterface $userRepo)
    {
        $result = $userRepo->getOne(Auth::User()->id);
            if($result['facebook_id'] != null || $result['google_id'] != null){
            $datarray = [
                'social' => '1',
                'users' => $result,
                'social_avatar' => $result->profile_picture   
            ];
        }else{
            $pic = $result->profile_picture;
            if(empty($pic)){
                $datarray = [
                    'users' => $result,
                ];
            }else{
                $datarray = [
                    'users' => $result,
                    'avatar' => $pic
                ];
            }
        }      
        return view('user.edit-account', $datarray);
    }


    /**
     * post registration 
     * POST user/registered
     *
     * @param $worker_id
     * @param Request $request
     * @param UserInterface $userRepo
     * @param NotificationInterface $notificationRepo
     * @return redirect
    */
    public function postRegistered($worker_id, Request $request, UserInterface $userRepo, NotificationInterface $notificationRepo)
    {
        $user_id = Auth::id();
        $data = $request->all();
        if(($data['email'] == '') && ($data['phone'] == '')){
            $error = 'email or phone is requred';
            return redirect()->back()->with('error_danger',$error);
        }
        $worker = $userRepo->getOne($worker_id);
        $salon_admin_id = $worker['salon_admin_id'];
        $salon_admin =  $userRepo->getOne($salon_admin_id);
        $salon_id = $salon_admin['salon_id'];
        $validator = Validator::make($data, [
            'service' => 'required',
            'date' => 'required',
        ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{
            $data['user_id'] = $user_id;
            $data['worker_id'] = $worker_id;
            $data['service_id'] = $data['service'];
            $data['salon_id'] = $salon_id;
            $data['date']= Carbon::parse($data['date'])->toDateTimeString();
            unset($data['service']);
            $result = $notificationRepo->createNotification($data);
            if($result){
                if(!empty($result['email'])){
                    $error = trans('common.message_for_see_email1').' '. $result['email'].' '. trans('common.message_for_see_email2');
                    return redirect()->back()->with('error',$error);
                }else{
                    $error = trans('common.message_for_see_phone1'). $result['phone']. trans('common.message_for_see_phone2');
                    return redirect()->back()->with('error',$error);
                }
            }else{
                dd('error');
            }
        }
    }

    /**
     * Raiting service count
     * GET user/service-raiting/{{$id}}
     *
     * @param $id
     * @param UserInterface $userRepo
     * @return $finalResult
     */
    public function getServiceRaiting($id, UserInterface $userRepo)
    {
        $param = $userRepo->getAllRaitingService($id);
        $result = [];
        foreach ($param as $key => $value) {
            array_push($result, $value->service_rating);
        }
        $resultCount = count($result);
        $salonRaitngSum = (int)array_sum($result);
        if($salonRaitngSum == 0){
            $countSalonRaiting = 0;
            $finalResult = 0;
        }else{
            $countSalonRaiting = $salonRaitngSum / $resultCount;
            $finalResult = round($countSalonRaiting);
        }
        return $finalResult;
    }
    
    /**
     * 
     */
    public function getSalonServiceCategory(Request $request, $salon_id=null)
   {
        $locale = $request->segment(1);
       if($salon_id==null){
           return abort(404);
       }else{
           $result = $this->serviceCategory->salonCategory($salon_id);
           if(count($result) != 0){
               $salon = $this->salonRepo->getOne($salon_id);
               $raiting = $this->getSalonRaiting($salon_id,$this->userRepo);
               $salon_reviews_count = $this->reviewRepo->SalonReview($salon_id);
               $salon_reviews_last = $this->reviewRepo->SalonReviews($salon_id);
               $reviews = [];
               foreach ($salon_reviews_last as $salon_review){
                   $reviews[] = array('user'=>$salon_review->user,'review'=>$salon_review);
               }
               $count_salon_reviews = count($salon_reviews_count);
               $salon_admin = $this->userRepo->getAdmin($salon['id']);
               $salon_staff = $this->userRepo->salonstaff($salon_admin->id);
               $salonImages = $this->salonRepo->getSalonImages($salon_id);
               $i = 1;
               $categoryName = [];
               $category = [];
               foreach ($result as $key => $value){
                   array_push($categoryName,$value['salonCategorys']);
               }
               foreach ($categoryName[0] as $key => $salon_cat){
                   $category[] = array('id'=>$salon_cat['id'],'category_name' => $salon_cat['category']);  
               }

               $data = [
                    'locale' => $locale,
                    'salon_id' => $salon_id,
                    'categories' => $category,
                    'salon' => $salon,
                    'salon_staff' => $salon_staff,
                    'raiting' => $raiting,
                    'count_salon_reviews' => $count_salon_reviews,
                    'salonImages' => $salonImages,
                    'i' => $i,
                    'reviews' => $reviews
               ];
               if(Auth::id()){
                    $subscibe = $this->subscribeRepo->getOne(Auth::id(),$salon_id);

                    if($subscibe != null){
                        $data['subscripe'] = 1;
                    }
                    $validete_rate = $this->userRepo->userSalonOneRating($salon_id,Auth::id());
                    if(count($validete_rate) == ""){
                       $data['rate'] = 1;
                    }
               } 
               return view('user.salon-service-category', $data);       
           }else{
               return abort(404);
           }
       }
   }

    /**
     * 
     */
    public function postOneCategoryServices(Request $request)
    {
        $result = $request->all();
        $category_id = $result['category_id'];
        $services = $this->serviceCategory->salonCategoryService($category_id);
        return response()->json($services);
 
    }

    /**
     * Get salon rate
     * GET /user/worker-raiting/{{$id}}
     *
     * @param $id
     * @param UserInterface $userRepo
     * @return $finalResult
     */
    public function getWorkerRaiting($id, UserInterface $userRepo)
    {
        $i = (int)'';
        $param = $userRepo->getAllRaitingWorker($id);
        $result = [];
        foreach ($param as $key => $value) {
            array_push($result, $value->worker_rating);
        }
        $resultCount = count($result);
        $salonRaitngSum = (int)array_sum($result);
        if($salonRaitngSum == 0){
            $countSalonRaiting = 0;
            $finalResult = 0;
        }else{
            $countSalonRaiting = $salonRaitngSum / $resultCount;
            $finalResult = round($countSalonRaiting);
        }
        return $finalResult;
    }

    /**
     * get service
     * GET user/service/{{$category_id}}/{{$service_id}}
     *
     * @param $category_id
     * @param $service_id
     * @param ServicesInterface $servicesRepo
     * @param SalonInterface $salonRepo
     * @param UserInterface $userRepo
     * @return array
    */
    public function getService($salon_id=null,$category_id=null,$service_id=null)                  
    {
        if($salon_id==null || $category_id==null || $service_id=null){
            return abort(404);
        }
        $i = (int)'';
        $workersJobs = $this->workersJobsRepo->jogsSalonCategory($salon_id,$category_id);
        
        $service = $this->serviceRepo->getOne($service_id);
        $workers = $this->userRepo->getAllWorkers($category_id);
        $dataArray = [
            'worker' => [],
            'worker_raiting' => []
        ];
        foreach ($workers as $key => $worker) {
            $result = $this->getWorkerRaiting($worker->id,$this->userRepo);
            array_push($dataArray["worker"], $worker);
            array_push($dataArray["worker_raiting"], $result);
        }
        $data = [
            'service' => $service,
            'category_id' => $category_id,
            'service_id' => $service_id,
            'data' => $dataArray,
            'i' => $i,
            'workersJobs'=>$workersJobs
        ];
        return view('user.service',$data);
    }

    /**
     * Get the album
     * GET user/the-album/{{id}}
     * 
     * @param $id
     * @param AlbumInterface $albumRepo
     * @param WorkersJobsInterface $imageRepo
     * @return array
     */
    public function getTheAlbum($album_id=null)
    {
        if($album_id==null){
            return abort(404);
        }
        $result = $this->workersJobsRepo->getAlbomImages($album_id);
        $album = $this->albumRepo->getOneAlbum($album_id);
        $worker_id = $album->user['id'];
        $worker = $this->userRepo->getOne($worker_id);
        $salon_admin = $this->userRepo->getOne($worker['salon_admin_id']);
        $salon = $this->salonRepo->getOne($salon_admin['salon_id']);
        $datarray = [
            'salon'=>$salon,
            'album_images'=>$result,
            'album' => $album,
        ];
        return view('user.album',$datarray);
    }


    /**
     * get worker
     * GET user/worker/{{id}}
     *
     * @param $worker_id
     * @param $salon_id
     * @param $service_id
     * @param CategoryInterface $salonIdRepo
     * @param UserInterface $userRepo
     * @param AlbumInterface $albumRepo
     * @param PortfolioInterface $portfolioRepo
     * @return array
    */
    public function getWorker($worker_id,
                                  $salon_id,
                                  $service_id,
                                  CategoryInterface $salonIdRepo,
                                  UserInterface $userRepo,
                                  AlbumInterface $albumRepo, 
                                  PortfolioInterface $portfolioRepo
                              )
    {
        $portfolio = $portfolioRepo->getAll($worker_id);
        $worker = $userRepo->getOne($worker_id);
        $albums = $albumRepo->getThisWorkerAlbums($worker_id);
        $category_id = $worker['category_id'];
        $CategoryIds = $salonIdRepo->SalonCategoryService($category_id);
        $categories = [];
        foreach ($CategoryIds as $CategoryId) {
            if(count($CategoryId['salonCategoryService']) != 0){
                $categories[] = $CategoryId['salonCategoryService'][0];
            }           
        }
        $services = [];
        foreach ($categories as $category) {
            $services[$category->id] = $category['services'];
        }

        $data = [
            'worker' => $worker,
            'albums' => $albums,
            'portfolios' => $portfolio,
            'salon_id' => $salon_id,
            'service_id' => $service_id,
            'services' => $services
        ];
        return view('user.worker', $data);
    }

    /**
     * get worker profile
     * GET user/worker/{{id}}
     *
     * @param $worker_id
     * @param $salon_id
     * @param $service_id
     * @param CategoryInterface $salonIdRepo
     * @param UserInterface $userRepo
     * @param AlbumInterface $albumRepo
     * @param PortfolioInterface $portfolioRepo
     * @return array
    */
    public function getWorkerProfile($worker_id=null)                                 
    {
        if($worker_id==null){
            return abort(404);
        }
        $worker = $this->userRepo->getOne($worker_id);

        if($worker != null){
            $salon_admin_id = $worker['salon_admin_id'];
            if($salon_admin_id  != 0){
                $salon_id = $this->userRepo->getOne($salon_admin_id)->salon->id;

                $albums = $this->albumRepo->getThisWorkerAlbums($worker_id);
                $portfolio = $this->portfolioRepo->getAll($worker_id);
                $raiting = $this->getWorkerRaiting($worker->id,$this->userRepo);
                $category_id = $worker['category_id'];
                $CategoryIds = $this->serviceCategory->SalonCategoryService($category_id);

                $categories = [];
                foreach ($CategoryIds as $CategoryId) {
                    if(count($CategoryId['salonCategoryService']) != 0){
                        $categories[] = $CategoryId['salonCategoryService'][0];
                    }           
                }
                $services = [];
                foreach ($categories as $category) {
                    $services[$category->id] = $category['services'];
                }
                $salon = $this->salonRepo->getOne($salon_id);
                $data = [
                    'salon' => $salon,
                    'worker' => $worker,
                    'salon_id' => $salon_id,
                    'albums' => $albums,
                    'portfolio' => $portfolio,
                    'raiting' => $raiting,
                    'services' => $services
                ];
                return view('user.worker', $data);
            }else{    
                return abort(404);
            }    
        }else{
            return abort(404);
        }    
    }

    /**
     * Get salon rate
     * GET user/salon-raiting/{{id}}
     *
     * @param $id
     * @param UserInterface $userRepo
     * @return $finalResult
     */
    public function getSalonRaiting($id, UserInterface $userRepo)
    {
        $i = (int)'';
        $param = $userRepo->getAllRaiting($id);
        $result = [];
        foreach ($param as $key => $value) {
            array_push($result, $value->salon_rating);
        }
        $resultCount = count($result);
        $salonRaitngSum = (int)array_sum($result);
        if($salonRaitngSum == 0){
            $countSalonRaiting = 0;
            $finalResult = 0;
        }else{
            $countSalonRaiting = $salonRaitngSum / $resultCount;
            $finalResult = round($countSalonRaiting);
        }
        return $finalResult;
    }

    /**
     * edit user detalis
     * POST user/edit-user/{{$id}}
     *
     * @param $id
     * @param UserUpdateRequest $userequest
     * @param UserInterface $userRepo
     * @return redirect
     */     
    public function postEditUser($id, UserUpdateRequest $userequest, UserInterface $userRepo)
    {
        $data = $userequest->all();
        if(isset($data['password'])){
            $password = $data['password'];
            if(Hash::check($password, Auth::user()->password)){
                unset($data['_token']);
                unset($data['password']);
                $email = $userRepo->getEmail($id,$data['email'])->all();
                if(!empty($email)){
                    $message = trans('common.the_email_has_already_been_taken');
                    return redirect()->back()->with('error_danger',$message); 
                }else{
                    $datarray = $userRepo->editUser($data,$id); 
                    if($datarray){
                        $message = trans('common.updated_successfully');
                        return redirect()->back()->with('error',$message);
                   } 
                }
            }else{
                $message = 'Error password';
                return redirect()->back()->with('error_danger',$message);
            }
        }
        unset($data['_token']);
        $email = $userRepo->getEmail($id,$data['email'])->all();
        if(!empty($email)){
            $message = trans('common.the_email_has_already_been_taken');
            return redirect()->back()->with('error_danger',$message); 
        }else{
            $datarray = $userRepo->editUser($data,$id); 
            if($datarray){
                $message = trans('common.updated_successfully');
                return redirect()->back()->with('error',$message);
           } 
        } 
    }

    /**
     * edit user password
     * POST user/edit-password
     *
     * @param $id
     * @param UserUpdateRequest $userequest
     * @param UserInterface $userRepo
     * @return response
     */
    public function postEditPassword($id, UserUpdatePasswordRequest $request, UserInterface $userRepo)
    {
        $data = $request->inputs();
        $password = $data['this_password'];
        if(Hash::check($password, Auth::user()->password)){
            unset($data['this_password']);
            $datarray = $userRepo->editPassword($data,$id); 
            if($datarray){
                $message = trans('common.updated_successfully');
                return redirect()->back()->with('error',$message);
            }else{
                $message = trans('common.error');
                return redirect()->back()->with('error_danger',$message); 
            }
        }else{
            $message = trans('common.error_passwod');
            return redirect()->back()->with('error_danger',$message);
        } 
    }

    /**
     * user logout
     * GET user/log-out
     * 
     * @param 
     * @return redirect
     */
    public function getLogOut()
    {
        Auth::logout();
        return redirect()->action('UsersController@getHome'); 
    }

    /**
     * Upload photo
     * POST user/ajax-add-photo
     *
     * @param Request $request
     * @return response()
     */
    public function postAjaxAddPhoto(Request $request)
    {
        $logoFile = $request->file('file')->getClientOriginalExtension();
        $name = str_random(12);
        $path = public_path() . '/assets/user/user_images/';
        $result = $request->file('file')->move($path, $name.'.'.$logoFile);
        $data = [
            'name' => $name.'.'.$logoFile,
        ];
        return response()->json($data);
    }

    /**
     * Upload profile photo
     * POST user/add-profile-pictures
     *
     * @param Request $request
     * @return response
     */
    public function postAddProfilePictures(Request $request)
    {
        $logoFile = $request->file('file')->getClientOriginalExtension();
        $name = str_random(12);
        $path = public_path() . '/assets/uploads/';
        $result = $request->file('file')->move($path, $name.'.'.$logoFile);
        $data = [
            'name' => $name.'.'.$logoFile,
        ];
        return response()->json($data);
    }

    /**
     * Edit profile Pictures
     * POST user/edit-profile-pictures
     *
     * @param Request $request
     * @param UserInterface $userRepo
     * @return response
     */
    public function postEditProfilePictures(Request $request, UserInterface $userRepo)
    {   
        $id = Auth::id();
        $result = $request->all();
        $data_pic = $result['pictures'];
        $exp = explode('/',$data_pic);
        $pictures = $exp[4];
        $data = [
            'profile_picture' => $pictures
        ];
        $userRepo->updateProfilePicture($id,$data);
        return response()->json($pictures);
    } 
    
    /**
     * Post Raiting Salon
     * POST user/raiting-salon
     * 
     * @param UserInterface $userRepo
     * @param Request $request
     * @return response
     */
    public function postRaitingSalon(UserInterface $userRepo, Request $request)
    {

        $salon_id = $request->get('salon_id');
        $raiting = $request->get('raiting');
        $user_id = Auth::id();
        $data = [
            'user_id' => $user_id,
            'salon_id' => $salon_id,
            'salon_rating' => $raiting
        ];
        $userRepo->raitingSalon($data);
        return response()->json($data);
    }

    /**
     * Raiting Service
     * POST user/raiting-service
     *
     * @param Request $request
     * @param UserInterface $userRepo
     * @return response
     */
    public function postRaitingService(Request $request, UserInterface $userRepo)
    {   
        $salon_id = $request->get('salon_id');
        $raiting = $request->get('raiting');
        $service_id = $request->get('service_id');
        $user_id = Auth::id();
        $data = [
            'user_id' => $user_id,
            'salon_id' => $salon_id,
            'service_id' => $service_id,
            'service_rating' => $raiting
        ];
        $userRepo->raitingService($data);
        return response()->json($data);
    }

    /**
     * Raiting Worker
     * POST user/raiting-worker
     *
     * @param Request $request
     * @param UserInterface $userRepo
     * @return response
     */
    public function postRaitingWorker(Request $request, UserInterface $userRepo)
    {
        $salon_id = $request->get('salon_id');
        $worker_id = $request->get('worker_id');
        $raiting = $request->get('raiting');
        $service_id = $request->get('service_id');
        $user_id = Auth::id();
        $data = [
            'user_id' => $user_id,
            'salon_id' => $salon_id,
            'service_id' => $service_id,
            'worker_rating' => $raiting,
            'worker_id' => $worker_id
        ];
        $userRepo->raitingSalonWorker($data);
        return response()->json($data);
    }

    /**
     * Send review to worker
     * POST user/send-review-worker/{{$worker_id}}
     *
     * @param $worker_id
     * @param MessageRequest $request
     * @param MessageInterface $messageRepo
     * @return redirect
     */
    public function postSendReviewWorker($worker_id, MessageRequest $request, MessageInterface $messageRepo)
    {   
        $user_id = Auth::id();
        $result = $request->all();
        $message = $result['message']; 
        $data = [
            'user_id' => $user_id,
            'worker_id' => $worker_id,
            'message' => $message
        ];
        $sent_message = $messageRepo->createMessage($data); 
        if($sent_message){
            $message = trans('common.feedback_sent');
            return redirect()->back()->with('error',$message);
        }else{
            $message = trans('common.error_feedback');
            return redirect()->back()->with('error_danger',$message);
        }
    }

    /**
     * Send review to salon
     * POST user/send-review-salon/{{salon_id}}
     *
     * @param $salon_id
     * @param MessageRequest $request
     * @param MessageInterface $messageRepo
     * @return response
     */
    public function postSendReviewSalon(Request $request, MessageInterface $messageRepo)
    {   
        $user_id = Auth::id();

        $result = $request->all();
        $message = $result['message'];
        $salon_id = $result['salon_id'];
        

        $param = [
            'user_id' => $user_id, 
            // 'user' => $user,
            'salon_id' => $salon_id,
            'message' => $message
        ];
        $sent_message = $messageRepo->createMessage($param);

        $user = $messageRepo->userReview($sent_message['user_id']);
        
        $data = [
            'user' => $user,
            'salon_id' => $salon_id,
            'message' => $sent_message
        ];

        if($sent_message){
            // return response()->json(['message'=>$sent_message,'user'=>$user]);
            $showView = view('user.show-user-review', $data)->render();
            return response()->json(["status"=>"success","resource"=>$showView]);
        }
    }
    
    /**
     * Subscribe
     * POST user/subscribe
     *
     * @param Request $request
     * @param SubscribeInterface $subscriberepo
     * @return string $message
     */
    public function postSubscribe(Request $request, SubscribeInterface $subscriberepo)
    {
        $result = $request->all();
        $salon_id = $result['salon_id'];
        $user_id = Auth::id();
        if(!empty($result['email'])){
            if (filter_var($result['email'], FILTER_VALIDATE_EMAIL)){
                $data = [
                    'user_id' => $user_id,
                    'salon_id' => $salon_id,
                    'email' => $result['email']
                ];
                $result = $subscriberepo->createOne($data);
                if($result){
                    $message = 'ok_email';
                    return $message;
                }else{
                    dd('error');
                }
            }else{
                $message = 'error_email';
                return $message;
            }
        }else{      
            if(!empty($result['phone'])){
                if(preg_match("/^[0-9]{3}-[0-9]{2}-[0-9]{2}-[0-9]{2}$/", $result['phone'])) {
                    $data = [
                        'user_id' => $user_id,
                        'salon_id' => $salon_id,
                        'phone' => $result['phone']
                    ];
                    $result = $subscriberepo->createOne($data);
                    if($result){
                        $message = 'ok_phone';
                        return $message;
                    }else{
                        dd('error');
                    }
                }else{
                    $message = 'error_phone';
                    return $message;
               }
            }else{
                $message = 'error';
                return $message; 
            }
        }
    }

    /**
     * UnSubscribe
     * POST user/unsubscribe
     *
     * @param Request $request
     * @param SubscribeInterface $subscriberepo
     * @return response
     */
    // public function postUnsubscribe(Request $request, SubscribeInterface $subscriberepo)
    // {
    //     $result = $request->all();
    //     $salon_id = $result['salon_id'];
    //     $user_id = Auth::id();
    //     $subscibe = $subscriberepo->DeleteOne($user_id,$salon_id);
    //     if($subscibe){  
    //         $message = 'unsubscribe';
    //         return $message;
    //     }else{
    //         dd('error');
    //     }
    // }

    /**
     * 
     */
    public function getUserUnsubscribe($salon_id,SubscribeInterface $subscribeRepo)
    {
        $id = Auth::id();
        $data = [
            'user_id'=>null
        ];
        $result = $subscribeRepo->DeleteOne($id,$salon_id);
        $message = trans('common.you_are_unsubscribed');
        return redirect()->back()->with('error',$message);
    }
    /**
     * 
     */
    public function getUnsubscribeWebSite(SubscribeInterface $subscribeRepo)
    {
        $id = Auth::id();
        $subscribeRepo->UnsubscribeWebSite($id);
        $message = trans('common.you_are_unsubscribed');
        return redirect()->back()->with('subscribe_success',$message);
    }


   	/**
     * get salons
	 * GET user/salons
	 *
	 * @param SalonInterface $salonRepo
     * @param UserInterface $userRepo
	 * @return array
	 */
	public function getSalons(SalonInterface $salonRepo, UserInterface $userRepo)
	{            
		$i = (int)'';
		$u = (int)'';
		$user = $userRepo->getOne(Auth::User()->id);
		$salons = $salonRepo->getAll();
		$sumSalonId = [];
		$dataArray = [
			"salon" => [],
			'salon_rayting' => []
		];
		$dataArray1 = [
			"salon" => [],
			'salon_rayting' => []
		];
		foreach($salons  as $salon){
			if(!empty($salon['address1'])){
				if($salon['address1'] == $user['address']){
    				$result = $this->getSalonRaiting($salon->id,$userRepo);
    				array_push($dataArray["salon"], $salon);
    				array_push($dataArray['salon_rayting'], $result);
				}else{
					$other_salons[] = $salon;
					$result = $this->getSalonRaiting($salon->id,$userRepo);
					array_push($dataArray1["salon"], $salon);
					array_push($dataArray1['salon_rayting'], $result);
				}
			}else{
				$result = $this->getSalonRaiting($salon->id,$userRepo);
				array_push($dataArray1["salon"], $salon);
				array_push($dataArray1['salon_rayting'], $result);
			}
		}
		$data = [
			'results' => $sumSalonId,
			'data' => $dataArray,
			'data1' => $dataArray1,
			'i' => $i,
			'u' => $u,
		];
		return view('user.salons', $data);
	}

    /**
     * not fount page
     * GET user/page-not-found
     *
     * @param 
     * @return view
     */
    public function getPageNotFound()
    {
        return view('errors.404');
    }

    /**
     * Add User Is Salon
     *
     * @param $request
     * @param $salonRepo
     * @param $userRepo
     * @return  response
     */
    public function postUserAddIsSalon(Request $request, SalonInterface $salonRepo, UserInterface $userRepo)
    {
        $result = $request->all();
        $validator = Validator::make($result, [
            'name' => 'required',
            'firstname'  => 'required',
            'password'  => 'required',
            'sub_domain' => 'required|unique:salons',
            'email' => 'required|unique:users',
        ]);
        if($validator->fails()) {
            return response()->json(['status'=>'false','error'=>$validator->errors()]);
        }else{
            $name = $result['name'];
            $sub_domain = $result['sub_domain'];
            if(isset($result['file'])){
                $logoFile = $request->file('file')->getClientOriginalExtension();
                $imgName = str_random(12);
                $path = public_path() . '/assets/salon_images/';
                $result_move = $request->file('file')->move($path, $imgName.'.'.$logoFile);
                $data_salon['image'] = $imgName.'.'.$logoFile;
                $data_salon = [
                    'name' => $name,
                    'sub_domain' => $sub_domain,
                    'image' => $imgName.'.'.$logoFile
                ];
            }else{
                $data_salon = [
                    'name' => $name,
                    'sub_domain' => $sub_domain,
                ]; 
            }
            $salon = $salonRepo->createOneSalon($data_salon);
            $data_user['firstname'] = $result['firstname'];
            $data_user['password'] = bcrypt($result['password']);
            $data_user['email'] = $result['email'];
            $data_user['role'] = 'salon_admin';
            $data_user['salon_id'] = $salon->id;
            $token = str_random(15);
            $data_user['active_user'] = $token;
            $dataEmail = [
                'email' => $request->get('email'),
                'token' => $token,
            ];
            $sendEmail = $userRepo->sendEmailFromRegistrationSalon($dataEmail, $request->get('email'));
            $data_user['active_user'] = true;
            $userRepo->createOne($data_user);
            return response()->json(['status'=>'success','text'=>$salon]);
        }
        //return redirect()->action('SalonAdminController@getLogin')->with('error','Please check your Email address');
    }

    /**
     * 
     */
    public function postSubscripSalon($salon_id,request $request)
    {
        $email = $request->get('email');
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{
            $validateEmailInSalons = $this->subscribeRepo->vaidetEmailInSalon($salon_id,$email);
            if(count($validateEmailInSalons) == ''){
                $data = [
                    'salon_id' => $salon_id,
                    'email' => $email
                ];
                $this->subscribeRepo->createOne($data);
                $message = trans('common.you_are_subscibed_successful');
                return redirect()->back()->with('error',$message);
            }else{
                $message = trans('common.you_are_already_subscribes_this_salon');
                return redirect()->back()->with('error_danger',$message);
            }
        }       
    }

    /**
     * 
     */
    public function postUserSubscripSalon($salon_id,request $request)
    {
        $email = $request->get('email');
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{
            $validateEmailInSalons = $this->subscribeRepo->vaidetEmailInSalon($salon_id,$email,Auth::id());
            if(count($validateEmailInSalons) == '')
            {
                $data = [
                    'user_id' => Auth::id(),
                    'salon_id' => $salon_id,
                    'email' => $email
                ];
                $this->subscribeRepo->createOne($data);
                $message = trans('common.you_are_subscibed_successful');
                return redirect()->back()->with('error',$message);
            }else{
                $message = trans('common.you_are_already_subscribes_this_salon');
                return redirect()->back()->with('error_danger',$message);
            }
        }
    }

    /**
     * 
     */
    public function postUserSubscribeWebSite(Request $request)
    {
        $email = $request->get('email');
        $user_id = Auth::id();
        $user_email = '';
        if($user_id != null ){
            $user_email = Auth::user()->email;
        }
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);
        if($validator->fails()) {
            $message = trans('common.the_email_must_be_a_valid_email_address');
            return redirect()->back()->with('subscribe_danger',$message);
        }else{
            if(($user_id != null) && ($email != $user_email))
            {
                $message = trans('common.please_write_your_email');
                return redirect()->back()->with('subscribe_danger',$message); 
            }else{
                $validateEmail = $this->subscribeRepo->UserSubscribedWebSite($email);
                if(count($validateEmail) == '')
                {
                    $data = [
                        'user_id' => $user_id,
                        'email' => $email
                    ];
                    $this->subscribeRepo->createOneSubscribeWebSite($data);
                    $message = trans('common.you_are_subscibed_successful');
                    return redirect()->back()->with('subscribe_success',$message);
                }else{
                    $message = trans('common.this_mail_already_subscribed');
                    return redirect()->back()->with('subscribe_danger',$message);
                }   
            }
        }
    }
    

    /**
     * 
     */
    public function postEditSalonRevie(request $request)
    {
        $result = $request->all();
        unset($result['_token']);
        $edit = $this->reviewRepo->updateUserReview($result['id'],$result);

        return response()->json($result);
    }

    /**
     * 
     */
    public function getDeleteSalonReview($id)
    {
        $this->reviewRepo->deleteOneReview($id);
        return response()->json();
    }


    /**
     * Post Login
     * POST /user/login
     *
     * @param Request $request
     * @return redirect
     */
    public function postReviewLogin(Request $request,UserInterface $userRepo)
    {   
        $email = $request->get('email');
        $password = $request->get('password');
        if (Auth::attempt(['email' => $email, 'password' => $password, 'role' => 'user','active_user'=>true])) {
            $firstEmail = $userRepo->getAllSocial($email);
            
            Auth::login($firstEmail);
            return response()->json(['error'=>'success','user_id'=>$firstEmail->id]);
        }else{
            $error = trans('common.login_error');
            return response()->json(['error'=>'error','text'=>$error]);
        }
    }


    /**
     * 
     */
    public function getSubDomain()
    {
        return view('sub_domain.sub_domain_page');
    }

}
