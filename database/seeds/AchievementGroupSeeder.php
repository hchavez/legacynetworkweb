<?php

use Illuminate\Database\Seeder;

class AchievementGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [
            [
                'name' => 'Group 1',
                'description' => 'Complete C, L1 and L2 and earn $582.50. GOAL: Month 1'
            ],
            [
                'name' => 'Group 2',
                'description' => 'Complete L3 and L4 and earn $2,680.75. GOAL: Month 2'
            ],
            [
                'name' => 'Group 3',
                'description' => 'Complete L5 and earn $6,321.55. GOAL: Month 3'
            ],
            [
                'name' => 'Group 4',
                'description' => 'Complete L6 and L7 and earn $15,384.75. GOAL: Month 4'
            ],
            [
                'name' => 'Group 5',
                'description' => 'Complete L8, L9 and L10 and earn $48,867. GOAL: Month 5'
            ]
        ];
         foreach($arr as $key => $item) {
             \App\Models\AchievementGroups::create([
                 'name' => $item['name'],
                 'description' => $item['description'],
             ]);
         }
    }
}
