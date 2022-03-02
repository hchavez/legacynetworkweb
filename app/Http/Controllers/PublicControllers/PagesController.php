<?php

namespace App\Http\Controllers\PublicControllers;

use App\Http\Clients\AuthorizeNet\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\EliteChallengeRequest;
use App\Jobs\ScheduleChallengeDay15Email;
use App\Jobs\ScheduleChallengeDay1Email;
use App\Jobs\ScheduleChallengeDay21Email;
use App\Jobs\ScheduleChallengeDay2Email;
use App\Jobs\ScheduleChallengeDay3Email;
use App\Jobs\ScheduleChallengeDay4Email;
use App\Jobs\ScheduleChallengeDay5Email;
use App\Jobs\ScheduleChallengeDay6Email;
use App\Jobs\ScheduleChallengeDay7Email;
use App\Jobs\ScheduleChallengeDay8Email;
use App\Mail\ContactSendEmail;
use App\Mail\EliteChallengeSponsorMail;
use App\Mail\EliteChallengeWelcomeMail;
use App\Mail\MemberAchievementApproved;
use App\Mail\SponsorAchievementByMemberApproved;
use App\Repositories\UsersRepository;
use App\Services\OrdersServices;
use App\Services\ProductsServices;
use App\Services\UsersServices;
use App\Services\AchievementLevelsServices;
use App\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use net\authorize\api\contract\v1\ARBCreateSubscriptionResponse;
use Mail;
use App\Mail\EliteChallengeDay1Email;
use App\Mail\EliteChallengeDay2Email;
use App\Mail\EliteChallengeDay3Email;
use App\Mail\EliteChallengeDay4Email;
use App\Mail\EliteChallengeDay5Email;
use App\Mail\EliteChallengeDay6Email;
use App\Mail\EliteChallengeDay7Email;
use App\Mail\EliteChallengeDay8Email;
use App\Mail\EliteChallengeDay15Email;
use App\Mail\EliteChallengeDay21Email;

class PagesController extends Controller
{
     /**
     * @var AchievementLevelsServices
     */
    private $achievementLevelsServices;

    /**
     * @var ProductsServices
     */
    private $productsServices;
    /**
     * @var Client
     */
    private $authorizeClient;
    /**
     * @var UsersRepository
     */
    private $usersRepository;
    /**
     * @var OrdersServices
     */
    private $ordersServices;
    /**
     * @var UsersServices
     */
    private $usersServices;


    /**
     * PagesController constructor.
     * @param AchievementLevelsServices $achievementLevelsServices
     * @param ProductsServices $productsServices
     * @param UsersRepository $usersRepository
     * @param UsersServices $usersServices
     * @param Client $authorizeClient
     * @param OrdersServices $ordersServices
     */
    public function __construct(
        AchievementLevelsServices $achievementLevelsServices,
        ProductsServices $productsServices,
        UsersRepository $usersRepository,
        UsersServices $usersServices,
        Client $authorizeClient,
        OrdersServices $ordersServices
    )
    {
        $this->achievementLevelsServices = $achievementLevelsServices;
        $this->productsServices = $productsServices;
        $this->authorizeClient = $authorizeClient;
        $this->usersRepository = $usersRepository;
        $this->ordersServices = $ordersServices;
        $this->usersServices = $usersServices;
    }

    public function showHomePage()
    {
        session()->put('nav_type', 'elite_challenge');
        $data['bannerConfig'] = bannerConfig(1);
        $data['bannerConfig']->subTitle = 'CREATING A LEGACY OF';
        $data['bannerConfig']->title = 'ELITE HEALTH';
        $data['bannerConfig']->info = 'Helping men and women live without limitations! Introducing the first of their <br>kind, nutritional therapeutics designed to naturally unlock the power within.';
        $data['bannerConfig']->faded = false;

        return view('public_pages_v2.homepage', $data);
    }

    public function showCardioHealth()
    {
        session()->put('nav_type', 'elite_challenge');
        $data['bannerConfig'] = bannerConfig(1);
        $data['bannerConfig']->subTitle = '<br><br>DISCOVER';
        $data['bannerConfig']->title = 'CARDIO <br>         &nbsp;&nbsp;&nbsp;&nbsp; HEALTH';
        $data['bannerConfig']->info = '';
        $data['bannerConfig']->faded = false;

        return view('public_pages_v2.cardio_health', $data);
    }

