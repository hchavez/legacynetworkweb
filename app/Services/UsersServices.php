<?php

namespace App\Services;

use App\Http\Clients\AuthorizeNet\Client;
use App\Jobs\DeactivateUsersWithCancelledSubscriptions;
use App\Jobs\DeactivateUsersWithExpiredCards;
use App\Jobs\DeleteInactiveUsersForMoreThanOneMonth;
use App\Jobs\ReactivateInactiveUsers;
use App\Jobs\SendOrganizationMessage;
use App\Jobs\SyncSynergyRecords;
use App\Jobs\ValidateUserSubscription;
use App\LegacyNetwork\Repositories\Services\Services;
use App\Mail\AdditionalAward;
use App\Mail\MemberAchievementApproved;
use App\Mail\NewTeamMemberPlacement;
use App\Mail\PaymentDeclinedMail;
use App\Mail\PaymentDeclinedMailEbc;
use App\Mail\PaymentDeclinedMailEhc;
use App\Mail\SendDirectDepositForm;
use App\Mail\SponsorAchievementByMemberApproved;
use App\Mail\TrainingDone;
use App\Mail\UserSignUp;
use App\Models\AchievementLevels;
use App\Repositories\UsersRepository;
use App\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Container\Container as App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use PDF;
use GuzzleHttp\Client as HttpClient;

class UsersServices extends Services
{
    /** @var  $repository UsersRepository */
    protected $repository;
    /**
     * @var App
     */
    private $app;
    /**
     * @var OrdersServices
     */
    private $ordersServices;
    /**
     * The HTTP client instance.
     *
     * @var \GuzzleHttp\Client
     */
    protected $http;

    /**
     * UsersServices constructor.
     * @param App $app
     * @param OrdersServices $ordersServices
     */
    public function __construct(App $app, OrdersServices $ordersServices, HttpClient $client)
    {
        parent::__construct($app);
        $this->app = $app;
        $this->ordersServices = $ordersServices;
        $this->http = $client;
    }

    function repository()
    {
        return UsersRepository::class;
    }

    public function setPurlSession($purl)
    {
        $distributor = $this->repository->findBy('purl', $purl);
        if ($distributor && $distributor->status == 'ACTIVE' && !in_array($distributor->password, [
                'elite-challenge-pending',
                'elite-challenge-active',
            ])) {
            session(['purl_user' => [
                'id' => $distributor->id,
                'email' => $distributor->email,
                'mobile' => $distributor->mobile,
                'synergy_id' => $distributor->synergy_id,
                'name' => $distributor->first_name . " " . $distributor->last_name,
                'purl' => $distributor->purl,
                'avatar' => $distributor->avatar,
            ]]);
        }
    }

    public function getParentDistributor($distributor_id)
    {
        return $this->repository->getParentDistributor($distributor_id);
    }

    public function getMembers($distributor_id)
    {
        return $this->repository->getMembers($distributor_id);
    }

    public function create(array $data)
    {
        $data['password'] = bcrypt($data['password']);
        $data['date_of_birth'] = Carbon::parse($data['date_of_birth']);
        $data['purl'] = $this->generateUniquePurl($data['first_name'], $data['last_name']);

        $user = $this->repository->create($data);

        $user->assignRole('Distributor');

        if (isset($data['financial_summit_attendee'])) {
            $user->assignRole('Financial Summit Attendee');
        }

        if (isset($data['leadership_summit_attendee'])) {
            $user->assignRole('Leadership Summit Attendee');
        }

        if (isset($data['legacy_summit_attendee'])) {
            $user->assignRole('Legacy Summit Attendee');
        }

        $this->ordersServices->createOrderRecordUponRegistration($user, $data);
        return $user;
    }

