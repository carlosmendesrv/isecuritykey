<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {

        factory(App\Models\User::class)->create([
            'name' => 'Carlos Mendes',
            'email' => 'carlos@newtechgo.com.br',
            'password' => bcrypt('12345678'),
            'is_enabled' => true,
            'instance_id' => function() {
                 return factory(\App\Models\Instance::class)->create()->id;
             },
        ])->assignRole('Admin');;
    }
}
