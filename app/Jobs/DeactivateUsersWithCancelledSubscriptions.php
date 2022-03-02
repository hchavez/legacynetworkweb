<?php

namespace App\Jobs;

use App\Repositories\UsersRepository;
use App\Services\UsersServices;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Http\Clients\AuthorizeNet\Client;

class DeactivateUsersWithCancelledSubscriptions implements ShouldQueue
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

        if($response && $response->getSubscription() && in_array($response->getSubscription()->getStatus(), ['canceled', 'terminated', 'suspended'])) {
            $this->userRepo->update([
                'status' => 'INACTIVE',
                'inactive_at' => Carbon::now(),
            ], $this->user->id);
        } elseif($response && is_null($response->getSubscription())) {
            $this->userRepo->update([
                'status' => 'INACTIVE',
                'inactive_at' => Carbon::now(),
            ], $this->user->id);
        }
    }
}
