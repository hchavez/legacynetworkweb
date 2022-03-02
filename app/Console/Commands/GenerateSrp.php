<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateSrp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fmm:srp {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates Model, Repository, Service and API Controller';

    /**
     * Create a new command instance.
     *
     * @return void
     */


    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->call('fmm:model', [
            'name' => $this->argument('name')
        ]);

        $this->call('fmm:repository', [
            'name' => $this->argument('name')
        ]);

        $this->call('fmm:service', [
            'name' => $this->argument('name')
        ]);

        $this->call('fmm:api-controller', [
            'name' => $this->argument('name')
        ]);

        return true;
    }
}
