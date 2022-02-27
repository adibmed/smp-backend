<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        if(Role::all()->count() === 0) {
            $this->call(RoleSeeder::class);
        }
        $this->call(ProductSeeder::class);
    }
}
