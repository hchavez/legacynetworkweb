<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        $this->_clearTables();
        $this->_roles();
        $this->_giveRolesToUsers();
    }

    private function _clearTables()
    {
        DB::statement(
            DB::raw('delete from role_has_permissions;')
        );
        DB::statement(
            DB::raw('delete from model_has_permissions;')
        );
        DB::statement(
            DB::raw('delete from model_has_roles;')
        );
        DB::statement(
            DB::raw('delete from roles;')
        );
        DB::statement(
            DB::raw('delete from permissions;')
        );
    }

    private function _roles()
    {
        Role::create(['name' => 'Legacy']);
        Role::create(['name' => 'Synergy']);
        Role::create(['name' => 'Distributor']);
        Role::create(['name' => 'Financial Summit Attendee']);
        Role::create(['name' => 'Leadership Summit Attendee']);
        Role::create(['name' => 'Legacy Summit Attendee']);
        Role::create(['name' => 'Champion of Children']);
    }

    private function _giveRolesToUsers()
    {
        $legacyUsers = \App\User::whereIn('email', ['earlamante@w3bkit.com', 'isaac_manubag@yahoo.com', 'andrew@fifthmissionmarketing.com'])->get();
        foreach ($legacyUsers as $user) {
            $user->assignRole('Legacy');
        }

        $synergyUsers = \App\User::whereIn('email', ['user@synergy.com'])->get();
        foreach ($synergyUsers as $user) {
            $user->assignRole('Synergy');
        }

        $synergyUsers = \App\User::whereNotIn('email', ['user@synergy.com'])->get();
        foreach ($synergyUsers as $user) {
            $user->assignRole('Distributor');
        }
    }
}
