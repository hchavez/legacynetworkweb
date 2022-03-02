<?php

namespace App\Console\Commands;

use App\Services\UsersServices;
use Illuminate\Console\Command;

class DeactivateUsersWithExpiredCards extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'authnet:expiredcards';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deactivate users with expired credit cards';

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
        return $this->usersServices->deactivateUsersWithExpiredCards();
    }
}
