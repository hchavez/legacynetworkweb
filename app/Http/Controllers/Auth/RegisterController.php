<?php

namespace App\Http\Controllers\Auth;

use App\Http\Clients\AuthorizeNet\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\SteppedRegistrationRequest;
use App\Mail\NotifySponsorNewSignUp;
use App\Mail\RegisterSuccessful;
use App\Mail\UserSignUp;
use App\Services\ActivationPacksServices;
use App\Services\AutoShipsServices;
use App\Services\LnFeesServices;
use App\Services\ProductsServices;
use App\Services\UsersServices;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use net\authorize\api\contract\v1\ANetApiResponseType;
use net\authorize\api\contract\v1\ARBCreateSubscriptionResponse;
use App\Repositories\NotificationMessagesRepository;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    /**
     * @var UsersServices
     */
    private $usersServices;
    /**
     * @var Client
     */
    private $authorizeClient;
    /**
     * @var ActivationPacksServices
     */
    private $activationPacksServices;
    /**
     * @var LnFeesServices
     */
    private $lnFeesServices;
    /**
     * @var AutoShipsServices
     */
    private $autoShipsServices;
    /**
     * @var ProductsServices
     */
    private $productsServices;

    /**
     * @var NotificationMessagesRepository
     */
    private $notificationMessagesRepository;


    /**
     * Create a new controller instance.
     *
     * @param UsersServices $usersServices
     * @param Client $authorizeClient
     * @param ActivationPacksServices $activationPacksServices
     * @param LnFeesServices $lnFeesServices
     * @param AutoShipsServices $autoShipsServices
     * @param ProductsServices $productsServices
     */




    public function __construct(
        UsersServices $usersServices,
        Client $authorizeClient,
        ActivationPacksServices $activationPacksServices,
        LnFeesServices $lnFeesServices,
        AutoShipsServices $autoShipsServices,
        ProductsServices $productsServices,
        NotificationMessagesRepository $notificationMessagesRepository
    )
    {
//        $this->middleware('guest');
        $this->usersServices = $usersServices;
        $this->authorizeClient = $authorizeClient;
        $this->activationPacksServices = $activationPacksServices;
        $this->lnFeesServices = $lnFeesServices;
        $this->autoShipsServices = $autoShipsServices;
        $this->productsServices = $productsServices;
        $this->notificationMessagesRepository = $notificationMessagesRepository;
    }

    public function register(Request $request)
    {
        $now = \Carbon\Carbon::now();
        $inputs = $request->all();

        $this->validator($inputs)->validate();

        $activationPack = $this->activationPacksServices->find($inputs['activation_pack_id']);
        $autoShip = $this->autoShipsServices->find($inputs['auto_ship_id']);
        $lnFee = $this->lnFeesServices->find($inputs['ln_fee_id']);


        $inputs['initial_payment_amount'] = $activationPack->price + $lnFee->price;
        $inputs['subscription_amount'] = $autoShip->price + $lnFee->price;

        if ($this->authorizeClient->processPayment($inputs)) {
            event(new Registered($user = $this->create($inputs)));
            session(['register_success' => true]);
            Mail::to($user->email)->later($now->addDays(1), new \App\Mail\ProductUsage($user));
        } else {
            return redirect()->back()->withErrors('Card Failed');
        }


        return redirect('/');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'purl' => 'required|exists:users,purl',
            'signature' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $referrer = $this->usersServices->findBy('purl', $data['purl']);
        $toCreate = $data;
        $toCreate['referrer_id'] = $referrer->id;
        $toCreate['achievement_level_id'] = 1;
        $toCreate['password'] = $data['password'];
        $toCreate['cc_exp_date'] = Carbon::parse($data['year_expire'] . '-' . $data['month_expire']);

        return $this->usersServices->create($toCreate);
    }

        protected function create_synergy(array $data)
    {
        $referrer = $this->usersServices->findBy('purl', $data['purl']);
        $toCreate = $data;
        $toCreate['synergy_sponsor_id'] = $data['synergy_sponsor_id'];
        $toCreate['position'] = $data['position'];
        $toCreate['referrer_id'] = $referrer->id;
        $toCreate['achievement_level_id'] = 1;
        $toCreate['password'] = $data['password'];
        //$toCreate['cc_exp_date'] = Carbon::parse($data['year_expire'] . '-' . $data['month_expire']);

        return $this->usersServices->create_synergy($toCreate);
    }

    public function register_step_0(SteppedRegistrationRequest $request)
    {
        $inputs = $request->except('_token');

        session(['registration_step_0' => $inputs]);

        return redirect('get-started/step/1');
    }

    public function register_step_1(SteppedRegistrationRequest $request)
    {
        $inputs = $request->except('_token');

        session(['registration_step_1' => $inputs]);

        return redirect('get-started/step/2');
    }

    public function register_step_2(SteppedRegistrationRequest $request)
    {
        $inputs = $request->except('_token');

        session(['registration_step_2' => $inputs]);

        return redirect('get-started/step/3');
    }

    public function register_step_3(SteppedRegistrationRequest $request)
    {
        $inputs = $request->except('_token');

        session(['registration_step_3' => $inputs]);

        return redirect('get-started/step/4');
    }

    public function register_step_4(SteppedRegistrationRequest $request)
    {
        $inputs = $request->except('_token');

        session(['registration_step_4' => $inputs]);

        return redirect('get-started/step/5');
    }

    public function register_step_5(SteppedRegistrationRequest $request)
    {
        $inputs = $request->except('_token');

        if (isset(session('registration_step_2')['product_id'])) {
            $activationPackOrProduct = $this->productsServices->find(session('registration_step_2')['product_id']);
        }
        if (isset(session('registration_step_2')['activation_pack_id'])) {
            $activationPackOrProduct = $this->activationPacksServices->find(session('registration_step_2')['activation_pack_id']);
        }

        $autoShip = $this->autoShipsServices->find(session('registration_step_3')['auto_ship_id']);
        $lnFee = $this->lnFeesServices->find(session('registration_step_4')['ln_fee_id']);

        $allInputs = array_merge(
           // session('registration_step_0'), // todo include this once new registration is up
            session('registration_step_1'),
            session('registration_step_2'),
            session('registration_step_3'),
            session('registration_step_4'),
            $inputs
        );

        $allInputs['initial_payment_amount'] = $activationPackOrProduct->price + $lnFee->price;
//        $allInputs['subscription_amount'] = $autoShip->price + $lnFee->price;
        $allInputs['subscription_amount'] = $lnFee->price;

        $cc_tx = $this->authorizeClient->processPayment($allInputs);

        if ($cc_tx['status'] === 'successful') {
            /** @var ARBCreateSubscriptionResponse $authNetResponse */
            $authNetResponse = $cc_tx['response'];

            $allInputs['auth_net_subscription_id'] = $authNetResponse->getSubscriptionId();
            $allInputs['auth_net_profile_id'] = $authNetResponse->getProfile()->getCustomerProfileId();
            $allInputs['auth_net_payment_profile_id'] = $authNetResponse->getProfile()->getCustomerPaymentProfileId();
            $allInputs['auth_net_address_id'] = $authNetResponse->getProfile()->getCustomerAddressId();

            if(session('registration_step_0')['elite_challenge_participant'] == 1) {
                $user = $this->usersServices->updateEliteChallengeAccount($allInputs);
            } else {
                event(new Registered($user = $this->create($allInputs)));
            }

            session(['register_success' => true]);
            Mail::to($user->email)->send(new RegisterSuccessful($user));
            //if ($user->sponsor) Mail::to($user->sponsor->email)->send(new NotifySponsorNewSignUp($user->sponsor, $user));
            
            $mailto = 'harreyson.chavez@gmail.com';
             if ($user->sponsor) Mail::to($mailto)->send(new NotifySponsorNewSignUp($user->sponsor, $user));
    
            $messageNotifi = "Congratulations! A new team member has joined your team! You are one step closer to reaching your income goal!";

            $this->notificationMessagesRepository->create([
                'user_id' => $user->sponsor->id,
                'message' => $messageNotifi,
            ]);

            if($user->sponsor->id){
                
                $referrer = $this->usersServices->findBy('id', $user->sponsor->id);
                $secondLevel=$referrer->referrer_id;

                $this->notificationMessagesRepository->create([
                    'user_id' => $secondLevel,
                    'message' => $messageNotifi,
                ]);

                if($secondLevel){
                    $secondLevelReferrer = $this->usersServices->findBy('id',$secondLevel);
                    $thirdLevel=$secondLevelReferrer->referrer_id;

                    $this->notificationMessagesRepository->create([
                        'user_id' => $thirdLevel,
                        'message' => $messageNotifi,
                    ]);

                    if($thirdLevel){
                        $thirdLevelReferrer = $this->usersServices->findBy('id',$thirdLevel);
                        $fourthLevel=$secondLevelReferrer->referrer_id;
                        
                        $this->notificationMessagesRepository->create([
                            'user_id' => $fourthLevel,
                            'message' => $messageNotifi,
                        ]);


                    }
                }

            }

        
        } elseif ($cc_tx['status'] === 'failed') {
            return redirect()->back()->withErrors(['cc_failure' => $cc_tx['error']]);
        }

        session()->forget([
          // 'registration_step_0', // todo include this once new registration is up
            'registration_step_1',
            'registration_step_2',
            'registration_step_3',
            'registration_step_4',
        ]);

        return redirect('/helping_entrepreneurs_leave_a_legacy'); // todo change this back to new business page

    }


    //SAVE SYNERGY NEW USER DATA

     public function synergy_step_0(SteppedRegistrationRequest $request)
    {
        $inputs = $request->except('_token');

        session(['registration_synergy_step_0' => $inputs]);

        return redirect('synergy-user/step/1');
    }

    public function synergy_step_1(SteppedRegistrationRequest $request)
    {
        $inputs = $request->except('_token');

        session(['registration_synergy_step_1' => $inputs]);

        return redirect('synergy-user/step/2');
    }

    public function synergy_step_2(SteppedRegistrationRequest $request)
    {
        $inputs = $request->except('_token');

        session(['registration_synergy_step_2' => $inputs]);

        return redirect('synergy-user/step/3');
    }

    public function synergy_step_3(SteppedRegistrationRequest $request)
    {
        $inputs = $request->except('_token');

        session(['registration_synergy_step_3' => $inputs]);

        return redirect('synergy-user/step/4');
    }

    public function synergy_step_4(SteppedRegistrationRequest $request)
    {
        $inputs = $request->except('_token');

        session(['registration_synergy_step_4' => $inputs]);

        return redirect('synergy-user/step/5');
    }

    public function synergy_step_5(SteppedRegistrationRequest $request)
    {
        $inputs = $request->except('_token');

        if (isset(session('registration_step_2')['product_id'])) {
            $activationPackOrProduct = $this->productsServices->find(session('registration_step_2')['product_id']);
        }
        if (isset(session('registration_step_2')['activation_pack_id'])) {
            $activationPackOrProduct = $this->activationPacksServices->find(session('registration_step_2')['activation_pack_id']);
        }

        $autoShip = $this->autoShipsServices->find(session('registration_step_3')['auto_ship_id']);
        $lnFee = $this->lnFeesServices->find(session('registration_step_4')['ln_fee_id']);

        $allInputs = array_merge(
            session('registration_step_0'), // todo include this once new registration is up
            session('registration_step_1'),
            session('registration_step_2'),
            session('registration_step_3'),
            session('registration_step_4'),
            $inputs
        );

        $allInputs['initial_payment_amount'] = $activationPackOrProduct->price + $lnFee->price;
        $allInputs['subscription_amount'] = $autoShip->price + $lnFee->price;
        $allInputs['subscription_amount'] = $lnFee->price;

        $cc_tx = $this->authorizeClient->processPayment($allInputs);

        if ($cc_tx['status'] === 'successful') {
            /** @var ARBCreateSubscriptionResponse $authNetResponse */
            $authNetResponse = $cc_tx['response'];

            $allInputs['auth_net_subscription_id'] = $authNetResponse->getSubscriptionId();
            $allInputs['auth_net_profile_id'] = $authNetResponse->getProfile()->getCustomerProfileId();
            $allInputs['auth_net_payment_profile_id'] = $authNetResponse->getProfile()->getCustomerPaymentProfileId();
            $allInputs['auth_net_address_id'] = $authNetResponse->getProfile()->getCustomerAddressId();

            if(session('registration_step_0')['elite_challenge_participant'] == 1) {
                $user = $this->usersServices->updateEliteChallengeAccount($allInputs);
            } else {
                event(new Registered($user = $this->create($allInputs)));
            }

            session(['register_success' => true]);
            Mail::to($user->email)->send(new RegisterSuccessful($user));
            if ($user->sponsor) Mail::to($user->sponsor->email)->send(new NotifySponsorNewSignUp($user->sponsor, $user));
        } elseif ($cc_tx['status'] === 'failed') {
            return redirect()->back()->withErrors(['cc_failure' => $cc_tx['error']]);
        }

        session()->forget([
            'registration_step_0', // todo include this once new registration is up
            'registration_step_1',
            'registration_step_2',
            'registration_step_3',
            'registration_step_4',
        ]);

        return redirect('/helping_entrepreneurs_leave_a_legacy'); // todo change this back to new business page


    }
}