    public function create_synergy(array $data)
    {
        $data['password'] = bcrypt($data['password']);
        $data['date_of_birth'] = Carbon::parse($data['date_of_birth']);
        $data['purl'] = $this->generateUniquePurl($data['first_name'], $data['last_name']);

        $user = $this->repository->create($data);

        $user->assignRole('Distributor');

        if (isset($data['financial_summit_attendee'])) {
            $user->assignRole('Financial Summit Attendee');
        }

        if (isset($data['leadership_summit_attendee'])) {
            $user->assignRole('Leadership Summit Attendee');
        }

        if (isset($data['legacy_summit_attendee'])) {
            $user->assignRole('Legacy Summit Attendee');
        }

        //$this->ordersServices->createOrderRecordUponRegistration($user, $data);
        return $user;
    }


    public function updateEliteChallengeAccount(array $data)
    {
        $referrer = $this->findBy('purl', $data['purl']);
        $user = $this->findBy('email', $data['email']);
        $user->assignRole('Distributor');

        $toUpdate = $data;
        $toUpdate['referrer_id'] = $referrer->id;
        $toUpdate['achievement_level_id'] = 1;
        $toUpdate['cc_exp_date'] = Carbon::parse($data['year_expire'] . '-' . $data['month_expire']);
        $toUpdate['password'] = bcrypt($data['password']);
        $toUpdate['date_of_birth'] = Carbon::parse($data['date_of_birth']);
        $toUpdate['purl'] = $this->generateUniquePurl($data['first_name'], $data['last_name']);

        $customData = [];
        $customData["product_id"] = $data['product_id'];
        $customData["auto_ship_id"] = $data['auto_ship_id'];
        $customData["ln_fee_id"] = $data['ln_fee_id'];

        unset($toUpdate['elite_challenge_participant']);
        unset($toUpdate['product_id']);
        unset($toUpdate['auto_ship_id']);
        unset($toUpdate['ln_fee_id']);
        unset($toUpdate['monthly_fees']);
        unset($toUpdate['bonuses']);
        unset($toUpdate['taxes']);
        unset($toUpdate['terms']);
        unset($toUpdate['initial_payment_amount']);
        unset($toUpdate['subscription_amount']);
        unset($toUpdate['month_expire']);
        unset($toUpdate['year_expire']);

        $this->ordersServices->createOrderRecordUponRegistration($user, $customData);

        $this->update($toUpdate, $user->id);

        return $user;
    }

    public function update(array $data, $id)
    {
        $_data = $data;
        if (isset($data['password']) && $data['password'] != '') {
            $data['password'] = bcrypt($data['password']);
        } elseif (empty($data['password'])) {
            unset($data['password']);
        }

        if (isset($data['date_of_birth']) && $data['date_of_birth'] != '') {
            $data['date_of_birth'] = Carbon::parse($data['date_of_birth']);
        }

        if (isset($data['synergy_id']) && $data['synergy_id'] != '') {
            if (isset($data['status']) && $data['status'] == 'INACTIVE') {
                $data['status'] = 'INACTIVE';
            } else if (isset($data['status']) && $data['status'] == 'PENDING') {
                $data['status'] = 'PENDING';
            } else {
                $data['status'] = 'ACTIVE';
            }
        }

        if (isset($data['password_confirmation'])) {
            unset($data['password_confirmation']);
        }

        unset($data['financial_summit_attendee']);
        unset($data['leadership_summit_attendee']);
        unset($data['legacy_summit_attendee']);
        unset($data['champion_of_children']);
        unset($data['send_welcome_email']);

        /** @var $user User */
        $user = $this->repository->update($data, $id);

        if (isset($_data['financial_summit_attendee'])) {
            assignRole($user, 'Financial Summit Attendee');
            Mail::to($user->email)->send(new AdditionalAward($user, 'Financial Summit Attendee'));
        } elseif (!isset($_data['financial_summit_attendee'])) {
            $user->removeRole('Financial Summit Attendee');
        }

        if (isset($_data['leadership_summit_attendee'])) {
            assignRole($user, 'Leadership Summit Attendee');
            Mail::to($user->email)->send(new AdditionalAward($user, 'Leadership Summit Attendee'));
        } elseif (!isset($_data['leadership_summit_attendee'])) {
            $user->removeRole('Leadership Summit Attendee');
        }

        if (isset($_data['legacy_summit_attendee'])) {
            assignRole($user, 'Legacy Summit Attendee');
            Mail::to($user->email)->send(new AdditionalAward($user, 'Legacy Summit Attendee'));
        } elseif (!isset($_data['legacy_summit_attendee'])) {
            $user->removeRole('Legacy Summit Attendee');
        }

        if (isset($_data['champion_of_children'])) {
            assignRole($user, 'Champion of Children');
            Mail::to($user->email)->send(new AdditionalAward($user, 'Champion of Children'));
        } elseif (!isset($_data['champion_of_children'])) {
            $user->removeRole('Champion of Children');
        }

        if (isset($_data['synergy_id']) && isset($_data['send_welcome_email']) && $_data['synergy_id'] != '') {
            Mail::to($user->email)->send(new UserSignUp($user));
        }

        if (isset($_data['synergy_id']) && $user->password == 'elite-challenge-pending') {
            $user->password = 'elite-challenge-active';
            $user->status = 'INACTIVE';
            $user->save();
        }

        if (env('APP_ENV') != 'production' && isset($data['achievement_level_id'])) {
            $user = User::find($id);
            $achievementLevel = AchievementLevels::find($data['achievement_level_id']);
            Mail::to($user->email)->send(new MemberAchievementApproved($user, $achievementLevel));

            $sponsor = $user->sponsor;
            if ($sponsor) Mail::to($sponsor->email)->send(new SponsorAchievementByMemberApproved($user, $sponsor, $achievementLevel));
        }

        return $user;
    }

