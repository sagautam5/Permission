<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $resources = ['users','roles','permissions'];
        $actions = ['create','store','edit','update','list','delete'];

        foreach ($resources as $resource)
        {
            foreach ($actions as $action)
            {
                $resourceAction = new \App\Permission\Models\Permissions\Permission();
                $resourceAction->role_id = 1;
                $resourceAction->resource = $resource;
                $resourceAction->action = $action;
                $resourceAction->save();
            }
        }
    }
}
