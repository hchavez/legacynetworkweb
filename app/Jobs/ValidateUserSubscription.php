<?php

namespace App\Jobs;

use App\Http\Clients\AuthorizeNet\Client;
use App\Repositories\UsersRepository;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ValidateUserSubscription implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * @var UsersRepository
     */
    protected $userRepo;
    /**
     * @var Client
     */
    protected $client;
    /**
     * @var
     */
    protected $user;
    /**
     * Create a new job instance.
     *
     * @return void
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
        $this->userRepo = app()->make(UsersRepository::class);
        $this->client = app()->make(Client::class);

        $response = $this->client->getSubscriptionPaymentHistory($this->user->auth_net_subscription_id);

        if(!empty($response)) {
            log_([
                'user_id' => $this->user->id,
                'subscription_id' => $this->user->auth_net_subscription_id,
                'tx_status' => $response[0]['status']
            ]);

            if ($response[0]['status'] != 'settledSuccessfully') {
                $this->userRepo->update([
                    'status' => 'INACTIVE',
                    'inactive_at' => Carbon::now(),
                ], $this->user->id);
            }
        }
    }
}
