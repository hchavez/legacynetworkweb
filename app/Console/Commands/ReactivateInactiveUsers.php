<?php

namespace App\Console\Commands;

use App\Services\UsersServices;
use Illuminate\Console\Command;

class ReactivateInactiveUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'authnet:reactivate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Attempt to reactivate inactive users by checking auth net subscription status if "active"';
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
        return $this->usersServices->reactivateInactiveUsers();
    }
}