    public function setPlacement($data)
    {
        $user = $this->repository->update([
            'placement' => $data['placement'],
            'team_member_placement_id' => (isset($data['team_member_placement_id'])) ? $data['team_member_placement_id'] : null,
            'determine_placement' => (isset($data['determine_placement'])) ? $data['determine_placement'] : null,
        ], $data['user_id']);

        Mail::to('synergy@user.com')->send(new NewTeamMemberPlacement($user));

        return response(["message" => $user]);
    }

    public function setTrainingStatus($data)
    {
        $achievement_level = ($data['is_training_done'] == 1) ? 1 : null;
        $member = $this->repository->update([
            'is_training_done' => $data['is_training_done'],
            'achievement_level_id' => $achievement_level,
        ], $data['user_id']);

        Mail::to($member->email)->send(new TrainingDone($member));

        return response(["message" => $member]);
    }

    public function showUser($id)
    {
         $etp = null;
        $user = $returnData['user'] = $this->repository->find($id);
        $tl = $user->sponsor;
        $etp = $user->entrepTrainingProgress;
        $ctl = null;
        $stl = null;

        if ($tl) {
            $ctl = $tl->sponsor;
        }
        if ($ctl) {
            $stl = $ctl->sponsor;
        }

        $returnData['etprogress']['etp'] = null;
        $returnData['sponsors']['tl'] = $tl;
        $returnData['sponsors']['ctl'] = $ctl;
        $returnData['sponsors']['stl'] = $stl;
        $returnData['etprogress']['etp'] = $etp;

        return $returnData;
    }

    public function showUserEntTraining($id)
    {
        $etp = null;
        $returnData['etprogress']['etp'] = null;
        $user = $this->repository->find($id);
        $etp = $user->entrepTrainingProgress;

        $returnData['etprogress']['etp'] = $etp;

        return $returnData;
    }

    public function sendOrganizationMessage(array $inputs)
    {
        $levelArr = isset($inputs['level']) ? $inputs['level'] : [];
        $body = $inputs['body'];
        $subject = $inputs['subject'];
        $sendType = $inputs['send_type'];
        $specificEmails = isset($inputs['specific_emails']) ? $inputs['specific_emails'] : null;

        SendOrganizationMessage::dispatch($subject, $body, $levelArr, $sendType, $specificEmails);
    }

    public function paymentDeclined($id)
    {
        $user = $this->repository->find($id);

        Mail::to($user->email)->send(new PaymentDeclinedMailEbc($user));

        return response(['message' => 'sent']);
    }

