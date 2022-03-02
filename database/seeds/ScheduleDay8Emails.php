<?php

use Illuminate\Database\Seeder;

class ScheduleDay8Emails extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allUsers = \App\User::whereIn('password', ['elite-challenge-active', 'elite-challenge-pending'])->get();

        foreach ($allUsers as $user) {
            \App\Jobs\ScheduleChallengeDay8Email::dispatch($user)
                ->delay($user->created_at->addDays(8));
        }
    }
}
