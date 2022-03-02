<?php

namespace App\Jobs;

use App\Mail\MemberAchievementApproved;
use App\Mail\SponsorAchievementByMemberApproved;
use App\Services\AchievementLevelsServices;
use App\Services\UsersServices;
use Carbon\Carbon;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;

class SyncSynergyRecords implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * @var UsersServices
     */
    protected $usersServices;
    /**
     * @var AchievementLevelsServices
     */
    protected $achievementLevelServices;
    /**
     * @var HttpClient
     */
    protected $client;
    /**
     * @var
     */
    protected $user;


    /**
     * SyncSynergyRecords constructor.
     * @param UsersServices $usersServices
     * @param HttpClient $client
     * @param $user
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
    
        $now = Carbon::now();
        $this->usersServices = app()->make(UsersServices::class);
        $this->achievementLevelServices = app()->make(AchievementLevelsServices::class);
        $this->client = new HttpClient();

        $baseUrl = "https://api.synergyworldwide.com/distributorservice/api/DistributorManagement/AccountData?customerId=";
        $url = $baseUrl . $this->user->synergy_id;
        $lastMonthPeriodID = Carbon::now()->subMonth()->startOfMonth()->format('Ym');


        try {
            $results = $this->client->request('GET', $url);
            $response = json_decode($results->getBody()->getContents());

            if ($response) {
                $data = [
                    'synergy_account_number' => $response->accountNumber,
                    'synergy_tracking_center_1' => $response->trackingCenter1,
                    'synergy_tracking_center_2' => $response->trackingCenter2,
                    'synergy_tracking_center_3' => $response->trackingCenter3,
                    'synergy_left_leg_cv' => $response->leftLegCv,
                    'synergy_right_leg_cv' => $response->rightLegCv,
                    'synergy_personally_sponsored_count' => $response->personallySponsoredCount,
                    'synergy_team_member_count' => $response->teamMemberCount,
                    'synergy_preferred_customer_count' => $response->preferredCustomerCount,
                    'synergy_highest_title_id' => $response->highestTitleID,
                    'synergy_highest_title_desc' => $response->highestTitleDesc,
                    'synergy_current_title_id' => $response->currentTitleID,
                    'synergy_current_title_desc' => $response->currentTitleDesc,
                    'synergy_next_title_id' => $response->nextTitleID,
                    'synergy_next_title_desc' => $response->nextTitleDesc,
                    'synergy_next_highest_title_id' => $response->nextHighestTitleID,
                    'synergy_next_highest_title_desc' => $response->nextHighestTitleDesc,
                    'synergy_actual_value' => $response->actualValue,
                    'middle_name' => 'test',
                ];

                $data = $this->checkAchievementLevel($data, $response->actualValue);
                $this->usersServices->update($data, $this->user->id);   

                //if ($now->format('d') == '07') {
                    $results2 = $this->client->request('GET', $url . "&periodID=$lastMonthPeriodID");
                    $response2 = json_decode($results2->getBody()->getContents());

                    if ($response2) {
                        $data2 = [];
                        $data2['synergy_prev_value'] = $response2->actualValue;
                        $data2['synergy_prev_left_leg_cv'] = $response2->leftLegCv;
                        $data2['synergy_prev_right_leg_cv'] = $response2->rightLegCv;

                        $this->usersServices->update($data2, $this->user->id);

                    }
                //}


            }
        } catch (ClientException $exception) {
            if ($exception->getCode() != 400) {         
                throw $exception;
            }
        } catch (\Exception $exception) {
            throw $exception;
        }

    }

    private function checkAchievementLevel($data, $cv)
    {
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
            if ($this->user->achievement_level_id >= $key) return $data;

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