    public function paymentDeclinedEhc($id)
    {
        $user = $this->repository->find($id);

        Mail::to($user->email)->send(new PaymentDeclinedMailEhc($user));

        return response(['message' => 'sent']);
    }

    public function memberPdf($id)
    {
        $user = $this->repository->find($id, ['order']);
        $data = [];
        $data['user'] = $user;

        $pdf = PDF::loadView('pdf.base2',
            [
                'child' => view(
                    'pdf.member_getting_started_form',
                    $data
                ),
                'title' => 'getting_started_form'
            ]
        );

        $pdf->setPaper('A4', 'portrait');


        return $pdf->stream('getting_started_form.pdf');

    }

    public function getMemberAndTheirCommitments(array $userId)
    {
        return $this->repository->getMemberAndTheirCommitments($userId);
    }

    public function member_direct_deposit_form(array $inputs)
    {
        $data = $inputs;
        $data['user'] = Auth::user();

        $pdf = PDF::loadView('pdf.base2',
            [
                'child' => view(
                    'pdf.member_deposit_form',
                    $data
                ),
                'title' => 'member_deposit_form'
            ]
        );

        $pdf->setPaper('A4', 'portrait');


        Mail::to('DebraD@SynergyWorldWide.com')->send(new SendDirectDepositForm(Auth::user(), $pdf->output()));

        return redirect('distributor/training/entrepreneurship_training')->with('status', 'Sent');
    }

    public function generateUniquePurl($first_name, $last_name)
    {
        $ctr = 0;

        $tryPurl = strtolower($first_name) . "_" . strtolower($last_name);

        while(User::where('purl', '=', $tryPurl)->withTrashed()->exists()) {
            $ctr++;
            $tryPurl .= $ctr;
        }

        return $tryPurl;
    }

    public function syncSynergyRecords()
    {
        $users = $this->all();

        foreach ($users as $user) {
            SyncSynergyRecords::dispatch($user);
        }

        return response(['status' => 'queued'], 200);
    }

    public function deactivateUsersWithCancelledSubscriptions()
    {
        $users = $this->repository->getMembersWithAuthSubscription('ACTIVE');

        foreach ($users as $user) {
            DeactivateUsersWithCancelledSubscriptions::dispatch($user);
        }

        return response(['status' => 'queued'], 200);
    }

    public function deactivateUsersWithExpiredCards()
    {
        $users = $this->repository->getMembersWithExpiredCards();

        foreach ($users as $user) {
            DeactivateUsersWithExpiredCards::dispatch($user);
        }

        return response(['status' => 'queued'], 200);
    }

    public function deleteInactiveUsersForMoreThanOneMonth()
    {
        $users = $this->repository->getInactiveUsersForMoreThanOneMonth();

        foreach ($users as $user) {
            DeleteInactiveUsersForMoreThanOneMonth::dispatch($user);
        }

        return response(['status' => 'queued'], 200);
    }

    public function reactivateInactiveUsers()
    {
        $users = $this->repository->getUsersToReactivate();

        foreach ($users as $user) {
            ReactivateInactiveUsers::dispatch($user);
        }

        return response(['status' => 'queued'], 200);
    }

    public function validateUserSubscriptions()
    {
        $users = $this->repository->getUsersToValidateSubscription();

        foreach ($users as $user) {
            ValidateUserSubscription::dispatch($user);
        }

        return response(['status' => 'queued'], 200);
    }

    public function eliteChallengePDF($id)
    {
        //member_getting_started_form
        $user = $this->repository->find($id, ['order']);
        $data = [];
        $data['user'] = $user;

        $pdf = PDF::loadView('pdf.base2',
            [
                'child' => view(
                    'pdf.customer_application_form',
                    $data
                ),
                'title' => 'customer_application_form'
            ]
        );

        $pdf->setPaper('A4', 'portrait');


        return $pdf->stream('customer_application_form.pdf');
    }

    public function cancelSubscription()
    {
        $user = user();
        $authNetClient = new Client();
        return $authNetClient->cancelSubscription($user->auth_net_subscription_id);



    }

}