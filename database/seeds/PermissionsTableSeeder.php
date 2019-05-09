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
        $resources = ['users','roles','permissions','resources'];
        $actions = ['create','store','edit','update','index','delete'];

        foreach ($resources as $resource)
        {
            foreach ($actions as $action)
            {
                $resource_id = \App\Permission\Models\Resources\Resource::where('name',$resource)->first()->id;
                $resourceAction = new \App\Permission\Models\Permissions\Permission();
                $resourceAction->role_id = 1;
                $resourceAction->resource_id = $resource_id;
                $resourceAction->action = $action;
                $resourceAction->save();
            }
        }
    }
}
