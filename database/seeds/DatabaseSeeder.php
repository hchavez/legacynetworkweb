<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SuccessCompassSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(AchievementGroupSeeder::class);
        $this->call(AchievementLevelsSeeder::class);
        $this->call(AdvancedAchievementsSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(EventStatusSeeder::class);
        $this->call(SupportTicketStatusSeeder::class);
        $this->call(SupportTicketCategorySeeder::class);
    }
}
