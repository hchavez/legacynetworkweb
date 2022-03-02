<?php

use Illuminate\Database\Seeder;

class SupportTicketCategorySeeder extends Seeder
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
                'name' => 'General',
                'description' => '',
            ],[
                'name' => 'Email Not Received',
                'description' => '',
            ],[
                'name' => 'Billing Problems',
                'description' => '',
            ],[
                'name' => 'Dashboard Problems',
                'description' => '',
            ],[
                'name' => 'Other Legacy Network Questions',
                'description' => '',
            ]
        ];

        foreach($data as $item) {
            \App\Models\SupportTicketCategories::create([
                'name' => $item['name'],
                'description' => $item['description'],
            ]);
        }
    }
}
