<?php

use Illuminate\Database\Seeder;

class AdvancedAchievementsSeeder extends Seeder
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
                'name' => 'Legacy Network Leader Award',
                'qualification' => 'Attend the LN Leadership Summit.',
                'reward' => 'Recognition in Legacy Network News and on LN Instagram page.',
            ],[
                'name' => 'Legacy Network Executive Award',
                'qualification' => 'Attend the LN Financial Leadership Summit.',
                'reward' => 'Recognition in Legacy Network News and on LN Instagram page.',
            ],[
                'name' => 'Legacy Network Ambassador Award',
                'qualification' => 'Attend the LN Multi-Generational Family Wealth, Leadership, and Impact Summit.',
                'reward' => 'Recognition in Legacy Network News and on LN Instagram page.',
            ],[
                'name' => 'Legacy Network Champion of Children Award',
                'qualification' => 'Enroll in LN’s signature giving program that enables K-12 schools in high-poverty areas to develop leadership skills in children and youth through our charitable partner, Leader.org. Join the founders and leaders of Legacy Network in giving at least 1% of your monthly earnings for at least 1 year.',
                'reward' => 'Recognition in Legacy Network News and on LN Instagram page.',
            ],
        ];

        foreach($arr as $key => $item) {
            \App\Models\AdvancedAchievements::create([
                'name' => $item['name'],
                'qualification' => $item['qualification'],
                'reward' => $item['reward'],
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }
    }
}
