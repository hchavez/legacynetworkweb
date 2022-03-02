<?php

namespace App\Console\Commands;

use App\Services\UsersServices;
use Illuminate\Console\Command;

class DeleteInactiveUsersForMoreThanOneMonth extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'authnet:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete the users who are INACTIVE status for more than 30days';
    /**
     * @var UsersServices
     */
    private $usersServices;

    /**
     * Create a new command instance.
     *
     * @param UsersServices $usersServices
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
        return $this->usersServices->deleteInactiveUsersForMoreThanOneMonth();
    }
}
