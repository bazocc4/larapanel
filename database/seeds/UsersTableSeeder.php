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
                'remember_token' => 'WDTVomNjmgtNIrMHnL11t3l4A5PMjsQFmSAuNgJag13fKziPPlV6LKDrzb5v',
                'created_at' => NULL,
                'updated_at' => '2016-04-12 02:48:45',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Super Admin',
                'email' => 'admin@yahoo.com',
                'password' => '$2y$10$Q5kIzwhgpGnrqjyFSQjiq.gXoe1SMzxDhZUWi/H1xPJLBDPAp/Lxy',
                'remember_token' => '34pcg1AJ9xHIJPAtXR1KzXcQ3kHsNRv4i6NAKWf1F5459AOSzIloRB6xXbYl',
                'created_at' => '2016-04-05 09:17:24',
                'updated_at' => '2016-04-12 02:17:40',
            ),
        ));
        
        
    }
}
