<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 		//User::unguard();
        //$this->call(UserTableSeeder::class);
       

         DB::table('users')->insert([
            'name' => 'Vanessa Geiger',
            'email' => 'v.geiger@otterbach.de',
            'password' => bcrypt('sendit'),
        ]);

        DB::table('users')->insert([
            'name' => 'Florian Gehringer',
            'email' => 'f.gehringer@otterbach.de',
            'password' => bcrypt('sendit'),
        ]);

       

        DB::table('roles')->insert([
            'name' => 'Admin',
            'label' => 'admin',
        ]);

        DB::table('role_user')->insert([
            'role_id' => '1',
            'user_id' => '1',
        ]);

        DB::table('role_user')->insert([
            'role_id' => '1',
            'user_id' => '2',
        ]);

        DB::table('permissions')->insert([
            'name' => 'Administratorrechte',
            'label' => 'show_admin',
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => '1',
            'role_id' => '1',
        ]); 

        //User::reguard();  
    }
}
