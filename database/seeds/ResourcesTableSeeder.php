<?php

use Illuminate\Database\Seeder;

class ResourcesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['users','roles','permissions','resources'];

        foreach($data as $name)
        {
            $resource = new \App\Permission\Models\Resources\Resource();
            $resource->name = $name;
            $resource->save();
        }
    }
}
