<?php

namespace App\Http\Controllers;

use App\Models\BusinessCards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use App\Http\Traits\UpdatesPayments;
use App\Repositories\NotificationMessagesRepository;
use App\Services\UsersServices;
use Illuminate\Support\Facades\Session;

use App\Http\Clients\AuthorizeNet\Client;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use net\authorize\api\contract\v1\ANetApiResponseType;
use net\authorize\api\contract\v1\ARBCreateSubscriptionResponse;




class BusinessCardsController extends Controller
{

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
        Client $authorizeClient
    )
    {
//        $this->middleware('guest');
        $this->usersServices = $usersServices;
        $this->authorizeClient = $authorizeClient;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function businesscardstList()
    {
         $cards = BusinessCards::where('user_id', Auth::user()->id)->get();
         return view('distributor.business_building.business_cards', ['cards' => $cards]);
    }

    public function order_card(Request $request) {

         $allInputs = []; 

        $allInputs['amount'] = $request->amount;
        $allInputs['cc_number'] = $request->cc_number;
        $allInputs['cc_cvv'] = $request->cc_cvv;
        $allInputs['year_expire'] = $request->year_expire;
        $allInputs['month_expire'] = $request->month_expire;

        $response = $this->authorizeClient->processSinglePayment($allInputs);
        $check=false;

        if ($response['status'] === 'successful') {

                    $cards = new BusinessCards;

                    $cards->name = $request->name;
                    $cards->user_id = $request->user_id;
                    $cards->title = $request->title;
                    $cards->website = $request->website;
                    $cards->phone = $request->phone;
                    $cards->email = $request->email;
                    $cards->transaction_id = $response['transactionId'];
                    $cards->amount = $request->amount;
                    $cards->status = 'processing';

                    $cards->save();
    
         $check = true;

        }

        if($check == true){
           
            Session::flash('success', 'Thank you! Business Cards Successfully Created.'); 

            return view('distributor.business_building.confirmation');
        }

        if ($response['status'] === 'failed') {

            return redirect()->back()->withErrors(['cc_failure' => $response['error']]);

        }

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BusinessCards  $businessCards
     * @return \Illuminate\Http\Response
     */
    public function show(BusinessCards $businessCards)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BusinessCards  $businessCards
     * @return \Illuminate\Http\Response
     */
    public function edit(BusinessCards $businessCards)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BusinessCards  $businessCards
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BusinessCards $businessCards)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BusinessCards  $businessCards
     * @return \Illuminate\Http\Response
     */
    public function destroy(BusinessCards $businessCards)
    {
        //
    }
}
