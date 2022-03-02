<?php

use Illuminate\Database\Seeder;

class UpdateTextOnAchievementLevel extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\AchievementLevels::where('level', '=', '1')->update([
            'claim_message' => 'I completed my Level1 - <strong>Recognize me!</strong>'
        ]);

        \App\Models\AchievementLevels::where('level', '=', '2')->update([
            'claim_message' => 'I qualify for my L2 Bonus - <strong>Pay Me!</strong>'
        ]);

        \App\Models\AchievementLevels::where('level', '=', '3')->update([
            'claim_message' => 'I qualify for my L3 Bonus - <strong>Pay Me!</strong>'
        ]);

        \App\Models\AchievementLevels::where('level', '=', '4')->update([
            'claim_message' => 'I qualify for my L4 Bonus - <strong>Pay Me!</strong>'
        ]);

        \App\Models\AchievementLevels::where('level', '=', '5')->update([
            'claim_message' => 'I qualify for my L5 Bonus - <strong>Pay Me!</strong>'
        ]);
    }
}
