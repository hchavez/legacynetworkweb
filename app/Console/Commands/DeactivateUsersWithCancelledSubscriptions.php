<?php

namespace App\Console\Commands;

use App\Services\UsersServices;
use Illuminate\Console\Command;

class DeactivateUsersWithCancelledSubscriptions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'authnet:deactivate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deactivate Users with Authorize.net Subscription status are cancelled';
    /**
     * @var UsersServices
     */
    private $usersServices;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(UsersServices $usersServices)
    {
        parent::__construct();
        $this->usersServices = $usersServices;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        return $this->usersServices->deactivateUsersWithCancelledSubscriptions();
    }
}
