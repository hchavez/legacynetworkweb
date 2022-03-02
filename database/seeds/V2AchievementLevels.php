<?php

use Illuminate\Database\Seeder;

class V2AchievementLevels extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(\App\Services\AchievementLevelsServices $services)
    {
        $services->update([
            'name' => 'Certification Level',
            'qualification' => 'Complete your Entrepreneurship Training and Certification.',
            'description' => '',
            'reward' => 'Recognition in Legacy Network News and on LN Instagram Page.',
            'income' => '',
            'claim_message' => '',
            'level' => 0,
            'group_id' => null,
        ], 1);
        $services->update([
            'name' => 'Achievement Level 1',
            'qualification' => 'Sponsor at least two Team Members, accumulate 500 CV weak leg volume, and maintain 150 CV Autoship.',
            'description' => 'Star',
            'reward' => 'Featured on LN Facebook and Instagram Page as a Star.',
            'income' => 'Earn $25 in Fast Start Bonus for every Team Member you sponsor. At Star level, earn $50 in Basic Commission (minus the cap). Calculation: 500 CV x 10% = $50 x 73% (average cap factor) = $37.',
            'claim_message' => 'I completed my L1 - <strong>Recognize me!</strong>',
            'level' => 1,
            'group_id' => null,
        ], 2);
        $services->update([
            'name' => 'Achievement Level 2',
            'qualification' => 'Accumulate 1,500 CV weak leg volume and maintain 150 CV Autoship.',
            'description' => 'Bronze',
            'reward' => 'Featured on LN Facebook and Instagram Page as a Bronze.',
            'income' => 'Earn $150 (minus the cap) in Basic Commission plus bonuses.',
            'claim_message' => 'I completed my L2 - <strong>Recognize me!</strong>',
            'level' => 2,
            'group_id' => null,
        ], 3);
        $services->update([
            'name' => 'Achievement Level 3',
            'qualification' => 'Accumulate 3,000 CV weak leg volume and maintain 150 CV Autoship.',
            'description' => 'Silver',
            'reward' => 'Featured on LN Facebook and Instagram Page as a Silver.',
            'income' => 'Earn $300 (minus the cap) in Basic Commission plus bonuses.',
            'claim_message' => 'I completed my L3 - <strong>Recognize me!</strong>',
            'level' => 3,
            'group_id' => null,
        ], 4);
        $services->update([
            'name' => 'Achievement Level 4',
            'qualification' => 'Accumulate 4,500 CV weak leg volume and maintain 150 CV Autoship.',
            'description' => 'Gold',
            'reward' => 'Featured on LN Facebook and Instagram Page as a Gold.',
            'income' => 'Earn $450 (minus the cap) in Basic Commission plus bonuses.',
            'claim_message' => 'I completed my L4 - <strong>Recognize me!</strong>',
            'level' => 4,
            'group_id' => null,
        ], 5);
        $services->update([
            'name' => 'Achievement Level 5',
            'qualification' => 'Accumulate 6,000 CV weak leg volume and maintain 150 CV Autoship.',
            'description' => 'Team Leader',
            'reward' => 'Featured on LN Facebook and Instagram Page as a Team Leader. Qualify to attend the LN Leadership Summit.',
            'income' => 'Earn $600 (minus the cap) in Basic Commission plus bonuses.',
            'claim_message' => 'I completed my L5 - <strong>Recognize me!</strong>',
            'level' => 5,
            'group_id' => null,
        ], 6);
        $services->update([
            'name' => 'Achievement Level 6',
            'qualification' => 'Accumulate 14,000 CV weak leg volume and maintain 150 CV Autoship.',
            'description' => 'Team Manager',
            'reward' => 'Featured on LN Facebook and Instagram Page as a Team Manager.',
            'income' => 'Earn $1,400 (minus the cap) in Basic Commission plus bonuses.',
            'claim_message' => 'I completed my L6 - <strong>Recognize me!</strong>',
            'level' => 6,
            'group_id' => null,
        ], 7);
        $services->update([
            'name' => 'Achievement Level 7',
            'qualification' => 'Accumulate 30,000 CV weak leg volume and maintain 150 CV Autoship.',
            'description' => 'Team Director',
            'reward' => 'Featured on LN Facebook and Instagram Page as a Team Director.',
            'income' => 'Earn $3,000 (minus the cap) in Basic Commission plus bonuses.',
            'claim_message' => 'I completed my L7 - <strong>Recognize me!</strong>',
            'level' => 7,
            'group_id' => null,
        ], 8);
        $services->update([
            'name' => 'Achievement Level 8',
            'qualification' => 'Accumulate 60,000 CV weak leg volume and maintain 150 CV Autoship.',
            'description' => 'Team Elite',
            'reward' => 'Featured on LN Facebook and Instagram Page as a Team Elite.',
            'income' => 'Earn $6,000 (minus the cap) in Basic Commission plus bonuses.',
            'claim_message' => 'I completed my L8 - <strong>Recognize me!</strong>',
            'level' => 8,
            'group_id' => null,
        ], 9);
        $services->update([
            'name' => 'Achievement Level 9',
            'qualification' => 'Accumulate 100,000 CV weak leg volume and maintain 150 CV Autoship.',
            'description' => 'Pearl Executive',
            'reward' => 'Featured on LN Facebook and Instagram Page as a Pearl Executive. Qualify to attend the LN Financial Leadership Summit.',
            'income' => 'Earn $10,000 (minus the cap) in Basic Commission plus bonuses.',
            'claim_message' => 'I completed my L9 - <strong>Recognize me!</strong>',
            'level' => 9,
            'group_id' => null,
        ], 10);
        $services->update([
            'name' => 'Achievement Level 10', 
            'qualification' => 'Accumulate 200,000 CV weak leg volume and maintain 150 CV Autoship.',
            'description' => 'Emerald Executive',
            'reward' => 'Featured on LN Facebook and Instagram Page as an Emerald Executive.',
            'income' => 'Earn $20,000 (minus the cap) in Basic Commission plus bonuses.',
            'claim_message' => 'I completed my L10 - <strong>Recognize me!</strong>',
            'level' => 10,
            'group_id' => null,
        ], 11);
        $services->create([
            'name' => 'Achievement Level 11',
            'qualification' => 'Accumulate 300,000 CV weak leg volume and maintain 150 CV Autoship.',
            'description' => 'Diamond Executive',
            'reward' => 'Featured on LN Facebook and Instagram Page as a Diamond Executive.',
            'income' => 'Earn $20,000 (minus the cap) in Basic Commission plus bonuses.',
            'claim_message' => 'I completed my L11 - <strong>Recognize me!</strong>',
            'level' => 11,
            'group_id' => null,
        ]);
        $services->create([
            'name' => 'Achievement Level 12',
            'qualification' => 'Accumulate 400,000 CV weak leg volume and maintain 150 CV Autoship.',
            'description' => 'Presidential Executive',
            'reward' => 'Featured on LN Facebook and Instagram Page as a Presidential Executive. Qualify to attend the LN Multi-Generational Family Wealth, Leadership, and Impact Summit.',
            'income' => 'Earn $20,000 (minus the cap) in Basic Commission.',
            'claim_message' => 'I completed my L12 - <strong>Recognize me!</strong>',
            'level' => 12,
            'group_id' => null,
        ]);
    }
} ;
