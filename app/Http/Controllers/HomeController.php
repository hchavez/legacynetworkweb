<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResendWelcomeEmailRequest;
use App\Mail\UserSignUp;
use App\Models\Faq;
use App\Repositories\UsersRepository;
use App\Services\ActivationPacksServices;
use App\Services\AutoShipsServices;
use App\Services\BroadcastCommentsServices;
use App\Services\LnFeesServices;
use App\Services\ProductsServices;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Mail;

class HomeController extends Controller
{
    /**
     * @var UsersRepository
     */
    private $usersRepository;
    /**
     * @var BroadcastCommentsServices
     */
    private $broadcastCommentsServices;
    /**
     * @var ProductsServices
     */
    private $productsServices;
    /**
     * @var ActivationPacksServices
     */
    private $activationPacksServices;
    /**
     * @var AutoShipsServices
     */
    private $autoShipsServices;
    /**
     * @var LnFeesServices
     */
    private $lnFeesServices;

    /**
     * HomeController constructor.
     * @param UsersRepository $usersRepository
     * @param BroadcastCommentsServices $broadcastCommentsServices
     * @param ProductsServices $productsServices
     * @param ActivationPacksServices $activationPacksServices
     * @param AutoShipsServices $autoShipsServices
     * @param LnFeesServices $lnFeesServices
     */
    public function __construct(
        UsersRepository $usersRepository,
        BroadcastCommentsServices $broadcastCommentsServices,
        ProductsServices $productsServices,
        ActivationPacksServices $activationPacksServices,
        AutoShipsServices $autoShipsServices,
        LnFeesServices $lnFeesServices
    )
    {
        $this->usersRepository = $usersRepository;
        $this->broadcastCommentsServices = $broadcastCommentsServices;
        $this->productsServices = $productsServices;
        $this->activationPacksServices = $activationPacksServices;
        $this->autoShipsServices = $autoShipsServices;
        $this->lnFeesServices = $lnFeesServices;
    }

    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->hasRole('Synergy')) {
                return redirect('legacy_admin');
            }
        }

        return view('public_pages.home');
    }

    public function commissions()
    {
        return view('public_pages.commissions');
    }

    public function clinical_studies()
    {
        return view('public_pages.clinical_studies');
    }

    public function elite_business_system()
    {
        return view('public_pages.elite_business_system');
    }

    public function leadership_summits()
    {
        return view('public_pages.leadership_summits');
    }

    public function business_overview()
    {
        return view('public_pages.business_overview');
    }

    public function leave_a_legacy()
    {
        return view('public_pages.leave_a_legacy');
    }

    public function biome()
    {
        return view('public_pages.biome');
    }

    public function a_strong_partner()
    {
        return view('public_pages.a_strong_partner');
    }

    public function give_back()
    {
        return view('public_pages.give_back');
    }

    public function clinically_proven_products()
    {
        $synergyNumber = 'www';
        if (session()->has('purl_user') && session()->get('purl_user')['synergy_id']) {
            $synergyNumber = session()->get('purl_user')['synergy_id'];
        }

        $data = [];
        $data['synergyNumber'] = $synergyNumber;

        return view('public_pages.clinically_proven_products', $data);
    }

    public function live_broadcast()
    {
        $data = [];
        $data['user'] = Auth::user();
        $data['comments'] = $this->broadcastCommentsServices->getAllCommentsWithUsers();

        return view('public_pages.live_broadcast', $data);
    }

    public function business_page()
    {
        return view('public_pages.business_page');
    }

    public function product_information()
    {
        return view('public_pages.product_page');
    }

    public function guest_calendar()
    {
        return view('public_pages.guest_calendar');
    }

    public function ehc_calendar()
    {
        return view('public_pages.ehc_calendar');
    }

    public function contact()
    {
        $data = [
            "name" => "",
            "email" => "",
            "mobile" => "",
        ];
        if (session()->get('purl_user') && isset(session()->get('purl_user')['id'])) {
            $user = User::find(session()->get('purl_user')['id']);

            if ($user) {
                $data = [
                    "name" => $user->full_name,
                    "email" => $user->email,
                    "mobile" => $user->mobile,
                ];
            }
        }
        return view('public_pages.contact', $data);
    }

    public function ehc_contact()
    {
        $data = [
            "name" => "",
            "email" => "",
            "mobile" => "",
        ];
        if (session()->get('purl_user') && isset(session()->get('purl_user')['id'])) {
            $user = User::find(session()->get('purl_user')['id']);

            if ($user) {
                $data = [
                    "name" => $user->full_name,
                    "email" => $user->email,
                    "mobile" => $user->mobile,
                ];
            }
        }
        return view('public_pages.ehc_contact', $data);
    }

    public function get_started()
    {
        return redirect('/get-started/step/0');
        /*$data['products'] = $this->productsServices->all();
        $data['activation_packs'] = $this->activationPacksServices->all();
        $data['auto_ships'] = $this->autoShipsServices->all();
        $data['ln_fees'] = $this->lnFeesServices->all();
        return view('public_pages.get_started', $data);*/
    }

    public function resend_welcome_email()
    {
        return view('auth.resend_welcome_email');
    }

    public function process_resend_welcome_email(ResendWelcomeEmailRequest $request)
    {
        $email = $request->get('email');
        $user = $this->usersRepository->findBy('email', $email);
        Mail::to($user->email)->send(new UserSignUp($user));

        return redirect('/');
    }

    public function faq(Request $request)
    {
        $data = [];
        $results = [];
        $data['searching'] = false;
        $data['result_count'] = 0;

        if ($request->has('q')) {
            /** @var Collection $results */
            $results = Faq::search($request->input('q'))->get();
            $data['searching'] = true;
            $data['result_count'] = $results->count();
        }

        $data['results'] = $results;
        return view('public_pages.faq', $data);
    }

    public function business_presentation()
    {
        return view('public_pages.business_presentation');
    }

    public function terms_and_conditions()
    {
        return view('public_pages.terms_and_conditions');
    }

    public function generateWidgets(Request $request)
    {
        $data = [];
        $data['html'] = view('widgets.controller', ['widgets' => $request->widgets])->render();

        return response($data);
    }

    public function get_started_step_0()
    {
//        return view('public_pages.get_started_step_1');
        return redirect('get-started/step/1');
    }

    public function get_started_step_1()
    {
        if (!session()->get('registration_step_0')) {
//            return redirect('get-started/step/0');
        }

        return view('public_pages.get_started_step_1');
    }

    public function get_started_step_2()
    {
        if (!session()->get('registration_step_1')) {
            return redirect('get-started/step/1');
        }

        $data['activation_packs'] = $this->activationPacksServices->all();
        $data['synergy_activation_product'] = $this->productsServices->findBy('name', 'Synergy Activation Fee');

        return view('public_pages.get_started_step_2', $data);
    }

    public function get_started_step_3()
    {
        if (!session()->get('registration_step_2')) {
            return redirect('get-started/step/2');
        }
        $data['auto_ships'] = $this->autoShipsServices->all();

        return view('public_pages.get_started_step_3', $data);
    }

    public function get_started_step_4()
    {
        if (!session()->get('registration_step_3')) {
            return redirect('get-started/step/3');
        }

        $data['ln_fees'] = $this->lnFeesServices->all();

        return view('public_pages.get_started_step_4', $data);
    }

    public function get_started_step_5()
    {
        if (!session()->get('registration_step_4')) {
            return redirect('get-started/step/4');
        }

        $data = [];
        try {

            $data['product'] = null;
            $data['activationPack'] = null;

            if (isset(session('registration_step_2')['product_id'])) {
                $data['product'] = $this->productsServices->find(session('registration_step_2')['product_id']);
            }
            if (isset(session('registration_step_2')['activation_pack_id'])) {
                $data['activationPack'] = $this->activationPacksServices->find(session('registration_step_2')['activation_pack_id']);
            }

            $data['autoShip'] = $this->autoShipsServices->find(session('registration_step_3')['auto_ship_id']);
            $data['lnFee'] = $this->lnFeesServices->find(session('registration_step_4')['ln_fee_id']);

        } catch (\Exception $exception) {
            dd('failed');
            return redirect('/');
        }
        return view('public_pages.get_started_step_5', $data);
    }


