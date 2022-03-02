<?php

use Illuminate\Database\Seeder;

class BonusPath extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(\App\Services\BonusPathsServices $services)
    {
        $services->create([
            'name' => 'Business Builder Bonus',
            'qualification' => 'Personally sponsor two Team Members (one on your left and one on your right) who have each accomplished the same (2x2). Maintain 150 CV Autoship.',
            'reward' => 'Featured on LN Facebook and Instagram Page  as a Business Builder',
            'income' => 'Earn $200 2x2 bonus.',
        ]);

        $services->create([
            'name' => 'Team Leader-Plus Bonus',
            'qualification' => 'Personally complete L5 and help two Team Members (one on your right and one on your left) complete their 2x2 and L3. Maintain 150 CV Autoship.',
            'reward' => ' Featured on LN Facebook and Instagram Page as a Team Leader Plus.',
            'income' => 'Earn $1,300 bonus.',
        ]);

        $services->create([
            'name' => 'Team Manager-Plus Bonus',
            'qualification' => 'Personally complete L6 and help two Team Members (one on your right and one on your left) complete their 2x2 and L5. Maintain 150 CV Autoship.',
            'reward' => 'Featured on LN Facebook and Instagram Page as a Team Manager-Plus.',
            'income' => 'Earn $4000 bonus.',
        ]);
    }
}
