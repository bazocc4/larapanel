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
                'remember_token' => '4PiMuwtOLkAQ58KmmcyhwkCo3NkcDg1V7Bm7xsVbKqRNc31Gdr4USOeW5laK',
                'created_at' => NULL,
                'updated_at' => '2016-05-30 16:47:14',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Super Admin',
                'email' => 'admin@yahoo.com',
                'password' => '$2y$10$Q5kIzwhgpGnrqjyFSQjiq.gXoe1SMzxDhZUWi/H1xPJLBDPAp/Lxy',
                'role' => 'admin',
                'last_login' => NULL,
                'remember_token' => 'Ha4GkphyV7BLP0zjFkxFiyiPgORxE8iIKtOHMUkGNR6sqJ9xRF7hrG4dgajj',
                'created_at' => '2016-04-05 09:17:24',
                'updated_at' => '2016-05-30 16:47:22',
            ),
        ));
        
        
    }
}