    public function showSkinCare()
    {
        session()->put('nav_type', 'elite_challenge');
        $data['bannerConfig'] = bannerConfig(1);
         $data['bannerConfig']->subTitle = '<br><br>';
        $data['bannerConfig']->title = 'YOUTH';
        $data['bannerConfig']->info = 'FROM THE INSIDE OUT';
        $data['bannerConfig']->faded = false;

        return view('public_pages_v2.skin_care', $data);
    }

    public function showImmuneSupport()
    {
        session()->put('nav_type', 'elite_challenge');
        $data['bannerConfig'] = bannerConfig(1);
         $data['bannerConfig']->subTitle = '<br><br>';
        $data['bannerConfig']->title = '&nbsp;';
        $data['bannerConfig']->info = '&nbsp;';
        $data['bannerConfig']->faded = false;

        return view('public_pages_v2.immune_support', $data);
    }


    public function showEliteChallenge()
    {
        session()->put('nav_type', 'elite_challenge');
        $data['bannerConfig'] = bannerConfig(1);
        $data['bannerConfig']->title = 'ELITE HEALTH<br>CHALLENGE';
        $data['bannerConfig']->info = 'Markedly improve your health in 21 days, <br>or your money back!';
        $data['bannerConfig']->faded = false;

        return view('public_pages_v2.elite_challenge', $data);
    }

    public function showBenefitsPage()
    {
        $data['bannerConfig'] = bannerConfig(1); //doesn't matter, its forced to false anyway
        $data['bannerConfig']->showBanner = false;
        return view('public_pages_v2.benefits', $data);
    }

    public function showBusinessPage()
    {
        session()->put('nav_type', 'business_challenge');
        $data['bannerConfig'] = bannerConfig(2);
        $data['bannerConfig']->title = 'ELITE BUSINESS<br>CHALLENGE';
        $data['bannerConfig']->info = 'Helping men and women with the entrepreneurial spirit to start and build a successful business - from start to finish - within a few short months!';
        $data['bannerConfig']->faded = true;
        return view('public_pages_v2.business', $data);
    }

    public function showCommissionsPage()
    {

        $data['bannerConfig'] = bannerConfig(2);
        $data['bannerConfig']->subTitle = null;
        $data['bannerConfig']->title = 'BEST COMPENSATION IN THE INDUSTRY ';
        $data['bannerConfig']->info = 'As you consider building a Legacy Network business, it is vital to clearly understand how you earn income.';
        $data['bannerConfig']->faded = true;
        return view('public_pages_v2.commissions', $data);
    }

    public function showBusinessPageSection($section, $type = null)
    {
        return view('public_pages_v2.business_page_popups.' . $section, [
            'type' => $type
        ])->render();
    }

    public function showProductPageSection($section)
    {
        $synergyNumber = 'www';
        if (session()->has('purl_user') && session()->get('purl_user')['synergy_id']) {
            $synergyNumber = session()->get('purl_user')['synergy_id'];
        }

        $data['synergyNumber'] = $synergyNumber;
        return view('public_pages_v2.product_page_popups.' . $section, $data)->render();
    }

    public function showProductsPage()
    {
        $data['bannerConfig'] = bannerConfig(1);
        $data['bannerConfig']->subTitle = '';
        $data['bannerConfig']->title = 'Clinically-Proven Products';
        $data['bannerConfig']->info = 'Discover your health potential with products backed by science';
        $data['bannerConfig']->faded = true;

        $synergyNumber = 'www';
        if (session()->has('purl_user') && session()->get('purl_user')['synergy_id']) {
            $synergyNumber = session()->get('purl_user')['synergy_id'];
        }

        $data['synergyNumber'] = $synergyNumber;

        return view('public_pages_v2.products', $data);
    }

    public function showBuyProductsPage()
    {
        $data['bannerConfig'] = bannerConfig(1);
        $data['bannerConfig']->subTitle = '';
        $data['bannerConfig']->title = 'The Elite Health Challenge<br>product package';
        $data['bannerConfig']->info = '<img style="width: 100%;" src="'. url('new_images/EHC_Product_Image_for_SuperAdmin2.png') .'">';
        $data['bannerConfig']->faded = true;
        return view('public_pages_v2.buy_products', $data);
    }

