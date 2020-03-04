<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*factory(App\User::class, 20)->create();*/

        Role::create([
        	'name'		=> 'Admin',
        	'slug'		=> 'admin',
        	'special'	=> 'all-access'
        ]);

        User::create([
            "name" => 'Admin',
            "email" => '11111111-1',
            "password" => 'asdasd',
        ]);

        // Usuario + permiso 

        $now = \Carbon\Carbon::now();

        $roles_users = [

                ['1','1'],
                
        ];
        $roles_users = array_map(function($roles_user) use ($now){
           return [

                'role_id' => $roles_user[0],
                'user_id' => $roles_user[1],
                'updated_at' => $now,
                'created_at' => $now,

           ];
        }, $roles_users);

        DB::table('role_user')->insert($roles_users);
        
    }
}
