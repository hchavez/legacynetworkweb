<?php

use Illuminate\Database\Seeder;

class AchievementLevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = \Carbon\Carbon::now();
        \App\Models\AchievementLevels::create([
            'name' => 'Certification Level',
            'qualification' => 'Complete your Entrepreneurship Training and Certification.',
            'reward' => 'Recognition in Legacy Network News and on LN Instagram Page.',
            'level' => '0',
            'group_id' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $arr = [
            [
                'name' => 'Achievement Level 1',
                'qualification' => 'Complete your Level 1 (L1) by sponsoring two Team Members (TMs). Maintain 150CV Autoship.',
                'reward' => 'Recognition in Legacy Network News and on LN Instagram Page.',
                'claim_message' => 'I qualify for my L1 Bonus - <strong>Pay Me Now!</strong>',
                'group_id' => 1,
            ],[
                'name' => 'Achievement Level 2',
                'qualification' => 'Complete your L2 (Core Team) by helping your personally-sponsored TMs sponsor at least two TMs. You now have at least 6 members in your organization. Maintain 150CV Autoship.',
                'reward' => '$200 LN Bonus. Recognition in Legacy Network News and on LN Instagram Page.',
                'claim_message' => 'I qualify for my L2 Bonus - <strong>Pay Me Now!</strong>',
                'group_id' => 1,
            ],[
                'name' => 'Achievement Level 3',
                'qualification' => 'Complete your L3 by helping your TMs complete their L2. You now have at least 14 TMs in your organization. Maintain 150CV Autoship.',
                'reward' => '$250 LN Bonus. Recognition in Legacy Network News and on LN Instagram Page.',
                'claim_message' => 'I qualify for my L3 Bonus - <strong>Pay Me Now!</strong>',
                'group_id' => 2,
            ],[
                'name' => 'Achievement Level 4',
                'qualification' => 'Accumulate at least 6,000CV weak leg volume. Maintain 150CV Autoship.',
                'reward' => '$1,500 LN Bonus. Qualify to attend the LN Leadership Summit. Recognition in Legacy Network News and on LN Instagram page as a Team Leader!',
                'claim_message' => 'I qualify for my L4 Bonus - <strong>Pay Me Now!</strong>',
                'group_id' => 2,
            ],[
                'name' => 'Achievement Level 5',
                'qualification' => 'Accumulate 14,000CV weak leg volume. Maintain 150CV Autoship.',
                'reward' => '$2,500 LN Bonus. Recognition in Legacy Network News and on LN Instagram page as Team Manager!',
                'claim_message' => 'I qualify for my L5 Bonus - <strong>Pay Me Now!</strong>',
                'group_id' => 3,
            ],[
                'name' => 'Achievement Level 6',
                'qualification' => 'Accumulate 30,000CV weak leg volume. Maintain 150CV Autoship.',
                'reward' => 'Recognition in Legacy Network News and on LN Instagram page as Team Director!',
                'claim_message' => 'I completed my L6 - <strong>Regognize me!</strong>',
                'group_id' => 4,
            ],[
                'name' => 'Achievement Level 7',
                'qualification' => 'Accumulate 100,000CV weak leg volume. Maintain 150CV Autoship.',
                'reward' => 'Qualify to attend the LN Financial Leadership Summit. Recognition in Legacy Network News and on LN Instagram page as Pearl Executive!',
                'claim_message' => 'I completed my L7 - <strong>Regognize me!</strong>',
                'group_id' => 4,
            ],[
                'name' => 'Achievement Level 8',
                'qualification' => 'Accumulate 200,00CV weak leg volume.',
                'reward' => 'Recognition in Legacy Network News and on LN Instagram page as Emerald Executive!',
                'claim_message' => 'I completed my L8 - <strong>Regognize me!</strong>',
                'group_id' => 5,
            ],[
                'name' => 'Achievement Level 9',
                'qualification' => 'Accumulate 300,00CV weak leg volume. Maintain 150CV Autoship.',
                'reward' => 'Recognition in Legacy Network News and on LN Instagram page as Diamond Executive!',
                'claim_message' => 'I completed my L9 - <strong>Regognize me!</strong>',
                'group_id' => 5,
            ],[
                'name' => 'Achievement Level 10',
                'qualification' => 'Accumulate 400,00CV weak leg volume. Maintain 150CV Autoship.',
                'reward' => 'Qualify to attend the LN Multi-Generational Family Wealth, Leadership, and Impact Summit. Recognition in Legacy Network News and on LN Instagram page as Presidential Executive!',
                'claim_message' => 'I completed my L10 - <strong>Regognize me!</strong>',
                'group_id' => 5,
            ]
        ];

        foreach($arr as $key => $item) {
            \App\Models\AchievementLevels::create([
                'name' => $item['name'],
                'qualification' => $item['qualification'],
                'reward' => $item['reward'],
                'level' => $key + 1,
                'claim_message' => $item['claim_message'],
                'group_id' =>  $item['group_id'],
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