    public function contact()
    {
        $data['bannerConfig'] = bannerConfig(1);
        $data['bannerConfig']->subTitle = '';
        $data['bannerConfig']->title = null;
        $data['bannerConfig']->info = null;
        $data['bannerConfig']->faded = true;
        $data['name'] = "";
        $data['email'] = "";
        $data['mobile'] = "";

        if (session()->get('purl_user') && isset(session()->get('purl_user')['id'])) {
            $user = User::find(session()->get('purl_user')['id']);

            if ($user) {
                $data['name'] = $user->full_name;
                $data['email'] = $user->email;
                $data['mobile'] = $user->mobile;
                $data['avatar'] = $user->avatar;
            }
        }

        return view('public_pages.contact', $data);
    }

    public function ehcConctact()
    {
        $data['bannerConfig'] = bannerConfig(1);
        $data['bannerConfig']->subTitle = '';
        $data['bannerConfig']->title = null;
        $data['bannerConfig']->info = null;
        $data['bannerConfig']->faded = true;
        $data['name'] = "";
        $data['email'] = "";
        $data['mobile'] = "";

        if (session()->get('purl_user') && isset(session()->get('purl_user')['id'])) {
            $user = User::find(session()->get('purl_user')['id']);

            if ($user) {
                $data['name'] = $user->full_name;
                $data['email'] = $user->email;
                $data['mobile'] = $user->mobile;
                $data['avatar'] = $user->avatar;
            }
        }
        return view('public_pages.ehc_contact', $data);
    }

    public function leaveALegacy()
    {
        $data['bannerConfig'] = bannerConfig(1);
        $data['bannerConfig']->subTitle = '';
        $data['bannerConfig']->title = null;
        $data['bannerConfig']->info = null;
        $data['bannerConfig']->faded = true;
        $data['name'] = "";
        $data['email'] = "";
        $data['mobile'] = "";

        if (session()->get('purl_user') && isset(session()->get('purl_user')['id'])) {
            $user = User::find(session()->get('purl_user')['id']);

            if ($user) {
                $data['name'] = $user->full_name;
                $data['email'] = $user->email;
                $data['mobile'] = $user->mobile;
            }
        }
        return view('public_pages.leave_a_legacy', $data);
    }

    public function showChallengeStep1()
    {
        $products = $this->productsServices->all();
        $data['products'] = $products->filter(function ($item) {
            return $item->name != 'Synergy Activation Fee';
        });;
        return view('public_pages_v2.elite_challenge_step_1', $data);
    }

    public function processChallengeStep1(EliteChallengeRequest $request)
    {
        $inputs = $request->except('_token');

        session(['elite_challenge_step_1' => $inputs]);

        return redirect('elite_challenge/step/2');
    }

    public function showChallengeStep2()
    {
        if (!session()->get('elite_challenge_step_1')) {
            return redirect('elite_challenge/step/1');
        }

        return view('public_pages_v2.elite_challenge_step_2');
    }

    public function processChallengeStep2(EliteChallengeRequest $request)
    {
        $inputs = $request->except('_token');

        session(['elite_challenge_step_2' => $inputs]);

               

        return redirect('elite_challenge/step/3');
    }

    public function showChallengeStep3()
    {
        if (!session()->get('elite_challenge_step_1')) {
            return redirect('elite_challenge/step/1');
        }

        if (!session()->get('elite_challenge_step_2')) {
            return redirect('elite_challenge/step/2');
        }

        $data = [];
        try {
            $data['product'] = $this->productsServices->find(session('elite_challenge_step_1')['product_id']);
        } catch (\Exception $exception) {
            return redirect('elite_challenge/step/1');
        }

        return view('public_pages_v2.elite_challenge_step_3', $data);
    }

