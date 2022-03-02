<?php

use Illuminate\Database\Seeder;

class SuccessCompassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement(DB::raw('SET FOREIGN_KEY_CHECKS=0'));
        $data = [
            [
                'category_name' => 'Business',
                'title' => 'Business',
                'default_label' => 'Person on Contact List, new team member, etc.',
                'fa_icon' => 'fa-briefcase',
            ],[
                'category_name' => 'Personal',
                'title' => 'Self',
                'default_label' => 'Exercise, diet, reading, sleep, nature, prayer/meditation, etc.',
                'fa_icon' => 'fa-user',
            ],[
                'category_name' => 'Personal',
                'title' => 'Family',
                'default_label' => 'Parent, spouse, son/daughter, grandparent, sibling, etc.',
                'fa_icon' => 'fa-users',
            ],[
                'category_name' => 'Personal',
                'title' => 'Friend',
                'default_label' => 'Friend, neighbor, stranger, etc',
                'fa_icon' => 'fa-user-plus',
            ],[
                'category_name' => 'Personal',
                'title' => 'Service',
                'default_label' => 'Community, school, faith-based, etc.',
                'fa_icon' => 'fa-cog',
            ]
        ];


        DB::statement(DB::raw('TRUNCATE success_compass'));

        DB::table('success_compass')->insert($data);
        DB::statement(DB::raw('SET FOREIGN_KEY_CHECKS=1'));
    }
}
