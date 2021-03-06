<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Role::class)->create([
            'name' => 'Admin'
        ]);
    }
}