    public function processChallengeStep3(EliteChallengeRequest $request)
    {
        $inputs = $request->except('_token');

        $data['product'] = $this->productsServices->find(session('elite_challenge_step_1')['product_id']);

        $allInputs = array_merge(
            session('elite_challenge_step_1'),
            session('elite_challenge_step_2'),
            $inputs
        );

        $allInputs['payment_amount'] = $data['product']->price;

        //$cc_tx = $this->authorizeClient->processEliteChallengePayment($allInputs);

        if (true) {
            /** @var ARBCreateSubscriptionResponse $authNetResponse */
            $allInputs['password'] = 'elite-challenge-pending';
            $allInputs['date_of_birth'] = Carbon::parse($allInputs['date_of_birth']);
            $allInputs['cc_exp_date'] = Carbon::parse($allInputs['year_expire'] . '-' . $allInputs['month_expire']);
            $allInputs['achievement_level_id'] = 1;
            $referrer = $this->usersRepository->findBy('purl', $allInputs['purl']);
            $allInputs['referrer_id'] = $referrer->id;
            $allInputs['purl'] = $this->usersServices->generateUniquePurl($allInputs['first_name'], $allInputs['last_name']);
            $allInputs['status'] = 'INACTIVE';
            $user = $this->usersRepository->create($allInputs);
            $this->ordersServices->createOrderRecordAfterEliteChallengeSignup($user, $data['product']);
            session(['elite_challenge_sign_up_success' => true]);
            Mail::to($user->email)->send(new EliteChallengeWelcomeMail());
            $sponsor = $user->sponsor;
            if ($sponsor) Mail::to($sponsor->email)->send(new EliteChallengeSponsorMail($user));

            ScheduleChallengeDay1Email::dispatch($user)->delay(now()->addDays(3));
            ScheduleChallengeDay2Email::dispatch($user)->delay(now()->addDays(4));
            ScheduleChallengeDay3Email::dispatch($user)->delay(now()->addDays(5));
            ScheduleChallengeDay4Email::dispatch($user)->delay(now()->addDays(6));
            ScheduleChallengeDay5Email::dispatch($user)->delay(now()->addDays(7));
            ScheduleChallengeDay6Email::dispatch($user)->delay(now()->addDays(8));
            ScheduleChallengeDay7Email::dispatch($user)->delay(now()->addDays(9));
            ScheduleChallengeDay8Email::dispatch($user)->delay(now()->addDays(10));
            ScheduleChallengeDay15Email::dispatch($user)->delay(now()->addDays(17));
            ScheduleChallengeDay21Email::dispatch($user)->delay(now()->addDays(23));
        }


        return redirect('/elite_challenge');


    }

    public function contact_send_message(Request $request)
    {
        Mail::to($request->input('email_to'))
            ->send(new ContactSendEmail(
                $request->input('email_from'),
                $request->input('message'),
                $request->input('name')
            ));
    }



    public function checkAchievementLevel()
    {

        if($_GET["access"]=="1234"){

        $data = User::select('id','synergy_account_number','synergy_actual_value')->get();

        foreach ($data as $user) {
            var_dump($user['synergy_id']);
            echo '<br>------------------------------------------------------------';
        }


        var_dump($data);

        exit();

        $cvMapping = [
            '13' => 400000,
            '12' => 300000,
            '11' => 200000,
            '10' => 100000,
            '9' => 60000,
            '8' => 30000,
            '7' => 14000,
            '6' => 6000,
            '5' => 4500,
            '4' => 3000,
            '3' => 1500,
            '2' => 500,
        ];

        foreach ($cvMapping as $key => $value) {
            //if ($this->user->achievement_level_id >= $key) return $data;

            if ($this->user->achievement_level_id <= $key && $cv >= $value) {
                $achievementLevel = $this->achievementLevelServices->find($key);

                Mail::to($this->user->email)->send(new MemberAchievementApproved($this->user, $achievementLevel));

                $sponsor = $this->user->sponsor;
                if ($sponsor) Mail::to($sponsor->email)->send(new SponsorAchievementByMemberApproved($this->user, $sponsor, $achievementLevel));

                return array_merge($data, [
                    'achievement_level_id' => $key
                ]);
            }
        }

        return $data;

      }
    }

