<?php

namespace App\Jobs;

use App\Http\Clients\AuthorizeNet\Client;
use App\Repositories\UsersRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ReactivateInactiveUsers implements ShouldQueue
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

        $response = $this->client->getSubscription($this->user->auth_net_subscription_id);

        if($response && $response->getSubscription() && in_array($response->getSubscription()->getStatus(), ['active'])) {
            $this->userRepo->update([
                'status' => 'ACTIVE',
                'inactive_at' => null,
            ], $this->user->id);
        }
    }
}
