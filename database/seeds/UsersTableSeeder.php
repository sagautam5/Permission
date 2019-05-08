<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = new \App\User();
        $superAdmin->role_id = 1;
        $superAdmin->name = 'Super Admin';
        $superAdmin->email = 'superadmin@permission.com';
        $superAdmin->password = bcrypt('sa@pc');
        $superAdmin->profile = 'default-profile.png';
        $superAdmin->save();
    }
}