    public function sendEmailChallenge()
    {

        $data = User::select('id','elite_challenge_day','date_challenge','email','created_at','status')->whereIn('password', ['elite-challenge-active','immune-support-customer','elite-challenge-pending','cardio-customer','weight-loss'])->where('status','ACTIVE')->whereDate('date_challenge', date('Y-m-d'))->get();

           foreach ($data as $user) {
                  //echo $user['id'].'-->'.$user['date_challenge'].'-->'.$user['email'].'-->'.$user['created_at'].'<br>';
            
                 if($user['date_challenge'] == null){
                  //$updatedate = User::find($user['id']);
                  //$updatedate->date_challenge = $user['created_at'];
                  //$updatedate->save();
                }

                 $date2 = Carbon::parse($user['date_challenge']);
                 
                 if($user['elite_challenge_day'] == '3'){
                    Mail::to($user['email'])->send(new EliteChallengeDay1Email());
                    $nextday = 4; 
                    $sendDay = 1; 
                 }


                 if($user['elite_challenge_day'] == '4'){
                    Mail::to($user['email'])->send(new EliteChallengeDay2Email());
                    $nextday = 5; 
                    $sendDay = 1; 
                 }

                 if($user['elite_challenge_day'] == '5'){
                    Mail::to($user['email'])->send(new EliteChallengeDay3Email());
                    $nextday = 6; 
                    $sendDay = 1; 
                 }


                 if($user['elite_challenge_day'] == '6'){
                    Mail::to($user['email'])->send(new EliteChallengeDay4Email());
                    $nextday = 7; 
                    $sendDay = 1; 
                 }


                 if($user['elite_challenge_day'] == '7'){
                    Mail::to($user['email'])->send(new EliteChallengeDay5Email());
                    $nextday = 8; 
                    $sendDay = 1; 
                 }

                 if($user['elite_challenge_day'] == '8'){
                    Mail::to($user['email'])->send(new EliteChallengeDay6Email());
                    $nextday = 9; 
                    $sendDay = 1; 
                 }

                 if($user['elite_challenge_day'] == '9'){
                    Mail::to($user['email'])->send(new EliteChallengeDay7Email());
                    $nextday = 10;
                    $sendDay = 1;  
                 }

                 if($user['elite_challenge_day'] == '10'){
                    Mail::to($user['email'])->send(new EliteChallengeDay8Email());
                    $nextday = 17; 
                    $sendDay = 7; 
                 }

                 if($user['elite_challenge_day'] == '17'){
                    Mail::to($user['email'])->send(new EliteChallengeDay15Email());
                    $nextday = 23; 
                    $sendDay = 6; 
                 }

                 if($user['elite_challenge_day'] == '23'){
                    Mail::to($user['email'])->send(new EliteChallengeDay21Email());
                    $nextday = 23;
                 }


                
                
                if($user['elite_challenge_day'] == '1'){
                    $updatedate = User::find($user['id']);
                    $updatedate->date_challenge = $date2->addDays(3);
                    $updatedate->elite_challenge_day = 3;
                    $updatedate->save();
                }else{
                    $updatedate = User::find($user['id']);
                    $updatedate->date_challenge = $date2->addDays($sendDay);
                    $updatedate->elite_challenge_day = $nextday;
                    $updatedate->save();
                }
            }

         //$thisemail = 'harreyson.chavez@gmail.com';
         //$thisemail = 'dianne@legacynetwork.com';
    
         //if(Mail::to($thisemail)->send(new EliteChallengeDay21Email())){
         // echo 'sent!'; 
         //} 
         /*
         Mail::to($this->user->email)->send(new EliteChallengeDay1Email()); - after 3 days
            Mail::to($thisemail)->send(new EliteChallengeDay2Email()); - after 4 days
            Mail::to($thisemail)->send(new EliteChallengeDay3Email()); - after 5 days
            Mail::to($thisemail)->send(new EliteChallengeDay4Email()); - after 6 days
            Mail::to($thisemail)->send(new EliteChallengeDay5Email()); - after 7 days
            Mail::to($thisemail)->send(new EliteChallengeDay6Email()); - after 8 days
            Mail::to($thisemail)->send(new EliteChallengeDay7Email()); - after 9 days
            Mail::to($thisemail)->send(new EliteChallengeDay8Email()); - after 10 days
            Mail::to($thisemail)->send(new EliteChallengeDay15Email()); - after 17 days
            Mail::to($thisemail)->send(new EliteChallengeDay21Email()); - after 23 days
         **/
    
    
    }

}




