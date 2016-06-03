<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Andy Basuki',
                'email' => 'andybasuki88@gmail.com',
                'password' => '$2y$10$DHBjVXltXWq.ad89RMre1ea4giGFvwJCw3zVEiW6AJuMejWRnJLZ2',
                'role' => 'admin',
                'last_login' => NULL,
                'status' => 1,
                'remember_token' => 'LeToOslJY3UrTM9cq9HJTzYJPSq2Tmym8nqM9mboh7wJkeIvBBPmgSo0EFvm',
                'created_at' => NULL,
                'updated_at' => '2016-06-02 09:52:43',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Super Admin',
                'email' => 'admin@yahoo.com',
                'password' => '$2y$10$h4I6PL8mgZ5CjvEAN8kvEuTYYa0wm/.vQIJ12qkYpzSHUQ.AYJVli',
                'role' => 'super_admin',
                'last_login' => NULL,
                'status' => 1,
                'remember_token' => 'olpejr1ISsghi4s5x5XgSAXW8lrl7IdwhfEspBJHOTlLC1jSongRQpvRatmd',
                'created_at' => '2016-04-05 09:17:24',
                'updated_at' => '2016-06-02 09:49:48',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Handy Salam',
                'email' => 'handysalam@yahoo.com',
                'password' => '$2y$10$kDOK2dHiLu7WYgpfX2ljQu4FAy8p9NeRO9bC46yU5cHqcyfxKL77e',
                'role' => 'regular_user',
                'last_login' => NULL,
                'status' => 0,
                'remember_token' => NULL,
                'created_at' => '2016-05-31 14:41:35',
                'updated_at' => '2016-05-31 14:41:35',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Hana Tania',
                'email' => 'hanatania2901@gmail.com',
                'password' => '$2y$10$kiqRXqkaN1Fqs8tA/SWibeldFKOaajTfKPRSde3wI6VWDgch7jD2i',
                'role' => 'admin',
                'last_login' => NULL,
                'status' => 0,
                'remember_token' => NULL,
                'created_at' => '2016-05-31 14:45:07',
                'updated_at' => '2016-05-31 14:45:07',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Jasse Puustinen',
                'email' => 'jason@yahoo.com',
                'password' => '$2y$10$gSAWQ5xAxk80r6XUvynLp.FahlVB68Jp4k4mLubaIHdh89T3nwX8G',
                'role' => 'admin',
                'last_login' => NULL,
                'status' => 1,
                'remember_token' => 'VEGkOExe8d34SQoZYi1sEm4Wi85PdV44dwlTDAPQR5gJUWxTVJKQYSUlAaCF',
                'created_at' => '2016-06-01 16:32:01',
                'updated_at' => '2016-06-01 16:36:39',
            ),
        ));
        
        
    }
}
