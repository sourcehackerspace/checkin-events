<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)->create();

        /*$admin = new User;
        $admin->name = "Administrador general";
        $admin->email = "admin@bluebeanmx.com";
        $admin->password = bcrypt("Bluebean-19");
        $admin->type = "admin";
        $admin->remember_token = str_random(10);

        $admin->save();*/
    }
}