//        SYNERGY USER REGISTRATION

        public function synergy_user()
    {
       return redirect('synergy-user/step/1');
    }

        public function synergy_user_0()
    {
        return view('public_pages.synergy_user_step_1');
    }

        public function synergy_user_1()
    {
        return view('public_pages.synergy_user_step_1');
    }

        public function synergy_user_2()
    {
        if (!session()->get('registration_synergy_step_1')) {
            return redirect('get-started/step/1');
        }

        $data['activation_packs'] = $this->activationPacksServices->all();
        $data['synergy_activation_product'] = $this->productsServices->findBy('name', 'Synergy Activation Fee');

        return view('public_pages.synergy_user_step_2', $data);
    }

        public function synergy_user_3()
    {

         if (!session()->get('registration_synergy_step_2')) {
            return redirect('synergy-user/step/2');
        }
        $data['auto_ships'] = $this->autoShipsServices->all();

        return view('public_pages.synergy_user_step_3', $data);
    }

        public function synergy_user_4()
    {

        if (!session()->get('registration_synergy_step_3')) {
            return redirect('synergy-user/step/3');
        }

        $data['ln_fees'] = $this->lnFeesServices->all();

        return view('public_pages.synergy_user_step_4', $data);
    }

        public function synergy_user_5()
    {

       if (!session()->get('registration_synergy_step_4')) {
            return redirect('synergy-user/step/4');
        }

        $data = [];
        try {

            $data['product'] = null;
            $data['activationPack'] = null;

            if (isset(session('registration_synergy_step_2')['product_id'])) {
                $data['product'] = $this->productsServices->find(session('registration_synergy_step_2')['product_id']);
            }
            if (isset(session('registration_synergy_step_2')['activation_pack_id'])) {
                $data['activationPack'] = $this->activationPacksServices->find(session('registration_synergy_step_2')['activation_pack_id']);
            }

            $data['autoShip'] = $this->autoShipsServices->find(session('registration_synergy_step_3')['auto_ship_id']);
            $data['lnFee'] = $this->lnFeesServices->find(session('registration_synergy_step_4')['ln_fee_id']);

        } catch (\Exception $exception) {
            dd('failed');
            return redirect('/');
        }
        return view('public_pages.synergy_user_step_5', $data);
    }    


    public function tech_support()
    {
        return view('public_pages.tech_support');
    }

    public function customer_service()
    {
        return view('public_pages.customer_service');
    }

}
