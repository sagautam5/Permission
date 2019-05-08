<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = new \App\Permission\Models\Roles\Role();
        $superAdmin->display_name = 'Super Admin';
        $superAdmin->slug = nameToSlug('Super Admin');
        $superAdmin->save();
    }
}
