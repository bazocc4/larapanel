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
                'password' => '$2y$10$TvccYQnckhbzZo0TN4i9lO4F9XYnbNkAmCidAAE1KGrHE75PpwK2K',
                'role' => 'admin',
                'last_login' => '2016-06-20 16:31:37',
                'status' => 1,
                'remember_token' => 'D6KSAaswiEtSG4OJcQJ5IeL4N70P2CTcFjKA0RZ3ZcDXRcCDDqc5hLw5fZBc',
                'created_at' => NULL,
                'updated_at' => '2016-06-20 14:43:06',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Super Admin',
                'email' => 'admin@yahoo.com',
                'password' => '$2y$10$h4I6PL8mgZ5CjvEAN8kvEuTYYa0wm/.vQIJ12qkYpzSHUQ.AYJVli',
                'role' => 'super_admin',
                'last_login' => '2016-06-20 16:54:33',
                'status' => 1,
                'remember_token' => '7gmIcrYyzOUP1g7H0l05mkMePrmkYo2aoa2bxbhUBsL2mEqi2ak4B1i72gO6',
                'created_at' => '2016-04-05 09:17:24',
                'updated_at' => '2016-06-20 10:27:07',
            ),
            2 => 
            array (
                'id' => 4,
                'name' => 'Hana Tania',
                'email' => 'hanatania2901@gmail.com',
                'password' => '$2y$10$kiqRXqkaN1Fqs8tA/SWibeldFKOaajTfKPRSde3wI6VWDgch7jD2i',
                'role' => 'admin',
                'last_login' => '2016-06-20 16:30:10',
                'status' => 1,
                'remember_token' => '4F0eihzNFzJABhFtC4tCqRD0j8K5ujmbNdgFKDT2FlblYnT3OyUwAPyBVVM8',
                'created_at' => '2016-05-31 14:45:07',
                'updated_at' => '2016-06-20 16:30:04',
            ),
        ));
        
        
    }
}
