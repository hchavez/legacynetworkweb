<?php

use Illuminate\Database\Seeder;

class EventStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\EventsStatuses::create([
            'name' => 'attending',
            'description' => 'Attending',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        \App\Models\EventsStatuses::create([
            'name' => 'not_attending',
            'description' => 'Not Attending',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        \App\Models\EventsStatuses::create([
            'name' => 'attended',
            'description' => 'Attended',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        \App\Models\EventsStatuses::create([
            'name' => 'did_not_attend',
            'description' => 'Did Not Attend',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
