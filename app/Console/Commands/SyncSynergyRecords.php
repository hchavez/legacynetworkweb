<?php

namespace App\Console\Commands;

use App\Services\UsersServices;
use Illuminate\Console\Command;

class SyncSynergyRecords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:synergy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'fetch synergy api and update user records';
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
        //echo 'test command if run';
        return $this->usersServices->syncSynergyRecords();
    }
}
