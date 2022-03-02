<?php

use Illuminate\Database\Seeder;

class SupportTicketStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'open',
                'description' => 'Open',
            ],[
                'name' => 'closed',
                'description' => 'Closed',
            ],
        ];

        foreach($data as $item) {
            \App\Models\SupportTicketStatuses::create([
                'name' => $item['name'],
                'description' => $item['description'],
            ]);
        }
    }
}
