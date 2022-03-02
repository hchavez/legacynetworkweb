<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = \Carbon\Carbon::parse('March 20 2018');
        DB::statement(DB::raw('SET FOREIGN_KEY_CHECKS=0'));
        DB::statement(DB::raw('TRUNCATE users'));
        DB::statement(DB::raw('TRUNCATE user_success_compass'));

        $password = 'secret';
        if (strtolower(env('APP_ENV')) == 'production') {
            $password = '#L3g@cyNetwork';
        }

        $data = [
            [
                'first_name' => 'Isaac',
                'middle_name' => 'Canoy',
                'last_name' => 'Manubag',
                'email' => 'isaac_manubag@yahoo.com',
                'password' => bcrypt($password),
                'purl' => '86241aTSxb09',
                'synergy_id' => '6Rq75G09',
                'status' => 'ACTIVE',
                'created_at' => $now,
                'updated_at' => $now,
                'is_training_done' => true,
                'achievement_level_id' => 1,
                'date_of_birth' => $now,
            ],[
                'first_name' => 'Earl',
                'middle_name' => 'L',
                'last_name' => 'Amante',
                'email' => 'earlamante@w3bkit.com',
                'password' => bcrypt($password),
                'purl' => 'x65I9hB6b27E',
                'synergy_id' => '23fO270f',
                'status' => 'ACTIVE',
                'created_at' => $now,
                'updated_at' => $now,
                'is_training_done' => true,
                'achievement_level_id' => 1,
                'date_of_birth' => $now,
            ],[
                'first_name' => 'Andrew',
                'middle_name' => '',
                'last_name' => 'Goodwin',
                'email' => 'andrew@fifthmissionmarketing.com',
                'password' => bcrypt($password),
                'purl' => 'A0058wDjj73b',
                'synergy_id' => '7Ot4562P',
                'status' => 'ACTIVE',
                'created_at' => $now,
                'updated_at' => $now,
                'is_training_done' => true,
                'achievement_level_id' => 1,
                'date_of_birth' => $now,
            ],[
                'first_name' => 'Synergy',
                'middle_name' => '',
                'last_name' => 'Admin',
                'email' => 'user@synergy.com',
                'password' => bcrypt($password),
                'purl' => 'B1169xeZZ54d',
                'synergy_id' => '123123',
                'status' => 'ACTIVE',
                'created_at' => $now,
                'updated_at' => $now,
                'is_training_done' => true,
                'achievement_level_id' => 1,
                'date_of_birth' => $now,
            ],[
                'first_name' => 'Dianne',
                'middle_name' => 'Leavitt',
                'last_name' => 'Admin',
                'email' => 'dianneleavitt@me.com',
                'password' => bcrypt($password),
                'purl' => 'C0056vbEE54d',
                'synergy_id' => '',
                'status' => 'ACTIVE',
                'created_at' => $now,
                'updated_at' => $now,
                'is_training_done' => true,
                'achievement_level_id' => 1,
                'date_of_birth' => $now,
            ],[
                'first_name' => 'Legacy',
                'middle_name' => '',
                'last_name' => 'Network',
                'email' => 'legacy_network@synergy.com',
                'password' => bcrypt($password),
                'purl' => '180555',
                'synergy_id' => '',
                'status' => 'ACTIVE',
                'created_at' => $now,
                'updated_at' => $now,
                'is_training_done' => true,
                'achievement_level_id' => 1,
                'date_of_birth' => $now,
            ],[
                'first_name' => 'Legacy',
                'middle_name' => '',
                'last_name' => 'Network2',
                'email' => 'legacy_network2@synergy.com',
                'password' => bcrypt($password),
                'purl' => '1242422',
                'synergy_id' => '',
                'status' => 'ACTIVE',
                'created_at' => $now,
                'updated_at' => $now,
                'is_training_done' => true,
                'achievement_level_id' => 1,
                'date_of_birth' => $now,
            ],
        ];

        foreach ($data as $d) {
            App\User::create($d);
        }

        if (strtolower(env('APP_ENV')) != 'production') {
            $faker = Faker\Factory::create();

            for($i = 1; $i <= 4; $i++) {
                App\User::create([
                    'first_name' => $faker->firstName,
                    'middle_name' => "",
                    'last_name' => $faker->lastName,
                    'email' => $faker->email,
                    'password' => bcrypt($password),
                    'purl' => $faker->randomKey,
                    'synergy_id' => $faker->randomKey,
                    'status' => 'ACTIVE',
                    'referrer_id' => $i,
                    'placement' => 'L',
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);

                App\User::create([
                    'first_name' => $faker->firstName,
                    'middle_name' => "",
                    'last_name' => $faker->lastName,
                    'email' => $faker->email,
                    'password' => bcrypt($password),
                    'purl' => $faker->randomKey,
                    'synergy_id' => $faker->randomKey,
                    'status' => 'ACTIVE',
                    'referrer_id' => $i,
                    'placement' => 'R',
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }

            for($i = 0; $i < 15; $i++) {
                App\User::create([
                    'first_name' => $faker->firstName,
                    'middle_name' => "",
                    'last_name' => $faker->lastName,
                    'email' => $faker->email,
                    'password' => bcrypt($password),
                    'purl' => $faker->randomKey,
                    'synergy_id' => $faker->randomKey,
                    'status' => 'PENDING',
                    'referrer_id' => null,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }
        }


        DB::statement(DB::raw('SET FOREIGN_KEY_CHECKS=1'));
    }
}
