<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Role::create(['name'=>'submitter']);
        \App\Models\Role::create(['name'=>'reviewer']);
        \App\Models\Role::create(['name'=>'client']);
    }
}
